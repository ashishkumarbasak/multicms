<?php /* Smarty version 2.6.19, created on 2014-01-09 15:38:31
         compiled from manage/documents/create_document_form_it.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'manage/documents/create_document_form_it.tpl', 57, false),)), $this); ?>
						<?php if (isset ( $this->_tpl_vars['document_created_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Document Uploaded Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset ( $this->_tpl_vars['document_updated_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Document Updated Successfully.
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
 &raquo;</b> <?php endif; ?><?php echo $this->_tpl_vars['category']->category_name; ?>
   
											</option>
                                            <?php endif; ?>
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                 <tr>
									<td><label>File:</label></td>
									<td>
                                    	<input type="file" name="document_file" id="document_file">
                                        <?php if (isset ( $this->_tpl_vars['document_details'] ) && $this->_tpl_vars['document_details'] != NULL): ?>
                                        	<a target="_blank" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
assets/documents/<?php echo $this->_tpl_vars['document_details']->document_file_name; ?>
"><?php echo $this->_tpl_vars['document_details']->document_file_name; ?>
</a> 
                                        <?php endif; ?>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                    	<input type="hidden" name="user_previlege" id="user_previlege" value="1">
                                        <input class="btn" type="submit" value="Submit" name="cretae_document">
                                        <?php if (isset ( $this->_tpl_vars['user_id'] ) && $this->_tpl_vars['user_id'] != NULL): ?>
                                            <input class="btn" type="button" value="Return to User Edit" name="cretae_document" onclick='window.location="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/clients/edit/<?php echo $this->_tpl_vars['user_id']; ?>
";'>
                                        <?php endif; ?>
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>