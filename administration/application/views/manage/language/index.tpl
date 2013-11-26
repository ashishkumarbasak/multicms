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
					<a class="btn btn-danger btn-small" href="{$baseurl}manage/language/create" >Install New Language</a>	
                    </div>
					
                    <form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th style="width:20px;">
                                    	<input type="checkbox" class="check_all" />
                                    </th>
                                    <th colspan="2"> 
                                    <div style="margin-left:47px;">Language</div>
                                    </th>
                                    <th>Default</th>
									<th width="100" align=""> Action</th>
								</tr>
							</thead>
							
							<tbody>
								{foreach from=$languagelist item=language name=listoflanguages key=cl}
								<tr>
									<td><input type="checkbox" /> </td>
                                    <td style="width:25px;"><img src="{$baseurl}assets/images/flags/png/{$language->flag}.png" style="border:0px; padding-top:3px;"></td>
									<td>{$language->language_name}</td>
                                    <td>
                                    	{if $language->is_default eq "1"}
                                        	<img src="{$baseurl}assets/images/star_active.png" style="border:0px;">
                                        {else}
                                        	<a href="{$baseurl}manage/language/make_default/{$language->language_id}"><img src="{$baseurl}assets/images/star_inactive.png" style="border:0px;"></a>    
                                        {/if}
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-small" href="{$baseurl}manage/language/uninstall/{$language->language_id}" onclick='return confirm("Are you sure you want to uninstall?")' >Uninstall</a>
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
