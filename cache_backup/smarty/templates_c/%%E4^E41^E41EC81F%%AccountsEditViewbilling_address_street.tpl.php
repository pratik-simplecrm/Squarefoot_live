<?php /* Smarty version 2.6.11, created on 2017-09-09 13:02:21
         compiled from cache/include/InlineEditing/AccountsEditViewbilling_address_street.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['billing_address_street']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['billing_address_street']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['billing_address_street']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['billing_address_street']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['billing_address_street']['name']; ?>
' size='30' 
    maxlength='150' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >