
<style>
{literal}
#dialog
{
display:none;
}
i
{
display:none;
}
b
{
font-weight:normal;
}
.show_primary_email span table tbody tr:not(:first-child) {
display:none;
}
input[value="Copy..."] { display: none !important; }​
{/literal}
</style>
<script >
{literal}
$(document).ready(function () {
  $(".dataField").css("display","none");
	$('#Activities_createtask_button').attr('data-toggle', 'modal');
	$('#Activities_createtask_button').attr('data-target', '#myModalcustom_popup');
	$('#activities_createtask_button').attr('data-toggle', 'modal');
	$('#activities_createtask_button').attr('data-target', '#myModalcustom_popup');
	

	$('#Activities_schedulemeeting_button').attr('data-toggle', 'modal');
	$('#Activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');
	$('#activities_schedulemeeting_button').attr('data-toggle', 'modal');
	$('#activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');

	$('#Activities_logcall_button').attr('data-toggle', 'modal');
	$('#Activities_logcall_button').attr('data-target', '#myModalcustom_popup');
	$('#activities_logcall_button').attr('data-toggle', 'modal');
	$('#activities_logcall_button').attr('data-target', '#myModalcustom_popup');

	$('#History_createnoteorattachment_button').attr('data-toggle', 'modal');
	$('#History_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');
	$('#history_createnoteorattachment_button').attr('data-toggle', 'modal');
	$('#history_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');	

 
/*     
$( ".custom-noBullet" ).click(function() {
$("#"+this.id+" .change_color_dashlets span[id*='show_link_'] .utilsLink").trigger("click");
});
*/
 

var right=$(".custom-right-panel").height();
var left=$(".custom-left-panel").height();
if(left>=right)
{
$(".custom-left-panel").css("border-right","1px solid #d9dada");
}else
{
$(".custom-right-panel").css("border-left","1px solid #d9dada");
}

$(".custom-yui-nav li, .righttab").click(function(){
var right=$(".custom-right-panel").height();
var left=$(".custom-left-panel").height();
if(left>=right)
{
$(".custom-left-panel").css("border-right","1px solid #d9dada");
}else
{
$(".custom-right-panel").css("border-left","1px solid #d9dada");
}

})


if($('.custom-right-panel').length=="0")      
{
	$('.custom-left-panel').removeClass('col-sm-7');
	$('.custom-left-panel').addClass('col-sm-12');
}


});





{/literal}
</script>

<script language="javascript">
{literal}
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
{/literal}
</script>
<td class="buttons" align="right" style="min-width:50%;padding-right: 60px !important;" NOWRAP >
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Products'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Products'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Products'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} </li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=quote_Products", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
{$ADMIN_EDIT}
{$PAGINATION}
</div>
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>
</div>
</td>
</tr>
</table>
</div>
{sugar_include include=$includes}
<div class="row" style="border:1px solid #d9dada; margin-top:5px" >
<div class="col-sm-7 custom-left-panel" style="padding:0px 0px 10px 0px">
<div id="quote_Products_detailview_tabs"
>
<div  style="min-height:350px">
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='DEFAULT' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="name" field="name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.availability_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AVAILABILITY' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="availability_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.availability_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.availability_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.availability_c.name}" value="{ $fields.availability_c.options }">
{ $fields.availability_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.availability_c.name}" value="{ $fields.availability_c.value }">
{ $fields.availability_c.options[$fields.availability_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.hsn_code_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HSN_CODE_C' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="varchar" field="hsn_code_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.hsn_code_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.hsn_code_c.value) <= 0}
{assign var="value" value=$fields.hsn_code_c.default_value }
{else}
{assign var="value" value=$fields.hsn_code_c.value }
{/if} 
<span class="sugar_field" id="{$fields.hsn_code_c.name}">{$fields.hsn_code_c.value}</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.sac_code_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SAC_CODE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="varchar" field="sac_code_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.sac_code_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.sac_code_c.value) <= 0}
{assign var="value" value=$fields.sac_code_c.default_value }
{else}
{assign var="value" value=$fields.sac_code_c.value }
{/if} 
<span class="sugar_field" id="{$fields.sac_code_c.name}">{$fields.sac_code_c.value}</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.quantity_box_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUANTITY_BOX' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="decimal" field="quantity_box_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.quantity_box_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quantity_box_c.name}">
{sugar_number_format var=$fields.quantity_box_c.value  }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.type_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="type_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.type_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.type_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.type_c.name}" value="{ $fields.type_c.options }">
{ $fields.type_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.type_c.name}" value="{ $fields.type_c.value }">
{ $fields.type_c.options[$fields.type_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.gst_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GST' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="varchar" field="gst_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.gst_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.gst_c.value) <= 0}
{assign var="value" value=$fields.gst_c.default_value }
{else}
{assign var="value" value=$fields.gst_c.value }
{/if} 
<span class="sugar_field" id="{$fields.gst_c.name}">{$fields.gst_c.value}</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.quote_product_category_quote_products_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="relate" field="quote_product_category_quote_products_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.quote_product_category_quote_products_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.quote_product_category_quote_productsquote_product_category_ida.value)}
{capture assign="detail_url"}index.php?module=quote_Product_Category&action=DetailView&record={$fields.quote_product_category_quote_productsquote_product_category_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="quote_product_category_quote_productsquote_product_category_ida" class="sugar_field" data-id-value="{$fields.quote_product_category_quote_productsquote_product_category_ida.value}">{$fields.quote_product_category_quote_products_name.value}</span>
{if !empty($fields.quote_product_category_quote_productsquote_product_category_ida.value)}</a>{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.tax_class_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TAX_CLASS' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="tax_class_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.tax_class_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.tax_class_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.tax_class_c.name}" value="{ $fields.tax_class_c.options }">
{ $fields.tax_class_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.tax_class_c.name}" value="{ $fields.tax_class_c.value }">
{ $fields.tax_class_c.options[$fields.tax_class_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.pricing_factor_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRICING_FACTOR' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="decimal" field="pricing_factor_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.pricing_factor_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.pricing_factor_c.name}">
{sugar_number_format var=$fields.pricing_factor_c.value precision=8 }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.vendor_part_number_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VENDOR_PART_NUMBER' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="varchar" field="vendor_part_number_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.vendor_part_number_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.vendor_part_number_c.value) <= 0}
{assign var="value" value=$fields.vendor_part_number_c.default_value }
{else}
{assign var="value" value=$fields.vendor_part_number_c.value }
{/if} 
<span class="sugar_field" id="{$fields.vendor_part_number_c.name}">{$fields.vendor_part_number_c.value}</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.unit_price_c.name}'>
{sugar_number_format var=$fields.unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.support_term_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUPPORT_TERM' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="support_term_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.support_term_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.support_term_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.support_term_c.name}" value="{ $fields.support_term_c.options }">
{ $fields.support_term_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.support_term_c.name}" value="{ $fields.support_term_c.value }">
{ $fields.support_term_c.options[$fields.support_term_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.prod_spec_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='Product Specifications' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="text" field="prod_spec_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.prod_spec_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.prod_spec_c.name|escape:'html'|url2html|nl2br}">{$fields.prod_spec_c.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.uom_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_UOM' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="uom_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.uom_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.uom_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.uom_c.name}" value="{ $fields.uom_c.options }">
{ $fields.uom_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.uom_c.name}" value="{ $fields.uom_c.value }">
{ $fields.uom_c.options[$fields.uom_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
{*<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
{*<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL2' module='quote_Products'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<div id='LBL_EDITVIEW_PANEL2' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.bangalore_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BANGALORE_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="bangalore_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.bangalore_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.bangalore_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.bangalore_branch_c.name}" value="{ $fields.bangalore_branch_c.options }">
{ $fields.bangalore_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.bangalore_branch_c.name}" value="{ $fields.bangalore_branch_c.value }">
{ $fields.bangalore_branch_c.options[$fields.bangalore_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.bangalore_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BANGALORE_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="bangalore_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.bangalore_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.bangalore_unit_price_c.name}'>
{sugar_number_format var=$fields.bangalore_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.chennai_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CHENNAI_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="chennai_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.chennai_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.chennai_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.chennai_branch_c.name}" value="{ $fields.chennai_branch_c.options }">
{ $fields.chennai_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.chennai_branch_c.name}" value="{ $fields.chennai_branch_c.value }">
{ $fields.chennai_branch_c.options[$fields.chennai_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.chennai_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CHENNAI_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="chennai_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.chennai_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.chennai_unit_price_c.name}'>
{sugar_number_format var=$fields.chennai_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.delhi_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DELHI_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="delhi_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.delhi_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.delhi_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.delhi_branch_c.name}" value="{ $fields.delhi_branch_c.options }">
{ $fields.delhi_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.delhi_branch_c.name}" value="{ $fields.delhi_branch_c.value }">
{ $fields.delhi_branch_c.options[$fields.delhi_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.delhi_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DELHI_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="delhi_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.delhi_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.delhi_unit_price_c.name}'>
{sugar_number_format var=$fields.delhi_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.goa_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GOA_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="goa_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.goa_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.goa_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.goa_branch_c.name}" value="{ $fields.goa_branch_c.options }">
{ $fields.goa_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.goa_branch_c.name}" value="{ $fields.goa_branch_c.value }">
{ $fields.goa_branch_c.options[$fields.goa_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.goa_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GOA_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="goa_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.goa_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.goa_unit_price_c.name}'>
{sugar_number_format var=$fields.goa_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.gujarat_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GUJARAT_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="gujarat_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.gujarat_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.gujarat_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.gujarat_branch_c.name}" value="{ $fields.gujarat_branch_c.options }">
{ $fields.gujarat_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.gujarat_branch_c.name}" value="{ $fields.gujarat_branch_c.value }">
{ $fields.gujarat_branch_c.options[$fields.gujarat_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.gujarat_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GUJARAT_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="gujarat_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.gujarat_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.gujarat_unit_price_c.name}'>
{sugar_number_format var=$fields.gujarat_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.gurgaon_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GURGAON_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="gurgaon_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.gurgaon_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.gurgaon_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.gurgaon_branch_c.name}" value="{ $fields.gurgaon_branch_c.options }">
{ $fields.gurgaon_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.gurgaon_branch_c.name}" value="{ $fields.gurgaon_branch_c.value }">
{ $fields.gurgaon_branch_c.options[$fields.gurgaon_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.haryana_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HARYANA_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="haryana_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.haryana_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.haryana_unit_price_c.name}'>
{sugar_number_format var=$fields.haryana_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.hyderabad_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HYDERABAD_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="hyderabad_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.hyderabad_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.hyderabad_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.hyderabad_branch_c.name}" value="{ $fields.hyderabad_branch_c.options }">
{ $fields.hyderabad_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.hyderabad_branch_c.name}" value="{ $fields.hyderabad_branch_c.value }">
{ $fields.hyderabad_branch_c.options[$fields.hyderabad_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.hyderabad_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HYDERABAD_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="hyderabad_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.hyderabad_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.hyderabad_unit_price_c.name}'>
{sugar_number_format var=$fields.hyderabad_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.kerala_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_KERALA_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="kerala_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.kerala_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.kerala_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.kerala_branch_c.name}" value="{ $fields.kerala_branch_c.options }">
{ $fields.kerala_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.kerala_branch_c.name}" value="{ $fields.kerala_branch_c.value }">
{ $fields.kerala_branch_c.options[$fields.kerala_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.kerala_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_KERALA_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="kerala_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.kerala_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.kerala_unit_price_c.name}'>
{sugar_number_format var=$fields.kerala_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.kolkata_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_KOLKATA_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="kolkata_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.kolkata_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.kolkata_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.kolkata_branch_c.name}" value="{ $fields.kolkata_branch_c.options }">
{ $fields.kolkata_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.kolkata_branch_c.name}" value="{ $fields.kolkata_branch_c.value }">
{ $fields.kolkata_branch_c.options[$fields.kolkata_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.kolkata_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_KOLKATA_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="kolkata_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.kolkata_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.kolkata_unit_price_c.name}'>
{sugar_number_format var=$fields.kolkata_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.noida_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NOIDA_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="noida_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.noida_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.noida_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.noida_branch_c.name}" value="{ $fields.noida_branch_c.options }">
{ $fields.noida_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.noida_branch_c.name}" value="{ $fields.noida_branch_c.value }">
{ $fields.noida_branch_c.options[$fields.noida_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.up_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_UP_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="up_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.up_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.up_unit_price_c.name}'>
{sugar_number_format var=$fields.up_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.mumbai_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MUMBAI_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="mumbai_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.mumbai_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.mumbai_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.mumbai_branch_c.name}" value="{ $fields.mumbai_branch_c.options }">
{ $fields.mumbai_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.mumbai_branch_c.name}" value="{ $fields.mumbai_branch_c.value }">
{ $fields.mumbai_branch_c.options[$fields.mumbai_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.mumbai_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MUMBAI_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="mumbai_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.mumbai_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.mumbai_unit_price_c.name}'>
{sugar_number_format var=$fields.mumbai_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.pune_branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PUNE_BRANCH' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="enum" field="pune_branch_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.pune_branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.pune_branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.pune_branch_c.name}" value="{ $fields.pune_branch_c.options }">
{ $fields.pune_branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.pune_branch_c.name}" value="{ $fields.pune_branch_c.value }">
{ $fields.pune_branch_c.options[$fields.pune_branch_c.value]}
{/if}
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.pune_unit_price_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PUNE_UNIT_PRICE' module='quote_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="inlineEdit" type="currency" field="pune_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.pune_unit_price_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.pune_unit_price_c.name}'>
{sugar_number_format var=$fields.pune_unit_price_c.value }
</span>
{/if}
<div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>			</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>
<!--
<button type="button" id="history_activities_modal_button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalcustom_popup">Open Large Modal</button>
-->
<div class="modal fade custom_dialog" id="myModalcustom_popup" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body table-responsive">
<div id="subpanel_activities"></div>
<!--                     <input title="Cancel" class="subpanel_cancel_button_custom" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate($(this).attr(\'id\'));return false;" type="submit" name="' . $params['module'] . '_subpanel_cancel_button" id="' . $params['module'] . '_subpanel_cancel_button" value="Cancel" data-dismiss="modal">
-->  
</div>
</div>
</div>
</div>
<div class="modal fade custom_dialog" id="myModalcustom_popup_history" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body table-responsive">
<div id="subpanel_history"></div>
</div>
</div>
</div>
</div>