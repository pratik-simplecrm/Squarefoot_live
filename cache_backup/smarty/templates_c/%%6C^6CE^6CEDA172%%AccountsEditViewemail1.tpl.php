<?php /* Smarty version 2.6.11, created on 2017-10-09 16:36:02
         compiled from cache/include/InlineEditing/AccountsEditViewemail1.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['email1']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['email1']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['email1']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['email1']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['email1']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >