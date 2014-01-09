<?php /* Smarty version 2.6.19, created on 2014-01-09 14:50:37
         compiled from manage/members/create.tpl */ ?>
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
				<h1>Add Member</h1>     
                        
                        <form action="" method="post">	
                    	<?php if (isset ( $this->_tpl_vars['user_created_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	User created successfully.
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
                                	<?php if ($this->_tpl_vars['error'] == 'first_name_length'): ?> Full name should be more than 3 chracter long.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'username_blank'): ?> Username can not be blank.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'exist_this_username'): ?> Username exists, Please try another.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'password_blank'): ?> Password can not be blank.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'password_length'): ?> Password shoud be 6 character long.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'retyped_password_blank' || $this->_tpl_vars['error'] == 'password_not_matched'): ?> Retyped password not matched. <br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'email_blank'): ?> E-mail can not be blank.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'invalid_email'): ?> Not a valid E-mail address.<br><?php endif; ?>
                                    <?php if ($this->_tpl_vars['error'] == 'email_already_use'): ?> E-mail address exists, Please try another one.<br><?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </p>
                            </div>
                        <?php endif; ?>
                    				
						<?php echo '
                        	<script type="text/javascript">    
								var keylist="abcdefghijklmnopqrstuvwxyz123456789;,?!()!:-"
								var temp=\'\'
								function generatepass(plength){
									temp=\'\'
									for (i=0;i<plength;i++)
									temp+=keylist.charAt(Math.floor(Math.random()*keylist.length))
									return temp
								}								
								
								function populateform(enterlength){
									$(\'#signup_password\').val(generatepass(enterlength));
								}
							</script>
                        '; ?>

                        <table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>
							<tbody>					
								<tr>
									<td><label>Nome:</label></td>
									<td><input type="text" class="text small" name="first_name" id="first_name" value="<?php if (isset ( $this->_tpl_vars['first_name'] )): ?><?php echo $this->_tpl_vars['first_name']; ?>
<?php endif; ?>" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label>Cognome:</label></td>
									<td><input type="text" class="text small" name="last_name" id="last_name" value="<?php if (isset ( $this->_tpl_vars['last_name'] )): ?><?php echo $this->_tpl_vars['last_name']; ?>
<?php endif; ?>" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label>Email:</label></td>
									<td><input type="text" class="text small" name="email" id="email" value="<?php if (isset ( $this->_tpl_vars['email_address'] )): ?><?php echo $this->_tpl_vars['email_address']; ?>
<?php endif; ?>"  /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
																
								<tr>
									<td><label>Password</label></td>
									<td>
									<input type="text" value="" name="signup_password" id="signup_password" size="40" class="text small" alt="simple" />
            						<input type="hidden" name="thelength" size="3" value="12"></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label>&nbsp;</label></td>
									<td><input type="button" value="Generate Password" class="btn" onClick="populateform(this.form.thelength.value)">
                                    	<input type="button" value="Send password to user" class="btn btn-info">
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label>Active</label></td>
									<td><p class="field switch">
											<label class="cb-enable selected" onclick="$('#is_active').val('1');"><span>On</span></label>
											<label class="cb-disable"  onclick="$('#is_active').val('0');"><span>Off</span></label>
										</p>
                                        <input type="hidden" name="is_active" id="is_active" value="1">
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								
								<tr>
									<td><label>Upload permission</label></td>
									<td><p class="field switch">
											<label class="cb-enable selected" onclick="$('#upload_permission').val('1');"><span>On</span></label>
											<label class="cb-disable" onclick="$('#upload_permission').val('1');"><span>Off</span></label>
										</p>
                                         <input type="hidden" name="upload_permission" id="upload_permission" value="1">
									</td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								
								<tr>
									<td></td>
									<td>
                                    	<input type="hidden" name="send_newsletter" id="send_newsletter" value="1" >
                                        <input type="hidden" name="timezone_offset" id="timezone_offset" value="">
                                        <input type="hidden" name="account_type" id="account_type" value="1"><!--  Hotel!-->
                                         <input type="hidden" name="user_country" id="user_country" value="80">
                                        <input class="btn" type="submit" value="Save" name="cretae_my_account">
                                        <input class="btn btn-danger" type="button" value="Cancel User" onclick="window.location='<?php echo $this->_tpl_vars['baseurl']; ?>
manage/members';">
                                    </td>
									<td></td>
								</tr>
							</tbody>
						</table>
    
                        
					</form>
  
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->