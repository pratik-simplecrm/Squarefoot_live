<?php /* Smarty version 2.6.11, created on 2017-11-27 13:31:35
         compiled from cache/include/InlineEditing/quote_QuoteEditViewcustom_quote_num_c.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['custom_quote_num_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['custom_quote_num_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['custom_quote_num_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['custom_quote_num_c']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['custom_quote_num_c']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >