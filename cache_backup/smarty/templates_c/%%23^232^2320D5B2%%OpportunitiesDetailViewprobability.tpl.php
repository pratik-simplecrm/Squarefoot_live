<?php /* Smarty version 2.6.11, created on 2017-08-23 15:41:43
         compiled from cache/modules/AOW_WorkFlow/OpportunitiesDetailViewprobability.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'cache/modules/AOW_WorkFlow/OpportunitiesDetailViewprobability.tpl', 3, false),)), $this); ?>

<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['probability']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['fields']['probability']['value']), $this);?>

</span>