<?php /* Smarty version 2.6.19, created on 2014-01-09 15:29:52
         compiled from manage/categories/index.tpl */ ?>
<?php echo '
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
'; ?>

<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
			
						
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Category Name</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['categorylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofcategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofcategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ck'] => $this->_tpl_vars['category']):
        $this->_foreach['listofcategories']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /></td>
									<td>
                                    <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"> &nbsp;
                                    <?php if ($this->_tpl_vars['category']->parent_parent_category != NULL): ?> <b style="color:#0000FF;"><?php echo $this->_tpl_vars['category']->parent_parent_category; ?>
 &raquo;</b> <?php endif; ?><?php if ($this->_tpl_vars['category']->parent_category != NULL): ?> <b style="color:#0000FF;"><?php echo $this->_tpl_vars['category']->parent_category; ?>
 &raquo;</b> <?php endif; ?><?php echo $this->_tpl_vars['category']->category_name; ?>

                                    </td>
                                    <td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/categories/edit/<?php echo $this->_tpl_vars['category']->category_id; ?>
">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/categories/delete/<?php echo $this->_tpl_vars['category']->category_id; ?>
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