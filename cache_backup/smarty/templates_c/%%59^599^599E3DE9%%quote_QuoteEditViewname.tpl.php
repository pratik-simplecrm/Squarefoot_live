<?php /* Smarty version 2.6.11, created on 2017-10-25 16:47:45
         compiled from cache/include/InlineEditing/quote_QuoteEditViewname.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='30' 
    maxlength='200' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >