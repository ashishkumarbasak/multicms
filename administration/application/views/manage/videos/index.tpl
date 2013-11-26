<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
			
					
					
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Video Title</th>
									<th width="160">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$videolist item=video name=listofvideos key=uk}
								<tr>
									<td><input type="checkbox" /></td>
									<td><a href="page-add.php">{$video->video_title_it}</a></td>
									<td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/videos/edit/{$video->trv_video_id}">edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/videos/delete/{$video->trv_video_id}" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
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