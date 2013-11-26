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
                            	News Created Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($page_updated_successfully)}
                        	<div class="message info">
                            <p>
                            	News Updated Successfully.
                            </p>
                            </div>
                        {/if}
					
					<form action="" method="post">
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th width="300">Event Title</th>
                                    <th>Event date</th>
                                    <th>Start Time</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$eventlist item=event name=listofevents key=ek}
								<tr>
									<td><input type="checkbox" /></td>
									<td><a href="{$baseurl}manage/events/edit/{$event->event_id}">{$event->event_name}</a></td>
                                    <td>{$event->event_date}</td>
                                    <td>{$event->event_start_time}</td>
                                    <td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/events/edit/{$event->event_id}">edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/events/delete/{$event->event_id}" onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
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