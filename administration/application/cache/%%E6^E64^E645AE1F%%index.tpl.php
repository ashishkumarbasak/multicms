<?php /* Smarty version 2.6.19, created on 2013-04-30 19:35:38
         compiled from manage/comuni/index.tpl */ ?>
<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block withsidebar">
			
	
				
				
				<div class="block_content">
				
					<div class="sidebar">
						<ul class="sidemenu">
							<li class="active"><a href="#pages">Users</a></li>
						</ul>
						
						<p><strong>Some notification text.</strong> Donec hendrerit porttitor felis, id semper eros lobortis sed. Class aptent taciti sociosqu ad litora.</p>
					</div>		<!-- .sidebar ends -->
					
					<div class="sidebar_content" id="pages">
					
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Comune Name</th>
                                    <th>Show in Homepage</th>
									<td width="160">&nbsp;</td>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['comunelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofcomune'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofcomune']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ck'] => $this->_tpl_vars['comune']):
        $this->_foreach['listofcomune']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $this->_tpl_vars['comune']->comune_name_it; ?>
</td>
                                    <td><?php if ($this->_tpl_vars['comune']->show_in_homepage == '1'): ?>Yes<?php else: ?>No<?php endif; ?></td>
									<td>
                                    	<a class="btn btn-small" href="">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/comuni/delete/<?php echo $this->_tpl_vars['comune']->comune_id; ?>
">Delete</a>
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