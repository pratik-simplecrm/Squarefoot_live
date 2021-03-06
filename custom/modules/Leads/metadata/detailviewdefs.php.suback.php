<?php
// created: 2016-08-09 23:11:22
$viewdefs = array (
  'Leads' => 
  array (
    'DetailView' => 
    array (
      'templateMeta' => 
      array (
        'form' => 
        array (
          'buttons' => 
          array (
            0 => 'EDIT',
            1 => 'DUPLICATE',
            2 => 'DELETE',
            3 => 
            array (
              'customCode' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}<input title="{$MOD.LBL_CONVERTLEAD_TITLE}" accessKey="{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'" name="convert" value="{$MOD.LBL_CONVERTLEAD}">{/if}',
              'sugar_html' => 
              array (
                'type' => 'button',
                'value' => '{$MOD.LBL_CONVERTLEAD}',
                'htmlOptions' => 
                array (
                  'title' => '{$MOD.LBL_CONVERTLEAD_TITLE}',
                  'accessKey' => '{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}',
                  'class' => 'button',
                  'onClick' => 'document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'',
                  'name' => 'convert',
                  'id' => 'convert_lead_button',
                ),
                'template' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}[CONTENT]{/if}',
              ),
            ),
            4 => 'FIND_DUPLICATES',
            5 => 
            array (
              'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
              'sugar_html' => 
              array (
                'type' => 'submit',
                'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                'htmlOptions' => 
                array (
                  'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                  'class' => 'button',
                  'id' => 'manage_subscriptions_button',
                  'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';',
                  'name' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                ),
              ),
            ),
            6 =>
          array (
			'customCode' => '<input title="{$APP.LBL_VCARD}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'vCard\'; this.form.module_tab.value=\'Leads\';" type="submit" name="Download vCard" value="{$APP.LBL_VCARD}">',
            'sugar_html' => 
            array (
              'type' => 'button',
              'value' => 'Download vCard',
              'htmlOptions' => 
              array (
                'title' => '{$APP.LBL_VCARD}',
                'class' => 'button',
                'id' => 'btn_vCardButton',
                'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'vCard\'; this.form.module_tab.value=\'Leads\';',
                'name' => '{$APP.LBL_VCARD}',
              ),
            ),          
          ),
            'AOS_GENLET' => 
            array (
              'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
            ),
          ),
          'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
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
            'file' => 'modules/Leads/Lead.js',
          ),
        ),
        'useTabs' => true,
        'tabDefs' => 
        array (
          'LBL_CONTACT_INFORMATION' => 
          array (
            'newTab' => true,
            'panelDefault' => 'expanded',
          ),
          'LBL_PANEL_ADVANCED' => 
          array (
            'newTab' => true,
            'panelDefault' => 'expanded',
          ),
        ),
        'syncDetailEditViews' => true,
      ),
      'panels' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'first_name',
              'comment' => 'First name of the contact',
              'label' => 'LBL_FIRST_NAME',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'last_name',
              'comment' => 'Last name of the contact',
              'label' => 'LBL_LAST_NAME',
            ),
            1 => 'phone_work',
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'designation_c',
              'label' => 'LBL_DESIGNATION',
            ),
            1 => 'department',
          ),
          3 => 
          array (
            0 => 'phone_mobile',
            1 => 'phone_fax',
          ),
          4 => 
          array (
            0 => 'status',
            1 => 'status_description',
          ),
          5 => 
          array (
            0 => 'opportunity_amount',
            1 => 
            array (
              'name' => 'flooring_tpye_c',
              'studio' => 'visible',
              'label' => 'LBL_FLOORING_TPYE_C',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'name' => 'arch_architectural_firm_leads_1_name',
              'label' => 'LBL_ARCH_ARCHITECTURAL_FIRM_LEADS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
            ),
            1 => 
            array (
              'name' => 'arch_architects_contacts_leads_1_name',
              'label' => 'LBL_ARCH_ARCHITECTS_CONTACTS_LEADS_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'name' => 'account_name',
              'displayParams' => 
              array (
              ),
            ),
            1 => 'website',
          ),
          8 => 
          array (
            0 => 
            array (
              'name' => 'primary_address_street',
              'label' => 'LBL_PRIMARY_ADDRESS',
              'type' => 'address',
              'displayParams' => 
              array (
                'key' => 'primary',
              ),
            ),
            1 => 
            array (
              'name' => 'alt_address_street',
              'label' => 'LBL_ALTERNATE_ADDRESS',
              'type' => 'address',
              'displayParams' => 
              array (
                'key' => 'alt',
              ),
            ),
          ),
          9 => 
          array (
            0 => 'email1',
          ),
          10 => 
          array (
            0 => 'description',
          ),
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          0 => 
          array (
            0 => 'lead_source',
            1 => 
            array (
              'name' => 'prospect_source_description_c',
              'studio' => 'visible',
              'label' => 'LBL_PROSPECT_SOURCE_DESCRIPTION',
            ),
          ),
          1 => 
          array (
            0 => 'do_not_call',
            1 => 
            array (
              'name' => 'campaign_name',
              'label' => 'LBL_CAMPAIGN',
            ),
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'assigned_user_name',
              'label' => 'LBL_ASSIGNED_TO',
            ),
          ),
        ),
      ),
    ),
  ),
);
