						{if isset($menu_created_successfully)}
                        	<div class="message info">
                            <p>
                            	Menu Created Successfully.
                            </p>
                            </div>
                        {/if}
                        
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label>Menu Name:</label></td>
									<td><input type="text" class="text small" name="menu_name" value="{if isset($menu_detail) && $menu_detail->menu_name!=NULL}{$menu_detail->menu_name} {/if}" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>

                                <tr>
                                	<td><label>Pages:</label></td>
                                    <td>
                                       <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                                                            <tbody>
                                                                <br>
                                                                {foreach from=$pagelist item=page name=listofpages key=pk}
                                                                    {assign var="subpages" value=$sub_page_list[$pk]}
                                                                <tr {if $page->mother_page_id eq "0"} {else} class="blue_background" {/if}>
                                                                    <td width="3%">
                                                                        <input type="checkbox" name="assigned_pages[]" value="{$page->page_id}" id="page_included_{$page->page_id}" {if isset($assigned_page_ids) && $page->page_id|in_array:$assigned_page_ids } checked="checked" {/if}  />
                                                                    </td>
                                                                    <td>{$page->page_title}</td>
                                                                </tr>
                                                              	{/foreach}
                                                            </tbody>
                                                            
                                                        </table>
                                    </td>
                                    <td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                    	{if isset($menu_id) && $menu_id!=NULL}
                                    		<input type="hidden" name="menu_id" id="menu_id" value="{$menu_id}">
                                    	{/if}
                                        <input class="btn" type="submit" value="Submit" name="save_menu">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>