<?php /* Smarty version 2.6.19, created on 2013-07-26 07:12:35
         compiled from manage/videos/index.tpl */ ?>
<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
			
					
					
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Video Title</th>
									<th width="160">Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['videolist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofvideos'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofvideos']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uk'] => $this->_tpl_vars['video']):
        $this->_foreach['listofvideos']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><a href="page-add.php"><?php echo $this->_tpl_vars['video']->video_title_it; ?>
</a></td>
									<td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/videos/edit/<?php echo $this->_tpl_vars['video']->trv_video_id; ?>
">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/videos/delete/<?php echo $this->_tpl_vars['video']->trv_video_id; ?>
" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
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