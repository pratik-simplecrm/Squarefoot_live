<?php
$module_name = 'pdf_Quote_PDF';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'branch',
            'studio' => 'visible',
            'label' => 'LBL_BRANCH',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'address',
            'label' => 'LBL_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'vat_no',
            'label' => 'LBL_VAT_NO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address_city',
            'label' => 'LBL_ADDRESS_CITY',
          ),
          1 => 
          array (
            'name' => 'cst_no',
            'label' => 'LBL_CST_NO',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'address_state',
            'label' => 'LBL_ADDRESS_STATE',
          ),
          1 => 
          array (
            'name' => 'stn',
            'label' => 'LBL_STN',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'address_postalcode',
            'label' => 'LBL_ADDRESS_POSTALCODE',
          ),
          1 => 
          array (
            'name' => 'w',
            'label' => 'LBL_W',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'address_country',
            'label' => 'LBL_ADDRESS_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'state',
            'label' => 'LBL_STATE',
          ),
        ),
        6 => 
        array (
          0 => 'description',
          1 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
