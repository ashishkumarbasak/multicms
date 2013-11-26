<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block withsidebar">
			
	
				
				
				<div class="block_content">
				
					<div class="sidebar">
						<ul class="sidemenu">
							<li class="active"><a href="#pages">Comune</a></li>
						</ul>
						
						<p><strong>Some notification text.</strong> Donec hendrerit porttitor felis, id semper eros lobortis sed. Class aptent taciti sociosqu ad litora.</p>
					</div>		<!-- .sidebar ends -->
					
					<div class="sidebar_content" id="pages">
					
					
                    
                    
                    
                    <form action="" method="post">	
                    	{if isset($comune_created_successfully)}
                        	<div class="message info">
                            <p>
                            	Comune created successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($form_error)}
                        	<div class="message errormsg">
                            <p>
                            	{foreach from=$form_error item=error name=listoferror key=ei}
                                	{if $error eq "comune_name_length"} Comune name should be more than 3 chracter long.{/if}
                                {/foreach}
                            </p>
                            </div>
                        {/if}
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label>Comune Name:</label></td>
									<td><input type="text" class="text small" name="comune_name" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label>Show in Homepage:</label></td>
									<td>
                                    	<p class="field switch">
                                        	<label class="cb-enable" onclick="$('#show_in_homepage').val(1);"><span>Yes</span></label>
                                        	<label class="cb-disable selected" onclick="$('#show_in_homepage').val(0);"><span>No</span></label>
                                        </p>
                                        <input type="hidden" name="show_in_homepage" id="show_in_homepage" value="0">
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
                                    <td></td>
                                    <td>
                                        <input class="btn" type="submit" value="Submit" name="cretae_comune">
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