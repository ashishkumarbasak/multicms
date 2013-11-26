<link rel="stylesheet" href="{$baseurl}assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">
{literal}
<style type="text/css">
	#add_additional_field_ul li:hover{ background-color:#CCCCCC; cursor:move;}
</style>
{/literal}
<div id="hld">
	<!-- wrapper begins -->
	<div class="wrapper">		
		<div class="block">
			<div class="block_content">
				<h1>Add page</h1>
                		{if isset($page_create_successfully)}
                        	<div class="message info">
                            <p>
                            	Page Created Successfully.
                            </p>
                            </div>
                        {/if}
					<form action="" method="post" enctype="multipart/form-data">
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">	
							<tr>
								<td width="200">
                                	<label>Mother page:</label>
								</td>
								<td> 
                                	<select name="mother_page" id="e1" style="width:400px;">
        								<option value="0" {if isset($mother_page) && $mother_page==0} selected="selected" {/if}>none</option>
        								{foreach from=$list_of_pages item=mypage name=list_of_page key=pl}
                                        	<option value="{$mypage->page_id}" {if isset($mother_page) && $mother_page==$mypage->page_id} selected="selected" {/if} >{$mypage->page_title}</option>
                                        {/foreach}
									</select>
								</td>
							</tr>
							<tr>
								<td width="200">
                                	<label>Scegli il tuo template:</label>
								</td>
								<td> 
                                	<select name="page_template" id="e2" style="width:400px;">
        								{foreach from=$list_of_templates item=template_file name=list_of_template key=tl}
                                        	{if $template_file =="." || $template_file==".."}
                                            {else}
                                            	<option value="{$template_file}" {if isset($page_template) && $page_template==$template_file} selected="selected" {/if} >{$template_file}</option>
                                            {/if}
                                        {/foreach}
    								</select>
								</td>
							</tr>
							<tr>
								<td width="200">
                                	<label>Prodotto Homepage</label>
								</td>
								<td>
                                	<p class="field switch">
										<label class="cb-enable" onclick="$('#is_home_page').val(1);"><span>On</span></label>
										<label class="cb-disable selected" onclick="$('#show_in_homepage').val(0);"><span>Off</span></label>
                                        <input type="hidden" name="is_home_page" id="is_home_page" value="0">
									</p>
								</td>
							</tr>
							<tr>
								<td width="200"><label>Titolo:</label></td>
								<td><input name="page_title" type="text" class="text small" value="{if isset($page_title)}{$page_title}{/if}" /></td>
							</tr>
                            <tr>
								<td width="200"><label>SEO Titolo:</label></td>
								<td><input name="page_seotitle" type="text" class="text small" value="{if isset($page_seotitle)}{$page_seotitle}{/if}" /></td>
							</tr>
                          
                            <tr>
								<td width="200"><label>SEO Description:</label></td>
								<td><input name="page_seodescription" type="text" class="text small" value="{if isset($page_seodescription)}{$page_seodescription}{/if}" /></td>
							</tr>
							  <tr>
								<td width="200"><label>SEO Keywords:</label></td>
								<td><input name="page_seokeywords" type="text" class="text small" value="{if isset($page_seokeywords)}{$page_seokeywords}{/if}" /></td>
							</tr>
							<tr>
								<td width="200"><label>Url:</label></td>
								<td><input type="text" name="page_url" class="text small" value="{if isset($page_url)}{$page_url}{/if}" /></td>
							</tr>
						</table>	
						
                        <ul id="add_additional_field_ul" class="menu">
							<li class="lvl-3">
                        		
                                	<span>
                                		<table cellpadding="0" cellspacing="0" width="100%" class="sort">
											<tr>
												<td width="200"><label>Foto 2:</label></td>
												<td>
                                                	<div class="container">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn btn-success fileinput-button">
                                                            <i class="icon-plus icon-white"></i>
                                                            <span>Select Images...</span>
                                                            <!-- The file input field used as target for the file upload widget -->
                                                            <input id="main_photo" type="file" name="files[]" multiple>
                                                            <input type="hidden" name="main_photo" id="main_photo_value" value="">
                                                        </span>
                                                        <br>
                                                        <br>
                                                        <!-- The global progress bar -->
                                                        <div id="progress1" class="progress progress-success progress-striped">
                                                            <div class="bar"></div>
                                                        </div>
                                                        <div id="files1" class="files">
                                                        	{if $video_details!=NULL}
                                                                {if $video_details->video_image_name_it!=NULL}
                                                                    <div class="files">
                                                                    <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->video_image_name_it}" target="_blank">														{$video_details->video_image_name_it}
                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                {/if}
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </td>
											</tr>
										</table>
									</span>
								
							</li> 
                    		
                            <li class="lvl-3">
                        		
                                	<span>
                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
											<tr>
												<td width="200"><label>Descrizione 1:</label></td>
												<td><textarea class="textarea" name="description_1">{if isset($description_1)}{$description_1}{/if}</textarea></td>
											</tr>
										</table>
									</span>
								
                    		</li>
                            
                            <li class="lvl-3">
                               
                                	<span>
										<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                			<tr>
                                            	<td width="200"><label>Descrizione 2:</label></td>
                                            	<td>
                                                	<div class="container">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn btn-success fileinput-button">
                                                            <i class="icon-plus icon-white"></i>
                                                            <span>Select Images...</span>
                                                            <!-- The file input field used as target for the file upload widget -->
                                                            <input id="photo_1" type="file" name="files[]" multiple>
                                                            <input type="hidden" name="photo_1" id="photo_1_value" value="">
                                                        </span>
                                                        <br>
                                                        <br>
                                                        <!-- The global progress bar -->
                                                        <div id="progress2" class="progress progress-success progress-striped">
                                                            <div class="bar"></div>
                                                        </div>
                                                        <div id="files2" class="files">
                                                        	{if $video_details!=NULL}
                                                                {if $video_details->video_image_name_it!=NULL}
                                                                    <div class="files">
                                                                    <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->video_image_name_it}" target="_blank">														{$video_details->video_image_name_it}
                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                {/if}
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </td>
                                        	</tr>
										</table>
									</span>
								
                            </li>
                    
                            <li class="lvl-3">
                                
                                	<span>
                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                			<tr>
                                            	<td width="200"><label>Descrizione 2:</label></td>
                                            	<td><textarea class="textarea" name="description_2">{if isset($description_2)}{$description_2}{/if}</textarea></td>
                                        	</tr>
										</table>
									</span>
								
                            </li>
                            
                            <li class="lvl-3">
								
                                	<span>
                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                    		<tr>
												<td width="200"><label>Descrizione 2:</label></td>
                                                <td>
                                                	<div class="container">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn btn-success fileinput-button">
                                                            <i class="icon-plus icon-white"></i>
                                                            <span>Select Images...</span>
                                                            <!-- The file input field used as target for the file upload widget -->
                                                            <input id="photo_2" type="file" name="files[]" multiple>
                                                            <input type="hidden" name="photo_2" id="photo_2_value" value="">
                                                        </span>
                                                        <br>
                                                        <br>
                                                        <!-- The global progress bar -->
                                                        <div id="progress3" class="progress progress-success progress-striped">
                                                            <div class="bar"></div>
                                                        </div>
                                                        <div id="files3" class="files">
                                                        	{if $video_details!=NULL}
                                                                {if $video_details->video_image_name_it!=NULL}
                                                                    <div class="files">
                                                                    <a href="{$baseurl|replace:"administration/":""}assets/videos/{$video_details->video_image_name_it}" target="_blank">														{$video_details->video_image_name_it}
                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                {/if}
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
										</table>
									</span>
								
							</li>
                        
                        	{if $additional_fields!=NULL}
                            	{foreach from=$additional_fields item=additional_field name=list_of_fields key=afk}
                                	<li id="{$additional_field->field_id}" class="lvl-3">
                                        <span>
                                            <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                                <tr>
                                                    <td width="200"><label style=" text-transform:uppercase;">Additional {$additional_field->field_type}</label></td>
                                                    <td>                                                    
                                                        {if $additional_field->field_type=="description"}
                                                            <textarea class="textarea" name="additional_filed_value_{$additional_field->field_id}">{$additional_field->field_value}</textarea>
                                                        {elseif $additional_field->field_type=="title"}
                                                            <input name="additional_filed_value_{$additional_field->field_id}" type="text" class="text small" value="{$additional_field->field_value}" />                        
                                                        {elseif  $additional_field->field_type=="photo"}    
                                                        	{include file="manage/pages/additional_photo.tpl" field_details=$additional_field}
                                                        {elseif  $additional_field->field_type=="file"}    
                                                        	{include file="manage/pages/additional_file.tpl" field_details=$additional_field}
                                                        {/if}
                                                    	<input type="hidden" name="additional_field_id_{$afk}" id="additional_field_id" value="{$additional_field->field_id}">
                                                    </td>
                                                    <td>
                                                    	<a class="close" href="javascript:void(0);" onclick="delete_additional_field('{$additional_field->field_id}');">×</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </span>
                                    </li>
                                {/foreach}
                                <input type="hidden" name="total_additional_field" id="total_additional_field" value="{$additional_fields|@count}">
                            {/if}
                            </ul>
                            <ul id="li_add_new_field">
                            	 <li></li> 
                            </ul>
                            
                            <ul class="menu">
                            <li class="lvl-3">
                                	<span>
                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                    		<tr>
                                                <td width="200"><label>Aggiungi campo</label></td>
                                                <td><a data-toggle="modal" href="#example" class="btn btn-info">Aggiungi campo</a></td>
                                            </tr>
										</table>
									</span>
							</li>
                            
                            <li class="lvl-3">
                                	<span>
                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                    		<tr>
												<td width="200">&nbsp;</td>
                                                <td>
                                                	<input type="hidden" name="page_id" id="page_id" value="{$page_id}">
                                                	<input class="btn" type="submit" name="Salva" id="Salva" value="Salva">
                                                </td>
                                            </tr>
										</table>
									</span>
							</li>
						</ul>                                              	
					</form>
                    
                    
                    <form name="additional_form_element" id="additional_form_element" action="{$baseurl}manage/pages/add_addition_field" method="post" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                    	<tr>
                        	<td>
                    			<div id="example" class="modal hide fade in">
                                    <div class="modal-header">
                                        <a class="close" data-dismiss="modal">×</a>
                                        <h3>Aggiungi campo</h3>
                                    </div>
                                    <div id="ajax_loader" style="text-align:center; display:none;"> 
                                        <img src="{$baseurl}assets/images/ajax-loader.gif"> 
                                    </div>
                                    <div class="message info" id="output_message" style="display:none;">
                                        <p id="output"></p>
                                    </div>
                                	<div class="modal-body">
                                        <Select name="additional_type" id="select1">
                                            <option value="">Scegli</option>
                                            <option value="description">aggiungi textarea</option>
                                            <option value="title">aggiungi title</option>
                                            <option value="photo">aggiungi photo</option>
                                            <option value="file">aggiungi file</option>
                                        </Select>
									
                                        <div id="1" class="field1" style="display:none"></div>
                                        <div id="description" class="field1" style="display:none">
                                            <br><textarea name="additional_description" id="additional_description" class="textarea"></textarea>
                                        </div>
                                        <div id="title" class="field1" style="display:none">
                                            <br><input type="text" name="additional_title" id="additional_title" class="text small" />
                                        </div>	
                                        <div id="photo" class="field1" style="display:none">
                                                        <div class="container">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn btn-success fileinput-button">
                                                                <i class="icon-plus icon-white"></i>
                                                                <span>Select Images...</span>
                                                                <!-- The file input field used as target for the file upload widget -->
                                                                <input id="additional_photo" type="file" name="files[]" multiple>
                                                                <input type="hidden" name="additional_photo" id="additional_photo_value" value="">
                                                            </span>
                                                            <br>
                                                            <br>
                                                            <!-- The global progress bar -->
                                                            <div id="progress_additional_photo" class="progress progress-success progress-striped">
                                                                <div class="bar"></div>
                                                            </div>
                                                            <div id="files_additional_photo" class="files"></div>
                                                        </div>
                                        </div>	
                                        <div id="file" class="field1" style="display:none">
                                                        <div class="container">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn btn-success fileinput-button">
                                                                <i class="icon-plus icon-white"></i>
                                                                <span>Select files...</span>
                                                                <!-- The file input field used as target for the file upload widget -->
                                                                <input id="additional_file" type="file" name="files[]" multiple>
                                                                <input type="hidden" name="additional_file" id="additional_file_value" value="">
                                                            </span>
                                                            <br>
                                                            <br>
                                                            <!-- The global progress bar -->
                                                            <div id="progress_additional_file" class="progress progress-success progress-striped">
                                                                <div class="bar"></div>
                                                            </div>
                                                            <div id="files_additional_file" class="files"></div>
                                                        </div>
                                        </div>	
									
                                    	<br><br>
   										<div id="container"></div>	        
            						</div>
            					
                                    <div class="modal-footer">
                                        <input type="hidden" name="page_id" id="page_id" value="{$page_id}">
                                        <input type="submit" name="salva" id="salva" class="btn btn-success" value="Salva">
                                        <a href="javascript:void(0);" class="btn" data-dismiss="modal">Close</a>
                                    </div>
          						</div>
								</td>
							</tr>
						</table>
                        </form>
                    
                    
                    
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->
			
			
			
			
			
		