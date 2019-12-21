<?php /* Smarty version 2.6.11, created on 2017-09-04 11:26:33
         compiled from cache/modules/AOW_WorkFlow/OpportunitiesDetailViewflooring_type_c.tpl */ ?>


<?php if (is_string ( $this->_tpl_vars['fields']['flooring_type_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['flooring_type_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['flooring_type_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['flooring_type_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['flooring_type_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['flooring_type_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['flooring_type_c']['options'][$this->_tpl_vars['fields']['flooring_type_c']['value']]; ?>

<?php endif; ?>