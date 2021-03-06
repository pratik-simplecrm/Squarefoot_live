<?php
if(!defined('sugarEntry')) die('Not a Valid Entry Point');

//require_once('modules/bhea_Reports/report_utils.php');

class bhea_ReportsController extends SugarController {
    
    function action_opportunityBySource()
    {
        $this->view = 'oppbysource';
    }

    function action_opportunityByProduct() {
        $this->view = 'oppbyprod';
    }

    function action_opportunityByBranch() {
        $this->view = 'oppbybranch';
    }
    
    function action_generateTicketReport() {
        $this->view = 'generateticketreport';
    }
    
  
    
    function action_generateCustReport() {
        $this->view = 'generatecustreport';
    }
    
    function action_generateLoanReport() {
        $this->view = 'generateloanreport';
    }

    /**
    *pull out report for leads / opp / QRC where the status has not changed for the last 7 days / 15 days / >30 days
    * -Shyam    Date:17th June 2014
    */
    function action_generateLeadReport() {
        $this->view = 'generateleadreportstatus';
    }
    function action_generateOpportunityReportGroupBy() {
         
        $this->view = 'generateopportunityreport_groupby';
    }
	function action_generateContactreport() {
                    
        $this->view = 'generatecontactreport';
    }
	function action_generateDailyCallReport() {
                    
        $this->view = 'generatedailycallreport';
    }
	function action_generateDailyMeetingReport() {
                    
        $this->view = 'generatedailymeetingreport';
    }
	function action_generateDailyQuoteReport() {
                    
        $this->view = 'generatedailyquotereport';
    }
	function action_generateDailyArchitectReport() {
                    
        $this->view = 'generatedailyarchitectreport';
    }
    function action_generateCustomerReport() {
                    
        $this->view = 'generatecustomerreport';
    }
    function action_generateTopCustomerReport() {
                    
        $this->view = 'generatetopcustomerreport';
    }
    function action_generateTopArchitectReport() {
                    
        $this->view = 'generatetoparchitectreport';
    }
    function action_generatePTPReport() {
                    
        $this->view = 'generate_ptp_report';
    }
    //#END
}

?>
