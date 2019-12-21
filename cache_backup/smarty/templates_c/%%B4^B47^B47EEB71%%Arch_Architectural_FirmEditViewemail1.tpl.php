<?php /* Smarty version 2.6.11, created on 2017-08-25 17:24:16
         compiled from cache/include/InlineEditing/Arch_Architectural_FirmEditViewemail1.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['email1']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['email1']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['email1']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['email1']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['email1']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >