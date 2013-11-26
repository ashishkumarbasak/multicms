<?php /* Smarty version 2.6.19, created on 2013-11-06 17:45:00
         compiled from manage/events/index.tpl */ ?>
<?php echo '
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
'; ?>

<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
			
						<?php if (isset ( $this->_tpl_vars['page_create_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	News Created Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset ( $this->_tpl_vars['page_updated_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	News Updated Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
					
					<form action="" method="post">
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th width="300">Event Title</th>
                                    <th>Event date</th>
                                    <th>Start Time</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['eventlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofevents'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofevents']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ek'] => $this->_tpl_vars['event']):
        $this->_foreach['listofevents']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/events/edit/<?php echo $this->_tpl_vars['event']->event_id; ?>
"><?php echo $this->_tpl_vars['event']->event_name; ?>
</a></td>
                                    <td><?php echo $this->_tpl_vars['event']->event_date; ?>
</td>
                                    <td><?php echo $this->_tpl_vars['event']->event_start_time; ?>
</td>
                                    <td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/events/edit/<?php echo $this->_tpl_vars['event']->event_id; ?>
">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/events/delete/<?php echo $this->_tpl_vars['event']->event_id; ?>
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