						{if isset($category_created_successfully)}
                        	<div class="message info">
                            <p>
                            	Category Created Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($category_updated_successfully)}
                        	<div class="message info">
                            <p>
                            	Category Updated Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($form_error)}
                        	<div class="message errormsg">
                            <p>
                            	{foreach from=$form_error item=error name=listoferror key=ei}
                                	{if $error eq "category_name_it_length"} Category name should be more than 3 chracter long.{/if}
                                {/foreach}
                            </p>
                            </div>
                        {/if}
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label>Category Name (EN):</label></td>
									<td><input type="text" class="text small" name="category_name_en" value="{if isset($category_details) && $category_details!=NULL}{$category_details->category_name_en}{/if}" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Description (EN):</label></td>
									<td><textarea name="category_description_en" id="category_description" class="textarea">{if isset($category_details) && $category_details!=NULL}{$category_details->category_description_en}{/if}</textarea></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Image (EN):</label></td>
									<td><input type="file" name="category_image_en" id="category_image"></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
                                
								<tr>
                                    <td></td>
                                    <td>
                                        <input class="btn" type="submit" value="Submit" name="cretae_category">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>