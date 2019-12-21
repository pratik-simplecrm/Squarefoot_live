<?php /* Smarty version 2.6.11, created on 2017-11-15 16:18:39
         compiled from cache/include/InlineEditing/quote_QuoteEditViewstructure_details_c.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'cache/include/InlineEditing/quote_QuoteEditViewstructure_details_c.tpl', 10, false),)), $this); ?>

<?php if (strlen ( $this->_tpl_vars['fields']['structure_details_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['structure_details_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['structure_details_c']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['structure_details_c']['name']; ?>
'
id='<?php echo $this->_tpl_vars['fields']['structure_details_c']['name']; ?>
'
size='30'
maxlength='18'value='<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['value']), $this);?>
'
title=''
tabindex='1'
 
>