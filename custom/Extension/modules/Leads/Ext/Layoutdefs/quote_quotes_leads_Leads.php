<?php
 // created: 2014-06-27 10:03:50
$layout_defs["Leads"]["subpanel_setup"]['quote_quotes_leads'] = array (
  'order' => 100,
  'module' => 'quote_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QUOTE_QUOTES_LEADS_FROM_QUOTE_QUOTES_TITLE',
  'get_subpanel_data' => 'quote_quotes_leads',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
