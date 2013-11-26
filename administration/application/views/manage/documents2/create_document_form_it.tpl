						{if isset($document_created_successfully)}
                        	<div class="message info">
                            <p>
                            	Document Uploaded Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($document_updated_successfully)}
                        	<div class="message info">
                            <p>
                            	Document Updated Successfully.
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
									<td><label>Nome documento:</label></td>
									<td><input type="text" class="text small" name="document_name" value="{if isset($document_details) && $document_details!=NULL}{$document_details->document_name}{/if}" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                               <tr>
									<td><label>Sezione:</label></td>
									<td>
                                    	<select name="document_category_id">
                                            {foreach from=$categorylist item=category name=listofcategories key=ck}
                                           	 {if $category->parent_parent_category == NULL}
                                             <option value="{$category->category_id}" {if isset($document_details) && $document_details!=NULL && $document_details->document_category_id==$category->category_id} selected="selected" {/if} >
                                             	{if $category->parent_category != NULL} <b style="color:#0000FF;">{$category->parent_category} &raquo;</b> {/if}{$category->category_name_it}   
											</option>
                                            {/if}
                                            {/foreach}
                                        </select>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                 <tr>
									<td><label>File:</label></td>
									<td>
                                    	<input type="file" name="document_file" id="document_file">
                                        {if isset($document_details) && $document_details!=NULL}
                                        	<a target="_blank" href="{$baseurl|replace:"administration/":""}assets/documents/{$document_details->document_file_name}">{$document_details->document_file_name}</a> 
                                        {/if}
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                    	<input type="hidden" name="user_previlege" id="user_previlege" value="2">
                                        <input class="btn" type="submit" value="Submit" name="cretae_document">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>