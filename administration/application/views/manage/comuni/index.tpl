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
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Comune Name</th>
                                    <th>Show in Homepage</th>
									<td width="160">&nbsp;</td>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$comunelist item=comune name=listofcomune key=ck}
								<tr>
									<td><input type="checkbox" /></td>
									<td>{$comune->comune_name_it}</td>
                                    <td>{if $comune->show_in_homepage eq "1"}Yes{else}No{/if}</td>
									<td>
                                    	<a class="btn btn-small" href="">edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/comuni/delete/{$comune->comune_id}">Delete</a>
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