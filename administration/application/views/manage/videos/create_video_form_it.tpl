						{if isset($video_uploaded_successfully)}
                        	<div class="message info">
                            <p>
                            	Video Uploaded Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($video_updated_successfully)}
                        	<div class="message info">
                            <p>
                            	Video Updated Successfully.
                            </p>
                            </div>
                        {/if}
                        
                        {if isset($form_error)}
                        	<div class="message errormsg">
                            <p>
                            	{foreach from=$form_error item=error name=listoferror key=ei}
                                	{if $error eq "video_title_it_blank"} Video Title (IT) can't be left blank.<br>{/if}
                                    {if $error eq "video_description_it_blank"} Video Description (IT) can't be left blank.<br>{/if}
                                {/foreach}
                            </p>
                            </div>
                        {/if}
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label id="lbl_title">Title (IT):</label></td>
									<td><input type="text" class="text small" name="video_title_it" value="{if $video_details!=NULL}{$video_details->video_title_it}{/if}" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
								
								<tr>
									<td><label id="lbl_description">Description (IT):</label></td>
									<td><textarea name="video_description_it" id="video_description" class="textarea">{if $video_details!=NULL}{$video_details->video_description_it}{/if}</textarea></td>
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
                                                <input id="fileupload_video_image_it" type="file" name="files[]" multiple>
                                                <input type="hidden" name="video_cover_image_it" id="video_cover_image_it" value="">
                                            </span>
                                            <br>
                                            <br>
                                            <!-- The global progress bar -->
                                            <div id="progress9" class="progress progress-success progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div id="files9" class="files"></div>
                                            {if $video_details!=NULL}
                                            	{if $video_details->video_image_name_it!=NULL}
                                                	<div class="files">
                                                    <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->video_image_name_it}" target="_blank">														{$video_details->video_image_name_it}
                                                    </a> [<a href="{$baseurl}manage/videos/delete_video_image/{$video_details->trv_video_id}/it">Delete</a>]
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
                                                <input id="fileupload_attachment_it" type="file" name="files[]" multiple>
                                                <input type="hidden" name="attachment_it" id="attachment_it" value="">
                                            </span>
                                            <br>
                                            <br>
                                            <!-- The global progress bar -->
                                            <div id="progress8" class="progress progress-success progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div id="files8" class="files"></div>
                                            {if $video_details!=NULL}
                                            	{if $video_details->attachment_it!=NULL}
                                                	<div class="files">
                                                    <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->attachment_it}" target="_blank">
                                                    	{$video_details->attachment_it}
                                                    </a> [<a href="{$baseurl}manage/videos/delete_attachment/{$video_details->trv_video_id}/it">Delete</a>]
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
        <input id="fileupload_it" type="file" name="files[]" multiple>
        <input type="hidden" name="video_file_it" id="video_file_it" value="">
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress1" class="progress progress-success progress-striped">
        <div class="bar"></div>
    </div>
    <div id="files1" class="files"></div>
    {if isset($video_file_it) && $video_file_it!=NULL}
    	<a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_file_it}" target="_blank">
			{$video_file_it}
		</a>
    {elseif $video_details!=NULL}
        {if $video_details->video_file_name_it!=NULL}
            <div class="files">
            <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->video_file_name_it}" target="_blank">
                {$video_details->video_file_name_it}
            </a> [<a href="{$baseurl}manage/videos/delete_video/{$video_details->trv_video_id}/it">Delete</a>]
            </div>
        {/if}
    {/if}
    
</div>
                                    
                                    
                                    </td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>
                                
                                
                                
                                
                                
                                <tr>
									<td><label id="lbl_category">Category:</label></td>
									<td>
                                    	<select name="video_category">
                                        	<option value="">Select Category</option>
                                            {foreach from=$categorylist item=category name=listofcategories key=ck}
                                           	 {if $category->parent_parent_category != NULL && $category->parent_category!=NULL}
                                             <option value="{$category->category_id}" {if $video_details!=NULL && $video_details->video_category_id==$category->category_id} selected="selected" {/if}>
                                             	{if $category->parent_parent_category != NULL} <b style="color:#0000FF;">{$category->parent_parent_category} &raquo;</b> {/if}{if $category->parent_category != NULL} <b style="color:#0000FF;">{$category->parent_category} &raquo;</b> {/if}{$category->category_name_it}   
											</option>
                                            {/if}
                                            {/foreach}
                                        </select>
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