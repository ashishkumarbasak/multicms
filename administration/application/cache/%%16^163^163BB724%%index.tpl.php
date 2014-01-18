<?php /* Smarty version 2.6.19, created on 2014-01-17 15:02:17
         compiled from manage/features/index.tpl */ ?>
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
                            	Page Created Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset ( $this->_tpl_vars['page_updated_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Page Updated Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
					
					<form action="" method="post">
						<div style="text-align:right;">
							<a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/features/create2/?lang=<?php echo $this->_tpl_vars['lang_code']; ?>
">Add Features</a>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th width="300">Feature Name</th><th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['pagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofpages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofpages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pk'] => $this->_tpl_vars['page']):
        $this->_foreach['listofpages']['iteration']++;
?>
                                	
								<tr>
									<td><input type="checkbox" /></td>
									<td>
                                    	<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;">
                                        <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/packagings/edit/<?php echo $this->_tpl_vars['page']->feature_id; ?>
">
                                        	<?php echo $this->_tpl_vars['page']->feature_title; ?>

                                        </a>
                                    </td>
                                    <td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/features/edit/<?php echo $this->_tpl_vars['page']->feature_id; ?>
">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/features/delete/<?php echo $this->_tpl_vars['page']->feature_id; ?>
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