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
									<th>Document Name</th>
                                    <th>Category Name</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$documentlist item=document name=listofcategories key=ck}
								<tr>
									<td><input type="checkbox" /></td>
									<td>
                                    	<a target="_blank" href="{$baseurl|replace:"administration/":""}assets/documents/{$document->document_file_name}">
                                        	{$document->document_name}
                                        </a>
                                    </td>
                                    <td>{$document->category_name_it}</td>
                                    <td>
                                    	<a class="btn btn-small" href="{$baseurl}manage/documents/edit/{$document->document_id}">edit</a>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/documents/delete/{$document->document_id}" onclick='return confirm("Are you sure you want to delete?")' >Delete</a>
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
