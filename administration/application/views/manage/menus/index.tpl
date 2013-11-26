{literal}
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
{/literal}
<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
					<div style="text-align:right; margin-bottom:20px;">
					<a class="btn btn-danger btn-small" href="{$baseurl}manage/menus/create" >Add New Menu</a>	
                    </div>
					
                    <form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th style="width:20px;">
                                    	<input type="checkbox" class="check_all" />
                                    </th>
                                    <th> 
                                    	<div>Menu</div>
                                    </th>
                                    <th> 
                                    	<div>Widget Code</div>
                                    </th>
									<th style="width:200px;" align=""> Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$menulist item=menu name=listofmenus key=cl}
								<tr>
									<td><input type="checkbox" /> </td>
									<td>{$menu->menu_name}</td>
									<td><code>&lt;?php echo render_menu($menu_id={$menu->menu_id}); &gt;</code></td>
                                    <td style="width:200px;" >
                                    	<a class="btn btn-danger btn-small" href="{$baseurl}manage/menus/edit/{$menu->menu_id}">Edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/menus/delete/{$menu->menu_id}" onclick='return confirm("Are you sure you want to delete?")' >Delete</a>
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
