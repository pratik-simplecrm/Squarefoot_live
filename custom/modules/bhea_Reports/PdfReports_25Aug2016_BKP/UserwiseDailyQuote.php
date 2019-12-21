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

class MyPDFF extends TCPDF {

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
	
	// $user_id = array();
	// $user_name = array();
	$current_date =date('Y-m-d H:i:s');
	//~ $current_date ='2015-01-19 14:01:00';
	$execute_assigned_user_id = $assigned_user_id;
	/*$get_user =  "SELECT assigned_user_id,name,id,next_run,frequency FROM bhea_report_scheduler WHERE status ='Active' AND deleted ='0' AND next_run < '".$current_date."' AND name = 'Userwise Daily Quote' ";
	
	$row_user = $db->query($get_user);
	while($rec_user = $db->fetchByAssoc($row_user)){
	
		$user_id  = $rec_user['assigned_user_id'];
		
		$get_user_report =  "SELECT assigned_user_id,name,id,next_run,frequency FROM bhea_report_scheduler WHERE assigned_user_id ='".$user_id."' AND deleted ='0' AND next_run < '".$current_date."'  AND name = 'Userwise Daily Quote' ";	*/
	 	$get_user_report="SELECT RS.assigned_user_id AS assigned_user_id,U.user_name ,
						RS.name,RS.id,RS.next_run,RS.frequency AS frequency
						FROM bhea_report_scheduler RS
						JOIN users U ON U.id =RS.assigned_user_id 
						WHERE  RS.deleted ='0' 
						AND U.deleted ='0'
						AND RS.next_run < '".$current_date."' 
						AND RS.name ='Userwise Daily Quote' ";
						//AND RS.assigned_user_id = '".$execute_assigned_user_id."'
		$row_user_report = $db->query($get_user_report);
		
		while($rec_user_report = $db->fetchByAssoc($row_user_report)){
		
			$user_report_id  = $rec_user_report['assigned_user_id'];
			$user_report_name  = $rec_user_report['user_name'];
	
		$team_user_list = array();
		// Assigned in user team list	
		$user_team = "SELECT TM.team_id as team_id, T.name 
					FROM team_memberships TM
					JOIN team T on T.id = TM.team_id 
					WHERE T.deleted =0
					AND TM.deleted =0
					AND TM.user_id = '$user_report_id'
					";					
		//$user_team  = "SELECT team_id FROM team_memberships WHERE user_id = '$user_report_id' AND deleted =0 ";
		$user_res 	= $db->query($user_team);
		while($user_row = $db->fetchByAssoc($user_res)){
		
			$team_user_list[] = $user_row['team_id'];					
		}
		
		if(!empty($team_user_list)){
			$user_team_list = " AND Q.team_id IN ('" . implode("','",$team_user_list) . "') ";
		}
		else{
			$user_team_list ='';	
		}
		
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
		
	$frequency  = $rec_user_report['frequency'];
		
	$todaysdate=date("d/m/Y");
	//~ $todaysdate="19/01/2015";
	
	if($frequency == 'Weekly'){
		
		$tmp = explode("/",$todaysdate);
		if( count($tmp) == 3)
		{
			$from_date = $tmp[0].'-'.$tmp[1].'-'.$tmp[2];
		}
		$from_date = date("d/m/Y", strtotime($from_date. '- 6 days'));	
		$to_date   = $todaysdate;				
		
		$email_subject = 'SquareFoot - Weekly Quotes Report';
	
	}else if($frequency == 'Daily'){
	
		$from_date = $todaysdate;
		$to_date   = $todaysdate;			
		
		$email_subject = 'SquareFoot - Daily Quotes Report';
		
	}else if($frequency == 'Monthly'){
		
		$from_date = date('01/m/Y');
		$to_date   = $todaysdate;		
		
		$email_subject = 'SquareFoot - Monthly Quotes Report';
	}
	
	// From Date & To Date filter Condition
	$from_date = $todaysdate;
	if(!empty($from_date))
	{
		$tmp = explode("/",$from_date);
		if( count($tmp) == 3)
		{
			$from_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
		} else 
		$from_date = '';
	}
	if(!empty($from_date))
	{
		$from_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($from_date)));
		$from_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($from_date)));
		$from_date = " and Q.date_entered >= '$from_date' ";
	}
	
	$to_date = $todaysdate;
	if(!empty($to_date))
	{
		$tmp = explode("/",$to_date);
		if( count($tmp) == 3)
		{
			$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
			$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));
		} else 
		$to_date = '';
	}
	if(!empty($to_date))
	{
		 $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
		 $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
		 $to_date = " and Q.date_entered <= '$to_date' ";
	} 

    global $db;
	
	/** Query to get data **/
	
	$query = " SELECT 
				count(Q.id) as total_rows
				FROM quote_quote Q
				LEFT JOIN  quote_quote_cstm QC ON Q.id=QC.id_c 
				LEFT JOIN  users U ON Q.assigned_user_id=U.id AND U.deleted=0 AND U.status ='Active'

				LEFT JOIN   quote_quote_opportunities_c QP ON Q.id=QP.quote_quote_opportunitiesquote_quote_idb AND QP.deleted=0

				LEFT JOIN  opportunities O ON O.id=QP.quote_quote_opportunitiesopportunities_ida AND O.deleted=0
				LEFT JOIN team as T ON T.id=Q.team_id and T.deleted=0
			
				WHERE Q.deleted=0 
					$user_team_list
					$from_date
					$to_date				 
				";           

        $result = $db->query($query);
        if($row = $db->fetchByAssoc($result))
        {
            $total_rows = $row['total_rows'];
        }
		
		
		$MData = $data;
        $data = '';
		
   	/***********************************************************************************************/
        $pdf = new MyPDFF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
			<td> <br/><font size="10">&nbsp;<b>$email_subject</b></font><br/>&nbsp;Date:&nbsp;<b>$todaysdate</b></td>				
		</tr>
		<hr></hr>
	</table>
	<br/><br/>
	 <tr bgcolor="#4B4B4B" style="color:#fff" width="100%">     
  		<td ><b>Quote Subject</b></td>
		<td ><b>Quote Stage</b></td>
		<td ><b>Total</b></td>
	 	<td><b>Opportunity Name</b></td>
	 	<td><b>Valid Until</b></td>	 	
	 	<td><b>User Name</b></td>	 	
	  </tr> 
	  <br/><br/>
EOD;

		//Main Query
         $query = " SELECT 
					IFNULL(Q.id,'') id,
					IFNULL(Q.name,'') quotes_name,
					IFNULL(Q.quotation_status,'') quotation_status,
					Q.grand_total quotes_total ,
					IFNULL( Q.currency_id,'') quotes_total_currency,
					IFNULL(O.id,'') opp_id,
					IFNULL(O.name,'') opp_name,
					QC.valid_until_c valid_until,
					CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name,
					T.name team_name
				FROM quote_quote Q
					LEFT JOIN  quote_quote_cstm QC ON Q.id=QC.id_c 
					LEFT JOIN  users U ON Q.assigned_user_id=U.id AND U.deleted=0 AND U.status ='Active'

					LEFT JOIN   quote_quote_opportunities_c QP ON Q.id=QP.quote_quote_opportunitiesquote_quote_idb AND QP.deleted=0

					LEFT JOIN  opportunities O ON O.id=QP.quote_quote_opportunitiesopportunities_ida AND O.deleted=0
					LEFT JOIN team as T ON T.id=Q.team_id and T.deleted=0
				
				WHERE Q.deleted=0
					$user_team_list
					$from_date
					$to_date
					ORDER BY user_name 
				";
                               
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
			$subject 		    = ucwords(strtolower($row['quotes_name']));	
			$quotation_status   = ucwords(strtolower($GLOBALS['app_list_strings']['quotation_status_list'][$row['quotation_status']]));			
			$quotes_total	   	= $row['quotes_total'];
			$opp_name			= ucwords(strtolower($row['opp_name'])); 
			$valid_until	   	= $row['valid_until'];
			$user_name			= trim($row['user_name']);
			$user_name    		= ucwords(strtolower($user_name));                   
           
       		
			$tbl .=<<<EOD
			
	 
  	  <tr>
  		<td >$subject</td>
  		<td >$quotation_status</td>
  		<td >$quotes_total</td>
  		<td >$opp_name</td>
  		<td >$valid_until</td>	
  		<td >$user_name</td>	
		<br/><br/>
	  </tr>  
	
EOD;

		}
		//print_r($subject);exit;
		
		$tbl .=<<<EOD
		
  		<br/><br/>
		<tr bgcolor="#4B4B4B" style="color:#fff" width="100%">      
			<th ><b>Count</b></th>
			<th ></th>
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
			<td ></td>
			<td ></td>
			<td ></td>
		</tr> 

<!---------------------------------------------------------->

</table>
		
EOD;
		
	 
		/** Code to create a PDF file and also attachment **/
        $files_name =$email_subject; 
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
        $note_msg->Subject = $email_subject;
        $note_msg->prepForOutbound();
        $note_msg->setMailerForSystem();
		
         $note_msg->From     = $admin->settings['notify_fromaddress'];
         $note_msg->FromName = $admin->settings['notify_fromname'];
         
         
         $note_msg->AddAddress($user_email);
         //~ $note_msg->AddBCC('shakeer@bhea.com');
         $note_msg->AddAttachment($attachment);
		 $note_msg->Body="This is SugarCRM auto generated mail. Please don't reply";
         
         //~ if (!$note_msg->Send())
         //~ {		
			 //~ echo "Not send";
			 //~ exit;
               //~ die("Could not send case closed notification:  " . $note_msg->ErrorInfo);
         //~ }
         //~ else
         //~ {
                //~ echo "Send";
         //~ } 
        
		/*********************************** Email  PDF Attachment function Ends here ****************************/	

			global $db;
			$job_id 	= $rec_user_report['id']; 			
			$next_run   = $rec_user_report['next_run'];		
			$assigned_user_id   = $rec_user_report['assigned_user_id'];	
			$frequency   = $rec_user_report['frequency'];
			$today_date = date('Y-m-d H:i:s');
			//~ $today_date = '2015-01-19 14:01:00';
			$dt = new DateTime($today_date);
			$actual_date = $dt->format('Y-m-d');
			$Daily_date = "$actual_date 14:00:00";
			$Weekly_date = "$actual_date 09:00:00";
			
			if($frequency == 'Daily') {		
				$start_date = date("Y-m-d H:i:s", strtotime($actual_date.' 14:00:00'));
				$end_date 	= date("Y-m-d H:i:s", strtotime($actual_date.' 14:45:00'));
				//~ if($today_date > $start_date && $today_date < $end_date)	{
					//$new_next_run = date('Y-m-d H:i:s', strtotime($today_date. ' + 1 days'));	
					if($next_run < $today_date){
						if (!$note_msg->Send()){
							 die("Could not send case closed notification:  " . $note_msg->ErrorInfo);
						 }
						 else{
							echo "Send";
						 } 
						$new_next_run = date('Y-m-d H:i:s', strtotime($start_date. ' + 1 days'));	
						//$new_next_run = date('Y-m-d H:i:s', strtotime($today_date. ' + 1 days'));	
						$update = "UPDATE bhea_report_scheduler SET next_run ='$new_next_run' where id = '$job_id' AND assigned_user_id = '$assigned_user_id' ";
						$db->query($update);	
					}	
					//exit;
				//~  	}
				
			}else if($frequency == 'Weekly'){
				$start_date = date("Y-m-d H:i:s", strtotime($actual_date.' 09:00:00'));
				$end_date 	= date("Y-m-d H:i:s", strtotime($actual_date.' 09:20:00'));
				if($today_date > $start_date && $today_date < $end_date){
					if (!$note_msg->Send()){
						 die("Could not send case closed notification:  " . $note_msg->ErrorInfo);
					 }
					 else{
						echo "Send";
					 } 
				//$new_next_run = date('Y-m-d H:i:s', strtotime($today_date. ' + 1 weeks'));	
					$new_next_run = date('Y-m-d H:i:s', strtotime($start_date. ' + 1 weeks'));	
					//$new_next_run = date('Y-m-d H:i:s', strtotime($today_date. ' + 1 weeks'));	
					$update = "UPDATE bhea_report_scheduler SET next_run ='$new_next_run' where id = '$job_id' AND assigned_user_id = '$assigned_user_id' ";
					//$update = "UPDATE bhea_report_scheduler SET next_run ='$new_next_run' where id = '$job_id' AND assigned_user_id = '$assigned_user_id' ";
					$db->query($update);
				}				
			}else if($frequency == 'Monthly'){						
				
				$new_next_run = date('Y-m-d H:i:s', strtotime($today_date. ' + 1 months'));	
				//$update = "UPDATE bhea_report_scheduler SET next_run ='$new_next_run' where id = '$job_id' AND assigned_user_id = '$assigned_user_id' ";
				//$db->query($update);				
			}	
		} // End of nested while
		//} // END of While
		
    }
}
?>
