<?php /* Smarty version 2.6.19, created on 2014-01-09 14:50:35
         compiled from manage/members/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'manage/members/index.tpl', 33, false),)), $this); ?>
<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block withsidebar">
			
	
				
				
				<div class="block_content">
				
					<div class="sidebar_content" id="pages">
					
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Name Surname </th>
									<th>Status</th>
									<th>Date added</th>
									<th>Password</th>
									<th width="180">Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['userlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofusers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofusers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uk'] => $this->_tpl_vars['user']):
        $this->_foreach['listofusers']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/members/edit/<?php echo $this->_tpl_vars['user']->user_id; ?>
"><?php echo $this->_tpl_vars['user']->first_name; ?>
 <?php echo $this->_tpl_vars['user']->last_name; ?>
</a></td>
									<td><?php if ($this->_tpl_vars['user']->is_active == '1'): ?>Active<?php else: ?>Inactive<?php endif; ?></td>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->u_created_on)) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
									<td><?php echo $this->_tpl_vars['user']->org_password; ?>
</td>
									<td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/members/edit/<?php echo $this->_tpl_vars['user']->user_id; ?>
">edit</a>
                                        <?php if ($this->_tpl_vars['user']->is_active == '1'): ?> 
                                        	<a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/members/block/<?php echo $this->_tpl_vars['user']->user_id; ?>
" onclick='return confirm("Are you sure you want to block?")'>Block</a>
                                        <?php else: ?>
                                        	<a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/members/unblock/<?php echo $this->_tpl_vars['user']->user_id; ?>
">Unblock</a>
                                        <?php endif; ?>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/members/delete/<?php echo $this->_tpl_vars['user']->user_id; ?>
" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
									</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
								
												
							</tbody>
							
						</table>
						
						<?php echo $this->_tpl_vars['pagination_link']; ?>

						
					</form>
					
					</div>
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->