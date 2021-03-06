{literal}
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
{/literal}
<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
			
						{if isset($page_create_successfully)}
                        	<div class="message info">
                            <p>
                            	Page Created Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($page_updated_successfully)}
                        	<div class="message info">
                            <p>
                            	Page Updated Successfully.
                            </p>
                            </div>
                        {/if}
					
					<form action="" method="post">
						<div style="text-align:right;">
							<a class="btn btn-danger btn-small" href="{$baseurl}manage/products/import">Import Products</a>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th width="300">Product Title</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Author</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$pagelist item=page name=listofpages key=pk}
                                	{assign var="subpages" value=$sub_page_list[$pk]}
								<tr>
									<td><input type="checkbox" /></td>
									<td>
                                    	<img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;">
                                        <a href="{$baseurl}manage/products/edit/{$page->page_id}">{$page->page_title}</a>
                                    </td>
                                    <td>{$page->status}</td>
                                    <td>{$page->date_created}</td>
                                    <td>{$page->author}</td>
									<td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/products/edit/{$page->page_id}">edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/products/delete/{$page->product_id}/{$page->page_id}" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
									</td>
								</tr>
                                    {foreach from=$subpages item=subpage name=listofsubpages key=spk}
                                    	<tr {if $subpage->mother_page_id eq "0"} {else} class="blue_background" {/if}>
                                            <td><input type="checkbox" /></td>
                                            <td>
                                            	&iota;__ &nbsp;
                                                <img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;">
                                                <a href="{$baseurl}manage/pages/edit/{$subpage->page_id}">{$subpage->page_title}</a>
											</td>
                                            <td>{$subpage->status}</td>
                                            <td>{$subpage->date_created}</td>
                                            <td><input type="text" name="page_order_{$subpage->page_id}" id="page_order_{$subpage->page_id}" value="{$subpage->page_order}" style="width:30px;"></td>
                                            <td>{$subpage->author}</td>
                                            <td>
                                                <a class="btn btn-small" href="{$baseurl}manage/products/edit/{$subpage->page_id}">edit</a>
                                                <a class="btn btn-danger btn-small" href="{$baseurl}manage/products/delete/{$page->product_id}/{$page->page_id}" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
                                            </td>
                                        </tr>
                                    {/foreach}
								{/foreach}
								<tr>
									<td colspan="4">&nbsp;</td>
									<td> 
										<input type="hidden" name="page_ids" id="page_ids" value="{$page_ids}">
										<input type="hidden" name="save_page_order" id="save_page_order" value="Save Page Order" class="btn btn-small"> 
									</td>
									<td colspan="2"></td>
								</tr>																			
							</tbody>
							
						</table>
						
						{$pagination_link}
						
					</form>
					
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->