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
				<h1>Add Packaging</h1>
                		{if isset($package_create_successfully)}
                        	<div class="message info">
                            <p>
                            	Packaging Created Successfully.
                            </p>
                            </div>
                        {/if}

                        

                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="language_id" id="language_id" value="{$lang_id}">
                            <div style="display:none;"><select id="e1" name="mother_page"><option value="-1" selected="selected">-1</option></select></div>
                            <input type="hidden" name="is_home_page" id="is_home_page" value="0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home"> 
					               <table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
                            
                            <tr>
                                <td width="200"><label>Packaging Title: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
                                <td>
                                	<input name="packaging_title" type="text" class="text small" id="packaging_title" value="{if isset($packaging_title)}{$packaging_title}{/if}" />
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><label>Packaging Code: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
                                <td>
                                	<input type="text" name="packaging_code" style="text-transform: lowercase;" class="text small" id="packaging_code" value="{if isset($packaging_code)}{$packaging_code}{/if}" />
                                </td>
                            </tr>
                        </table>    
                        
                                        
                                        
                                         <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200"><label>Description: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
                                                <td>
                                                	<textarea class="textarea" name="packaging_description">{if isset($packaging_description)}{$packaging_description}{/if}</textarea>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        
                            </div>
                        
                            <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                           		<tr>
                               		<td width="200">&nbsp;</td>
                                  	<td>
                                   		<input type="hidden" name="m_ref_packaging_id" id="m_ref_packaging_id" value="{if isset($m_ref_packaging_id) && $m_ref_packaging_id!=NULL }{$m_ref_packaging_id}{/if}">
										<input type="hidden" name="packaging_id" id="packaging_id" value="{$packaging_id}">
                                       	<input class="btn" type="submit" name="Salva" id="Salva" value="Salva">
                                  	</td>
                            	</tr>
                        	</table>

                        </div>
                        </form>    




                    
{literal}
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
{/literal}						
									
                        
                        	
                            
                            
                                    	
									
                    
                    
                    
                    
                    
                    
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->
			
			
			
			
			
		