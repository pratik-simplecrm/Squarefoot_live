<?php /* Smarty version 2.6.11, created on 2017-08-19 12:31:49
         compiled from cache/include/InlineEditing/OpportunitiesEditViewnext_step.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['next_step']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['next_step']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['next_step']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['next_step']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['next_step']['name']; ?>
' size='30' 
    maxlength='100' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >