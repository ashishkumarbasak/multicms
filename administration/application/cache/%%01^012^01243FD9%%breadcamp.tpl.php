<?php /* Smarty version 2.6.19, created on 2014-03-09 11:54:11
         compiled from layouts/breadcamp.tpl */ ?>
<div id="header-sub">
	<div class="wrapper">		<!-- wrapper begins -->
		<h2><?php echo $this->_tpl_vars['section']; ?>
 / <strong><?php echo $this->_tpl_vars['operation']; ?>
</strong></h2>
        
        <span style="float:right;">
        <b>Choose Language: </b>
			<?php $_from = $this->_tpl_vars['langlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ll'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ll']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cl'] => $this->_tpl_vars['lang']):
        $this->_foreach['ll']['iteration']++;
?>
				<a href="javascript:void(0);" onclick="setlanguage('<?php echo $this->_tpl_vars['lang']->flag; ?>
');">
                	<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang']->flag; ?>
.png" style="border:0px; padding-top:3px; margin-left:2px;">
                </a>
            <?php endforeach; endif; unset($_from); ?>
        </span>
        <span style="clear:both;"></span>
	</div>	
</div>		<!-- #header ends -->