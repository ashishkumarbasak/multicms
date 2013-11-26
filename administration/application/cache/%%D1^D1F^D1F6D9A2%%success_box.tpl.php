<?php /* Smarty version 2.6.19, created on 2012-02-11 18:21:07
         compiled from notification/success_box.tpl */ ?>
<div class="msg failure">
                    <span><?php if (isset ( $this->_tpl_vars['success_message'] )): ?><?php echo $this->_tpl_vars['success_message']; ?>
<?php else: ?><?php echo $this->_tpl_vars['message']; ?>
<?php endif; ?></span>
                    <a href="#" class="close">x</a>
</div>