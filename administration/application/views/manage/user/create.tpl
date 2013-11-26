<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block withsidebar">
			
	
				
				
				<div class="block_content">
				
					<div class="sidebar">
						<ul class="sidemenu">
							<li class="active"><a href="#pages">Users</a></li>
						</ul>
						
						<p><strong>Some notification text.</strong> Donec hendrerit porttitor felis, id semper eros lobortis sed. Class aptent taciti sociosqu ad litora.</p>
					</div>		<!-- .sidebar ends -->
					
					<div class="sidebar_content" id="pages">
					
					
                    
                    
                    
                    <form action="" method="post">	
                    	{if isset($user_created_successfully)}
                        	<div class="message info">
                            <p>
                            	User created successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($form_error)}
                        	<div class="message errormsg">
                            <p>
                            	{foreach from=$form_error item=error name=listoferror key=ei}
                                	{if $error eq "fullname_length"} Full name should be more than 3 chracter long.<br>{/if}
                                    {if $error eq "username_blank"} Username can not be blank.<br>{/if}
                                    {if $error eq "exist_this_username"} Username exists, Please try another.<br>{/if}
                                    {if $error eq "password_blank"} Password can not be blank.<br>{/if}
                                    {if $error eq "password_length"} Password shoud be 6 character long.<br>{/if}
                                    {if $error eq "retyped_password_blank" || $error eq "password_not_matched"} Retyped password not matched. <br>{/if}
                                    {if $error eq "email_blank"} E-mail can not be blank.<br>{/if}
                                    {if $error eq "invalid_email"} Not a valid E-mail address.<br>{/if}
                                    {if $error eq "email_already_use"} E-mail address exists, Please try another one.<br>{/if}
                                {/foreach}
                            </p>
                            </div>
                        {/if}
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label>Full Name:</label></td>
									<td><input type="text" class="text small" name="full_name" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label>Username:</label></td>
									<td><input type="text" class="text small" name="signup_username" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label>Email:</label></td>
									<td><input type="text" class="text small" name="email" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Password:</label></td>
									<td><input type="text" name="signup_password" class="text small" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Retype Password:</label></td>
									<td><input type="text" name="retype_password" class="text small" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
                                <tr>
                                    <td></td>
                                    <td>
                                    	<input type="hidden" name="send_newsletter" id="send_newsletter" value="1" >
                                        <input type="hidden" name="timezone_offset" id="timezone_offset" value="">
                                        <input type="hidden" name="account_type" id="account_type" value="1"><!--  Hotel!-->
                                         <input type="hidden" name="user_country" id="user_country" value="80">
                                        <input class="btn" type="submit" value="Submit" name="cretae_my_account">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>
					</form>
                    
                    
                    
                    
                    
					
					</div>
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->