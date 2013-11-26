<?php /* Smarty version 2.6.19, created on 2013-06-01 13:16:40
         compiled from manage/categories/create_category_form_en.tpl */ ?>
						<?php if (isset ( $this->_tpl_vars['category_created_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Category Created Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset ( $this->_tpl_vars['category_updated_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Category Updated Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset ( $this->_tpl_vars['form_error'] )): ?>
                        	<div class="message errormsg">
                            <p>
                            	<?php $_from = $this->_tpl_vars['form_error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listoferror'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listoferror']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ei'] => $this->_tpl_vars['error']):
        $this->_foreach['listoferror']['iteration']++;
?>
                                	<?php if ($this->_tpl_vars['error'] == 'category_name_it_length'): ?> Category name should be more than 3 chracter long.<?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </p>
                            </div>
                        <?php endif; ?>
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label>Category Name (EN):</label></td>
									<td><input type="text" class="text small" name="category_name_en" value="<?php if (isset ( $this->_tpl_vars['category_details'] ) && $this->_tpl_vars['category_details'] != NULL): ?><?php echo $this->_tpl_vars['category_details']->category_name_en; ?>
<?php endif; ?>" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Description (EN):</label></td>
									<td><textarea name="category_description_en" id="category_description" class="textarea"><?php if (isset ( $this->_tpl_vars['category_details'] ) && $this->_tpl_vars['category_details'] != NULL): ?><?php echo $this->_tpl_vars['category_details']->category_description_en; ?>
<?php endif; ?></textarea></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Image (EN):</label></td>
									<td><input type="file" name="category_image_en" id="category_image"></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
                                
								<tr>
                                    <td></td>
                                    <td>
                                        <input class="btn" type="submit" value="Submit" name="cretae_category">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>