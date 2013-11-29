<?php /* Smarty version 2.6.19, created on 2013-11-28 20:23:08
         compiled from manage/packagings/create.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">
<?php echo '
<style type="text/css">
	#add_additional_field_ul li:hover{ background-color:#CCCCCC; cursor:move;}
</style>
'; ?>

<div id="hld">
	<!-- wrapper begins -->
	<div class="wrapper">		
		<div class="block">
			<div class="block_content">
				<h1>Add Packaging</h1>
                		<?php if (isset ( $this->_tpl_vars['package_create_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Packaging Created Successfully.
                            </p>
                            </div>
                        <?php endif; ?>

                        

                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="language_id" id="language_id" value="<?php echo $this->_tpl_vars['lang_id']; ?>
">
                            <div style="display:none;"><select id="e1" name="mother_page"><option value="-1" selected="selected">-1</option></select></div>
                            <input type="hidden" name="is_home_page" id="is_home_page" value="0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home"> 
					               <table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
                            
                            <tr>
                                <td width="200"><label>Packaging Title: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                <td>
                                	<input name="packaging_title" type="text" class="text small" id="packaging_title" value="<?php if (isset ( $this->_tpl_vars['packaging_title'] )): ?><?php echo $this->_tpl_vars['packaging_title']; ?>
<?php endif; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><label>Packaging Code: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                <td>
                                	<input type="text" name="packaging_code" style="text-transform: lowercase;" class="text small" id="packaging_code" value="<?php if (isset ( $this->_tpl_vars['packaging_code'] )): ?><?php echo $this->_tpl_vars['packaging_code']; ?>
<?php endif; ?>" />
                                </td>
                            </tr>
                        </table>    
                        
                                        
                                        
                                         <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200"><label>Description: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                                <td>
                                                	<textarea class="textarea" name="packaging_description"><?php if (isset ( $this->_tpl_vars['packaging_description'] )): ?><?php echo $this->_tpl_vars['packaging_description']; ?>
<?php endif; ?></textarea>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        
                            </div>
                        
                            <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                           		<tr>
                               		<td width="200">&nbsp;</td>
                                  	<td>
                                   		<input type="hidden" name="m_ref_packaging_id" id="m_ref_packaging_id" value="<?php if (isset ( $this->_tpl_vars['m_ref_packaging_id'] ) && $this->_tpl_vars['m_ref_packaging_id'] != NULL): ?><?php echo $this->_tpl_vars['m_ref_packaging_id']; ?>
<?php endif; ?>">
										<input type="hidden" name="packaging_id" id="packaging_id" value="<?php echo $this->_tpl_vars['packaging_id']; ?>
">
                                       	<input class="btn" type="submit" name="Salva" id="Salva" value="Salva">
                                  	</td>
                            	</tr>
                        	</table>

                        </div>
                        </form>    




                    
<?php echo '
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
'; ?>
						
									
                        
                        	
                            
                            
                                    	
									
                    
                    
                    
                    
                    
                    
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->
			
			
			
			
			
		