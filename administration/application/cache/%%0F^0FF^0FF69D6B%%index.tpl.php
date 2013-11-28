<?php /* Smarty version 2.6.19, created on 2013-11-26 19:19:39
         compiled from manage/language/index.tpl */ ?>
<?php echo '
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
'; ?>

<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
					<div style="text-align:right; margin-bottom:20px;">
					<a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/language/create" >Install New Language</a>	
                    </div>
					
                    <form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th style="width:20px;">
                                    	<input type="checkbox" class="check_all" />
                                    </th>
                                    <th colspan="2"> 
                                    <div style="margin-left:47px;">Language</div>
                                    </th>
                                    <th>Default</th>
									<th width="100" align=""> Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['languagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listoflanguages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listoflanguages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cl'] => $this->_tpl_vars['language']):
        $this->_foreach['listoflanguages']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /> </td>
                                    <td style="width:25px;"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['language']->flag; ?>
.png" style="border:0px; padding-top:3px;"></td>
									<td><?php echo $this->_tpl_vars['language']->language_name; ?>
</td>
                                    <td>
                                    	<?php if ($this->_tpl_vars['language']->is_default == '1'): ?>
                                        	<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/star_active.png" style="border:0px;">
                                        <?php else: ?>
                                        	<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/language/make_default/<?php echo $this->_tpl_vars['language']->language_id; ?>
"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/star_inactive.png" style="border:0px;"></a>    
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/language/uninstall/<?php echo $this->_tpl_vars['language']->language_id; ?>
" onclick='return confirm("Are you sure you want to uninstall?")' >Uninstall</a>
									</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
								
												
							</tbody>
							
						</table>
						
						<?php echo $this->_tpl_vars['pagination_link']; ?>

						
					</form>
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->