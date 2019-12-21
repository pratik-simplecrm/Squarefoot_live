<?php
  echo "Hare KRishna";
require_once('include/entryPoint.php');
require_once('include/nusoap/nusoap.php'); 
require_once('include/database/DBManager.php');


global $db;
global $app_list_strings;   
global $sugar_config,$beanFiles,$beanList;

$currenttime = date('h:i:s');
//sleep(5);
echo "Today: ".$today_date = date('Y-m-d H:i:s');
//~ $today_date = '2015-01-19 14:01:00';

require_once('custom/modules/bhea_Reports/PdfReports/UserwiseDailyMeeting.php');
				ob_clean(); // To Clean the object buffer
				$report_obj = new PrintPdf();
                              //  $assigned_user_id='b4357f32-4d34-fda8-047f-4e1ef90d7d83';//Gaurav
                                //$assigned_user_id='2fcce827-5220-e88a-4b5a-5860bb8495bf';
                                $assigned_user_id='606583b4-c5a8-40b5-615b-5b4ed61e3086';
                                
                                
				$report_obj->callme($assigned_user_id);	
                                
                                echo "vivek";
exit;
    global $db, $body, $body_main, $app_list_strings;
   echo'<pre>';
    global $sugar_config;
        $user_name = $db->query("Select id from users where deleted = 0 and reports_to_id = 'b4357f32-4d34-fda8-047f-4e1ef90d7d83'");
	$result_user_name = $db->fetchByAssoc($user_name);
	//echo $reports_to_id = $result_user_name['id'];
$users= get_reportsTo_id('b4357f32-4d34-fda8-047f-4e1ef90d7d83');
//print_r($users);
$users[]='b4357f32-4d34-fda8-047f-4e1ef90d7d83';
//print_r($users);

$active_users=getactive_users($users);
//print_r($active_users);

//echo$user_team_list = " AND assigned_userid IN ('" . implode("','",$active_users) . "')";

 function get_reportsTo_id($user_id){
    global $db;
    $array_id=[];
    $user_name = $db->query("Select id from users where deleted = 0 and reports_to_id = '$user_id'");
	while($result_user_name = $db->fetchByAssoc($user_name)){
         $reports_to_id = $result_user_name['id'];
         $array_id[]=$reports_to_id;
         $child_users = get_reportsTo_id($reports_to_id);
         $array_id = array_merge($array_id,$child_users);
         //print_r($child_users);
        }
	return $array_id;
}
function getactive_users($users){
    global $db;
    $active_array_id=[];
    //$i=0;
    foreach($users as $user_id){
        $user_result = $db->query("Select id ,user_name from users where deleted = 0 AND status = 'Active' and id = '$user_id'");
	 $row_active_user = $db->fetchByAssoc($user_result);
         $active_user_id = $row_active_user['id'];
        // $active_user_name = $row_active_user['user_name'];
         if(!empty($active_user_id)){
             $active_array_id[]=$active_user_id;
             //$active_array_id[$i][0]=$active_user_id;
             //$active_array_id[$i][1]=$active_user_name;
             //$i++;
         }
    }
    
    return $active_array_id;
}
global $app_list_strings,$db,$sugar_config;
        require_once("modules/ACLRoles/ACLRole.php");
	//$execute_assigned_user_id = $assigned_user_id;
	$current_date =date('Y-m-d H:i:s');
      echo $assigned_user_id  = '2fcce827-5220-e88a-4b5a-5860bb8495bf';
      echo $get_user_report="SELECT RS.assigned_user_id AS assigned_user_id,U.user_name ,U.is_admin,
							RS.name,RS.id,RS.next_run,RS.frequency AS frequency
							FROM bhea_report_scheduler RS
							JOIN users U ON U.id =RS.assigned_user_id 
							WHERE  RS.deleted ='0' 
							AND U.deleted ='0'
							AND RS.next_run < '".$current_date."' 
							AND RS.name = 'Opportunity Report' and RS.assigned_user_id='$assigned_user_id'";
		//$GLOBALS['log']->fatal($get_user_report,"Get user report");
		//AND RS.assigned_user_id = '".$execute_assigned_user_id."'
		/*echo $get_user_report =  "SELECT assigned_user_id,name,id,next_run,frequency 
		FROM bhea_report_scheduler WHERE assigned_user_id ='".$user_id."' AND deleted ='0' AND next_run < '".$current_date."' AND assigned_user_id in('484b53a2-1b6f-04fe-25e8-4edf34091960')
		AND name = 'Opportunity Report' ";	exit;*/

		$row_user_report = $db->query($get_user_report);
		while($rec_user_report = $db->fetchByAssoc($row_user_report)){
		echo	$user_report_id  = $rec_user_report['assigned_user_id'];
		echo	$is_admin = $rec_user_report['is_admin'];
			// Assigned in user team list				
			//~ $user_team  = "SELECT team_id FROM team_memberships WHERE user_id = '$user_report_id' AND deleted =0 ";
			if($is_admin !='1')
			{
                            //Check  the users is manager or not 
                             $report_user_role='';
                             $acl_role_obj = new ACLRole();
                             $user_roles[] = $acl_role_obj->getUserRoles($user_report_id);
                             if (!empty($user_roles[0])) {
                                    foreach ($user_roles[0] as $k => $v) {
                                        if ($v == 'Regional Manager') {
                                         echo $report_user_role='Regional Manager'; 
                                          $users= get_reportsTo_id($user_report_id);
                                          $users[]=$user_report_id;
                                          $active_users= getactive_users($users);
                                         echo $user_team_list = " AND O.assigned_user_id IN ('" . implode("','",$active_users) . "') ";
                                          break;
				}
                                }
                             } 
				
                             if(empty($report_user_role)){
                                 $user_team_list = " AND O.assigned_user_id='$user_report_id' ";                 //Normal user  or supevisor 
				}
			}
			else if($is_admin =='1')
			{
				$user_team_list='';  //Admin 
			}
			
                        
                        
			//$frequency  = $rec_user_report['frequency'];
			$frequency  = 'Daily';
			$total_lost_amount =0;
			$total_won_amount =0;
			$get_user_email="SELECT email_address
					   FROM email_addresses e, email_addr_bean_rel ec
					   WHERE bean_id ='".rtrim($user_report_id)."'
					   AND ec.email_address_id = e.id
					   AND e.opt_out =0
					   AND e.deleted =0
					   AND ec.deleted =0";
			$user_result = $db->query($get_user_email);
			$user_row = $db->fetchByAssoc($user_result);
			$user_email = $user_row['email_address']; 			
			$todaysdate=date("d/m/Y");
			//~ $todaysdate="18/01/2015";
	
			if($frequency == 'Weekly'){
					echo "</br>weekly 142";
				$tmp = explode("/",$todaysdate);
				if( count($tmp) == 3)
				{
					$from_date = $tmp[0].'-'.$tmp[1].'-'.$tmp[2];
				}
				$from_date = date("d/m/Y", strtotime($from_date. '- 6 days'));	
				$to_date   = $todaysdate;
				$sales_stage  = " and O.sales_stage in ('Closed Won','Closed Lost') ";
				$sales_stage_won  = " and O.sales_stage in ('Closed Won') ";
				$sales_stage_lost = " and O.sales_stage in ('Closed Lost') ";
				$subject = 'SquareFoot - Weekly Opportunity Report';
			}else if($frequency == 'Daily'){
				echo "</br>Daily 158";
				$from_date = $todaysdate;
				$to_date   = $todaysdate;
				$sales_stage ='';
				$sales_stage_won = '';
				$sales_stage_lost = '';
				$subject = 'SquareFoot - Daily Opportunity Report';
			}else if($frequency == 'Monthly'){
				echo "</br>Monthly 165";
				$from_date = date('01/m/Y');
				$to_date   = $todaysdate;		
				$sales_stage = '';
				$subject = 'SquareFoot - Monthly Opportunity Report';
			}
	
			// From Date & To Date filter Condition
			//$from_date = $todaysdate;
			if(!empty($from_date)){
				$tmp = explode("/",$from_date);
				if( count($tmp) == 3)
				{
					$from_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
				} else 
				$from_date = '';
			}
			if(!empty($from_date)){
				$from_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($from_date)));
				$from_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($from_date)));
				$from_date = " and O.date_entered >= '$from_date' ";
			}
	
			//$to_date = $todaysdate;
			if(!empty($to_date)){
				$tmp = explode("/",$to_date);
				if( count($tmp) == 3)
				{
					$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
					$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));
				} else 
				$to_date = '';
			}
			if(!empty($to_date)){
				 $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
				 $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
				 $to_date = " and O.date_entered <= '$to_date' ";
			} 

			global $db;
	
			/** Query to get data **/
			echo $query = " SELECT 
				count(O.id) as total_rows,sum(amount) as total_amount FROM 
					opportunities AS O join opportunities_cstm OC  ON O.id = OC.id_c
					left join accounts_opportunities as AO ON AO.opportunity_id=O.id and AO.deleted=0
					left join accounts as A ON A.id=AO.account_id and A.deleted=0
					left join users as U ON U.id=O.assigned_user_id and U.deleted=0 
					left join arch_architectural_firm_opportunities_1_c as ARFO 
					ON ARFO.arch_architectural_firm_opportunities_1opportunities_idb=O.id AND ARFO.deleted =0
					left join arch_architectural_firm as ARF 
					ON ARFO.arch_archi003bal_firm_ida=ARF.id and ARF.deleted=0            
					left join arch_architects_contacts_opportunities_1_c as ARO
					ON ARO.arch_architects_contacts_opportunities_1opportunities_idb=O.id AND ARO.deleted =0
					left join arch_architects_contacts as AR 
					ON ARO.arch_archi342contacts_ida=AR.id and AR.deleted=0
					where O.deleted=0
					$sales_stage
					$user_team_list
					$from_date
					$to_date				 
				";   
                        //LEFT JOIN securitygroups_records SG ON O.id = SG.record_id and SG.deleted=0 
			//$GLOBALS['log']->fatal($query,"Opportunities query");
			$result = $db->query($query);
			if($row = $db->fetchByAssoc($result))
			{
				echo $total_rows   = $row['total_rows'];
				echo '<br>'.$total_amount = $row['total_amount'];
			}


                }
                
                require_once('include/entryPoint.php');
require_once('include/nusoap/nusoap.php'); 
require_once('include/database/DBManager.php');


global $db;
global $app_list_strings;
global $sugar_config,$beanFiles,$beanList;

$currenttime = date('h:i:s');
                 require_once('custom/modules/bhea_Reports/PdfReports/OpportunityReport.php');
                                   // ob_clean(); // To Clean the object buffer
                                    $report_obj = new PrintPdf();
                                    $assigned_user_id='b4357f32-4d34-fda8-047f-4e1ef90d7d83';
                                    $report_obj->callme($assigned_user_id);	
                
                
                ?>
