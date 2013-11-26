<?php /* Smarty version 2.6.19, created on 2013-08-25 19:32:04
         compiled from manage/documents/create_category_form_it.tpl */ ?>
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
									<td><label>Nome documento:</label></td>
									<td><input type="text" class="text small" name="document_name" value="<?php if (isset ( $this->_tpl_vars['document_details'] ) && $this->_tpl_vars['document_details'] != NULL): ?><?php echo $this->_tpl_vars['document_details']->document_name; ?>
<?php endif; ?>" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                               <tr>
									<td><label>Sezione:</label></td>
									<td>
                                    	<select name="document_category_id">
                                            <?php $_from = $this->_tpl_vars['categorylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofcategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofcategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ck'] => $this->_tpl_vars['category']):
        $this->_foreach['listofcategories']['iteration']++;
?>
                                           	 <?php if ($this->_tpl_vars['category']->parent_parent_category == NULL): ?>
                                             <option value="<?php echo $this->_tpl_vars['category']->category_id; ?>
" <?php if (isset ( $this->_tpl_vars['document_details'] ) && $this->_tpl_vars['document_details'] != NULL && $this->_tpl_vars['document_details']->document_category_id == $this->_tpl_vars['category']->category_id): ?> selected="selected" <?php endif; ?> >
                                             	<?php if ($this->_tpl_vars['category']->parent_category != NULL): ?> <b style="color:#0000FF;"><?php echo $this->_tpl_vars['category']->parent_category; ?>
 &raquo;</b> <?php endif; ?><?php echo $this->_tpl_vars['category']->category_name_it; ?>
   
											</option>
                                            <?php endif; ?>
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                 <tr>
									<td><label>File:</label></td>
									<td><input type="file" name="document_file" id="document_file"></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                        <input class="btn" type="submit" value="Submit" name="cretae_document">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>