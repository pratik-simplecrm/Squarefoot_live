<?php
	if(!defined('sugarEntry') || !sugarEntry) die('Not a valid entry point');
	class process_record_opportunity_class
	{
		public function process_record_opportunity_method($bean, $event, $arguments)
		{
			
			
			
				$link = '<a href=index.php?entryPoint=download1&id='.$bean->id.'&type=Opportunities>'.$bean->filename.'</a>';
				$bean->filename = $link;
			

		}
	}
