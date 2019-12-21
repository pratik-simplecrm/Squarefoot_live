<?php /* Smarty version 2.6.11, created on 2017-12-15 11:18:43
         compiled from cache/modules/quote_Products/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/quote_Products/DetailView.tpl', 124, false),array('function', 'counter', 'cache/modules/quote_Products/DetailView.tpl', 131, false),array('function', 'sugar_translate', 'cache/modules/quote_Products/DetailView.tpl', 141, false),array('function', 'sugar_getimage', 'cache/modules/quote_Products/DetailView.tpl', 156, false),array('function', 'sugar_number_format', 'cache/modules/quote_Products/DetailView.tpl', 279, false),array('function', 'sugar_ajax_url', 'cache/modules/quote_Products/DetailView.tpl', 368, false),array('modifier', 'strip_semicolon', 'cache/modules/quote_Products/DetailView.tpl', 142, false),array('modifier', 'escape', 'cache/modules/quote_Products/DetailView.tpl', 516, false),array('modifier', 'url2html', 'cache/modules/quote_Products/DetailView.tpl', 516, false),array('modifier', 'nl2br', 'cache/modules/quote_Products/DetailView.tpl', 516, false),)), $this); ?>

<style>
<?php echo '
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
'; ?>

</style>
<script >
<?php echo '
$(document).ready(function () {
  $(".dataField").css("display","none");
	$(\'#Activities_createtask_button\').attr(\'data-toggle\', \'modal\');
	$(\'#Activities_createtask_button\').attr(\'data-target\', \'#myModalcustom_popup\');
	$(\'#activities_createtask_button\').attr(\'data-toggle\', \'modal\');
	$(\'#activities_createtask_button\').attr(\'data-target\', \'#myModalcustom_popup\');
	

	$(\'#Activities_schedulemeeting_button\').attr(\'data-toggle\', \'modal\');
	$(\'#Activities_schedulemeeting_button\').attr(\'data-target\', \'#myModalcustom_popup\');
	$(\'#activities_schedulemeeting_button\').attr(\'data-toggle\', \'modal\');
	$(\'#activities_schedulemeeting_button\').attr(\'data-target\', \'#myModalcustom_popup\');

	$(\'#Activities_logcall_button\').attr(\'data-toggle\', \'modal\');
	$(\'#Activities_logcall_button\').attr(\'data-target\', \'#myModalcustom_popup\');
	$(\'#activities_logcall_button\').attr(\'data-toggle\', \'modal\');
	$(\'#activities_logcall_button\').attr(\'data-target\', \'#myModalcustom_popup\');

	$(\'#History_createnoteorattachment_button\').attr(\'data-toggle\', \'modal\');
	$(\'#History_createnoteorattachment_button\').attr(\'data-target\', \'#myModalcustom_popup_history\');
	$(\'#history_createnoteorattachment_button\').attr(\'data-toggle\', \'modal\');
	$(\'#history_createnoteorattachment_button\').attr(\'data-target\', \'#myModalcustom_popup_history\');	

 
/*     
$( ".custom-noBullet" ).click(function() {
$("#"+this.id+" .change_color_dashlets span[id*=\'show_link_\'] .utilsLink").trigger("click");
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


if($(\'.custom-right-panel\').length=="0")      
{
	$(\'.custom-left-panel\').removeClass(\'col-sm-7\');
	$(\'.custom-left-panel\').addClass(\'col-sm-12\');
}


});





'; ?>

</script>

<script language="javascript">
<?php echo '
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
'; ?>

</script>
<td class="buttons" align="right" style="min-width:50%;padding-right: 60px !important;" NOWRAP >
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" ><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Products'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?> <ul id class="subnav" ><li><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Products'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_LABEL']; ?>
" id="duplicate_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Products'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=quote_Products", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?></li></ul></li></ul>
<?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</div>
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>
</div>
</td>
</tr>
</table>
</div>
<?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div class="row" style="border:1px solid #d9dada; margin-top:5px" >
<div class="col-sm-7 custom-left-panel" style="padding:0px 0px 10px 0px">
<div id="quote_Products_detailview_tabs"
>
<div  style="min-height:350px">
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='DEFAULT' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="name" field="name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['availability_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_AVAILABILITY','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="availability_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['availability_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['availability_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['availability_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['availability_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['availability_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['availability_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['availability_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['availability_c']['options'][$this->_tpl_vars['fields']['availability_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['hsn_code_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_HSN_CODE_C','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="varchar" field="hsn_code_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['hsn_code_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['hsn_code_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['hsn_code_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['hsn_code_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['hsn_code_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['hsn_code_c']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['sac_code_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SAC_CODE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="varchar" field="sac_code_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['sac_code_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['sac_code_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['sac_code_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['sac_code_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['sac_code_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['sac_code_c']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['quantity_box_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUANTITY_BOX','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="decimal" field="quantity_box_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['quantity_box_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['quantity_box_c']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['quantity_box_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['type_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="type_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['type_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['type_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['type_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['type_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['type_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['type_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['type_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['type_c']['options'][$this->_tpl_vars['fields']['type_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['gst_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GST','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="varchar" field="gst_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['gst_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['gst_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['gst_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['gst_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['gst_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['gst_c']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['quote_product_category_quote_products_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="relate" field="quote_product_category_quote_products_name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['quote_product_category_quote_products_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['quote_product_category_quote_productsquote_product_category_ida']['value'] )):  ob_start(); ?>index.php?module=quote_Product_Category&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['quote_product_category_quote_productsquote_product_category_ida']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="quote_product_category_quote_productsquote_product_category_ida" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['quote_product_category_quote_productsquote_product_category_ida']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['quote_product_category_quote_products_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['quote_product_category_quote_productsquote_product_category_ida']['value'] )): ?></a><?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['tax_class_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TAX_CLASS','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="tax_class_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['tax_class_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['tax_class_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['tax_class_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['tax_class_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['tax_class_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['tax_class_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['tax_class_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['tax_class_c']['options'][$this->_tpl_vars['fields']['tax_class_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['pricing_factor_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PRICING_FACTOR','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="decimal" field="pricing_factor_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['pricing_factor_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['pricing_factor_c']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['pricing_factor_c']['value'],'precision' => 8), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['vendor_part_number_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_VENDOR_PART_NUMBER','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="varchar" field="vendor_part_number_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['vendor_part_number_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['vendor_part_number_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['vendor_part_number_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['vendor_part_number_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['vendor_part_number_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['vendor_part_number_c']['value']; ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['support_term_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SUPPORT_TERM','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="support_term_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['support_term_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['support_term_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['support_term_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['support_term_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['support_term_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['support_term_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['support_term_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['support_term_c']['options'][$this->_tpl_vars['fields']['support_term_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['prod_spec_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'Product Specifications','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="text" field="prod_spec_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['prod_spec_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['prod_spec_c']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['prod_spec_c']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['uom_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_UOM','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="uom_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['uom_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['uom_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['uom_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['uom_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['uom_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['uom_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['uom_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['uom_c']['options'][$this->_tpl_vars['fields']['uom_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("DEFAULT").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel_2' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EDITVIEW_PANEL2','module' => 'quote_Products'), $this);?>

<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<div id='LBL_EDITVIEW_PANEL2' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['bangalore_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BANGALORE_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="bangalore_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['bangalore_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['bangalore_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['bangalore_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['bangalore_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['bangalore_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['bangalore_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['bangalore_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['bangalore_branch_c']['options'][$this->_tpl_vars['fields']['bangalore_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['bangalore_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BANGALORE_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="bangalore_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['bangalore_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['bangalore_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['bangalore_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['chennai_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CHENNAI_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="chennai_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['chennai_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['chennai_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['chennai_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['chennai_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['chennai_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['chennai_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['chennai_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['chennai_branch_c']['options'][$this->_tpl_vars['fields']['chennai_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['chennai_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CHENNAI_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="chennai_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['chennai_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['chennai_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['chennai_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['delhi_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DELHI_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="delhi_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['delhi_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['delhi_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['delhi_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['delhi_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['delhi_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['delhi_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['delhi_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['delhi_branch_c']['options'][$this->_tpl_vars['fields']['delhi_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['delhi_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DELHI_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="delhi_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['delhi_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['delhi_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['delhi_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['goa_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GOA_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="goa_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['goa_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['goa_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['goa_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['goa_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['goa_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['goa_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['goa_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['goa_branch_c']['options'][$this->_tpl_vars['fields']['goa_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['goa_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GOA_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="goa_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['goa_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['goa_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['goa_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['gujarat_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GUJARAT_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="gujarat_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['gujarat_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['gujarat_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['gujarat_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['gujarat_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['gujarat_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['gujarat_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['gujarat_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['gujarat_branch_c']['options'][$this->_tpl_vars['fields']['gujarat_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['gujarat_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GUJARAT_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="gujarat_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['gujarat_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['gujarat_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['gujarat_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['gurgaon_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GURGAON_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="gurgaon_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['gurgaon_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['gurgaon_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['gurgaon_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['gurgaon_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['gurgaon_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['gurgaon_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['gurgaon_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['gurgaon_branch_c']['options'][$this->_tpl_vars['fields']['gurgaon_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['haryana_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_HARYANA_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="haryana_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['haryana_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['haryana_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['haryana_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['hyderabad_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_HYDERABAD_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="hyderabad_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['hyderabad_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['hyderabad_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['hyderabad_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['hyderabad_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['hyderabad_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['hyderabad_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['hyderabad_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['hyderabad_branch_c']['options'][$this->_tpl_vars['fields']['hyderabad_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['hyderabad_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_HYDERABAD_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="hyderabad_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['hyderabad_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['hyderabad_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['hyderabad_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['kerala_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_KERALA_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="kerala_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['kerala_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['kerala_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['kerala_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['kerala_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['kerala_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['kerala_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['kerala_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['kerala_branch_c']['options'][$this->_tpl_vars['fields']['kerala_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['kerala_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_KERALA_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="kerala_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['kerala_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['kerala_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['kerala_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['kolkata_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_KOLKATA_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="kolkata_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['kolkata_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['kolkata_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['kolkata_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['kolkata_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['kolkata_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['kolkata_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['kolkata_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['kolkata_branch_c']['options'][$this->_tpl_vars['fields']['kolkata_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['kolkata_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_KOLKATA_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="kolkata_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['kolkata_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['kolkata_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['kolkata_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['noida_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NOIDA_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="noida_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['noida_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['noida_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['noida_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['noida_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['noida_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['noida_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['noida_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['noida_branch_c']['options'][$this->_tpl_vars['fields']['noida_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['up_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_UP_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="up_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['up_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['up_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['up_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['mumbai_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MUMBAI_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="mumbai_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['mumbai_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['mumbai_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['mumbai_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['mumbai_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['mumbai_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['mumbai_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['mumbai_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['mumbai_branch_c']['options'][$this->_tpl_vars['fields']['mumbai_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['mumbai_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MUMBAI_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="mumbai_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['mumbai_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['mumbai_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['mumbai_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['pune_branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PUNE_BRANCH','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="pune_branch_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['pune_branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['pune_branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['pune_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['pune_branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['pune_branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['pune_branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['pune_branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['pune_branch_c']['options'][$this->_tpl_vars['fields']['pune_branch_c']['value']]; ?>

<?php endif;  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['pune_unit_price_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PUNE_UNIT_PRICE','module' => 'quote_Products'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="currency" field="pune_unit_price_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['pune_unit_price_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['pune_unit_price_c']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['pune_unit_price_c']['value']), $this);?>

</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(2, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
<?php endif; ?>
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
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