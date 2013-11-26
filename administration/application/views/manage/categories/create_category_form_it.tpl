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
									<td><label>Category Name: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"> </label></td>
									<td><input type="text" class="text small" name="category_name_it" value="{if isset($category_details) && $category_details!=NULL}{$category_details->category_name_it}{/if}" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Description: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"> </label></td>
									<td><textarea name="category_description_it" id="category_description" class="textarea">{if isset($category_details) && $category_details!=NULL}{$category_details->category_description_it}{/if}</textarea></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
									<td><label>Image: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"> </label></td>
									<td><input type="file" name="category_image_it" id="category_image"></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
                                <tr>
									<td><label>Parent Category: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"> </label></td>
									<td>
                                    	<select name="parent_category">
                                        	<option value="0">Add as parent</option>
                                            {foreach from=$categorylist item=category name=listofcategories key=ck}
                                           	 {if $category->parent_parent_category == NULL}
                                             <option value="{$category->category_id}" {if isset($category_details) && $category_details!=NULL && $category_details->parent_id==$category->category_id} selected="selected" {/if} >
                                             	{if $category->parent_category != NULL} <b style="color:#0000FF;">{$category->parent_category} &raquo;</b> {/if}{$category->category_name}   
											</option>
                                            {/if}
                                            {/foreach}
                                        </select>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                    	<input type="hidden" name="language_id" id="language_id" value="{$lang_id}">
                                        <input class="btn" type="submit" value="Submit" name="cretae_category">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>