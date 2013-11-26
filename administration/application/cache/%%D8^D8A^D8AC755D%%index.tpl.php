<?php /* Smarty version 2.6.19, created on 2013-11-06 18:12:22
         compiled from manage/pages/index.tpl */ ?>
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
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th width="250">Page Title</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Page Order</th>
                                    <th>Home Page</th>
                                    <th>Author</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['pagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofpages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofpages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pk'] => $this->_tpl_vars['page']):
        $this->_foreach['listofpages']['iteration']++;
?>
                                	<?php $this->assign('subpages', $this->_tpl_vars['sub_page_list'][$this->_tpl_vars['pk']]); ?>
								<tr <?php if ($this->_tpl_vars['page']->mother_page_id == '0'): ?> <?php else: ?> class="blue_background" <?php endif; ?>>
									<td><input type="checkbox" /></td>
									<td>
                                    	<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;">
                                        <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['page']->page_id; ?>
"><?php echo $this->_tpl_vars['page']->page_title; ?>
</a>
                                    </td>
                                    <td><?php echo $this->_tpl_vars['page']->status; ?>
</td>
                                    <td><?php echo $this->_tpl_vars['page']->date_created; ?>
</td>
                                    <td><input type="text" name="page_order_<?php echo $this->_tpl_vars['page']->page_id; ?>
" id="page_order_<?php echo $this->_tpl_vars['page']->page_id; ?>
" value="<?php echo $this->_tpl_vars['page']->page_order; ?>
" style="width:30px;"></td>                                    
                                    <td>
                                    	<?php if ($this->_tpl_vars['page']->is_homepage == '1'): ?>
                                        	<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/star_active.png" style="border:0px;">
                                        <?php else: ?>
                                        	<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/homepage/<?php echo $this->_tpl_vars['page']->page_id; ?>
"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/star_inactive.png" style="border:0px;"></a>    
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $this->_tpl_vars['page']->author; ?>
</td>
									<td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['page']->page_id; ?>
">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/delete/<?php echo $this->_tpl_vars['page']->page_id; ?>
" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
									</td>
								</tr>
                                    <?php $_from = $this->_tpl_vars['subpages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofsubpages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofsubpages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['spk'] => $this->_tpl_vars['subpage']):
        $this->_foreach['listofsubpages']['iteration']++;
?>
                                    	<tr <?php if ($this->_tpl_vars['subpage']->mother_page_id == '0'): ?> <?php else: ?> class="blue_background" <?php endif; ?>>
                                            <td><input type="checkbox" /></td>
                                            <td>
                                            	&iota;__ &nbsp;
                                                <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;">
                                                <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['subpage']->page_id; ?>
"><?php echo $this->_tpl_vars['subpage']->page_title; ?>
</a>
                                            </td>
                                            <td><?php echo $this->_tpl_vars['subpage']->status; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['subpage']->date_created; ?>
</td>
                                            <td><input type="text" name="page_order_<?php echo $this->_tpl_vars['subpage']->page_id; ?>
" id="page_order_<?php echo $this->_tpl_vars['subpage']->page_id; ?>
" value="<?php echo $this->_tpl_vars['subpage']->page_order; ?>
" style="width:30px;"></td>
                                            <td>
                                                <?php if ($this->_tpl_vars['subpage']->is_homepage == '1'): ?>
                                                    <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/star_active.png" style="border:0px;">
                                                <?php else: ?>
                                                    <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/homepage/<?php echo $this->_tpl_vars['subpage']->page_id; ?>
"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/star_inactive.png" style="border:0px;"></a>    
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $this->_tpl_vars['subpage']->author; ?>
</td>
                                            <td>
                                                <a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['subpage']->page_id; ?>
">edit</a>
                                                <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/delete/<?php echo $this->_tpl_vars['subpage']->page_id; ?>
" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; unset($_from); ?>
								<?php endforeach; endif; unset($_from); ?>
								<tr>
									<td colspan="4">&nbsp;</td>
									<td> 
										<input type="hidden" name="page_ids" id="page_ids" value="<?php echo $this->_tpl_vars['page_ids']; ?>
">
										<input type="submit" name="save_page_order" id="save_page_order" value="Save Page Order" class="btn btn-small"> 
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