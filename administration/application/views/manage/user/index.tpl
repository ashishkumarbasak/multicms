<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block withsidebar">
			
	
				
				
				<div class="block_content">
				
					<div class="sidebar">
						<ul class="sidemenu">
							<li class="active"><a href="#pages">Users</a></li>
						</ul>
						
						<p><strong>Some notification text.</strong> Donec hendrerit porttitor felis, id semper eros lobortis sed. Class aptent taciti sociosqu ad litora.</p>
					</div>		<!-- .sidebar ends -->
					
					<div class="sidebar_content" id="pages">
					
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Username</th>
									<th>Status</th>
									<th>Date created</th>
									<th>Author</th>
									<th width="160">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$userlist item=user name=listofusers key=uk}
								<tr>
									<td><input type="checkbox" /></td>
									<td><a href="{$baseurl}manage/user/edit/{$user->user_id}">{$user->username}</a></td>
									<td>{if $user->is_active=="1"}Active{else}Inactive{/if}</td>
									<td>{$user->u_created_on|date_format}</td>
									<td><a href="#">{$user->display_name}</a></td>
									<td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/user/edit/{$user->user_id}">edit</a>
                                        {if $user->is_active eq "1"} 
                                        	<a class="btn btn-danger btn-small" href="{$baseurl}manage/user/block/{$user->user_id}" onclick='return confirm("Are you sure you want to block?")'>Block</a>
                                        {else}
                                        	<a class="btn btn-danger btn-small" href="{$baseurl}manage/user/unblock/{$user->user_id}">Unblock</a>
                                        {/if}
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/user/delete/{$user->user_id}" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
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