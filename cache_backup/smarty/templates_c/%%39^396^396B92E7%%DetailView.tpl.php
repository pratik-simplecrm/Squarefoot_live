<?php /* Smarty version 2.6.11, created on 2017-12-15 11:41:28
         compiled from cache/modules/Meetings/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/Meetings/DetailView.tpl', 133, false),array('function', 'counter', 'cache/modules/Meetings/DetailView.tpl', 140, false),array('function', 'sugar_translate', 'cache/modules/Meetings/DetailView.tpl', 150, false),array('function', 'sugar_getimage', 'cache/modules/Meetings/DetailView.tpl', 179, false),array('modifier', 'strip_semicolon', 'cache/modules/Meetings/DetailView.tpl', 165, false),array('modifier', 'escape', 'cache/modules/Meetings/DetailView.tpl', 341, false),array('modifier', 'url2html', 'cache/modules/Meetings/DetailView.tpl', 341, false),array('modifier', 'nl2br', 'cache/modules/Meetings/DetailView.tpl', 341, false),)), $this); ?>

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

<?php if ($this->_tpl_vars['fields']['recurring_source']['value'] != '' && $this->_tpl_vars['fields']['recurring_source']['value'] != 'Sugar'): ?>
<div class="clear"></div>
<div class="error"><?php echo $this->_tpl_vars['MOD']['LBL_SYNCED_RECURRING_MSG']; ?>
</div>
<?php endif; ?>

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
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Meetings'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?> <ul id class="subnav" ><li><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Meetings'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_LABEL']; ?>
" id="duplicate_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Meetings'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['fields']['status']['value'] != 'Held' && $this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_TITLE']; ?>
" name="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_TITLE']; ?>
" class="button" id="close_create_button" onclick="var _form = document.getElementById('formDetailView');_form.isSaveFromDetailView.value=true; _form.status.value='Held'; _form.action.value='Save';_form.return_module.value='Meetings';_form.isDuplicate.value=true;_form.isSaveAndNew.value=true;_form.return_action.value='EditView'; _form.isDuplicate.value=true;_form.return_id.value='<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
';_form.submit();" type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_TITLE']; ?>
"/><?php endif; ?></li><li><?php if ($this->_tpl_vars['fields']['status']['value'] != 'Held' && $this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_BUTTON_TITLE']; ?>
" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView');_form.status.value='Held'; _form.action.value='Save';_form.return_module.value='Meetings';_form.isSave.value=true;_form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
';_form.submit();" name="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_BUTTON_TITLE']; ?>
" id="close_button" type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_BUTTON_TITLE']; ?>
"/><?php endif; ?></li><li><?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Meetings", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
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
<input type="hidden" name="isSaveAndNew">
<input type="hidden" name="status">
<input type="hidden" name="isSaveFromDetailView">
<input type="hidden" name="isSave">
</form>
</div>
</td>
</tr>
</table>
</div>
<?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div class="row" style="border:1px solid #d9dada; margin-top:5px" >
<div class="col-sm-7 custom-left-panel" style="padding:0px 0px 10px 0px">
<div id="Meetings_detailview_tabs"
>
<div  style="min-height:350px">
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEETING_INFORMATION','module' => 'Meetings'), $this);?>

<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<div id='LBL_MEETING_INFORMATION' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
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
<?php if (! $this->_tpl_vars['fields']['status']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="status"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['status']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['status']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['status']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['status']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['status']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['status']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['status']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['status']['options'][$this->_tpl_vars['fields']['status']['value']]; ?>

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

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_start']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_TIME','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="datetimecombo" field="date_start"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_start']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['date_start']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['date_start']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['date_start']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['date_start']['value']; ?>
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
<?php if (! $this->_tpl_vars['fields']['duration']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DURATION','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="duration"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['duration']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="duration" class="sugar_field"><?php echo $this->_tpl_vars['fields']['duration_hours']['value'];  echo $this->_tpl_vars['MOD']['LBL_HOURS_ABBREV']; ?>
 <?php echo $this->_tpl_vars['fields']['duration_minutes']['value'];  echo $this->_tpl_vars['MOD']['LBL_MINSS_ABBREV']; ?>
 </span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['parent_name']['hidden']):  echo smarty_function_sugar_translate(array('label' => 'LBL_MODULE_NAME','module' => $this->_tpl_vars['fields']['parent_type']['value']), $this);?>

<?php endif; ?>
</span>
<div class="inlineEdit" type="parent" field="parent_name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['parent_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
">
<input type="hidden" class="sugar_field" id="parent_id" value="<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
">
<a href="index.php?module=<?php echo $this->_tpl_vars['fields']['parent_type']['value']; ?>
&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
" class="tabDetailViewDFLink"><?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
</a>
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
<?php if (! $this->_tpl_vars['fields']['reminder_time']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REMINDER','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="enum" field="reminder_time"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reminder_time']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="reminder_time" class="sugar_field"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Meetings/tpls/reminders.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['location']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_LOCATION','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="varchar" field="location"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['location']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['location']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['location']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['location']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['location']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['location']['value']; ?>
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
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="text" field="description"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['evmgr_evs_activities_meetings_name']['hidden']): ?>
&nbsp;
<?php endif; ?>
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['evmgr_evs_activities_meetings_name']['hidden']):  endif; ?>
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
<?php if (! $this->_tpl_vars['fields']['arch_architects_contacts_activities_1_meetings_name']['hidden']): ?>
&nbsp;
<?php endif; ?>
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['arch_architects_contacts_activities_1_meetings_name']['hidden']):  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['arch_architectural_firm_activities_1_meetings_name']['hidden']): ?>
&nbsp;
<?php endif; ?>
</span>
<div class="inlineEdit" type="" field=""    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['arch_architectural_firm_activities_1_meetings_name']['hidden']):  endif; ?>
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

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['quote_quote_activities_1_meetings_name']['hidden']): ?>
&nbsp;
<?php endif; ?>
</span>
<div class="inlineEdit" type="" field=""  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['quote_quote_activities_1_meetings_name']['hidden']):  endif; ?>
<div class="inlineEditIcon"> <?php echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this);?>
</div>			</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(1, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_MEETING_INFORMATION").style.display='none';</script>
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
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ASSIGNMENT','module' => 'Meetings'), $this);?>

<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<div id='LBL_PANEL_ASSIGNMENT' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="relate" field="assigned_user_name"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id="assigned_user_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
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
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetime" field="date_entered"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_entered" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_entered']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['created_by_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_MODIFIED','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetime" field="date_modified"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_modified" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_modified']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['modified_by_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reminders']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REMINDERS','module' => 'Meetings'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="inlineEdit" type="function" field="reminders"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reminders']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='reminders_span'>
<?php echo $this->_tpl_vars['fields']['reminders']['value']; ?>

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
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
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