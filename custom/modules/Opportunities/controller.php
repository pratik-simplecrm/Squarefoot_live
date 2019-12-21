<?php
class OpportunitiesController extends SugarController
{
   function OpportunitiesController(){
     parent::SugarController();
  }

  function action_popup(){
	 /**
	* Populate Opportunity list as per selected Accounts 
	* 
	*/
	global $current_user;
	//Set Accounts ID as session under Current user ID key
	if(!empty($_REQUEST['account_id']))
	  $_SESSION[$current_user->id]=$_REQUEST['account_id'];
	//#END

   require_once('custom/modules/Opportunities/Opportunities_InPopupView.php');
     $this->view_object_map['bean'] = $this->bean;
     $this->view = 'popup';
     $GLOBALS['view'] = $this->view;
     $this->bean = new Opportunities_InPopupView(); 
 }

  function action_listview(){
   require_once('custom/modules/Opportunities/Opportunities_InListView.php');
     $this->view_object_map['bean'] = $this->bean;
     $this->view = 'list';
     $GLOBALS['view'] = $this->view;
     $this->bean = new Opportunities_InListView(); 
 }

}
