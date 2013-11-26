<?php /* Smarty version 2.6.19, created on 2013-11-13 16:45:49
         compiled from manage/menus/index.tpl */ ?>
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
manage/menus/create" >Add New Menu</a>	
                    </div>
					
                    <form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th style="width:20px;">
                                    	<input type="checkbox" class="check_all" />
                                    </th>
                                    <th> 
                                    	<div>Menu</div>
                                    </th>
                                    <th> 
                                    	<div>Widget Code</div>
                                    </th>
									<th style="width:200px;" align=""> Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['menulist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofmenus'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofmenus']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cl'] => $this->_tpl_vars['menu']):
        $this->_foreach['listofmenus']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /> </td>
									<td><?php echo $this->_tpl_vars['menu']->menu_name; ?>
</td>
									<td><code>&lt;?php echo render_menu($menu_id=<?php echo $this->_tpl_vars['menu']->menu_id; ?>
); &gt;</code></td>
                                    <td style="width:200px;" >
                                    	<a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/menus/edit/<?php echo $this->_tpl_vars['menu']->menu_id; ?>
">Edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/menus/delete/<?php echo $this->_tpl_vars['menu']->menu_id; ?>
" onclick='return confirm("Are you sure you want to delete?")' >Delete</a>
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