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
                		 {if isset($product_updated_successfully)}
                        	<div class="message info closeable">
                            <p>
                            	Product Updated Successfully.
                            </p>
                            </div>
                        {/if}
                       	<ul class="nav nav-tabs">
                          <li class="active"><a href="#home" data-toggle="tab" style="font-size: 14px;">Informazioni</a></li>
                          <li><a href="#profile" data-toggle="tab" style="font-size: 14px;">Additional Fields</a></li>
                          <li><a href="#seo" data-toggle="tab" style="font-size: 14px;">Seo</a></li>
                          <li><a href="#tab_packaging" data-toggle="tab" style="font-size: 14px;">Packaging</a></li>
                          <li><a href="#tab_features" data-toggle="tab" style="font-size: 14px;">Features</a></li>
                          <li><a href="#show_in_pages" data-toggle="tab" style="font-size: 14px;">Show In Pages</a></li>
                          <li><a href="{$baseurl}manage/products/edit/{$page_id}/slideshow" style="font-size: 14px;">Slideshow</a></li>
                          <li><a href="{$baseurl}manage/products/edit/{$page_id}/videos" style="font-size: 14px;">Videos</a></li>
  						  <li><a href="{$baseurl}manage/products/edit/{$page_id}/files" style="font-size: 14px;">Files</a></li>
						</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">                        
					<form action="" method="post" enctype="multipart/form-data">
                    	<div style="display:none;"><select id="e1" name="mother_page"><option value="-1" selected="selected">-1</option></select></div>
                        <input type="hidden" name="is_home_page" id="is_home_page" value="0">
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable">	
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
							<tr>
								<td width="200"><label>Titolo:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_title" type="text" class="text small" id="page_title" value="{if isset($page_title)}{$page_title}{else}{$page_details->page_title}{/if}" />
                                    <br><code>&lt;?php echo $page_title; ?&gt;</code>
                                </td>
							</tr>
							<tr>
								<td width="200"><label>Url Slug:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input type="text" name="page_url" class="text small" id="page_url" value="{if isset($page_url)}{$page_url}{else}{$page_details->page_url}{/if}" />
                                    <br><code>&lt;?php echo $page_url; ?&gt;</code>
                                </td>
							</tr>
 
							
						</table>
						
			
								                                    	<table cellpadding="0" cellspacing="0" width="100%" class="sort">
											<tr>
												<td width="200"><label>Descrizione 1:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
												<td><textarea class="textarea" name="description_1">{if isset($description_1)}{$description_1}{else}{$page_details->description_1}{/if}</textarea>
												<br><code>&lt;?php echo $description_1; ?&gt;</code>
                                                </td>
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
                                                            <br><code>&lt;?php echo $photo_3; ?&gt;</code>
                                                        </div>
                                                    </div>
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
								<td width="200"><label>SEO Titolo:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_seotitle" type="text" class="text small" value="{if isset($page_seotitle)}{$page_seotitle}{else}{$page_details->page_seotitle}{/if}" />
                                    <br><code>&lt;?php echo $seo_title; ?&gt;</code>
                                </td>
							</tr>
                            <tr>
								<td width="200"><label>SEO Keywords:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_seokeywords" type="text" class="text small" value="{if isset($page_seokeywords)}{$page_seokeywords}{else}{$page_details->page_seokeywords}{/if}" />
                                    <br><code>&lt;?php echo $seo_keywords; ?&gt;</code>
                                </td>							</tr>
                            <tr>
								<td width="200"><label>SEO Description:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label></td>
								<td>
                                	<input name="page_seodescription" type="text" class="text small" value="{if isset($page_seodescription)}{$page_seodescription}{else}{$page_details->page_seodescription}{/if}" />
                                    <br><code>&lt;?php echo $seo_description; ?&gt;</code>
                                </td>												
                            </tr>
                         </table>
					</div>
                    
                    		<div class="tab-pane" id="show_in_pages"> 
                            	<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                                    <tr>
                                        <td width="200"><label>Included In:</label></td>
                                        <td>
                                        		<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
													<tbody>
                                                    	<code>&lt;?php echo $list_products; ?&gt;</code>
                                                        <br>
                                                        
                                                        
                                                        
                                                        
                                                        <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
														<tbody>
															{foreach from=$pagelist item=page name=listofpages key=pk}
							                                	{assign var="subpages" value=$sub_page_list[$pk]}
															<tr {if $page->mother_page_id eq "0"} {else} class="blue_background" {/if}>
																<td style="width: 5px;">
																	<input type="checkbox" name="page_included_{$page->page_id}" id="page_included_{$page->page_id}" {if $page->page_id|in_array:$included_in_page_ids} checked="checked" {/if} />
																	<input type="hidden" name="page_ids[]" value="{$page->page_id}" />
																</td>
																<td>
							                                    	<img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;">
							                                        <a href="{$baseurl}manage/pages/edit/{$page->page_id}">{$page->page_title}</a>
							                                    </td>
															</tr>
							                                    {foreach from=$subpages item=subpage name=listofsubpages key=spk}
							                                    	{assign var="subpages2" value=$sub_page_list2[$spk]}
							                                    	<tr {if $subpage->mother_page_id eq "0"} {else} class="blue_background" {/if}>
							                                            <td style="width: 5px;">
							                                            	<input type="checkbox" name="page_included_{$subpage->page_id}" id="page_included_{$subpage->page_id}" {if $subpage->page_id|in_array:$included_in_page_ids} checked="checked" {/if} />
																			<input type="hidden" name="page_ids[]" value="{$subpage->page_id}" />
							                                            </td>
							                                            <td>
							                                            	&iota;__ &nbsp;
							                                                <img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;">
							                                                <a href="{$baseurl}manage/pages/edit/{$subpage->page_id}">{$subpage->page_title}</a>
							                                            </td>
							                                        </tr>
							                                        
							                                        	{foreach from=$subpages2 item=subpage2 name=listofsubpages2 key2=spk2}
							                                        		<tr {if $subpage2->mother_page_id eq "0"} {else} class="blue_background" {/if}>
									                                            <td style="width: 5px;">
									                                            	<input type="checkbox" name="page_included_{$subpage2->page_id}" id="page_included_{$subpage2->page_id}" {if $subpage2->page_id|in_array:$included_in_page_ids} checked="checked" {/if} />
																					<input type="hidden" name="page_ids[]" value="{$subpage2->page_id}" />
									                                            </td>
									                                            <td>
									                                            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&iota;__ &nbsp;
									                                                <img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;">
									                                                <a href="{$baseurl}manage/pages/edit/{$subpage2->page_id}">{$subpage2->page_title}</a>
									                                            </td>
									                                        </tr>
							                                        	{/foreach}
							                                        
							                                    {/foreach}
															{/foreach}																			
														</tbody>
							
													</table>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                            
                            <div class="tab-pane" id="tab_packaging"> 
                            <table cellpadding="0" cellspacing="0" width="100%" class="sortable">	
										{literal}
											<script type="text/javascript">
												function show_pack_code(select_id , textbox_id){
													var v = $('#'+select_id).val();
													$('#'+textbox_id).val(v.split('#')[1]);
												}
											</script>
										{/literal}
								{assign var="p_p_p" value=$product_packagings|@count}
								{if $product_packagings!=NULL}
									{foreach from=$product_packagings item=included_package name=listofproductpackagings key=ppk}
										<tr>
											<td width="200">
												<label>Packaging {$ppk+1}:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label>
											</td>
											<td>
												<select name="packagings[]" id="packagings_{$ppk}"  style="width:400px;"> <!-- onchange="show_pack_code('packagings_{$ppk}', 'packaging_code_{$ppk}');" //-->
													<option value="">Select Package</option>
													{foreach from=$packagings_list item=packagings name=listofpackagings key=ppk2}
														<option value="{$packagings->packaging_id}#{$packagings->pack_code}" {if in_array($packagings->packaging_id, $packaging_ids)} selected="selected" {/if}>{$packagings->pack_title}</option>
													{/foreach}
			                                   	</select><br><br>
			                                	<input name="packaging_code_{$ppk+1}" type="text" class="text small" id="packaging_code_{$ppk}" value="{$included_package->package_code_value}" />	                    
		                                	</td>
										</tr>	
									{/foreach}
								{/if}
								
								{section name=foo start=$p_p_p loop=30 step=1}
								<tr id="tr-{$smarty.section.foo.index+1}" {if $smarty.section.foo.index > 4} style="display:none;" {/if}>
									<td width="200">
										<label>Packaging {$smarty.section.foo.index+1}:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label>
									</td>
									<td>
										<select name="packagings[]" id="packagings_{$smarty.section.foo.index+1}"  style="width:400px;"> <!-- onchange="show_pack_code('packagings_{$smarty.section.foo.index+1}', 'packaging_code_{$smarty.section.foo.index+1}');" //-->
											<option value="">Select Package</option>
											{foreach from=$packagings_list item=packagings name=listofpackagings key=ppk}
												<option value="{$packagings->packaging_id}#{$packagings->pack_code}">{$packagings->pack_title}</option>
											{/foreach}
	                                   	</select><br><br>
	                                	<input name="packaging_code_{$smarty.section.foo.index+1}" type="text" class="text small" id="packaging_code_{$smarty.section.foo.index+1}" value="" />	                    
                                	</td>
								</tr>
								{/section}
								
								<tr>
									<td width="200">
										&nbsp;
									</td>
									<td>
										{literal}
										<script type="text/javascript">
											var curr = {/literal}{$p_p_p+1}{literal};
											function add_more_package(){
												if(curr<=5)
													curr = 6;
												var tr_id = "#tr-"+curr;
												//alert(tr_id);
												$(tr_id).show();
												curr++;
												return false;
											}
										</script>
										{/literal}
										<button class="btn btn-info" onclick="return add_more_package()">+ Add more</button>         
                                	</td>
								</tr>
							</table>
							</div>
                            
                            
                            
                            
                            <div class="tab-pane" id="tab_features"> 
                            <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                            	
                            	{foreach from=$features_list item=feature name=listofproductfeatures key=fk}
                            			<tr>
											<td width="200">
												<label>{$feature->feature_title}:<br><img src="{$baseurl}assets/images/flags/png/{$lang_code}.png" style="border:0px; padding-top:3px;"></label>
											</td>
											<td>
												<input name="feature_value_{$feature->feature_id}" type="text" class="text small" id="feature_value_{$feature->feature_id}" value="{if array_key_exists($feature->feature_id, $feature_values)} {assign var='x' value=$feature->feature_id}{$feature_values[$x]} {/if}" />	
												<input type="hidden" name="feature_ids[]" id="feature_ids" value="{$feature->feature_id}">                    
		                                	</td>
										</tr>
                            	{/foreach}	
								
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
              						<a class="close" data-dismiss="modal">x</a>
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
			
			
			
			
			
		