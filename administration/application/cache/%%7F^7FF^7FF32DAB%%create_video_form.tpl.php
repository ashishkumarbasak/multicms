<?php /* Smarty version 2.6.19, created on 2013-06-01 10:54:45
         compiled from manage/videos/create_video_form.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['video_uploaded_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Video Uploaded Successfully.
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
                                	<?php if ($this->_tpl_vars['error'] == 'video_title_blank'): ?> Video title can't be left blank.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'video_description_blank'): ?> Video description can't be left blank.<br><?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </p>
                            </div>
                        <?php endif; ?>
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label id="lbl_title">Title (IT):</label></td>
									<td><input type="text" class="text small" name="video_title" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label id="lbl_description">Description (IT):</label></td>
									<td><textarea name="video_description" id="video_description" class="textarea"></textarea></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
                                <tr>
									<td><label id="lbl_video_cover_image">Video Cover Image(960x540):</label></td>
									<td><input type="file" name="video_image" id="video_image"></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
								 <tr>
									<td><label id="lbl_video_file">Video File (mp4):</label></td>
									<td><input type="file" name="video_file" id="video_file"></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                
                                <tr>
									<td><label id="lbl_category">Category:</label></td>
									<td>
                                    	<select name="video_category">
                                        	<option value="">Select Category</option>
                                            <?php $_from = $this->_tpl_vars['categorylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofcategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofcategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ck'] => $this->_tpl_vars['category']):
        $this->_foreach['listofcategories']['iteration']++;
?>
                                           	 <?php if ($this->_tpl_vars['category']->parent_parent_category != NULL && $this->_tpl_vars['category']->parent_category != NULL): ?>
                                             <option value="<?php echo $this->_tpl_vars['category']->category_id; ?>
">
                                             	<?php if ($this->_tpl_vars['category']->parent_parent_category != NULL): ?> <b style="color:#0000FF;"><?php echo $this->_tpl_vars['category']->parent_parent_category; ?>
 &raquo;</b> <?php endif; ?><?php if ($this->_tpl_vars['category']->parent_category != NULL): ?> <b style="color:#0000FF;"><?php echo $this->_tpl_vars['category']->parent_category; ?>
 &raquo;</b> <?php endif; ?><?php echo $this->_tpl_vars['category']->category_name_it; ?>
   
											</option>
                                            <?php endif; ?>
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                    	<input type="hidden" name="language" id="language" value="it">
                                        <input class="btn" type="submit" value="Submit" name="create_video">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>