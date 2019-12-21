<?php
$manifest = array (
  0 => 
  array (
    'acceptable_sugar_versions' => 
    array (
      0 => '6.5.*',
    ),
  ),
  1 => 
  array (
    'acceptable_sugar_flavors' => 
    array (
      0 => 'CE',
    ),
  ),
  'readme' => '',
  'key' => 'SimpleCRMUI',
  'author' => 'SimpleCRM',
  'description' => 'SimpleCRM UI v1.2 Plugin',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'SimpleCRM_UI_1_2Plugin',
  'published_date' => '2017-01-24 17:24:06',
  'type' => 'module',
  'version' => '1.2',
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'SimpleCRM_UI_1_2Plugin',
  'copy' => 
  array (

		0 => 
		array (
		'from' => '<basepath>/root/modules/AOR_Charts/AOR_Chart.php',
		'to' => 'modules/AOR_Charts/AOR_Chart.php',
		),

		1 => 
		array (
		'from' => '<basepath>/root/themes/SuiteR/tpls/_head.tpl',
		'to' => 'themes/SuiteR/tpls/_head.tpl',
		),

		2 => 
		array (
		'from' => '<basepath>/root/themes/SuiteR/fonts/font-awesome.css',
		'to' => 'themes/SuiteR/fonts/font-awesome.css',
		),

		3 => 
		array (
		'from' => '<basepath>/root/themes/SuiteR/css/style.css',
		'to' => 'themes/SuiteR/css/style.css',
		),

		4 => 
		array (
		'from' => '<basepath>/root/themes/SuiteR/tpls/_headerModuleList.tpl',
		'to' => 'themes/SuiteR/tpls/_headerModuleList.tpl',
		),

		5 => 
		array (
		'from' => '<basepath>/root/custom/modules/Accounts/process_record_lead.php',
		'to' => 'custom/modules/Accounts/process_record_lead.php',
		),

		6 => 
		array (
		'from' => '<basepath>/root/include/ListView/ListView.php',
		'to' => 'include/ListView/ListView.php',
		),

		7 => 
		array (
		'from' => '<basepath>/root/include/DetailView/DetailView.tpl',
		'to' => 'include/DetailView/DetailView.tpl',
		),

		8 => 
		array (
		'from' => '<basepath>/root/include/MVC/View/SugarView.php',
		'to' => 'include/MVC/View/SugarView.php',
		),

		9 => 
		array (
		'from' => '<basepath>/root/include/SubPanel/RightTapPanelTiles.php',
		'to' => 'include/SubPanel/RightTapPanelTiles.php',
		),

		10 => 
		array (
		'from' => '<basepath>/root/include/ListView/ListViewDisplay.php',
		'to' => 'include/ListView/ListViewDisplay.php',

		),

		11 => 
		array (
		'from' => '<basepath>/root/include/ListView/ListViewGeneric.tpl',
		'to' => 'include/ListView/ListViewGeneric.tpl',
		),

		12 => 
		array (
		'from' => '<basepath>/root/include/ListView/ListViewSmarty.php',
		'to' => 'include/ListView/ListViewSmarty.php',
		),


		
		
		
  ),
);

?>
