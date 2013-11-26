{literal}
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
{/literal}
<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
			
						
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Category Name</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$categorylist item=category name=listofcategories key=ck}
								<tr>
									<td><input type="checkbox" /></td>
									<td>
                                    <img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"> &nbsp;
                                    {if $category->parent_parent_category != NULL} <b style="color:#0000FF;">{$category->parent_parent_category} &raquo;</b> {/if}{if $category->parent_category != NULL} <b style="color:#0000FF;">{$category->parent_category} &raquo;</b> {/if}{$category->category_name}
                                    </td>
                                    <td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/categories/edit/{$category->category_id}">edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/categories/delete/{$category->category_id}" onclick='return confirm("Are you sure you want to delete?")' >Delete</a>
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
