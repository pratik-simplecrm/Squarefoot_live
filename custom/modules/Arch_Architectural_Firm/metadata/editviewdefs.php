<?php
$module_name = 'Arch_Architectural_Firm';
$_object_name = 'arch_architectural_firm';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_ADDRESS_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'archi',
            'studio' => 'visible',
            'label' => 'LBL_ARCHI',
          ),
        ),
        1 => 
        array (
          0 => 'website',
          1 => 'phone_office',
        ),
        2 => 
        array (
          0 => 'annual_revenue',
          1 => 'phone_fax',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        4 => 
        array (
          0 => 'email1',
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_address_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'educational_institution',
            'label' => 'LBL_EDUCATIONAL_INSTITUTION',
          ),
          1 => 
          array (
            'name' => 'pharmaceutical',
            'label' => 'LBL_PHARMACEUTICAL',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'residential',
            'label' => 'LBL_RESIDENTIAL',
          ),
          1 => 
          array (
            'name' => 'hospital',
            'label' => 'LBL_HOSPITAL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'hotels',
            'label' => 'LBL_HOTELS',
          ),
          1 => 
          array (
            'name' => 'sports',
            'label' => 'LBL_SPORTS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'retail',
            'label' => 'LBL_RETAIL',
          ),
          1 => 
          array (
            'name' => 'others',
            'label' => 'LBL_OTHERS',
          ),
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
