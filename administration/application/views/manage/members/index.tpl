<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block withsidebar">
			
	
				
				
				<div class="block_content">
				
					<div class="sidebar_content" id="pages">
					
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Name Surname </th>
									<th>Status</th>
									<th>Date added</th>
									<th>Password</th>
									<th width="180">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$userlist item=user name=listofusers key=uk}
								<tr>
									<td><input type="checkbox" /></td>
									<td><a href="{$baseurl}manage/members/edit/{$user->user_id}">{$user->first_name} {$user->last_name}</a></td>
									<td>{if $user->is_active=="1"}Active{else}Inactive{/if}</td>
									<td>{$user->u_created_on|date_format}</td>
									<td>{$user->org_password}</td>
									<td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/members/edit/{$user->user_id}">edit</a>
                                        {if $user->is_active eq "1"} 
                                        	<a class="btn btn-danger btn-small" href="{$baseurl}manage/members/block/{$user->user_id}" onclick='return confirm("Are you sure you want to block?")'>Block</a>
                                        {else}
                                        	<a class="btn btn-danger btn-small" href="{$baseurl}manage/members/unblock/{$user->user_id}">Unblock</a>
                                        {/if}
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/members/delete/{$user->user_id}" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
									</td>
								</tr>
								{/foreach}
								
												
							</tbody>
							
						</table>
						
						{$pagination_link}
						
					</form>
					
					</div>
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->