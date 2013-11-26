<?php /* Smarty version 2.6.19, created on 2013-11-06 18:28:42
         compiled from manage/slideshow/create_slideshow_form.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">						
                        <table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<tbody>
								
                                <tr>
									<td>
                                    	<!-- Redirect browsers with JavaScript disabled to the origin page -->
                                      	<noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
										<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
										<div class="row fileupload-buttonbar" style="margin-left:10px; width:100%;">
											<div class="span7">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                                <i class="icon-plus icon-white"></i>
                                                <span>Add files...</span>
                                                <input type="file" name="files[]" multiple>
                                            </span>
                                            <button type="submit" class="btn btn-primary start" style="margin-left:2px;">
                                                <i class="icon-upload icon-white"></i>
                                                <span>Start upload</span>
                                            </button>
                                            <button type="reset" class="btn btn-warning cancel" style="margin-left:2px;">
                                                <i class="icon-ban-circle icon-white"></i>
                                                <span>Cancel upload</span>
                                            </button>
                                            <button type="button" class="btn btn-danger delete" style="margin-left:2px;">
                                                <i class="icon-trash icon-white"></i>
                                                <span>Delete</span>
                                            </button>
                                            <input type="checkbox" class="toggle"> Select All
                                            <!-- The loading indicator is shown during file processing -->
                                            <span class="fileupload-loading"></span>
                                        </div>
                                        <!-- The global progress information -->
                                        <div class="span5 fileupload-progress fade">
                                            <!-- The global progress bar -->
                                            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                <div class="bar" style="width:0%;"></div>
                                            </div>
                                            <!-- The extended global progress information -->
                                            <div class="progress-extended">&nbsp;</div>
                                        </div>
                                    </div>
									<!-- The table listing the files available for upload/download -->
                                    <div role="presentation" class="table table-striped">
                                    	<ul id="upload-file-lists" class="files"></ul>
                                    </div>

                                    </td>
								</tr>
							</tbody>
						</table>
<div style="display:none;">                        
<textarea class="textarea"></textarea>                        
</div>                     
                        
                        