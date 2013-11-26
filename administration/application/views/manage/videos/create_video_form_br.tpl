{if isset($video_uploaded_successfully)}
                        	<div class="message info">
                            <p>
                            	Video Uploaded Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($form_error)}
                        	<div class="message errormsg">
                            <p>
                            	{foreach from=$form_error item=error name=listoferror key=ei}
                                	{if $error eq "video_title_blank"} Video title can't be left blank.<br>{/if}
                                    {if $error eq "video_description_blank"} Video description can't be left blank.<br>{/if}
                                {/foreach}
                            </p>
                            </div>
                        {/if}
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label id="lbl_title">Title (BR):</label></td>
									<td><input type="text" class="text small" name="video_title_br" value="{if $video_details!=NULL}{$video_details->video_title_br}{/if}" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label id="lbl_description">Description (BR):</label></td>
									<td><textarea name="video_description_br" id="video_description" class="textarea">{if $video_details!=NULL}{$video_details->video_description_br}{/if}</textarea></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
                                <tr>
									<td><label id="lbl_video_cover_image">Video Cover Image(960x540):</label></td>
									<td>
                                    	<div class="container">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                                <i class="icon-plus icon-white"></i>
                                                <span>Select files...</span>
                                                <!-- The file input field used as target for the file upload widget -->
                                                <input id="fileupload_video_image_br" type="file" name="files[]" multiple>
                                                <input type="hidden" name="video_cover_image_br" id="video_cover_image_br" value="">
                                            </span>
                                            <br>
                                            <br>
                                            <!-- The global progress bar -->
                                            <div id="progress11" class="progress progress-success progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div id="files11" class="files"></div> 
                                            {if $video_details!=NULL}
                                            	{if $video_details->video_image_name_br!=NULL}
                                                	<div class="files">
                                                    <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->video_image_name_br}" target="_blank">														{$video_details->video_image_name_br}
                                                    </a> [<a href="{$baseurl}manage/videos/delete_video_image/{$video_details->trv_video_id}/br">Delete</a>]
                                                    </div>
                                                {/if}
                                            {/if}                                           
                                        </div>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
								 <tr>
									<td><label id="lbl_video_file">Attachment (pdf,doc):</label></td>
									<td>
                                    	<div class="container">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                                <i class="icon-plus icon-white"></i>
                                                <span>Select files...</span>
                                                <!-- The file input field used as target for the file upload widget -->
                                                <input id="fileupload_attachment_br" type="file" name="files[]" multiple>
                                                <input type="hidden" name="attachment_br" id="attachment_br" value="">
                                            </span>
                                            <br>
                                            <br>
                                            <!-- The global progress bar -->
                                            <div id="progress6" class="progress progress-success progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div id="files6" class="files"></div>
                                            {if $video_details!=NULL}
                                            	{if $video_details->attachment_br!=NULL}
                                                	<div class="files">
                                                    <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->attachment_br}" target="_blank">
                                                    	{$video_details->attachment_br}
                                                    </a> [<a href="{$baseurl}manage/videos/delete_attachment/{$video_details->trv_video_id}/br">Delete</a>]
                                                    </div>
                                                {/if}
                                            {/if}
                                        </div>
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                
                                
                                <tr>
									<td><label id="lbl_video_file">Video File (mp4):</label></td>
									<td>
                                    
                                   
<div class="container">
    
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="icon-plus icon-white"></i>
        <span>Select files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload_br" type="file" name="files[]" multiple>
        <input type="hidden" name="video_file_br" id="video_file_br" value="">
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress3" class="progress progress-success progress-striped">
        <div class="bar"></div>
    </div>
    <div id="files3" class="files"></div>
    {if isset($video_file_br) && $video_file_br!=NULL}
    	<a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_file_br}" target="_blank">
			{$video_file_br}
		</a>
    {elseif $video_details!=NULL}
        {if $video_details->video_file_name_br!=NULL}
            <div class="files">
            <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->video_file_name_br}" target="_blank">
                {$video_details->video_file_name_br}
            </a> [<a href="{$baseurl}manage/videos/delete_video/{$video_details->trv_video_id}/br">Delete</a>]
            </div>
        {/if}
    {/if}
</div>
                                    
                                    
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                
                                <tr>
                                    <td></td>
                                    <td>
                                        <input class="btn" type="submit" value="Submit" name="create_video">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>