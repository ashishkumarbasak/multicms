<?php /* Smarty version 2.6.19, created on 2013-11-28 20:32:51
         compiled from manage/packagings/index.tpl */ ?>
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
manage/packagings/import">Import Packages</a>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th width="300">Package Title</th>
                                    <th>Package Code</th>
                                    <th width="100">Action</th>
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
manage/packagings/edit/<?php echo $this->_tpl_vars['page']->packaging_id; ?>
">
                                        	<?php echo $this->_tpl_vars['page']->pack_title; ?>

                                        </a>
                                    </td>
                                    <td><?php echo $this->_tpl_vars['page']->pack_code; ?>
</td>
                                    <td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/packagings/edit/<?php echo $this->_tpl_vars['page']->packaging_id; ?>
">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/packagings/delete/<?php echo $this->_tpl_vars['page']->packaging_id; ?>
" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
									</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
								<tr>
									<td colspan="4">&nbsp;</td>
									<td> 
										<input type="hidden" name="page_ids" id="page_ids" value="<?php echo $this->_tpl_vars['page_ids']; ?>
">
										<input type="hidden" name="save_page_order" id="save_page_order" value="Save Page Order" class="btn btn-small"> 
									</td>
									<td colspan="2"></td>
								</tr>																			
							</tbody>
							
						</table>
						
						<?php echo $this->_tpl_vars['pagination_link']; ?>

						
					</form>
					
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->