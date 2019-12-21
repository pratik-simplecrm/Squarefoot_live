<?php /* Smarty version 2.6.11, created on 2017-08-23 15:41:43
         compiled from cache/modules/AOW_WorkFlow/OpportunitiesDetailViewdate_closed.tpl */ ?>


    <?php if (strlen ( $this->_tpl_vars['fields']['date_closed']['value'] ) <= 0): ?>
        <?php $this->assign('value', $this->_tpl_vars['fields']['date_closed']['default_value']); ?>
    <?php else: ?>
        <?php $this->assign('value', $this->_tpl_vars['fields']['date_closed']['value']); ?>
    <?php endif; ?>



<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['date_closed']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</span>