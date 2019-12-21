<?php /* Smarty version 2.6.11, created on 2017-09-06 17:33:59
         compiled from cache/include/InlineEditing/Arch_Architectural_FirmEditViewresidential.tpl */ ?>

<?php if (strval ( $this->_tpl_vars['fields']['residential']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['residential']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['residential']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED');  else:  $this->assign('checked', "");  endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['residential']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['residential']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['residential']['name']; ?>
" 
value="1" title='' tabindex="1" <?php echo $this->_tpl_vars['checked']; ?>
 >