<?php
ini_set('dispplay_errors', 'On');
if (!defined('sugarEntry')) {
	define('sugarEntry', true);
}

require_once 'include/entryPoint.php';
require_once 'include/database/DBManager.php';
require_once 'config.php';
global $db, $cnt1, $Content, $Content1;
$select_report = $_REQUEST['report_select'];
// var_dump($_REQUEST['record']);
global $db;

// if (!empty($_REQUEST['name'])) {
// 	$name = $_REQUEST['name'];
// 	$name = (explode(",", $name));
// } else {
// 	$logedin_user_id = $_REQUEST['id'];
// 	$query1 = "SELECT securitygroup_id FROM securitygroups_users WHERE user_id  ='$user_id' AND deleted=0";
// 	$result = $db->query($query1);
// 	while ($getteams1 = $db->fetchByAssoc($result)) {
// 		$team_id = $getteams1['team_id'];
// 		$sql = "SELECT name FROM securitygroups where id='$team_id' ";
// 		$result1 = $db->query($sql);
// 		$row = $db->fetchByAssoc($result1);
// 		$thing = $row["name"];
// 		$values .= $row["name"] . ",";
// 	}
// 	$values = substr($values, 0, strlen($values) - 1);
// 	$name = (explode(",", $values));
// }

// $date_start = $_REQUEST['from'];
// $from = str_replace('-', '/', $date_start);
// $date_start = date("Y-m-d", strtotime($from));
// $date_start .= " 00:00:00";

// $date_end = $_REQUEST['to'];
// $to = str_replace('-', '/', $date_end);
// $date_end = date("Y-m-d", strtotime($to));
// $date_end .= " 23:59:59";

// $name = $_REQUEST['name'];
// $sub_id = array();
// $logedin_user_id = $_REQUEST['id'];
// $sql = "SELECT is_admin FROM users where id='$logedin_user_id' ";
// $result1 = $db->query($sql);
// $row = $db->fetchByAssoc($result1);
// $admin = $row["is_admin"];

// //~ $query12 ="SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0 and status='Active'";
// $query12 = "SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0";
// $result = $db->query($query12, true);
// while ($getuserids = $db->fetchByAssoc($result)) {
// 	$sub_id[] = $getuserids['id'];
// }

// $user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $logedin_user_id . "' and before_value_string='Active' and date_created between '$date_start' and '$date_end' order by date_created desc limit 0,1";

// $user_audit_result = $db->query($user_audit_query);
// while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
// 	$sub_id[] = $user_audit_row['parent_id'];
// }

// $count = 0;
// while (count($sub_id) > $count) {
// 	$flag = true;
// 	$query11 = "SELECT id FROM  users WHERE reports_to_id='" . $sub_id[$count] . "' and deleted=0 and status='Active'";
// 	$result = $db->query($query11, true);
// 	while ($getuser = $db->fetchByAssoc($result)) {
// 		$flag = false;
// 		$sub_id[] = $getuser['id'];
// 	}
// 	//Added by Shakeer to get users list who become inactive during that peroid. 10Sep2015
// 	if ($flag) {
// 		$user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $sub_id[$count] . "' and before_value_string='Active' and date_crated between '$date_start' and '$date_end' order by date_created desc limit 0,1";

// 		$user_audit_result = $db->query($user_audit_query);
// 		while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
// 			$sub_id[] = $user_audit_row['parent_id'];
// 		}
// 	}
// 	//Ended
// 	$count++;
// }

// $sub_id[] = $logedin_user_id;
// $i = 0;
// for ($k = 0; $k < count($name); $k++) {
// 	//print_r($name);
// 	$name[$k] = str_replace("_", " ", $name[$k]);
// 	$query8 = "SELECT id FROM  securitygroups WHERE name ='$name[$k]' and deleted=0";
// 	$result = $db->query($query8, true);
// 	$query = $db->fetchByAssoc($result);
// 	$team_id = $query['id'];

// 	$get_teamusers = "SELECT user_id FROM securitygroups_users WHERE securitygroup_id  ='$team_id' AND deleted=0";
// 	$get_teamusers_res = $db->query($get_teamusers);
// 	while ($getteams_user = $db->fetchByAssoc($get_teamusers_res)) {
// 		$user_list[] = $getteams_user['user_id'];

// 	}

// 	//Added 16th Nov 2018
// 	for ($i = 0; $i < count($user_list); $i++) {
// 		$user_audit_query = "SELECT parent_id as user_id FROM  users_audit WHERE before_value_string='Active' AND parent_id='$user_list[$i]' AND date_created BETWEEN '$date_start' And '$date_end' order by date_created desc limit 0,1";
// 		$user_audit_result = $db->query($user_audit_query);
// 		while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
// 			$get_users_list1[] = $user_audit_row['user_id'];
// 			// $query = "SELECT * FROM  users WHERE deleted=0 AND id='$user_id1'";
// 			// $result = $db->query($query, true);
// 			// while ($user = $db->fetchByAssoc($result)) {
// 			// 	$get_users_list[] = $user;
// 			// }

// 		}

// 	}
// 	// echo '<pre>';

// 	// print_r($user_list);
// 	// print_r($get_users_list1);

// 	$user_list = array();

// 	$get_teamusers1 = "SELECT user_id FROM securitygroups_users JOIN users ON users.id = securitygroups_users.user_id WHERE securitygroup_id  ='$team_id' AND securitygroups_users.deleted=0 AND users.status = 'Active' AND users.deleted = 0";
// 	$get_teamusers_res1 = $db->query($get_teamusers1);
// 	while ($getteams_user1 = $db->fetchByAssoc($get_teamusers_res1)) {
// 		$user_list[] = $getteams_user1['user_id'];
// 	}
// 	// print_r($user_list);

// 	for ($i = 0; $i < count($get_users_list1); $i++) {
// 		$presentFlag = 0;
// 		foreach ($user_list as $key => $value) {
// 			if ($value == $get_users_list1[$i]) {
// 				$presentFlag = 1;
// 			}
// 		}
// 		if ($presentFlag != 1) {
// 			array_push($user_list, $get_users_list1[$i]);
// 		}
// 	}

// 	//End 16th Nov 2018

// 	$from = $_REQUEST['from'];
// 	$from = str_replace('-', '/', $from);
// 	$from = date("Y-m-d H:i:s", strtotime($from));
// 	//$select_report=$_REQUEST['report_select'];

// 	$flag = false;

// 	if ($admin == 0) {

// 		for ($j = 0; $j < count($sub_id); $j++) {

// 			$date_start = $_REQUEST['from'];
// 			$from = str_replace('-', '/', $date_start);
// 			$date_start = date("Y-m-d", strtotime($from));
// 			$date_start .= " 00:00:00";

// 			$date_end = $_REQUEST['to'];
// 			$to = str_replace('-', '/', $date_end);
// 			$date_end = date("Y-m-d", strtotime($to));
// 			$date_end .= " 23:59:59";

// 			$user_id = array();

// 			$query = "SELECT * FROM  users WHERE deleted=0 AND id='$sub_id[$j]'";
// 			$result = $db->query($query, true);
// 			$getuser = $db->fetchByAssoc($result);

// 			$user_id = $getuser['id'];
// 			$user_fname = $getuser['first_name'];
// 			$user_lname = $getuser['last_name'];
// 			$user_name[] = $user_fname . " " . $user_lname;
// 			$user_id_arr[] = $getuser['id'];
// 			$user_status[] = $getuser['status'];

// 			$getLeads = "SELECT count(l.id) as count FROM leads l LEFT JOIN securitygroups_records sg ON l.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Leads' AND l.date_entered between '$date_start' and '$date_end' AND l.deleted=0 and l.assigned_user_id='$user_id' and sg.deleted=0";

// 			$getLeads_result = $db->query($getLeads);
// 			$getLeads_row = $db->fetchByAssoc($getLeads_result);

// 			$total_leads[] = $getLeads_row['count'];

// 			/* fetching sales Target User wise by Anurag Tiwari
// 				 * Start
// 			*/
// 			$getSalesTarget = "SELECT sales_target,opportunities_won FROM sf_sales_forecast st JOIN users_sf_sales_forecast_1_c u ON st.id= u.users_sf_sales_forecast_1sf_sales_forecast_idb WHERE u.users_sf_sales_forecast_1users_ida ='$user_id' AND st.deleted=0";

// 			$getSalesTarget_result = $db->query($getSalesTarget);
// 			$getSalesTarget_row = $db->fetchByAssoc($getSalesTarget_result);

// 			//Calculation of day between current year april-01 to current date
// 			$date = date("Y");
// 			$date = $date . ",04,01";
// 			$date2 = new DateTime("now");
// 			$date2->format('Y-m-d');
// 			$date1 = new DateTime();
// 			$date1->setDate($date, 04, 01);
// 			$date1->format('Y-m-d');
// 			$interval = $date1->diff($date2);
// 			$day_diff = $interval->days;

// 			//sales target amount
// 			$salesTarget = intval($getSalesTarget_row['sales_target']);
// 			#start
// 			#calculation till to date amount from sales target amount
// 			#formula : ((salestarget_amount / 365) * difference between currentdate & starting of finincial year)
// 			$opportunities_won = intval(($salesTarget / 365) * $day_diff);
// 			#End
// 			$salesTarget = $salesTarget / 100000;
// 			$salesTarget = round($salesTarget, 2);
// 			$salesTargets[] = $salesTarget . "L";
// 			$salesTarget1[] = $salesTarget;

// 			//opportunities_won amount To date
// 			$opportunities_won = $opportunities_won / 100000;
// 			$opportunities_won = round($opportunities_won, 2);
// 			$opportunities_wons[] = $opportunities_won . "L";
// 			$opportunities_won1[] = $opportunities_won;

// 			/*End*/

// 			$getOpp_total = "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o
// 		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Opportunities' AND o.date_entered between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' and sg.deleted=0";
// 			$getOpp_total_res = $db->query($getOpp_total);
// 			$getOpp_total_res_row = $db->fetchByAssoc($getOpp_total_res);
// 			$id = $getOpp_total_res_row['id'];
// 			$amount = $getOpp_total_res_row['amount'];

// 			$total_oppt[] = $id;
// 			$amount = $amount / 100000;
// 			$amount = round($amount, 2);
// 			$amount = $amount . "L";
// 			$total_amount[] = $amount;

// 			$getClosedWon = "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o
// 		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' AND o.sales_stage ='Closed Won' and sg.deleted=0";
// 			$getClosedWon_res = $db->query($getClosedWon);
// 			$getClosedWon_res_row = $db->fetchByAssoc($getClosedWon_res);
// 			$total_own_oppt[] = $getClosedWon_res_row['id'];
// 			$oppt_own_amounts = $getClosedWon_res_row['amount'];
// 			$oppt_own_amounts = $oppt_own_amounts / 100000;
// 			$oppt_own_amounts = round($oppt_own_amounts, 2);
// 			$oppt_own_amount[] = $oppt_own_amounts . "L";

// 			$getOppLost = "SELECT count(o.id) as id, sum(o.amount_usdollar) as sum FROM opportunities o
// 		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Closed Lost' and sg.deleted=0";
// 			$getOppLost_res = $db->query($getOppLost);
// 			$getOppLost_res_row = $db->fetchByAssoc($getOppLost_res);
// 			$oppt_lost_amounts = $getOppLost_res_row['sum'];
// 			$total_lost_oppt[] = $getOppLost_res_row['id'];
// 			$oppt_lost_amounts = $oppt_lost_amounts / 100000;
// 			$oppt_lost_amounts = round($oppt_lost_amounts, 2);
// 			$oppt_lost_amount[] = $oppt_lost_amounts . "L";

// 			$getCalls = "SELECT count(c.id) as count FROM calls c LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Calls' AND c.date_start between '$date_start' and '$date_end' AND c.assigned_user_id='$user_id' and c.deleted=0 AND c.status='Held' and sg.deleted=0";
// 			$getCalls_res = $db->query($getCalls);
// 			$getCalls_res_row = $db->fetchByAssoc($getCalls_res);
// 			$calls_count_id[] = $getCalls_res_row['count'];

// 			//Meetings Count
// 			$getMeetings = "SELECT count(m.id) as count FROM meetings m LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Meetings' AND m.date_start between '$date_start' and '$date_end' AND m.assigned_user_id='$user_id' and m.deleted=0 AND m.status='Held' and sg.deleted=0";
// 			$getMeetings_res = $db->query($getMeetings);
// 			$getMeetings_res_row = $db->fetchByAssoc($getMeetings_res);
// 			$meetings_count_id[] = $getMeetings_res_row['count'];

// 			$getArchitect_contanct_values = "SELECT (count(ac.id)) as count4 FROM
// 		`arch_architects_contacts` ac LEFT JOIN securitygroups_records sg ON ac.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = ac.assigned_user_id WHERE su.securitygroup_id =  '$team_id' and su.primary_group=1
// AND su.user_id = ac.assigned_user_id and sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND ac.date_entered between '$date_start' AND '$date_end'
// 		AND ac.assigned_user_id='$user_id'  AND ac.deleted=0 and sg.deleted=0";
// 			$getArchitect_res = $db->query($getArchitect_contanct_values);
// 			$getArchitect_res_row = $db->fetchByAssoc($getArchitect_res);
// 			$Architect_count_id[] = $getArchitect_res_row['count4'];
// 			$count_calls = 0;
// 			$count_Meetings = 0;

// 			/* count calls */
// 			$getcalls_count = "SELECT count(c.id) as countcalls FROM calls c  LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Calls' AND c.date_entered between '$date_start' and '$date_end'  AND c.parent_type ='Arch_Architects_Contacts'  AND c.assigned_user_id='$user_id' AND  c.status='Held' AND c.deleted=0 and sg.deleted=0";
// 			$getcalls_count_res = $db->query($getcalls_count);
// 			$getcalls_count_res_row = $db->fetchByAssoc($getcalls_count_res);
// 			$calls_count_values_id = $getcalls_count_res_row['countcalls'];
// 			$count_calls += $calls_count_values_id;
// 			/* end */
// 			/* count meetings */
// 			$getmeetings_count = "SELECT count(m.id) as countmeetings FROM meetings m  LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Meetings' AND m.date_entered between '$date_start' and '$date_end'  AND  m.parent_type ='Arch_Architects_Contacts' AND m.assigned_user_id='$user_id' AND  m.status='Held' AND m.deleted=0 and sg.deleted=0";
// 			$getmeetings_count_res = $db->query($getmeetings_count);
// 			$getmeetings_count_res_row = $db->fetchByAssoc($getmeetings_count_res);
// 			$calls_count_id_values = $getmeetings_count_res_row['countmeetings'];
// 			$count_Meetings += $calls_count_id_values;

// 			$architect_calls_count_id[] = $count_calls;
// 			$architect_meetings_count_id[] = $count_Meetings;

// 			$total_architect_ct = $total_architect_ct + $Architect_count_id[$i];
// 			$total_architectmeetings_ct = $total_architectmeetings_ct + $architect_meetings_count_id[$i];
// 			$total_architectcalss_ct = $total_architectcalss_ct + $architect_calls_count_id[$i];

// 			$total_leads_count = $total_leads_count + $total_leads[$i];
// 			$total_opp_count = $total_opp_count + $total_oppt[$i];
// 			$total_opp_amount = $total_opp_amount + $total_amount[$i];
// 			$total_opp_own_count = $total_opp_own_count + $total_own_oppt[$i];
// 			$total_opp_own_amount = $total_opp_own_amount + $oppt_own_amount[$i];
// 			$total_opp_lost_count = $total_opp_lost_count + $total_lost_oppt[$i];
// 			$total_opp_lost_amount = $total_opp_lost_amount + $oppt_lost_amount[$i];

// 			//sales Target
// 			$total_salesTarget = $total_salesTarget + $salesTarget1[$i];
// 			$total_opportunities_won = $total_opportunities_won + $opportunities_won1[$i];

// 			$total_calls_count = $total_calls_count + $calls_count_id[$i];
// 			$total_meetings_count = $total_meetings_count + $meetings_count_id[$i];

// 			$team_name[] = str_replace("_", " ", $name[$k]);
// 			//echo $name[$k];
// 			$i++;
// 		}

// 	} else {

// 		$date_start = $_REQUEST['from'];
// 		$from = str_replace('-', '/', $date_start);
// 		$date_start = date("Y-m-d", strtotime($from));
// 		$date_start .= " 00:00:00";

// 		$date_end = $_REQUEST['to'];
// 		$to = str_replace('-', '/', $date_end);
// 		$date_end = date("Y-m-d", strtotime($to));
// 		$date_end .= " 23:59:59";

// 		$user_id = array();
// 		$get_users_list = array();
// 		for ($l = 0; $l < count($user_list); $l++) {
// 			$flag = false;
// 			//~ $query ="SELECT * FROM  users WHERE deleted=0 AND status='Active' AND id='$user_list[$l]'";
// 			$query = "SELECT * FROM  users WHERE deleted=0 AND id='$user_list[$l]'";
// 			$result = $db->query($query, true);
// 			while ($user = $db->fetchByAssoc($result)) {
// 				$flag = true;
// 				$get_users_list[] = $user;
// 			}
// 			/*
// 				//Added by Shakeer on 10Sep2015
// 				if(flag){
// 					$user_audit_query = "SELECT parent_id as user_id FROM  users_audit WHERE before_value_string='Active' AND parent_id='$user_list[$l]' AND date_created BETWEEN '$date_start' And '$date_end' order by date_created desc limit 0,1";
// 					$user_audit_result = $db->query($user_audit_query);
// 					while($user_audit_row = $db->fetchByAssoc($user_audit_result)){
// 						$user_id1 = $user_audit_row['user_id'];
// 							$query ="SELECT * FROM  users WHERE deleted=0 AND id='$user_id1'";
// 							$result=$db->query($query, true);
// 							while($user = $db->fetchByAssoc($result)){
// 								$get_users_list[] = $user;
// 							}
// 					}
// 				}
// 			*/
// 		}
// 		//~ while($getuser=$db->fetchByAssoc($result))
// 		for ($l = 0; $l < count($get_users_list); $l++) {
// 			$getuser = $get_users_list[$l];
// 			$user_id = $getuser['id'];
// 			$user_fname = $getuser['first_name'];
// 			$user_lname = $getuser['last_name'];
// 			$user_name[] = $user_fname . " " . $user_lname;
// 			$user_id_arr[] = $getuser['id'];
// 			$user_status[] = $getuser['status'];

// 			$getLeads = "SELECT count(l.id) as count FROM leads l LEFT JOIN securitygroups_records sg ON l.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Leads' AND l.date_entered between '$date_start' and '$date_end' AND l.deleted=0 and l.assigned_user_id='$user_id' and sg.deleted=0";

// 			$getLeads_result = $db->query($getLeads);
// 			$getLeads_row = $db->fetchByAssoc($getLeads_result);

// 			$total_leads[] = $getLeads_row['count'];

// 			/* fetching sales Target User wise by Anurag Tiwari
// 				 * Start
// 			*/
// 			$getSalesTarget = "SELECT sales_target,opportunities_won FROM sf_sales_forecast st JOIN users_sf_sales_forecast_1_c u ON st.id= u.users_sf_sales_forecast_1sf_sales_forecast_idb WHERE u.users_sf_sales_forecast_1users_ida ='$user_id' AND st.deleted=0";

// 			$getSalesTarget_result = $db->query($getSalesTarget);
// 			$getSalesTarget_row = $db->fetchByAssoc($getSalesTarget_result);

// 			//Calculation of day between current year april-01 to current date
// 			$date = date("Y");
// 			$date = $date . ",04,01";
// 			$date2 = new DateTime("now");
// 			$date2->format('Y-m-d');
// 			$date1 = new DateTime();
// 			$date1->setDate($date, 04, 01);
// 			$date1->format('Y-m-d');
// 			$interval = $date1->diff($date2);
// 			$day_diff = $interval->days;

// 			//sales target amount
// 			$salesTarget = intval($getSalesTarget_row['sales_target']);
// 			#start
// 			#calculation till to date amount from sales target amount
// 			#formula : ((salestarget_amount / 365) * difference between currentdate & starting of finincial year)
// 			$opportunities_won = intval(($salesTarget / 365) * $day_diff);
// 			#End
// 			$salesTarget = $salesTarget / 100000;
// 			$salesTarget = round($salesTarget, 2);
// 			$salesTargets[] = $salesTarget . "L";
// 			$salesTarget1[] = $salesTarget;

// 			//opportunities_won amount To date
// 			$opportunities_won = $opportunities_won / 100000;
// 			$opportunities_won = round($opportunities_won, 2);
// 			$opportunities_wons[] = $opportunities_won . "L";
// 			$opportunities_won1[] = $opportunities_won;

// 			/*End*/

// 			$getOpp_total = "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o
// 		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Opportunities' AND o.date_entered between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' and sg.deleted=0";

// 			$getOpp_total_res = $db->query($getOpp_total);
// 			$getOpp_total_res_row = $db->fetchByAssoc($getOpp_total_res);
// 			$id = $getOpp_total_res_row['id'];
// 			$amount = $getOpp_total_res_row['amount'];

// 			$total_oppt[] = $id;
// 			$amount = $amount / 100000;
// 			$amount = round($amount, 2);
// 			$amount = $amount . "L";
// 			$total_amount[] = $amount;

// 			$getClosedWon = "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o
// 		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' AND o.sales_stage ='Closed Won' and sg.deleted=0";
// 			$getClosedWon_res = $db->query($getClosedWon);
// 			$getClosedWon_res_row = $db->fetchByAssoc($getClosedWon_res);
// 			$total_own_oppt[] = $getClosedWon_res_row['id'];
// 			$oppt_own_amounts = $getClosedWon_res_row['amount'];
// 			$oppt_own_amounts = $oppt_own_amounts / 100000;
// 			$oppt_own_amounts = round($oppt_own_amounts, 2);
// 			$oppt_own_amount[] = $oppt_own_amounts . "L";

// 			$getOppLost = "SELECT count(o.id) as id, sum(o.amount_usdollar) as sum FROM opportunities o
// 		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Closed Lost' and sg.deleted=0";
// 			$getOppLost_res = $db->query($getOppLost);
// 			$getOppLost_res_row = $db->fetchByAssoc($getOppLost_res);
// 			$oppt_lost_amounts = $getOppLost_res_row['sum'];
// 			$total_lost_oppt[] = $getOppLost_res_row['id'];
// 			$oppt_lost_amounts = $oppt_lost_amounts / 100000;
// 			$oppt_lost_amounts = round($oppt_lost_amounts, 2);
// 			$oppt_lost_amount[] = $oppt_lost_amounts . "L";

// 			$getCalls = "SELECT count(c.id) as count FROM calls c LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Calls' AND c.date_start between '$date_start' and '$date_end' AND c.assigned_user_id='$user_id' and c.deleted=0 AND c.status='Held' and sg.deleted=0";
// 			$getCalls_res = $db->query($getCalls);
// 			$getCalls_res_row = $db->fetchByAssoc($getCalls_res);
// 			$calls_count_id[] = $getCalls_res_row['count'];

// 			//Meetings Count
// 			$getMeetings = "SELECT count(m.id) as count FROM meetings m LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Meetings' AND m.date_start between
// 		 '$date_start' and '$date_end' AND m.assigned_user_id='$user_id' and m.deleted=0 AND
// 		 m.status='Held' and sg.deleted=0";
// 			$getMeetings_res = $db->query($getMeetings);
// 			$getMeetings_res_row = $db->fetchByAssoc($getMeetings_res);
// 			$meetings_count_id[] = $getMeetings_res_row['count'];

// 			$getArchitect_contanct_values = "SELECT (count(ac.id)) as count4 FROM
// 		`arch_architects_contacts` ac LEFT JOIN securitygroups_records sg ON ac.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = ac.assigned_user_id WHERE su.securitygroup_id =  '$team_id' and su.primary_group=1
// AND su.user_id = ac.assigned_user_id and sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND ac.date_entered between '$date_start' AND '$date_end'
// 		AND ac.assigned_user_id='$user_id'  AND ac.deleted=0 and sg.deleted=0";
// 			$getArchitect_res = $db->query($getArchitect_contanct_values);
// 			$getArchitect_res_row = $db->fetchByAssoc($getArchitect_res);
// 			$Architect_count_id[] = $getArchitect_res_row['count4'];

// 			$count_calls = 0;
// 			$count_Meetings = 0;

// 			/* count calls */
// 			$getcalls_count = "SELECT count(c.id) as countcalls FROM calls c  LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Calls' AND c.date_entered between '$date_start' and '$date_end'  AND c.parent_type ='Arch_Architects_Contacts'  AND c.assigned_user_id='$user_id' AND  c.status='Held' AND c.deleted=0 and sg.deleted=0";
// 			$getcalls_count_res = $db->query($getcalls_count);
// 			$getcalls_count_res_row = $db->fetchByAssoc($getcalls_count_res);
// 			$calls_count_values_id = $getcalls_count_res_row['countcalls'];
// 			$count_calls += $calls_count_values_id;
// 			/* end */
// 			/* count meetings */
// 			$getmeetings_count = "SELECT count(m.id) as countmeetings FROM meetings m  LEFT JOIN securitygroups_records sg ON m.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Meetings' AND m.date_entered between '$date_start' and '$date_end'  AND  m.parent_type ='Arch_Architects_Contacts' AND m.assigned_user_id='$user_id' AND  m.status='Held' AND m.deleted=0 and sg.deleted=0";
// 			$getmeetings_count_res = $db->query($getmeetings_count);
// 			$getmeetings_count_res_row = $db->fetchByAssoc($getmeetings_count_res);
// 			$calls_count_id_values = $getmeetings_count_res_row['countmeetings'];
// 			$count_Meetings += $calls_count_id_values;

// 			$architect_calls_count_id[] = $count_calls;
// 			$architect_meetings_count_id[] = $count_Meetings;

// 			$total_architect_ct = $total_architect_ct + $Architect_count_id[$i];
// 			$total_architectmeetings_ct = $total_architectmeetings_ct + $architect_meetings_count_id[$i];
// 			$total_architectcalss_ct = $total_architectcalss_ct + $architect_calls_count_id[$i];

// 			$total_leads_count = $total_leads_count + $total_leads[$i];
// 			$total_opp_count = $total_opp_count + $total_oppt[$i];
// 			$total_opp_amount = $total_opp_amount + $total_amount[$i];
// 			$total_opp_own_count = $total_opp_own_count + $total_own_oppt[$i];
// 			$total_opp_own_amount = $total_opp_own_amount + $oppt_own_amount[$i];
// 			$total_opp_lost_count = $total_opp_lost_count + $total_lost_oppt[$i];
// 			$total_opp_lost_amount = $total_opp_lost_amount + $oppt_lost_amount[$i];

// 			//sales Target
// 			$total_salesTarget = $total_salesTarget + $salesTarget1[$i];
// 			$total_opportunities_won = $total_opportunities_won + $opportunities_won1[$i];

// 			$total_calls_count = $total_calls_count + $calls_count_id[$i];
// 			$total_meetings_count = $total_meetings_count + $meetings_count_id[$i];

// 			$team_name[] = str_replace("_", " ", $name[$k]);
// 			//echo $name[$k];
// 			$i++;

// 		}

// 		//~ }

// 	}
// 	unset($user_list);
// }
// $total_leads[] = $total_leads_count;
// //print_r($total_leads); exit;
// $total_oppt[] = $total_opp_count;
// $total_amount[] = $total_opp_amount;
// $total_own_oppt[] = $total_opp_own_count;
// $oppt_own_amount[] = $total_opp_own_amount;
// $total_lost_oppt[] = $total_opp_lost_count;
// $oppt_lost_amount[] = $total_opp_lost_amount;
// $calls_count_id[] = $total_calls_count;
// $meetings_count_id[] = $total_meetings_count;
// $Architect_count_id[] = $total_architect_ct;
// $architect_calls_count_id[] = $count_calls;
// $architect_meetings_count_id[] = $count_Meetings;
// //Sales Target
// $total_sales = $salesTargets;
// $total_sales[] = $total_salesTarget;
// //~ $total_salesTarget=$total_salesTarget;
// $opp_won_todate = $opportunities_wons;
// $opp_won_todate[] = $total_opportunities_won;
// //$user_status[] = $user_status;
// $user_name[] = count($user_name);
// $team_name[] = "Total";

$Content = "Start Date, End Date,Team Name, User Name, Target, Exp. Oppo. Closed to date, Leads Created Count,Opp. Created Count,Opp.Created Value,Opp.Won Count,Opp.Won Value,Opp.Lost Count,Opp.Lost Value, Calls Made, Meetings Held,Architects Count,Architects Calls Made,Architects Meetings Held,Active/Inactive\n";

// $content = array($user_name, $total_sales, $opp_won_todate, $total_leads, $total_oppt,
// 	$total_amount, $total_own_oppt, $oppt_own_amount, $total_lost_oppt, $oppt_lost_amount, $calls_count_id, $meetings_count_id,
// 	$Architect_count_id, $architect_calls_count_id, $architect_meetings_count_id, $user_status, $total_sales, $total_salesTarget, $opp_won_todate, $opp_won_todate_total, $user_status);
// echo "<pre>";

require_once 'CustomReportCSV.php';
$content = Name();

// echo "<pre>";
// print_r($content);
// exit();

// $inactive_users_key = array();
// foreach ($content[20] as $key => $value) {
// 	if ($value == 'Inactive') {
// 		$inactive_users_key[] = $key;
// 	}
// }
// // print_r($inactive_users_key);

// // //                print_r(implode(',',$test));

// $inactive_user_with_all_zero = array();

// $remove_user_from_list = array();

// foreach ($inactive_users_key as $key => $value) {
// 	$value_exist = false;
// 	foreach ($content as $k => $v) {
// 		if ($k == 16 || $k == 17 || $k == 18 || $k == 19 || $k == 20 || $k == 12 || $k == 11 || $k == 10 || $k == 0) {
// 			continue;
// 		} else {
// 			$tmp_val = str_replace("L", "", $v[$value]);
// 			if ((int) $tmp_val > 0) {
// 				$value_exist = true;
// 			}
// 		}
// 	}
// 	echo " final " . $value_exist;
// 	if (!$value_exist) {
// 		$remove_user_from_list[] = $value;
// 	}

// }
// print_r($remove_user_from_list);

// foreach ($remove_user_from_list as $key => $value) {
// 	foreach ($content as $k => $v) {
// 		unset($v[$value]);
// 		$content[$k] = $v;
// 		// $content[$k] = array_values($v);
// 	}
// }

// // $content = array_filter($content);

// // $content = array_values($content);
// $new_content = array();
// foreach ($content as $key => $value) {
// 	$i = 0;
// 	$tmp_array = array();

// 	if ($key == 17 || $key == 19) {
// 		$new_content[$key] = $value;
// 		continue;
// 	} else {
// 		foreach ($value as $k => $v) {
// 			$tmp_array[$i++] = $v;
// 		}
// 	}

// 	$new_content[$key] = $tmp_array;

// }

// $recalulated_target = 0;
// $recalculated_Opp_Closed_to_date = 0;
// foreach ($new_content as $key => $value) {
// 	if ($key == 16) {
// 		foreach ($value as $k => $v) {
// 			$tmp_val = (int) str_replace("L", "", $v);
// 			$recalulated_target += $tmp_val;
// 		}
// 	}
// 	if ($key == 18) {
// 		foreach ($value as $k => $v) {
// 			$tmp_val = (int) str_replace("L", "", $v);
// 			$recalculated_Opp_Closed_to_date += $tmp_val;
// 		}
// 	}
// }
// $new_content[17] = $recalulated_target;
// $new_content[17] = $recalulated_target;
// $new_content[19] = $recalculated_Opp_Closed_to_date;

// // print_r($new_content);
// // echo $recalculate_users_count = count($new_content[20]);
// $new_content[0][count($new_content[20])] = count($new_content[20]);
// echo "<pre>";
// print_r($new_content);
// exit();

// $count = count($team_name);
$count = count($content[20]);

for ($j = 0; $j < $count; $j++) {
	// if ($user_status[$j] == 'Active') {
	$Content .= $_REQUEST['from'] . "," . $_REQUEST['to'] . "," . $content[11][$j] . "," . $content[0][$j] . "," . $content[16][$j] . "," . $content[18][$j] . "," . $content[1][$j] . "," . $content[2][$j] . "," . $content[3][$j] . "," . $content[4][$j] . "," . $content[5][$j] . "," . $content[6][$j] . "," . $content[7][$j] . "," . $content[8][$j] . "," . $content[9][$j] . "," . $content[13][$j] . "," . $content[15][$j] . "," . $content[14][$j] . "," . $content[20][$j] . "\n";
	// } else if ($user_status[$j] == 'Inactive') {
	// 	//Changes made on 28thNov 2018
	// 	echo " slkdj ";
	// 	echo $user_name[$j];
	// 	echo $total_oppt[$j];
	// 	exit();

	// 	if (($total_oppt[$j] != '0') && ($total_lost_oppt[$j] != '0') && ($total_leads[$j] != '0') && ($total_amount[$j] != '0') && ($total_own_oppt[$j] != '0') && ($oppt_own_amount[$j] != '0') && ($oppt_lost_amount[$j] != '0') && ($calls_count_id[$j] != '0') && ($meetings_count_id[$j] != '0') && ($Architect_count_id[$j] != '0') && ($architect_calls_count_id[$j] != '0') && ($architect_meetings_count_id[$j] != '0')) {

	// 		$Content .= $_REQUEST['from'] . "," . $_REQUEST['to'] . "," . $team_name[$j] . "," . $user_name[$j] . "," . $total_sales[$j] . "," . $opp_won_todate[$j] . "," . $total_leads[$j] . "," . $total_oppt[$j] . "," . $total_amount[$j] . "," . $total_own_oppt[$j] . "," . $oppt_own_amount[$j] . "," . $total_lost_oppt[$j] . "," . $oppt_lost_amount[$j] . "," . $calls_count_id[$j] . "," . $meetings_count_id[$j] . "," . $Architect_count_id[$j] . "," . $architect_calls_count_id[$j] . "," . $architect_meetings_count_id[$j] . "," . $user_status[$j] . "\n";
	// 	}
	// }
}

ob_clean();
$FileName = "CustomReport_Details_" . date("Ymd") . ".csv";

header('Content-Type: application/csv');
// header("Content-length: " . filesize($NewFile));
header('Content-Disposition: attachment; filename="' . $FileName . '"');

print $Content;
exit;
ob_end_clean();
?>