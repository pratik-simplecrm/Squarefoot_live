<?php

if (!defined('sugarEntry'))
    define('sugarEntry', true);
/* * *******************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 * ****************************************************************************** */

/**
 * Author 		: Amit Sabal
 * Created Date  : 16 Aug 2013
 * Motive 		: To create custom scheduler for Custom Reports to send the mail 
 * Organization  : Bhea Knowledge Technologies (P) Ltd.
 */
require_once('include/entryPoint.php');
require_once('include/nusoap/nusoap.php');
require_once('include/database/DBManager.php');


global $db;
global $app_list_strings;
global $sugar_config, $beanFiles, $beanList;

$currenttime = date('h:i:s');
//sleep(5);
$today_date = date('Y-m-d H:i:s');
//$today_date = '2018-12-18 00:01:00';
 
    $name = 'Userwise Daily Call Report';

    $get_job = "SELECT * FROM bhea_report_scheduler where deleted =0 AND status ='Active' AND next_run < '" . $today_date . "' AND name='" . $name . "' "; 
    $job_res = $db->query($get_job);
    while ($job_row = $db->fetchByAssoc($job_res)) {

        //sleep(5); 
        $frequency = $job_row['frequency']; 
        if ($frequency == 'Daily') {
              $start_date = date('Y-m-d 19:30:00');
              $end_date = date('Y-m-d 23:30:00');

            if ($today_date >= $start_date && $today_date < $end_date) {
                $job_id = $job_row['id'];
                $job_name = $job_row['name'];
                $start_date = $job_row['start_date'];
                $next_run = $job_row['next_run'];
                $assigned_user_id = $job_row['assigned_user_id'];
                //By Vivek@simplecrm.com.sg On 19-12-2018
                //To check the users is active or not . Wehave to send th email to active users only
                $user_name = $db->query("SELECT id FROM users WHERE status = 'Active' AND employee_status = 'Active' AND deleted = 0 AND id = '$assigned_user_id'");
                $result_user_name = $db->fetchByAssoc($user_name);
                $new_user_id = $result_user_name['id'];
                if (empty($new_user_id)) {
                    //User is inactive 
                } else {
                    //$file_name	= UserwiseDailyArchitect;
                  echo   $file_name = str_replace(' ', '', $job_name);
                    if (strtotime($today_date) > strtotime($next_run)) {
                        require_once('custom/modules/bhea_Reports/PdfReports/' . $file_name . '.php');
                        ob_clean(); // To Clean the object buffer
                        $report_obj = new PrintPdf();
                        $report_obj->callme($assigned_user_id);
                    }
                }
            }
        }
       
}
?>
