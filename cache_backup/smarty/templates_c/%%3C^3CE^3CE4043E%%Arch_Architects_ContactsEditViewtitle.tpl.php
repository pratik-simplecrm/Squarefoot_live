<?php /* Smarty version 2.6.11, created on 2017-12-11 16:12:52
         compiled from cache/include/InlineEditing/Arch_Architects_ContactsEditViewtitle.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['title']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['title']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['title']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['title']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['title']['name']; ?>
' size='30' 
    maxlength='100' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >