

<script>
{literal}
$(document).ready(function(){
$("ul.clickMenu").each(function(index, node){
$(node).sugarActionMenu();
});
});
{/literal}
</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if (!empty($smarty.request.return_module) || !empty($smarty.request.relate_to)) && !(isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true")}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
{assign var='place' value="_HEADER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  class="button" onclick="var _form = document.getElementById('form_SubpanelQuickCreate_Arch_Architects_Contacts'); disableOnUnloadEditView(); _form.action.value='Save';if(check_form('form_SubpanelQuickCreate_Arch_Architects_Contacts'))SUGAR.subpanelUtils.inlineSave(_form.id, 'Arch_Architects_Contacts_subpanel_save_button');return false;" type="submit" name="Arch_Architects_Contacts_subpanel_save_button" id="Arch_Architects_Contacts_subpanel_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" >{/if}  <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate($(this).attr('id'));return false;" type="submit" name="Arch_Architects_Contacts_subpanel_cancel_button" id="Arch_Architects_Contacts_subpanel_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" >  <input title="{$APP.LBL_FULL_FORM_BUTTON_TITLE}" class="button" onclick="var _form = document.getElementById('form_SubpanelQuickCreate_Arch_Architects_Contacts'); disableOnUnloadEditView(_form); _form.return_action.value='DetailView'; _form.action.value='EditView'; if(typeof(_form.to_pdf)!='undefined') _form.to_pdf.value='0';" type="submit" name="Arch_Architects_Contacts_subpanel_full_form_button" id="Arch_Architects_Contacts_subpanel_full_form_button" value="{$APP.LBL_FULL_FORM_BUTTON_LABEL}"> <input type="hidden" name="full_form" value="full_form"> {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Arch_Architects_Contacts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right'>
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="form_SubpanelQuickCreate_Arch_Architects_Contacts_tabs"
class="yui-navset"
>

<ul class="yui-nav">
<li class="selected"><a id="tab0" href="javascript:void(0)"><em>{sugar_translate label='LBL_CONTACT_INFORMATION' module='Arch_Architects_Contacts'}</em></a></li>
<li class="selected"><a id="tab1" href="javascript:void(1)"><em>{sugar_translate label='LBL_ADDRESS_INFORMATION' module='Arch_Architects_Contacts'}</em></a></li>
</ul>
<div class="yui-content">
<div id='tabcontent0'>
<div id="detailpanel_1" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_CONTACT_INFORMATION'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='first_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FIRST_NAME' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
{html_options name="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input accesskey="7"  tabindex="0"  name="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">
<td valign="top" id='last_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LAST_NAME' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.last_name.value) <= 0}
{assign var="value" value=$fields.last_name.default_value }
{else}
{assign var="value" value=$fields.last_name.value }
{/if}  
<input type='text' name='{$fields.last_name.name}' 
id='{$fields.last_name.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='phone_work_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OFFICE_PHONE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.phone_work.value) <= 0}
{assign var="value" value=$fields.phone_work.default_value }
{else}
{assign var="value" value=$fields.phone_work.value }
{/if}  
<input type='text' name='{$fields.phone_work.name}' id='{$fields.phone_work.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
<td valign="top" id='phone_mobile_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MOBILE_PHONE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.phone_mobile.value) <= 0}
{assign var="value" value=$fields.phone_mobile.default_value }
{else}
{assign var="value" value=$fields.phone_mobile.value }
{/if}  
<input type='text' name='{$fields.phone_mobile.name}' id='{$fields.phone_mobile.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='primary_address_street_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_STREET' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_street.value) <= 0}
{assign var="value" value=$fields.primary_address_street.default_value }
{else}
{assign var="value" value=$fields.primary_address_street.value }
{/if}  
<input type='text' name='{$fields.primary_address_street.name}' 
id='{$fields.primary_address_street.name}' size='30' 
maxlength='150' 
value='{$value}' title=''      >
<td valign="top" id='alt_address_street_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_STREET' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_street.value) <= 0}
{assign var="value" value=$fields.alt_address_street.default_value }
{else}
{assign var="value" value=$fields.alt_address_street.value }
{/if}  
<input type='text' name='{$fields.alt_address_street.name}' 
id='{$fields.alt_address_street.name}' size='30' 
maxlength='150' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='primary_address_city_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_CITY' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_city.value) <= 0}
{assign var="value" value=$fields.primary_address_city.default_value }
{else}
{assign var="value" value=$fields.primary_address_city.value }
{/if}  
<input type='text' name='{$fields.primary_address_city.name}' 
id='{$fields.primary_address_city.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
<td valign="top" id='alt_address_city_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_CITY' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_city.value) <= 0}
{assign var="value" value=$fields.alt_address_city.default_value }
{else}
{assign var="value" value=$fields.alt_address_city.value }
{/if}  
<input type='text' name='{$fields.alt_address_city.name}' 
id='{$fields.alt_address_city.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='primary_address_state_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_STATE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_state.value) <= 0}
{assign var="value" value=$fields.primary_address_state.default_value }
{else}
{assign var="value" value=$fields.primary_address_state.value }
{/if}  
<input type='text' name='{$fields.primary_address_state.name}' 
id='{$fields.primary_address_state.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
<td valign="top" id='alt_address_state_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_STATE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_state.value) <= 0}
{assign var="value" value=$fields.alt_address_state.default_value }
{else}
{assign var="value" value=$fields.alt_address_state.value }
{/if}  
<input type='text' name='{$fields.alt_address_state.name}' 
id='{$fields.alt_address_state.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='primary_address_postalcode_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_POSTALCODE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_postalcode.value) <= 0}
{assign var="value" value=$fields.primary_address_postalcode.default_value }
{else}
{assign var="value" value=$fields.primary_address_postalcode.value }
{/if}  
<input type='text' name='{$fields.primary_address_postalcode.name}' 
id='{$fields.primary_address_postalcode.name}' size='30' 
maxlength='20' 
value='{$value}' title=''      >
<td valign="top" id='alt_address_postalcode_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_POSTALCODE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_postalcode.value) <= 0}
{assign var="value" value=$fields.alt_address_postalcode.default_value }
{else}
{assign var="value" value=$fields.alt_address_postalcode.value }
{/if}  
<input type='text' name='{$fields.alt_address_postalcode.name}' 
id='{$fields.alt_address_postalcode.name}' size='30' 
maxlength='20' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='primary_address_country_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_COUNTRY' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_country.value) <= 0}
{assign var="value" value=$fields.primary_address_country.default_value }
{else}
{assign var="value" value=$fields.primary_address_country.value }
{/if}  
<input type='text' name='{$fields.primary_address_country.name}' 
id='{$fields.primary_address_country.name}' size='30' 
value='{$value}' title=''      >
<td valign="top" id='alt_address_country_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_COUNTRY' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_country.value) <= 0}
{assign var="value" value=$fields.alt_address_country.default_value }
{else}
{assign var="value" value=$fields.alt_address_country.value }
{/if}  
<input type='text' name='{$fields.alt_address_country.name}' 
id='{$fields.alt_address_country.name}' size='30' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='department_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DEPARTMENT' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.department.value) <= 0}
{assign var="value" value=$fields.department.default_value }
{else}
{assign var="value" value=$fields.department.value }
{/if}  
<input type='text' name='{$fields.department.name}' 
id='{$fields.department.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
<td valign="top" id='phone_other_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_PHONE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.phone_other.value) <= 0}
{assign var="value" value=$fields.phone_other.default_value }
{else}
{assign var="value" value=$fields.phone_other.value }
{/if}  
<input type='text' name='{$fields.phone_other.name}' id='{$fields.phone_other.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='business_potential_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_BUSINESS_POTENTIAL' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.business_potential.name}" 
id="{$fields.business_potential.name}" 
title=''       
>
{if isset($fields.business_potential.value) && $fields.business_potential.value != ''}
{html_options options=$fields.business_potential.options selected=$fields.business_potential.value}
{else}
{html_options options=$fields.business_potential.options selected=$fields.business_potential.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.business_potential.options }
{capture name="field_val"}{$fields.business_potential.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.business_potential.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.business_potential.name}" 
id="{$fields.business_potential.name}" 
title=''          
>
{if isset($fields.business_potential.value) && $fields.business_potential.value != ''}
{html_options options=$fields.business_potential.options selected=$fields.business_potential.value}
{else}
{html_options options=$fields.business_potential.options selected=$fields.business_potential.default}
{/if}
</select>
<input
id="{$fields.business_potential.name}-input"
name="{$fields.business_potential.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.business_potential.name}-image"></button><button type="button"
id="btn-clear-{$fields.business_potential.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.business_potential.name}-input', '{$fields.business_potential.name}');sync_{$fields.business_potential.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.business_potential.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.business_potential.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.business_potential.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.business_potential.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.business_potential.name}{literal}");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.business_potential.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.business_potential.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.business_potential.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.business_potential.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.business_potential.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
<td valign="top" id='phone_fax_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FAX_PHONE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.phone_fax.value) <= 0}
{assign var="value" value=$fields.phone_fax.default_value }
{else}
{assign var="value" value=$fields.phone_fax.value }
{/if}  
<input type='text' name='{$fields.phone_fax.name}' id='{$fields.phone_fax.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='email1_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL_ADDRESS' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}</span>
<td valign="top" id='description_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if empty($fields.description.value)}
{assign var="value" value=$fields.description.default_value }
{else}
{assign var="value" value=$fields.description.value }
{/if}  
<textarea  id='{$fields.description.name}' name='{$fields.description.name}'
rows="6" 
cols="80" 
title='' tabindex="0" 
 >{$value}</textarea>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='arch_architectural_firm_arch_architects_contacts_1_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

<input type="text" name="{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}" size="" value="{$fields.arch_architectural_firm_arch_architects_contacts_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.arch_architectural_firm_arch_architects_contacts_1_name.id_name}" 
id="{$fields.arch_architectural_firm_arch_architects_contacts_1_name.id_name}" 
value="{$fields.arch_archieaacal_firm_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}" id="btn_{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.arch_architectural_firm_arch_architects_contacts_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"form_SubpanelQuickCreate_Arch_Architects_Contacts","field_to_name_array":{"id":"arch_archieaacal_firm_ida","name":"arch_architectural_firm_arch_architects_contacts_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}" id="btn_clr_{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}', '{$fields.arch_architectural_firm_arch_architects_contacts_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.arch_architectural_firm_arch_architects_contacts_1_name.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_CONTACT_INFORMATION").style.display='none';</script>
{/if}
</div>    <div id='tabcontent1'>
<div id="detailpanel_2" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_ADDRESS_INFORMATION'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='archi_type_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ARCHI_TYPE' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.archi_type.name}" 
id="{$fields.archi_type.name}" 
title=''       
>
{if isset($fields.archi_type.value) && $fields.archi_type.value != ''}
{html_options options=$fields.archi_type.options selected=$fields.archi_type.value}
{else}
{html_options options=$fields.archi_type.options selected=$fields.archi_type.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.archi_type.options }
{capture name="field_val"}{$fields.archi_type.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.archi_type.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.archi_type.name}" 
id="{$fields.archi_type.name}" 
title=''          
>
{if isset($fields.archi_type.value) && $fields.archi_type.value != ''}
{html_options options=$fields.archi_type.options selected=$fields.archi_type.value}
{else}
{html_options options=$fields.archi_type.options selected=$fields.archi_type.default}
{/if}
</select>
<input
id="{$fields.archi_type.name}-input"
name="{$fields.archi_type.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.archi_type.name}-image"></button><button type="button"
id="btn-clear-{$fields.archi_type.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.archi_type.name}-input', '{$fields.archi_type.name}');sync_{$fields.archi_type.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.archi_type.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.archi_type.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.archi_type.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.archi_type.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.archi_type.name}{literal}");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.archi_type.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.archi_type.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.archi_type.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.archi_type.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.archi_type.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='educational_institutional_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EDUCATIONAL_INSTITUTIONAL' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.educational_institutional.value) == "1" || strval($fields.educational_institutional.value) == "yes" || strval($fields.educational_institutional.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.educational_institutional.name}" value="0"> 
<input type="checkbox" id="{$fields.educational_institutional.name}" 
name="{$fields.educational_institutional.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='pharmaceutical_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PHARMACEUTICAL' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.pharmaceutical.value) == "1" || strval($fields.pharmaceutical.value) == "yes" || strval($fields.pharmaceutical.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.pharmaceutical.name}" value="0"> 
<input type="checkbox" id="{$fields.pharmaceutical.name}" 
name="{$fields.pharmaceutical.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='residential_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_RESIDENTIAL' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.residential.value) == "1" || strval($fields.residential.value) == "yes" || strval($fields.residential.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.residential.name}" value="0"> 
<input type="checkbox" id="{$fields.residential.name}" 
name="{$fields.residential.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='hospital_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_HOSPITAL' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.hospital.value) == "1" || strval($fields.hospital.value) == "yes" || strval($fields.hospital.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.hospital.name}" value="0"> 
<input type="checkbox" id="{$fields.hospital.name}" 
name="{$fields.hospital.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='hotels_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_HOTELS' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.hotels.value) == "1" || strval($fields.hotels.value) == "yes" || strval($fields.hotels.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.hotels.name}" value="0"> 
<input type="checkbox" id="{$fields.hotels.name}" 
name="{$fields.hotels.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='sports_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SPORTS' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.sports.value) == "1" || strval($fields.sports.value) == "yes" || strval($fields.sports.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.sports.name}" value="0"> 
<input type="checkbox" id="{$fields.sports.name}" 
name="{$fields.sports.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='retail_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_RETAIL' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.retail.value) == "1" || strval($fields.retail.value) == "yes" || strval($fields.retail.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.retail.name}" value="0"> 
<input type="checkbox" id="{$fields.retail.name}" 
name="{$fields.retail.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='others_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHERS' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.others.value) == "1" || strval($fields.others.value) == "yes" || strval($fields.others.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.others.name}" value="0"> 
<input type="checkbox" id="{$fields.others.name}" 
name="{$fields.others.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='Arch_Architects_Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

<input type="text" name="{$fields.assigned_user_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.assigned_user_name.name}" size="" value="{$fields.assigned_user_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.assigned_user_name.id_name}" 
id="{$fields.assigned_user_name.id_name}" 
value="{$fields.assigned_user_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.assigned_user_name.name}" id="btn_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}"
onclick='open_popup(
"{$fields.assigned_user_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"form_SubpanelQuickCreate_Arch_Architects_Contacts","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.assigned_user_name.name}" id="btn_clr_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.assigned_user_name.name}', '{$fields.assigned_user_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.assigned_user_name.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_ADDRESS_INFORMATION").style.display='none';</script>
{/if}
</div></div>

<script language="javascript">
    var _form_id = '{$form_id}';
    {literal}
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == '') ? 'EditView' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    {/literal}
</script>
{assign var='place' value="_FOOTER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  class="button" onclick="var _form = document.getElementById('form_SubpanelQuickCreate_Arch_Architects_Contacts'); disableOnUnloadEditView(); _form.action.value='Save';if(check_form('form_SubpanelQuickCreate_Arch_Architects_Contacts'))SUGAR.subpanelUtils.inlineSave(_form.id, 'Arch_Architects_Contacts_subpanel_save_button');return false;" type="submit" name="Arch_Architects_Contacts_subpanel_save_button" id="Arch_Architects_Contacts_subpanel_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" >{/if}  <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate($(this).attr('id'));return false;" type="submit" name="Arch_Architects_Contacts_subpanel_cancel_button" id="Arch_Architects_Contacts_subpanel_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" >  <input title="{$APP.LBL_FULL_FORM_BUTTON_TITLE}" class="button" onclick="var _form = document.getElementById('form_SubpanelQuickCreate_Arch_Architects_Contacts'); disableOnUnloadEditView(_form); _form.return_action.value='DetailView'; _form.action.value='EditView'; if(typeof(_form.to_pdf)!='undefined') _form.to_pdf.value='0';" type="submit" name="Arch_Architects_Contacts_subpanel_full_form_button" id="Arch_Architects_Contacts_subpanel_full_form_button" value="{$APP.LBL_FULL_FORM_BUTTON_LABEL}"> <input type="hidden" name="full_form" value="full_form"> {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Arch_Architects_Contacts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>{sugar_getscript file="cache/include/javascript/sugar_grp_yui_widgets.js"}
<script type="text/javascript">
var form_SubpanelQuickCreate_Arch_Architects_Contacts_tabs = new YAHOO.widget.TabView("form_SubpanelQuickCreate_Arch_Architects_Contacts_tabs");
form_SubpanelQuickCreate_Arch_Architects_Contacts_tabs.selectTab(0);
</script>
<script type="text/javascript">
YAHOO.util.Event.onContentReady("form_SubpanelQuickCreate_Arch_Architects_Contacts",
    function () {ldelim} initEditView(document.forms.form_SubpanelQuickCreate_Arch_Architects_Contacts) {rdelim});
//window.setTimeout(, 100);
window.onbeforeunload = function () {ldelim} return onUnloadEditView(); {rdelim};
// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {ldelim}
$(document).ready(function() {ldelim}
    $(".collapseLink,.expandLink").click(function (e) {ldelim} e.preventDefault(); {rdelim});
  {rdelim});
{rdelim}
</script>{literal}
<script type="text/javascript">
addForm('form_SubpanelQuickCreate_Arch_Architects_Contacts');addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'name', 'name', false,'{/literal}{sugar_translate label='LBL_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'salutation', 'enum', false,'{/literal}{sugar_translate label='LBL_SALUTATION' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'first_name', 'varchar', true,'{/literal}{sugar_translate label='LBL_FIRST_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'last_name', 'varchar', true,'{/literal}{sugar_translate label='LBL_LAST_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'full_name', 'fullname', false,'{/literal}{sugar_translate label='LBL_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'title', 'varchar', false,'{/literal}{sugar_translate label='LBL_TITLE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'photo', 'image', false,'{/literal}{sugar_translate label='LBL_PHOTO' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'department', 'varchar', false,'{/literal}{sugar_translate label='LBL_DEPARTMENT' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'do_not_call', 'bool', false,'{/literal}{sugar_translate label='LBL_DO_NOT_CALL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'phone_home', 'phone', false,'{/literal}{sugar_translate label='LBL_HOME_PHONE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'email', 'email', false,'{/literal}{sugar_translate label='LBL_ANY_EMAIL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'phone_mobile', 'phone', true,'{/literal}{sugar_translate label='LBL_MOBILE_PHONE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'phone_work', 'phone', false,'{/literal}{sugar_translate label='LBL_OFFICE_PHONE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'phone_other', 'phone', false,'{/literal}{sugar_translate label='LBL_OTHER_PHONE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'phone_fax', 'phone', false,'{/literal}{sugar_translate label='LBL_FAX_PHONE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'email1', 'varchar', true,'{/literal}{sugar_translate label='LBL_EMAIL_ADDRESS' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'email2', 'varchar', false,'{/literal}{sugar_translate label='LBL_OTHER_EMAIL_ADDRESS' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'invalid_email', 'bool', false,'{/literal}{sugar_translate label='LBL_INVALID_EMAIL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'email_opt_out', 'bool', false,'{/literal}{sugar_translate label='LBL_EMAIL_OPT_OUT' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'primary_address_street', 'varchar', true,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STREET' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'primary_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STREET_2' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'primary_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STREET_3' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'primary_address_city', 'varchar', true,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_CITY' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'primary_address_state', 'varchar', true,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STATE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'primary_address_postalcode', 'varchar', true,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_POSTALCODE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'primary_address_country', 'varchar', true,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_COUNTRY' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'alt_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STREET' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'alt_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STREET_2' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'alt_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STREET_3' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'alt_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_CITY' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'alt_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STATE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'alt_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_POSTALCODE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'alt_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_COUNTRY' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'assistant', 'varchar', false,'{/literal}{sugar_translate label='LBL_ASSISTANT' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'assistant_phone', 'phone', false,'{/literal}{sugar_translate label='LBL_ASSISTANT_PHONE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'email_addresses_non_primary', 'email', false,'{/literal}{sugar_translate label='LBL_EMAIL_NON_PRIMARY' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'archi_type', 'enum', true,'{/literal}{sugar_translate label='LBL_ARCHI_TYPE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'business_potential', 'enum', true,'{/literal}{sugar_translate label='LBL_BUSINESS_POTENTIAL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'educational_institutional', 'bool', false,'{/literal}{sugar_translate label='LBL_EDUCATIONAL_INSTITUTIONAL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'pharmaceutical', 'bool', false,'{/literal}{sugar_translate label='LBL_PHARMACEUTICAL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'hotels', 'bool', false,'{/literal}{sugar_translate label='LBL_HOTELS' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'sports', 'bool', false,'{/literal}{sugar_translate label='LBL_SPORTS' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'residential', 'bool', false,'{/literal}{sugar_translate label='LBL_RESIDENTIAL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'hospital', 'bool', false,'{/literal}{sugar_translate label='LBL_HOSPITAL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'retail', 'bool', false,'{/literal}{sugar_translate label='LBL_RETAIL' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'others', 'bool', false,'{/literal}{sugar_translate label='LBL_OTHERS' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'arch_architectural_firm_arch_architects_contacts_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'last_contacted_date_c_date', 'date', false,'Last Contacted Date' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'architectural_firm_name_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ARCHITECTURAL_FIRM_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidate('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'full_name_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_FULL_NAME' module='Arch_Architects_Contacts' for_js=true}{literal}' );
addToValidateBinaryDependency('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Arch_Architects_Contacts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='Arch_Architects_Contacts' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('form_SubpanelQuickCreate_Arch_Architects_Contacts', 'arch_architectural_firm_arch_architects_contacts_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Arch_Architects_Contacts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE' module='Arch_Architects_Contacts' for_js=true}{literal}', 'arch_archieaacal_firm_ida' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['form_SubpanelQuickCreate_Arch_Architects_Contacts_arch_architectural_firm_arch_architects_contacts_1_name']={"form":"form_SubpanelQuickCreate_Arch_Architects_Contacts","method":"query","modules":["Arch_Architectural_Firm"],"group":"or","field_list":["name","id"],"populate_list":["arch_architectural_firm_arch_architects_contacts_1_name","arch_archieaacal_firm_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['form_SubpanelQuickCreate_Arch_Architects_Contacts_assigned_user_name']={"form":"form_SubpanelQuickCreate_Arch_Architects_Contacts","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>{/literal}
