<?php

require_once('include/MVC/View/views/view.list.php');
require_once('modules/Meetings/MeetingsListViewSmarty.php');

class MeetingsViewList extends ViewList
{
    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay(){
         parent::preDisplay();

          }
  	function display()
 	{
		
		echo $js=<<<EOF
			<script>
				$(document).ready(function() {
					$('#create_link').attr('disabled','disabled'); 
				});
			</script>
		
EOF;
		
			
		parent::display();
 	}

}

?>
