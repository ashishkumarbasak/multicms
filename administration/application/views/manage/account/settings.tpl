<link rel="stylesheet" href="{$baseurl}assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">
{literal}
<style type="text/css">
	#add_additional_field_ul li:hover{ background-color:#CCCCCC; cursor:move;}
</style>
{/literal}
<div id="hld">
	<!-- wrapper begins -->
	<div class="wrapper">		
		<div class="block">
			<div class="block_content">
				<h1>Change Password</h1>     
                        
                        
  				
                <form action="" method="post" enctype="multipart/form-data">	
					
						
						<div class="tab-content">
                				
                                
                        {if isset($form_error)}
                        	<div class="message errormsg">
                            <p>
                            	{foreach from=$form_error item=error name=listoferror key=ei}
                                	{if $error eq "password_blank"} Password can not be blank.<br>{/if}
                                    {if $error eq "password_length"} Password shoud be 6 character long.<br>{/if}
                                    {if $error eq "retyped_password_blank" || $error eq "password_not_matched"} Retyped password not matched. <br>{/if}                                    
                                {/foreach}
                            </p>
                            </div>
                        {/if}        
                                
                                
                                
                                
                                
                                
                                
                        {if isset($update_password_successfully)}
                        	<div class="message info">
                            <p>
                            	Password Changed Successfully.
                            </p>
                            </div>
                        {/if}
                    				
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