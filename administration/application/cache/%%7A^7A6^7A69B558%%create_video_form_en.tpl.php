<?php /* Smarty version 2.6.19, created on 2013-07-26 07:12:41
         compiled from manage/videos/create_video_form_en.tpl */ ?>
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
									<td><label id="lbl_title">Title (EN):</label></td>
									<td><input type="text" class="text small" name="video_title_en" value="<?php if ($this->_tpl_vars['video_details'] != NULL): ?><?php echo $this->_tpl_vars['video_details']->video_title_en; ?>
<?php endif; ?>" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label id="lbl_description">Description (EN):</label></td>
									<td><textarea name="video_description_en" id="video_description" class="textarea"><?php if ($this->_tpl_vars['video_details'] != NULL): ?><?php echo $this->_tpl_vars['video_details']->video_description_en; ?>
<?php endif; ?></textarea></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
                                <tr>
									<td><label id="lbl_video_cover_image">Video Cover Image(960x540):</label></td>
									<td>
                                    	<div class="container">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                                <i class="icon-plus icon-white"></i>
                                                <span>Select files...</span>
                                                <!-- The file input field used as target for the file upload widget -->
                                                <input id="fileupload_video_image_en" type="file" name="files[]" multiple>
                                                <input type="hidden" name="video_cover_image_en" id="video_cover_image_en" value="">
                                            </span>
                                            <br>
                                            <br>
                                            <!-- The global progress bar -->
                                            <div id="progress10" class="progress progress-success progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div id="files10" class="files"></div>                                            
                                        </div>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
								 <tr>
									<td><label id="lbl_video_file">Attachment (pdf,doc):</label></td>
									<td>
                                    	<div class="container">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                                <i class="icon-plus icon-white"></i>
                                                <span>Select files...</span>
                                                <!-- The file input field used as target for the file upload widget -->
                                                <input id="fileupload_attachment_en" type="file" name="files[]" multiple>
                                                <input type="hidden" name="attachment_en" id="attachment_en" value="">
                                            </span>
                                            <br>
                                            <br>
                                            <!-- The global progress bar -->
                                            <div id="progress7" class="progress progress-success progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div id="files7" class="files"></div>
                                            
                                        </div>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                
                                
                                <tr>
									<td><label id="lbl_video_file">Video File (mp4):</label></td>
									<td>
                                    
                                   
<div class="container">
    
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="icon-plus icon-white"></i>
        <span>Select files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload_en" type="file" name="files[]" multiple>
        <input type="hidden" name="video_file_en" id="video_file_en" value="">
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress2" class="progress progress-success progress-striped">
        <div class="bar"></div>
    </div>
    <div id="files2" class="files"></div>
    
</div>
                                    
                                    
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                
                                
                                
                                <tr>
                                    <td></td>
                                    <td>
                                        <input class="btn" type="submit" value="Submit" name="create_video">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>