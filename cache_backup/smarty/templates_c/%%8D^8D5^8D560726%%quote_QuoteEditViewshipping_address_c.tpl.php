<?php /* Smarty version 2.6.11, created on 2017-09-13 12:22:18
         compiled from cache/include/InlineEditing/quote_QuoteEditViewshipping_address_c.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['shipping_address_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['shipping_address_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['shipping_address_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['shipping_address_c']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['shipping_address_c']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >