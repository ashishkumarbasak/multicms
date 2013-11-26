<?php /* Smarty version 2.6.19, created on 2013-11-10 14:29:32
         compiled from manage/account/settings.tpl */ ?>
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
				<h1>Change Password</h1>     
                        
                        
  				
                <form action="" method="post" enctype="multipart/form-data">	
					
						
						<div class="tab-content">
                				
                                
                        <?php if (isset ( $this->_tpl_vars['form_error'] )): ?>
                        	<div class="message errormsg">
                            <p>
                            	<?php $_from = $this->_tpl_vars['form_error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listoferror'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listoferror']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ei'] => $this->_tpl_vars['error']):
        $this->_foreach['listoferror']['iteration']++;
?>
                                	<?php if ($this->_tpl_vars['error'] == 'password_blank'): ?> Password can not be blank.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'password_length'): ?> Password shoud be 6 character long.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'retyped_password_blank' || $this->_tpl_vars['error'] == 'password_not_matched'): ?> Retyped password not matched. <br><?php endif; ?>                                    
                                <?php endforeach; endif; unset($_from); ?>
                            </p>
                            </div>
                        <?php endif; ?>        
                                
                                
                                
                                
                                
                                
                                
                        <?php if (isset ( $this->_tpl_vars['update_password_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Password Changed Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label>New Password:</label></td>
									<td><input type="password" class="text small" name="new_password" value="" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                <tr>
									<td><label>Confirm Password:</label></td>
									<td><input type="password" class="text small" name="confirm_password" value="" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                    	<input type="hidden" name="user_previlege" id="user_previlege" value="1">
                                        <input class="btn" type="submit" value="Submit" name="change_password">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
          				</div>
        			
				</form>
                
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->