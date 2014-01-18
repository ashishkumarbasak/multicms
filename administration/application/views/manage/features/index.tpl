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
							<a class="btn btn-danger btn-small" href="{$baseurl}manage/features/create2/?lang={$lang_code}">Add Features</a>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th width="300">Feature Name</th><th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$pagelist item=page name=listofpages key=pk}
                                	
								<tr>
									<td><input type="checkbox" /></td>
									<td>
                                    	<img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;">
                                        <a href="{$baseurl}manage/packagings/edit/{$page->feature_id}">
                                        	{$page->feature_title}
                                        </a>
                                    </td>
                                    <td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/features/edit/{$page->feature_id}">edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/features/delete/{$page->feature_id}" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
									</td>
								</tr>
								{/foreach}																			
							</tbody>
							
						</table>
						
						{$pagination_link}
						
					</form>
					
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->