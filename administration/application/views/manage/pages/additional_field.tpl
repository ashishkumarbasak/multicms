<li id="{$field_details->field_id}" class="lvl-3">
	<span>
		<table cellpadding="0" cellspacing="0" width="100%" class="sort">
			<tr>
				<td width="200"><label style=" text-transform:capitalize;">Additional {$field_details->field_type}: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
				<td>
                	{$additional_field->field_type}
                	{if $field_details->field_type=="description"}                    	
                    	<textarea class="textarea" id="additional_description_{$field_details->field_id}" name="additional_description_{$field_details->field_id}">{$field_details->field_value}</textarea>
                        {literal}
						<script>
							var id="#additional_description_{/literal}{$field_details->field_id}{literal}";
							$(document).ready(function() { 	
								$(id).wysihtml5();
							});
						</script>
                        {/literal}
                        <br><code>&lt;?php echo additional_description[{$number_of_fields}]; &gt;</code>
                    {elseif $field_details->field_type=="title"}
                    	<input name="additional_title_{$field_details->field_id}" type="text" class="text small" value="{$field_details->field_value}" />
                        <br><code>&lt;?php echo additional_title[{$number_of_fields}]; &gt;</code>
                    {elseif  $field_details->field_type=="photo"} 
						{include file="manage/pages/additional_photo.tpl" field_details=$field_details}
                        <br><code>&lt;?php echo additional_photo[{$number_of_fields}]; &gt;</code>
					{elseif  $field_details->field_type=="file"}    
						{include file="manage/pages/additional_file.tpl" field_details=$field_details}                            
                        <br><code>&lt;?php echo additional_file[{$number_of_fields}]; &gt;</code>
                    {/if}
                
                </td>
                <td>
                	<a class="close" href="javascript:void(0);" onclick="delete_additional_field('{$field_details->field_id}');">x</a>
                </td>
			</tr>
		</table>
	</span>
</li>