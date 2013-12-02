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
                		 {if isset($page_updated_successfully)}
                        	<div class="message info closeable">
                            <p>
                            	Page Updated Successfully.
                            </p>
                            </div>
                        {/if}
                       <ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Informazioni</a></li>
  <li><a href="#profile" data-toggle="tab">Additional Fields</a></li>
  <li><a href="#seo" data-toggle="tab">Seo</a></li>
  <li><a href="{$baseurl}manage/pages/edit/{$page_id}/slideshow">Slideshow</a></li>
  <li><a href="{$baseurl}manage/pages/edit/{$page_id}/videos">Videos</a></li>
  <li><a href="{$baseurl}manage/pages/edit/{$page_id}/files">Files</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">                        
					<form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="language_id" id="language_id" value="{$lang_id}">
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">	
							<tr>
								<td width="200">
                                	<label>Mother page:</label>
								</td>
								<td> 
                                	<select name="mother_page" id="e1" style="width:400px;">
        								<option value="0" {if isset($mother_page) && $mother_page==0} selected="selected" {/if}>none</option>
        								{foreach from=$list_of_pages item=mypage name=list_of_page key=pl}
                                        	<option value="{$mypage->page_id}" {if isset($mother_page) && $mother_page==$mypage->page_id} selected="selected" {elseif isset($page_details) &&  $page_details->mother_page_id==$mypage->page_id} selected="selected" {/if} >{$mypage->page_title}</option>
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
                                            	<option value="{$template_file}" {if isset($page_template) && $page_template==$template_file} selected="selected" {elseif  isset($page_details) && $template_file==$page_details->page_template} selected="selected" {/if} >{$template_file}</option>
                                            {/if}
                                        {/foreach}
    								</select>
								</td>
							</tr>
							<tr style="display:none;">
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
								<td width="200"><label>Titolo:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_title" type="text" class="text small" value="{if isset($page_title)}{$page_title}{else}{$page_details->page_title}{/if}" />
                                    <br><code>&lt;?php echo $page_title; ?&gt;</code>
                                </td>
							</tr>
							<tr>
								<td width="200"><label>Url Slug:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input type="text" name="page_url" style="text-transform: lowercase;"  class="text small" value="{if isset($page_url)}{$page_url}{else}{$page_details->page_url}{/if}" />
                                    <br><code>&lt;?php echo $page_url; ?&gt;</code>
								</td>
							</tr>
 
							
						</table>
						
			
								                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
											<tr>
												<td width="200"><label>Descrizione 1:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
												<td><textarea class="textarea" name="description_1">{if isset($description_1)}{$description_1}{else}{$page_details->description_1}{/if}</textarea>
												<br><code>&lt;?php echo $description_1; ?&gt;</code>
											</tr>
										</table>
									          
									          	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                			<tr>
                                            	<td width="200"><label>Descrizione 2:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
                                            	<td>
                                                	<textarea class="textarea" name="description_2">{if isset($description_2)}{$description_2}{else}{$page_details->description_2}{/if}</textarea>
                                                    <br><code>&lt;?php echo $description_2; ?&gt;</code>
                                                </td>
                                        	</tr>
										</table>

									          			<table cellpadding="0" cellspacing="0" width="100%" class="sort" id="add_additional_field_ul">

											<tr>
												<td width="200"><label>Foto 1:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label>
</td>
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
                                                        	{if $page_details!=NULL}
                                                                {if $page_details->photo!=NULL}
                                                                    <div class="files">
                                                                    <a href="{$baseurl|replace:"administration/":""}assets/pages/{$page_details->photo}" target="_blank">
                                                                        {$page_details->photo}
                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>                                                                    
                                                                {/if}
                                                            {/if}
                                                            <br><code>&lt;?php echo $photo_1; ?&gt;</code>
                                                        </div>
                                                    </div>
                                                </td>
											</tr>
										</table>
										
										                
										<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                			<tr>
                                            	<td width="200"><label>Foto 2:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
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
                                                        	 {if $page_details!=NULL}
                                                                {if $page_details->photo_1!=NULL}
                                                                    <div class="files">
                                                                    <a href="{$baseurl|replace:"administration/":""}assets/pages/{$page_details->photo_1}" target="_blank">
                                                                        {$page_details->photo_1}
                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                {/if}
                                                            {/if}
                                                            <br><code>&lt;?php echo $photo_2; ?&gt;</code>
                                                        </div>
                                                       
                                                    </div>
                                                </td>
                                        	</tr>
										</table>
								                                    																
                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                    		<tr>
												<td width="200"><label>Foto 3:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
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
                                                        	{if $page_details!=NULL}
                                                                {if $page_details->photo_2!=NULL}
                                                                    <div class="files">
                                                                    <a href="{$baseurl|replace:"administration/":""}assets/pages/{$page_details->photo_2}" target="_blank">
                                                                        {$page_details->photo_2}
                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                {/if}
                                                            {/if}
                                                            <br><code>&lt;?php echo photo_3; ?&gt;</code>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
										</table>

                                        <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200"><label>Assign to Menus:  <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
                                                <td>                                                    
                                                    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                                                        <tbody>
                                                            {foreach from=$list_of_menus item=menu name=listofpages key=pk}
                                                                <tr>
                                                                    <td width="3%">
                                                                        <input type="checkbox" name="menu_ids[]" id="page_included_{$menu->menu_id}" {if $menu->menu_id|in_array:$included_in_menu_ids} checked="checked" {/if} value="{$menu->menu_id}" />
                                                                    </td>
                                                                    <td>{$menu->menu_name}</td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
	
						</div>
						
																		
						 <div class="tab-pane" id="profile">
                                											
                            {assign var="n_description" value=0}
                            {assign var="n_title" value=0}
                            {assign var="n_photo" value=0}
                            {assign var="n_file" value=0}
                        	{if $additional_fields!=NULL}
                            	{foreach from=$additional_fields item=additional_field name=list_of_fields key=afk}
                                	<div id="{$additional_field->field_id}">
                                            <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                                <tr>
                                                    <td width="200"><label style=" text-transform:uppercase;">Additional {$additional_field->field_type}: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
                                                    <td>                                                    
                                                        {if $additional_field->field_type=="description"}
                                                            <textarea class="textarea" name="additional_filed_value_{$additional_field->field_id}">{$additional_field->field_value}</textarea>
                                                            <br><code>&lt;?php echo $additional_description[{$n_description}]; ?&gt;</code>
                                                            {assign var="n_description" value=$n_description+1}
                                                        {elseif $additional_field->field_type=="title"}
                                                            <input name="additional_filed_value_{$additional_field->field_id}" type="text" class="text small" value="{$additional_field->field_value}" /> 
                                                            <br><code>&lt;?php echo $additional_title[{$n_title}]; ?&gt;</code>
                                                            {assign var="n_title" value=$n_title+1}
                                                        {elseif  $additional_field->field_type=="photo"}    
                                                        	{include file="manage/pages/additional_photo.tpl" field_details=$additional_field}
                                                            <br><code>&lt;?php echo $additional_photo[{$n_photo}]; ?&gt;</code>
                                                            {assign var="n_photo" value=$n_photo+1}
                                                        {elseif  $additional_field->field_type=="file"}    
                                                        	{include file="manage/pages/additional_file.tpl" field_details=$additional_field}
                                                            <br><code>&lt;?php echo $additional_file[{$n_file}]; ?&gt;</code>
                                                            {assign var="n_file" value=$n_file+1}
                                                        {/if}
                                                    	<input type="hidden" name="additional_field_id_{$afk}" id="additional_field_id" value="{$additional_field->field_id}">
                                                    </td>
                                                    <td>
                                                    	<a class="close" href="javascript:void(0);" onclick="delete_additional_field('{$additional_field->field_id}');">��</a>
                                                    </td>
                                                </tr>
                                            </table>
                                    </div>
                                {/foreach}
                                <input type="hidden" name="total_additional_field" id="total_additional_field" value="{$additional_fields|@count}">
                            {/if}
                            </ul>
                            <ul id="li_add_new_field">
                            	 <li></li> 
                            </ul>
                           
                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                    		<tr>
                                                <td width="200"><label>Aggiungi campo</label></td>
                                                <td><a data-toggle="modal" href="#example" class="btn btn-info">Aggiungi campo</a></td>
                                            </tr>
										</table>
								
						                  </div>
	 <div class="tab-pane" id="seo">
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">	

						                           <tr>
								<td width="200"><label>SEO Titolo: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_seotitle" type="text" class="text small" value="{if isset($page_seotitle)}{$page_seotitle}{else}{$page_details->page_seotitle}{/if}" />
                                    <br><code>&lt;?php echo $seo_title; ?&gt;</code>
                                </td>
							</tr>
                            <tr>
								<td width="200"><label>SEO Keywords: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_seokeywords" type="text" class="text small" value="{if isset($page_seokeywords)}{$page_seokeywords}{else}{$page_details->page_seokeywords}{/if}" />
                                    <br><code>&lt;?php echo $seo_keywords; ?&gt;</code>
                                </td>
                            </tr>
                            <tr>
								<td width="200"><label>SEO Description: <br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_seodescription" type="text" class="text small" value="{if isset($page_seodescription)}{$page_seodescription}{else}{$page_details->page_seodescription}{/if}" />
                                    <br><code>&lt;?php echo $seo_description; ?&gt;</code>
								</td>
                            </tr>
                            </table>
							</div>

						<table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                    		<tr>
												<td width="200">&nbsp;</td>
                                                <td>
                                                	<input type="hidden" name="page_id" id="page_id" value="{$page_id}">
                                                	<input class="btn" type="submit" name="Salva" id="Salva" value="Salva">
                                                </td>
                                            </tr>
										</table>                                              	
					</form>
 
</div>

                    
                    <form name="additional_form_element" id="additional_form_element" action="{$baseurl}manage/pages/add_addition_field" method="post" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">	
							<div id="example" class="modal hide fade in" >
            					<div class="modal-header">
              						<a class="close" data-dismiss="modal">��</a>
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
						</table>
                        </form>
                    
                    
                    
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->
			
			
			
			
			
		