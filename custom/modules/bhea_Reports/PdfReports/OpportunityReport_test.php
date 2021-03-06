<?php
ini_set("display_errors",1);
/**************************************************************************
        Print PDF Template By, Amit Sabal
        Functionality By, Amit Sabal
**************************************************************************/

if(!defined('sugarEntry')) define ('sugarEntry', true);
require_once('include/entryPoint.php');

if(file_exists('include/tcpdf/config/lang/eng.php')) {
	include_once('include/tcpdf/config/lang/eng.php'); 
} else {
	die('TCPDF lang not found');
}
if(file_exists('include/tcpdf/config/tcpdf_config.php')) {
	include_once('include/tcpdf/config/tcpdf_config.php');
} else {
	die('TCPDF config not found');
}
if(file_exists('include/tcpdf/tcpdf.php')) {
	include_once('include/tcpdf/tcpdf.php');
} else {
	die('TCPDF not found');
}

class MyPDF extends TCPDF {

	public function Header(){
		//parent::Header();
		$image_file = K_PATH_IMAGES.'tcpdf_logo.jpg';
		$this->Image($image_file, 10, 10, 20, 12, 'JPG', '', 'T', false, 300, 'R', false, false, 0,false, false, false);
	}

	//Modified Footer Function from TCPDF File
	public function Footer() {
		$cur_y = $this->GetY();
		$ormargins = $this->getOriginalMargins();
		$this->SetTextColor(0, 0, 0);
		//set style for cell border
		//$line_width = 0.85 / $this->getScaleFactor();
		//$this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

		//Print page number

		if ($this->getRTL()) {
			$this->SetX($ormargins['right']);

			$this->setFooterMargin(25);
			$this->SetLineStyle(array('width' => 0.85 / $this->getScaleFactor(), 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
			$this->MultiCell(0, 0, '', 'T', 0, 'C');
			$this->SetFont(PDF_FONT_NAME_MAIN,'B',10);

		} else {
			$this->SetX($ormargins['left']);

			$this->setFooterMargin(25);
			$this->SetLineStyle(array('width' => 0.85 / $this->getScaleFactor(), 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
			$this->MultiCell(0, 0, '', 'T', 0, 'C');
			$this->SetFont(PDF_FONT_NAME_MAIN,'',10);					  
		}				
	}
}

class PrintPdf extends TCPDF 
{

  function callme($assigned_user_id)
  {
    global $app_list_strings,$db;
	global $sugar_config;
	
	$execute_assigned_user_id = $assigned_user_id;
	$current_date =date('Y-m-d H:i:s');
	//~ $current_date =date('2015-01-18 14:01:00');
	
	/*$get_user =  "SELECT assigned_user_id,name,id,next_run,frequency FROM bhea_report_scheduler WHERE status ='Active' AND deleted ='0' AND next_run < '".$current_date."' AND name = 'Opportunity Report' ";
	
	$row_user = $db->query($get_user);
	while($rec_user = $db->fetchByAssoc($row_user)){
	
		$user_id    = $rec_user['assigned_user_id'];*/
		
		 $get_user_report="SELECT RS.assigned_user_id AS assigned_user_id,U.user_name ,U.is_admin,
							RS.name,RS.id,RS.next_run,RS.frequency AS frequency
							FROM bhea_report_scheduler RS
							JOIN users U ON U.id =RS.assigned_user_id 
							WHERE  RS.deleted ='0' 
							AND U.deleted ='0'
							AND RS.next_run < '".$current_date."' 
							AND RS.name = 'Opportunity Report' and RS.assigned_user_id='$assigned_user_id'";
		//$GLOBALS['log']->fatal($get_user_report,"Get user report");
		//AND RS.assigned_user_id = '".$execute_assigned_user_id."'
		echo $get_user_report =  "SELECT assigned_user_id,name,id,next_run,frequency 
		FROM bhea_report_scheduler WHERE assigned_user_id ='".$user_id."' AND deleted ='0' AND next_run < '".$current_date."' AND assigned_user_id in('484b53a2-1b6f-04fe-25e8-4edf34091960')
		AND name = 'Opportunity Report' ";	
                 
                 exit;
		
		$row_user_report = $db->query($get_user_report);
		while($rec_user_report = $db->fetchByAssoc($row_user_report)){
			$user_report_id  = $rec_user_report['assigned_user_id'];
			$is_admin = $rec_user_report['is_admin'];
			// Assigned in user team list				
			//~ $user_team  = "SELECT team_id FROM team_memberships WHERE user_id = '$user_report_id' AND deleted =0 ";
			if($is_admin !='1')
			{
				$user_team  = "SELECT securitygroup_id FROM securitygroups_users WHERE user_id  ='$user_report_id' and primary_group='1' AND deleted=0";
				//$GLOBALS['log']->fatal($user_team,"User team");
				$user_res 	= $db->query($user_team);
				while($user_row = $db->fetchByAssoc($user_res)){
				$team_user_list[] = $user_row['securitygroup_id'];					
				}
			}
			else if($is_admin =='1')
			{
				
				$user_team  = "SELECT securitygroup_id FROM securitygroups_users WHERE user_id  ='$user_report_id' AND deleted=0";
				//$GLOBALS['log']->fatal($user_team,"User team");
				$user_res 	= $db->query($user_team);
				while($user_row = $db->fetchByAssoc($user_res)){
				$team_user_list[] = $user_row['securitygroup_id'];					
				}
			}
			if(!empty($team_user_list)){
				$user_team_list = " AND SG.securitygroup_id IN ('" . implode("','",$team_user_list) . "') AND SG.module = 'Opportunities'  ";
			}
			else{
				$user_team_list ='';	
			}
			$frequency  = $rec_user_report['frequency'];
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
			$query = " SELECT 
				count(O.id) as total_rows,sum(amount) as total_amount FROM 
					opportunities AS O join opportunities_cstm OC  ON O.id = OC.id_c
					left join accounts_opportunities as AO ON AO.opportunity_id=O.id and AO.deleted=0
					left join accounts as A ON A.id=AO.account_id and A.deleted=0
					left join users as U ON U.id=O.assigned_user_id and U.deleted=0 
					LEFT JOIN securitygroups_records SG ON O.id = SG.record_id and SG.deleted=0 
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
			$GLOBALS['log']->fatal($query,"Opportunities query");
			$result = $db->query($query);
			if($row = $db->fetchByAssoc($result))
			{
				$total_rows   = $row['total_rows'];
				$total_amount = $row['total_amount'];
			}
		
			$MData = $data;
			$data = '';
		/***********************************************************************************************/
			$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Amit Sabal');
			$pdf->SetTitle('Daily Call');
			$pdf->SetSubject('Daily Call');
			$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
			$pdf->SetFont('helvetica', '', 10, '', true);
			$html = '';
        
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			//set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetFooterMargin(10);
			
			//set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			//set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
			//$pdf->AddPage();
			$pdf->AddPage('L', 'A4'); // Added to change the page Orientation to Landscape

			$tbl = <<<EOD

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<table >
					<tr>
						<br/><br/>
						<td> <br/><font size="10">&nbsp;<b>$subject</b></font><br/>&nbsp;Date:&nbsp;<b>$todaysdate</b></td>				
					</tr>
					<hr></hr>
			</table>
			<br/><br/>
			 <tr bgcolor="#4B4B4B" style="color:#fff" width="100%">     
				<td ><b>Opportunity Name</b></td>
				<td ><b>Customer Name</b></td>
				<td><b>Architectural Firm</b></td>
				<td><b>Architect Name</b></td>
				<td><b>Opportunity Amount</b></td>
				<td><b>Expected Close Date</b></td>
				<td><b>Sales Stage</b></td>
				<td><b>User</b></td>
			  </tr> 
			  <br/><br/>
EOD;

			//Main Query for Closed Won Opportunity
			 $query = " SELECT
					 O.id as id,
					 O.name as opp_name,
					 A.name as cust_name,
					 O.amount,
					 O.sales_stage,
					 O.lead_source,
					 O.next_step,
					 ARF.name as firm,
					 CONCAT(IFNULL(AR.first_name,''),' ',IFNULL(AR.last_name,'')) as architect,			 
					 DATE_FORMAT(O.date_closed,'%d/%m/%Y') as date_closed,
							   
					 DATE_FORMAT(O.date_entered,'%d/%m/%Y %H:%i:%s') as date_entered,					 
					
					 CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name
				FROM 
					opportunities AS O join opportunities_cstm OC  ON O.id = OC.id_c
					left join accounts_opportunities as AO ON AO.opportunity_id=O.id and AO.deleted=0
					
					left join arch_architectural_firm_opportunities_1_c as ARFO 
					ON ARFO.arch_architectural_firm_opportunities_1opportunities_idb=O.id AND ARFO.deleted =0

					left join arch_architectural_firm as ARF 
					ON ARFO.arch_archi003bal_firm_ida=ARF.id and ARF.deleted=0            
					
					left join arch_architects_contacts_opportunities_1_c as ARO
					ON ARO.arch_architects_contacts_opportunities_1opportunities_idb=O.id AND ARO.deleted =0
					
					left join arch_architects_contacts as AR 
					ON ARO.arch_archi342contacts_ida=AR.id and AR.deleted=0
					
					left join accounts as A ON A.id=AO.account_id and A.deleted=0
					LEFT JOIN securitygroups_records SG ON O.id = SG.record_id and SG.deleted=0
					left join users as U ON U.id=O.assigned_user_id and U.deleted=0
				   
				WHERE O.deleted=0
					$sales_stage_won
					$user_team_list
					$from_date
					$to_date
					ORDER BY user_name
				"; 
                          
			$result = $db->query($query);
			$data = array();
			$r = 1;
			$won_count=0;
			while($row = $db->fetchByAssoc($result))
			{
           
				$opp_name 		    = ucwords(strtolower($row['opp_name']));			
				$cust_name	     	= ucwords(strtolower($row['cust_name']));
				$firm				= ucwords(strtolower($row['firm']));       
				$architect	    	= ucwords(strtolower($row['architect']));
				$amount	   			= $row['amount'];							
				$date_closed	   	= $row['date_closed'];							
				//$next_step	   	= $row['next_step'];							
				//~ $sales_stage 		= $GLOBALS['app_list_strings']['sales_stage_dom'][$row['sales_stage']];										
				$sales_stage 		= $row['sales_stage'];										
				$user_name			= trim($row['user_name']);
				$user_name    		= ucwords(strtolower($user_name));                   
			   
				$won_count++;
				$total_won_amount = $total_won_amount+$amount;
				
				$tbl .=<<<EOD
				<tr>
				<td >$opp_name</td>
				<td >$cust_name</td>
				<td >$firm</td>
				<td >$architect</td>
				<td >$amount</td>
				<td >$date_closed</td>
				<td >$sales_stage</td>
				<td >$user_name</td>	
				<br/><br/>
				</tr>  
EOD;

			}
		
		if ($frequency == 'Weekly'){
			$tbl .=<<<EOD
			<br/><br/>
			<tr bgcolor="#4B4B4B" style="color:#fff" width="100%">      
				<th colspan="4" ><b>Sale Stage Closed Won Count</b></th>		
				<th >Total Amount</th>
				<th ></th>
				<th ></th>
				<th ></th>			
			</tr> 
			<br/>
			<tr>      
			<td colspan="4" >$won_count</td>		
			<td >$total_won_amount</td>
			<td ></td>
			<td ></td>
			<td ></td>			
			</tr> 
EOD;
		$tbl .= <<<EOD

			<br/><br/>
			<tr bgcolor="#4B4B4B" style="color:#fff" width="100%">     
			<td ><b>Opportunity Name</b></td>
			<td ><b>Customer Name</b></td>
			<td><b>Architectural Firm</b></td>
			<td><b>Architect Name</b></td>
			<td><b>Opportunity Amount</b></td>
			<td><b>Expected Close Date</b></td>
			<td><b>Sales Stage</b></td>
			<td><b>User</b></td>
			</tr> 
			<br/><br/>
EOD;

		//Main Query for Closed Lost Opportunity
          $query = " SELECT
					 O.id as id,
					 O.name as opp_name,
					 A.name as cust_name,
					 O.amount,
					 O.sales_stage,
					 O.lead_source,
					 O.next_step,
					 ARF.name as firm,
					 CONCAT(IFNULL(AR.first_name,''),' ',IFNULL(AR.last_name,'')) as architect,			 
					 DATE_FORMAT(O.date_closed,'%d/%m/%Y') as date_closed,
							   
					 DATE_FORMAT(O.date_entered,'%d/%m/%Y %H:%i:%s') as date_entered,
					
					 CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name
				FROM 
					opportunities AS O join opportunities_cstm OC  ON O.id = OC.id_c
					left join accounts_opportunities as AO ON AO.opportunity_id=O.id and AO.deleted=0
					
					left join arch_architectural_firm_opportunities_1_c as ARFO 
					ON ARFO.arch_architectural_firm_opportunities_1opportunities_idb=O.id AND ARFO.deleted =0

					left join arch_architectural_firm as ARF 
					ON ARFO.arch_archi003bal_firm_ida=ARF.id and ARF.deleted=0            
					
					left join arch_architects_contacts_opportunities_1_c as ARO
					ON ARO.arch_architects_contacts_opportunities_1opportunities_idb=O.id AND ARO.deleted =0
					
					left join arch_architects_contacts as AR 
					ON ARO.arch_archi342contacts_ida=AR.id and AR.deleted=0
					
					left join accounts as A ON A.id=AO.account_id and A.deleted=0
					LEFT JOIN securitygroups_records SG ON O.id = SG.record_id and SG.deleted=0
					left join users as U ON U.id=O.assigned_user_id and U.deleted=0
				   
				WHERE O.deleted=0
					$sales_stage_lost
					$user_team_list
					$from_date
					$to_date
					ORDER BY user_name
				";
                          
        $result = $db->query($query);
        $data = array();
        $r = 1;
        $lost_count=0;
        while($row = $db->fetchByAssoc($result)){
           
			$opp_name 		    = ucwords(strtolower($row['opp_name']));			
			$cust_name	     	= ucwords(strtolower($row['cust_name']));
			$firm				= ucwords(strtolower($row['firm']));       
			$architect	    	= ucwords(strtolower($row['architect']));
			$amount	   			= $row['amount'];							
			$date_closed	   	= $row['date_closed'];							
			//$next_step	   	= $row['next_step'];
			$sales_stage 		= $GLOBALS['app_list_strings']['sales_stage_dom'][$row['sales_stage']];										
			$user_name			= trim($row['user_name']);
			$user_name    		= ucwords(strtolower($user_name));                   
           
		    $lost_count++;
       		$total_lost_amount = $total_lost_amount+$amount;
			
		$tbl .=<<<EOD
			 <tr>
			<td >$opp_name</td>
			<td >$cust_name</td>
			<td >$firm</td>
			<td >$architect</td>
			<td >$amount</td>
			<td >$date_closed</td>
			<td >$sales_stage</td>
			<td >$user_name</td>	
			<br/><br/>
			</tr>  
	
EOD;
		} 
		
		$tbl .=<<<EOD
		<br/><br/>
		<tr bgcolor="#4B4B4B" style="color:#fff" width="100%">      
			<th colspan="4" ><b>Sale Stage Closed Lost Count</b></th>			
			<th >Total Amount</th>
			<th ></th>
			<th ></th>
			<th ></th>
		</tr> 
		<br/>
		<tr width="100%">      
			<td colspan="4" >$lost_count</td>				
			<td >$total_lost_amount</td>			
			<td ></td>
			<td ></td>
			<td ></td>
		</tr> 
EOD;
		
		}
		$tbl .=<<<EOD
		
			<br/><br/>
			<tr bgcolor="#4B4B4B" style="color:#fff" width="100%">      
				<th ><b>Count</b></th>
				<th ></th>
				<th ></th>			
				<th ><b>Total Amount</b></th>
				<th ></th>
				<th ></th>
				<th ></th>
				<th ></th>
			</tr> 
			<br/>
			<tr>      
			<td >$total_rows</td>
			<td ></td>
			<td ></td>			
			<td >$total_amount</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			</tr> 

<!---------------------------------------------------------->

</table>
		
EOD;
		
	 /** Code to create a PDF file and also attachment **/
        $files_name =$subject; 
		$pdf->writeHTML($tbl, true, false, false, false, '');
		$pdf->Output('pdfs/'.$files_name.'.pdf','F');	
		ob_clean();
		ob_flush();
		$attachment='pdfs/'.$files_name.'.pdf';
		
        /***************************** Email PDF as Attachment functionality starts here ***********************/  
          
		require_once("include/SugarPHPMailer.php");
        $note_msg=new SugarPHPMailer();
        $admin = new Administration();
        $admin->retrieveSettings();
        $note_msg->Subject = $subject;
        $note_msg->prepForOutbound();
        $note_msg->setMailerForSystem();
		$note_msg->From     = $admin->settings['notify_fromaddress'];
        $note_msg->FromName = $admin->settings['notify_fromname'];
        
        //~ $note_msg->AddBCC('shakeer@bhea.com');
        $note_msg->AddAddress($user_email);
       // $note_msg->AddBCC('malathir@squarefoot.co.in');
       $note_msg->AddAddress('vivek@simplecrm.com.sg');
       
        $note_msg->AddAttachment($attachment);
		$note_msg->Body="This is SugarCRM auto generated mail. Please don't reply";
      
        
		/*********************************** Email  PDF Attachment function Ends here ****************************/	

		global $db;
		$job_id 	= $rec_user_report['id']; 			
		$next_run   = $rec_user_report['next_run'];		
		$assigned_user_id   = $rec_user_report['assigned_user_id'];	
		$frequency   = $rec_user_report['frequency'];
		$today_date = date('Y-m-d H:i:s');
		//~ $today_date = '2015-01-18 14:01:00';
		$dt = new DateTime($today_date);
		$actual_date = $dt->format('Y-m-d');
		//~ $Daily_date = "$actual_date 14:00:00";
		//~ $Weekly_date = "$actual_date 09:00:00";
		
		if($frequency == 'Daily') {		
			$start_date = date("Y-m-d H:i:s", strtotime($actual_date.' 19:30:00'));
			$end_date 	= date("Y-m-d H:i:s", strtotime($actual_date.' 19:45:00'));
			if($today_date > $start_date && $today_date < $end_date)	{
				if($next_run < $today_date){
					$new_next_run = date('Y-m-d H:i:s', strtotime($today_date. ' + 1 days'));
					if (!$note_msg->Send()){
						die("Could not send case closed notification:  " . $note_msg->ErrorInfo);
					 }
					 else{
						echo "Send";
						echo "</br>";
					 } 	
					$new_next_run = date('Y-m-d H:i:s', strtotime($start_date. ' + 1 days'));	
					$update = "UPDATE bhea_report_scheduler SET next_run ='$new_next_run' where id = '$job_id' AND assigned_user_id = '$assigned_user_id' ";
					$db->query($update);	
				}
			}		
			
		}else if($frequency == 'Weekly'){
			$start_date = date("Y-m-d H:i:s", strtotime($actual_date.' 09:00:00'));
			$end_date 	= date("Y-m-d H:i:s", strtotime($actual_date.' 09:30:00'));
			if($today_date > $start_date && $today_date < $end_date){
				if($next_run < $today_date){
					 if (!$note_msg->Send()){
						 die("Could not send case closed notification:  " . $note_msg->ErrorInfo);
					 }
					 else{
						echo "Send";
					 } 			
					$new_next_run = date('Y-m-d H:i:s', strtotime($start_date. ' + 1 weeks'));	
					$update = "UPDATE bhea_report_scheduler SET next_run ='$new_next_run' where id = '$job_id' AND assigned_user_id = '$assigned_user_id' ";
					$db->query($update);
				}
			}
				
		}else if($frequency == 'Monthly'){						
				$new_next_run = date('Y-m-d H:i:s', strtotime($today_date. ' + 1 months'));	
				$update = "UPDATE bhea_report_scheduler SET next_run ='$new_next_run' where id = '$job_id' AND assigned_user_id = '$assigned_user_id' ";
				//$db->query($update);				
			}		
		} // End of nested while
		//} // END of While
		
    }
}
?>
