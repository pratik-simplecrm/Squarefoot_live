<?php

if(!defined('sugarEntry'))define('sugarEntry', true);
 require_once('include/entryPoint.php');
 require_once('include/database/DBManager.php');
 require_once('config.php');
global $db,$cnt1,$Content,$Content1;

		$select_report=$_REQUEST['report_select'];
		//var_dump($_REQUEST['record']);
		global $db;
		
		if(!empty($_REQUEST['name']))
		{
			$name =$_REQUEST['name'];
			$name=(explode(",",$name));
		}
		else
		{
			$logedin_user_id=$_REQUEST['id'];
			$query1 = "SELECT team_id FROM team_memberships WHERE user_id  ='$logedin_user_id' AND deleted=0";
			$result=$db->query($query1); 
			while($getteams1=$db->fetchByAssoc($result))
			{
				$team_id = $getteams1['team_id'];
				$sql="SELECT name FROM team where id='$team_id' ";
				$result1=$db->query($sql);
				$row=$db->fetchByAssoc($result1);	
				$thing=$row["name"];
				$values.=$row["name"].",";
			}
			$values = substr($values, 0, strlen($values)-1); 
			$name=(explode(",",$values));
		}
		
		$name=$_REQUEST['name'];		
		$sub_id = array();	
		$logedin_user_id=$_REQUEST['id']; 
		$sql="SELECT is_admin FROM users where id='$logedin_user_id' ";
		$result1=$db->query($sql);
		$row=$db->fetchByAssoc($result1);	
		$admin=$row["is_admin"];

		$query12 ="SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0 and status='Active'"; 
		$result=$db->query($query12, true); 
		while($getuserids=$db->fetchByAssoc($result))
		{
			$sub_id[] = $getuserids['id'];
		}
		$count=0;
		while(count($sub_id)>$count)
		{
			$query11 ="SELECT id FROM  users WHERE reports_to_id='".$sub_id[$count]."' and deleted=0 and status='Active'"; 
			$result=$db->query($query11, true); 
			while($getuser=$db->fetchByAssoc($result))
			{
			$sub_id[] = $getuser['id'];
			}
			$count++;
		}
		$sub_id[] = $logedin_user_id; 
		$i=0;
		for($k=0; $k< count($name); $k++)
		{
		//print_r($name);
		$name[$k]=str_replace("_"," ",$name[$k]);
		$query8 ="SELECT id FROM  team WHERE name ='$name[$k]' and deleted=0"; 
		$result=$db->query($query8, true); 
		$query=$db->fetchByAssoc($result); 
		$team_id = $query['id'];
		
		$get_teamusers = "SELECT user_id FROM team_memberships WHERE team_id  ='$team_id' AND deleted=0";
		$get_teamusers_res=$db->query($get_teamusers); 
		while($getteams_user=$db->fetchByAssoc($get_teamusers_res))
		{
			$user_list[] = $getteams_user['user_id'];
			
		}

		
		$from=$_REQUEST['from'];
		$from=str_replace('-','/',$from);
		$from=date("Y-m-d H:i:s",strtotime($from));
		//$select_report=$_REQUEST['report_select'];
		
		$flag=false;
		
		if($admin == 0){
		
		for ($j=0;$j<count($sub_id); $j++)
		{ 

		$date_start =$_REQUEST['from'];
		$from=str_replace('-','/',$date_start);
		$date_start=date("Y-m-d",strtotime($from));

		$date_end =$_REQUEST['to'];
		$to=str_replace('-','/',$date_end);
		$date_end=date("Y-m-d",strtotime($to));
		
		$user_id=array();
		
		$query ="SELECT * FROM  users WHERE deleted=0 AND id='$sub_id[$j]' and status='Active'"; 
	 	$result=$db->query($query, true); 
		$getuser=$db->fetchByAssoc($result);
		
		
        	$user_id = $getuser['id'];
        	$user_fname = $getuser['first_name'];
        	$user_lname = $getuser['last_name'];
        	$user_name[]=$user_fname." ".$user_lname;
        	$user_id_arr[]=$getuser['id'];
        	
		$getLeads = "SELECT count(id) as count FROM leads WHERE date_entered between '$date_start' and '$date_end' AND deleted=0 and assigned_user_id='$user_id' and team_id='$team_id'";

		$getLeads_result=$db->query($getLeads); 
		$getLeads_row=$db->fetchByAssoc($getLeads_result);
		

		$total_leads[] = $getLeads_row['count']; 
		
		$getOpp_total ="SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		where o.date_entered between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' and o.team_id='$team_id'";
		$getOpp_total_res=$db->query($getOpp_total); 
		$getOpp_total_res_row=$db->fetchByAssoc($getOpp_total_res);
		$id = $getOpp_total_res_row['id'];
		$amount =$getOpp_total_res_row['amount'];

		$total_oppt[]=$id;				
		$amount=$amount/100000;
		$amount=round($amount, 2);
		$amount=$amount."L";
		$total_amount[]=$amount;
		
		$getClosedWon =  "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		where o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' AND o.sales_stage ='Closed Won' and o.team_id='$team_id'";
		$getClosedWon_res=$db->query($getClosedWon); 
		$getClosedWon_res_row=$db->fetchByAssoc($getClosedWon_res);
		$total_own_oppt[] = $getClosedWon_res_row['id'];
		$oppt_own_amounts =$getClosedWon_res_row['amount']; 
		$oppt_own_amounts=$oppt_own_amounts/100000;
		$oppt_own_amounts=round($oppt_own_amounts, 2);
		$oppt_own_amount[]=$oppt_own_amounts."L"; 
		
		$getOppLost = "SELECT count(o.id) as id, sum(o.amount_usdollar) as sum FROM opportunities o 
		where o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Closed Lost' and o.team_id='$team_id'";
		$getOppLost_res=$db->query($getOppLost); 
		$getOppLost_res_row=$db->fetchByAssoc($getOppLost_res);
		$oppt_lost_amounts =$getOppLost_res_row['sum'];
		$total_lost_oppt[]=$getOppLost_res_row['id'];
		$oppt_lost_amounts=$oppt_lost_amounts/100000;
		$oppt_lost_amounts=round($oppt_lost_amounts, 2);
		$oppt_lost_amount[]=$oppt_lost_amounts."L";
		
		
		$getCalls = "SELECT count(id) as count FROM calls WHERE date_start between '$date_start' and '$date_end' AND assigned_user_id='$user_id' and deleted=0 AND status='Held' and team_id='$team_id'";
		$getCalls_res=$db->query($getCalls); 
		$getCalls_res_row=$db->fetchByAssoc($getCalls_res);
		$calls_count_id[]= $getCalls_res_row['count'];
		
		//Meetings Count 
		$getMeetings = "SELECT count(id) as count FROM meetings WHERE date_start between '$date_start' and '$date_end' AND assigned_user_id='$user_id' and deleted=0 AND status='Held' and team_id='$team_id'";
		$getMeetings_res=$db->query($getMeetings); 
		$getMeetings_res_row=$db->fetchByAssoc($getMeetings_res);		
		$meetings_count_id[] = $getMeetings_res_row['count'];
		
		
		$total_leads_count=$total_leads_count+$total_leads[$i];
		$total_opp_count=$total_opp_count+$total_oppt[$i];
		$total_opp_amount=$total_opp_amount+$total_amount[$i];
		$total_opp_own_count=$total_opp_own_count+$total_own_oppt[$i];
		$total_opp_own_amount=$total_opp_own_amount+$oppt_own_amount[$i];
		$total_opp_lost_count=$total_opp_lost_count+$total_lost_oppt[$i];
		$total_opp_lost_amount=$total_opp_lost_amount+$oppt_lost_amount[$i];
		
		$total_calls_count=$total_calls_count+$calls_count_id[$i];
		$total_meetings_count=$total_meetings_count+$meetings_count_id[$i];
		
		$team_name[]=str_replace("_"," ",$name[$k]);
		//echo $name[$k];
		$i++;
		}
		
				
		
		
		}
		else
		{
		

		$date_start =$_REQUEST['from'];
		$from=str_replace('-','/',$date_start);
		$date_start=date("Y-m-d",strtotime($from));

		$date_end =$_REQUEST['to'];
		$to=str_replace('-','/',$date_end);
		$date_end=date("Y-m-d",strtotime($to));
		
		$user_id=array();
		for($l=0;$l<count($user_list);$l++)
		{
		$query ="SELECT * FROM  users WHERE deleted=0 AND status='Active' AND id='$user_list[$l]'"; 
	 	$result=$db->query($query, true); 
		while($getuser=$db->fetchByAssoc($result))
		{		
        	$user_id = $getuser['id'];
        	$user_fname = $getuser['first_name'];
        	$user_lname = $getuser['last_name'];
        	$user_name[]=$user_fname." ".$user_lname;
        	$user_id_arr[]=$getuser['id'];
        	
		$getLeads = "SELECT count(id) as count FROM leads WHERE date_entered between '$date_start' and '$date_end' AND deleted=0 and assigned_user_id='$user_id' and team_id='$team_id'";

		$getLeads_result=$db->query($getLeads); 
		$getLeads_row=$db->fetchByAssoc($getLeads_result);
		

		$total_leads[] = $getLeads_row['count']; 
		
		$getOpp_total ="SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		where o.date_entered between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' and o.team_id='$team_id'";
		$getOpp_total_res=$db->query($getOpp_total); 
		$getOpp_total_res_row=$db->fetchByAssoc($getOpp_total_res);
		$id = $getOpp_total_res_row['id'];
		$amount =$getOpp_total_res_row['amount'];

		$total_oppt[]=$id;				
		$amount=$amount/100000;
		$amount=round($amount, 2);
		$amount=$amount."L";
		$total_amount[]=$amount;
		
		$getClosedWon =  "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o 
		where o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' AND o.sales_stage ='Closed Won' and o.team_id='$team_id'";
		$getClosedWon_res=$db->query($getClosedWon); 
		$getClosedWon_res_row=$db->fetchByAssoc($getClosedWon_res);
		$total_own_oppt[] = $getClosedWon_res_row['id'];
		$oppt_own_amounts =$getClosedWon_res_row['amount']; 
		$oppt_own_amounts=$oppt_own_amounts/100000;
		$oppt_own_amounts=round($oppt_own_amounts, 2);
		$oppt_own_amount[]=$oppt_own_amounts."L"; 
		
		$getOppLost = "SELECT count(o.id) as id, sum(o.amount_usdollar) as sum FROM opportunities o 
		where o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Closed Lost' and o.team_id='$team_id'";
		$getOppLost_res=$db->query($getOppLost); 
		$getOppLost_res_row=$db->fetchByAssoc($getOppLost_res);
		$oppt_lost_amounts =$getOppLost_res_row['sum'];
		$total_lost_oppt[]=$getOppLost_res_row['id'];
		$oppt_lost_amounts=$oppt_lost_amounts/100000;
		$oppt_lost_amounts=round($oppt_lost_amounts, 2);
		$oppt_lost_amount[]=$oppt_lost_amounts."L";
		
		
		$getCalls = "SELECT count(id) as count FROM calls WHERE date_start between '$date_start' and '$date_end' AND assigned_user_id='$user_id' and deleted=0 AND status='Held' and team_id='$team_id'";
		$getCalls_res=$db->query($getCalls); 
		$getCalls_res_row=$db->fetchByAssoc($getCalls_res);
		$calls_count_id[]= $getCalls_res_row['count'];
		
		//Meetings Count 
		$getMeetings = "SELECT count(id) as count FROM meetings WHERE date_start between '$date_start' and '$date_end' AND assigned_user_id='$user_id' and deleted=0 AND status='Held' and team_id='$team_id'";
		$getMeetings_res=$db->query($getMeetings); 
		$getMeetings_res_row=$db->fetchByAssoc($getMeetings_res);		
		$meetings_count_id[] = $getMeetings_res_row['count'];
		
		
		$total_leads_count=$total_leads_count+$total_leads[$i];
		$total_opp_count=$total_opp_count+$total_oppt[$i];
		$total_opp_amount=$total_opp_amount+$total_amount[$i];
		$total_opp_own_count=$total_opp_own_count+$total_own_oppt[$i];
		$total_opp_own_amount=$total_opp_own_amount+$oppt_own_amount[$i];
		$total_opp_lost_count=$total_opp_lost_count+$total_lost_oppt[$i];
		$total_opp_lost_amount=$total_opp_lost_amount+$oppt_lost_amount[$i];
		
		$total_calls_count=$total_calls_count+$calls_count_id[$i];
		$total_meetings_count=$total_meetings_count+$meetings_count_id[$i];
		
		$team_name[]=str_replace("_"," ",$name[$k]);
		//echo $name[$k];
		$i++;
		
		}
		
		}
		
		} 
		unset($user_list);
		}
		$total_leads[]=$total_leads_count;
		//print_r($total_leads); exit;
		$total_oppt[]=$total_opp_count;
		$total_amount[]=$total_opp_amount;
		$total_own_oppt[]=$total_opp_own_count;
		$oppt_own_amount[]=$total_opp_own_amount;
		$total_lost_oppt[]=$total_opp_lost_count;
		$oppt_lost_amount[]=$total_opp_lost_amount;
		$calls_count_id[]=$total_calls_count;
		$meetings_count_id[]=$total_meetings_count;
		
		$user_name[]=count($user_name);
		$team_name[]="Total";
				
		

		$Content="Start Date, End Date,Team Name, User Name,Leads Created Count,Opp. Created Count,Opp.Created Value,Opp.Won Count,Opp.Won Value,Opp.Lost Count,Opp.Lost Value, Calls Made, Meetings Held\n";

		$count=count($team_name);
		for($j=0;$j<$count;$j++){
		$Content .=$_REQUEST['from'].",".$_REQUEST['to'].",".$team_name[$j].",".$user_name[$j].",".$total_leads[$j].",".$total_oppt[$j].",".$total_amount[$j].",".$total_own_oppt[$j].",".$oppt_own_amount[$j].",".$total_lost_oppt[$j].",".$oppt_lost_amount[$j].",".$calls_count_id[$j].",".$meetings_count_id[$j]."\n"; 

		}
		
		ob_clean();
		$FileName="CustomReport_Details_".date("Ymd").".csv";

		header('Content-Type: application/csv'); 
		// header("Content-length: " . filesize($NewFile)); 
		header('Content-Disposition: attachment; filename="' . $FileName . '"'); 

		print $Content;
		exit;  
		ob_end_clean();
 ?>
