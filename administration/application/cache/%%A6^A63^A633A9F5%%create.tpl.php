<?php /* Smarty version 2.6.19, created on 2014-03-12 15:44:18
         compiled from manage/products/create.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'manage/products/create.tpl', 110, false),array('modifier', 'count', 'manage/products/create.tpl', 235, false),array('modifier', 'in_array', 'manage/products/create.tpl', 293, false),)), $this); ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">
<?php echo '
<style type="text/css">
	#add_additional_field_ul li:hover{ background-color:#CCCCCC; cursor:move;}
</style>
'; ?>

<div id="hld">
	<!-- wrapper begins -->
	<div class="wrapper">		
		<div class="block">
			<div class="block_content">
				<h1>Add Product</h1>
                		<?php if (isset ( $this->_tpl_vars['product_create_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Product Created Successfully.
                            </p>
                            </div>
                        <?php endif; ?>

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Informazioni</a></li>
                            <li><a href="#profile" data-toggle="tab">Additional Fields</a></li>
                            <li><a href="#seo" data-toggle="tab">Seo</a></li>
                            <li><a href="#show_in_pages" data-toggle="tab">Show In Pages</a></li>
                        </ul>

                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="language_id" id="language_id" value="<?php echo $this->_tpl_vars['lang_id']; ?>
">
                            <div style="display:none;"><select id="e1" name="mother_page"><option value="-1" selected="selected">-1</option></select></div>
                            <input type="hidden" name="is_home_page" id="is_home_page" value="0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home"> 
					               <table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
                            <tr>
                                <td width="200">
                                    <label>Scegli il tuo template:</label>
                                </td>
                                <td> 
                                    <select name="page_template" id="e2" style="width:400px;">
                                        <?php $_from = $this->_tpl_vars['list_of_templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list_of_template'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list_of_template']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tl'] => $this->_tpl_vars['template_file']):
        $this->_foreach['list_of_template']['iteration']++;
?>
                                            <?php if ($this->_tpl_vars['template_file'] == "." || $this->_tpl_vars['template_file'] == ".."): ?>
                                            <?php else: ?>
                                                <option value="<?php echo $this->_tpl_vars['template_file']; ?>
" <?php if (isset ( $this->_tpl_vars['page_template'] ) && $this->_tpl_vars['page_template'] == $this->_tpl_vars['template_file']): ?> selected="selected" <?php endif; ?> ><?php echo $this->_tpl_vars['template_file']; ?>
</option>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><label>Titolo: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                <td>
                                	<input name="page_title" type="text" class="text small" id="page_title" value="<?php if (isset ( $this->_tpl_vars['page_title'] )): ?><?php echo $this->_tpl_vars['page_title']; ?>
<?php endif; ?>" />
                                    <br><code>&lt;?php echo page_title; &gt;</code>
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><label>Url Slug: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                <td>
                                	<input type="text" name="page_url" style="text-transform: lowercase;" class="text small" id="page_url" value="<?php if (isset ( $this->_tpl_vars['page_url'] )): ?><?php echo $this->_tpl_vars['page_url']; ?>
<?php endif; ?>" />
                                    <br><code>&lt;?php echo page_url; &gt;</code>
                                </td>
                            </tr>
                        </table>    
                        
                                        <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200"><label>Descrizione 1: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                                <td>
                                                	<textarea class="textarea" name="description_1"><?php if (isset ( $this->_tpl_vars['description_1'] )): ?><?php echo $this->_tpl_vars['description_1']; ?>
<?php endif; ?></textarea>
                                                    <br><code>&lt;?php echo description_1; &gt;</code>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                         <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200"><label>Descrizione 2: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                                <td>
                                                	<textarea class="textarea" name="description_2"><?php if (isset ( $this->_tpl_vars['description_2'] )): ?><?php echo $this->_tpl_vars['description_2']; ?>
<?php endif; ?></textarea>
                                                    <br><code>&lt;?php echo description_2; &gt;</code>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        
                                        <table cellpadding="0" cellspacing="0" width="100%" class="sort" id="add_additional_field_ul">
                                            <tr>
                                                <td width="200"><label>Foto 1: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
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
                                                            <?php if ($this->_tpl_vars['video_details'] != NULL): ?>
                                                                <?php if ($this->_tpl_vars['video_details']->video_image_name_it != NULL): ?>
                                                                    <div class="files">
                                                                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
assets/videos/<?php echo $this->_tpl_vars['video_details']->video_image_name_it; ?>
" target="_blank">                                                       <?php echo $this->_tpl_vars['video_details']->video_image_name_it; ?>

                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <br><code>&lt;?php echo photo_1; &gt;</code>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                            
                                        
                                    
                                        <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200"><label>Foto 2: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
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
                                                            <?php if ($this->_tpl_vars['video_details'] != NULL): ?>
                                                                <?php if ($this->_tpl_vars['video_details']->video_image_name_it != NULL): ?>
                                                                    <div class="files">
                                                                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
assets/videos/<?php echo $this->_tpl_vars['video_details']->video_image_name_it; ?>
" target="_blank">                                                       <?php echo $this->_tpl_vars['video_details']->video_image_name_it; ?>

                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <br><code>&lt;?php echo photo_2; &gt;</code>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    
                                       
                                    
                                        <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200"><label>Foto 3: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
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
                                                            <?php if ($this->_tpl_vars['video_details'] != NULL): ?>
                                                                <?php if ($this->_tpl_vars['video_details']->video_image_name_it != NULL): ?>
                                                                    <div class="files">
                                                                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
assets/videos/<?php echo $this->_tpl_vars['video_details']->video_image_name_it; ?>
" target="_blank">                                                       <?php echo $this->_tpl_vars['video_details']->video_image_name_it; ?>

                                                                    </a> [ <a href="#">Delete</a> ]
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <br><code>&lt;?php echo photo_3; &gt;</code>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                            </div>
                        
                            <div class="tab-pane" id="profile">
                            	<?php $this->assign('n_description', 0); ?>
                                <?php $this->assign('n_title', 0); ?>
                                <?php $this->assign('n_photo', 0); ?>
                                <?php $this->assign('n_file', 0); ?>
                                <?php if ($this->_tpl_vars['additional_fields'] != NULL): ?>
                                <?php $_from = $this->_tpl_vars['additional_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['list_of_fields'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['list_of_fields']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['afk'] => $this->_tpl_vars['additional_field']):
        $this->_foreach['list_of_fields']['iteration']++;
?>
                                    <div id="<?php echo $this->_tpl_vars['additional_field']->field_id; ?>
">
                                            <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                                <tr>
                                                    <td width="200"><label style=" text-transform:uppercase;">Additional <?php echo $this->_tpl_vars['additional_field']->field_type; ?>
: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                                    <td>                                                    
                                                        <?php if ($this->_tpl_vars['additional_field']->field_type == 'description'): ?>
                                                            <textarea class="textarea" name="additional_filed_value_<?php echo $this->_tpl_vars['additional_field']->field_id; ?>
"><?php echo $this->_tpl_vars['additional_field']->field_value; ?>
</textarea>
                                                            <br><code>&lt;?php echo additional_description[<?php echo $this->_tpl_vars['n_description']; ?>
]; &gt;</code>
                                                            <?php $this->assign('n_description', $this->_tpl_vars['n_description']+1); ?>
                                                        <?php elseif ($this->_tpl_vars['additional_field']->field_type == 'title'): ?>
                                                            <input name="additional_filed_value_<?php echo $this->_tpl_vars['additional_field']->field_id; ?>
" type="text" class="text small" value="<?php echo $this->_tpl_vars['additional_field']->field_value; ?>
" />
                                                            <br><code>&lt;?php echo additional_title[<?php echo $this->_tpl_vars['n_title']; ?>
]; &gt;</code>
                                                            <?php $this->assign('n_title', $this->_tpl_vars['n_title']+1); ?>                        
                                                        <?php elseif ($this->_tpl_vars['additional_field']->field_type == 'photo'): ?>    
                                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/pages/additional_photo.tpl", 'smarty_include_vars' => array('field_details' => $this->_tpl_vars['additional_field'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                                            <br><code>&lt;?php echo additional_photo[<?php echo $this->_tpl_vars['n_photo']; ?>
]; &gt;</code>
                                                            <?php $this->assign('n_photo', $this->_tpl_vars['n_photo']+1); ?>
                                                        <?php elseif ($this->_tpl_vars['additional_field']->field_type == 'file'): ?>    
                                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/pages/additional_file.tpl", 'smarty_include_vars' => array('field_details' => $this->_tpl_vars['additional_field'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                                            <br><code>&lt;?php echo additional_file[<?php echo $this->_tpl_vars['n_file']; ?>
]; &gt;</code>
                                                            <?php $this->assign('n_file', $this->_tpl_vars['n_file']+1); ?>
                                                        <?php endif; ?>
                                                        <input type="hidden" name="additional_field_id_<?php echo $this->_tpl_vars['afk']; ?>
" id="additional_field_id" value="<?php echo $this->_tpl_vars['additional_field']->field_id; ?>
">
                                                    </td>
                                                    <td>
                                                        <a class="close" href="javascript:void(0);" onclick="delete_additional_field('<?php echo $this->_tpl_vars['additional_field']->field_id; ?>
');">x</a>
                                                    </td>
                                                </tr>
                                            </table>
                                    </div>
                                <?php endforeach; endif; unset($_from); ?>
                                <input type="hidden" name="total_additional_field" id="total_additional_field" value="<?php echo count($this->_tpl_vars['additional_fields']); ?>
">
                            <?php endif; ?>
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
                                        <td width="200"><label>SEO Titolo: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                        <td>
                                        	<input name="page_seotitle" type="text" class="text small" value="<?php if (isset ( $this->_tpl_vars['page_seotitle'] )): ?><?php echo $this->_tpl_vars['page_seotitle']; ?>
<?php endif; ?>" />
                                            <br><code>&lt;?php echo seo_title; &gt;</code>
                                        </td>
                                    </tr>
                                  
                                    <tr>
                                        <td width="200"><label>SEO Description: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                        <td>
                                        	<input name="page_seodescription" type="text" class="text small" value="<?php if (isset ( $this->_tpl_vars['page_seodescription'] )): ?><?php echo $this->_tpl_vars['page_seodescription']; ?>
<?php endif; ?>" />
                                            <br><code>&lt;?php echo seo_description; &gt;</code>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td width="200"><label>SEO Keywords: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
                                        <td>
                                        	<input name="page_seokeywords" type="text" class="text small" value="<?php if (isset ( $this->_tpl_vars['page_seokeywords'] )): ?><?php echo $this->_tpl_vars['page_seokeywords']; ?>
<?php endif; ?>" />
                                            <br><code>&lt;?php echo seo_keywords; &gt;</code>
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
                                                    	<code>&lt;?php echo list_products; &gt;</code>
                                                        <br>
                                                        
                                                        <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
						
															<tbody>
																<?php $_from = $this->_tpl_vars['pagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofpages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofpages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pk'] => $this->_tpl_vars['page']):
        $this->_foreach['listofpages']['iteration']++;
?>
								                                	<?php $this->assign('subpages', $this->_tpl_vars['sub_page_list'][$this->_tpl_vars['pk']]); ?>
																<tr <?php if ($this->_tpl_vars['page']->mother_page_id == '0'): ?> <?php else: ?> class="blue_background" <?php endif; ?>>
																	<td style="width: 5px;">
																		<input type="checkbox" name="page_included_<?php echo $this->_tpl_vars['page']->page_id; ?>
" id="page_included_<?php echo $this->_tpl_vars['page']->page_id; ?>
" <?php if (isset ( $this->_tpl_vars['included_in_page_ids'] ) && ((is_array($_tmp=$this->_tpl_vars['page']->page_id)) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['included_in_page_ids']) : in_array($_tmp, $this->_tpl_vars['included_in_page_ids']))): ?> checked="checked" <?php endif; ?> />
																		<input type="hidden" name="page_ids[]" value="<?php echo $this->_tpl_vars['page']->page_id; ?>
" />
																	</td>
																	<td>
								                                    	<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;">
								                                        <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['page']->page_id; ?>
"><?php echo $this->_tpl_vars['page']->page_title; ?>
</a>
								                                    </td>
																</tr>
								                                    <?php $_from = $this->_tpl_vars['subpages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofsubpages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofsubpages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['spk'] => $this->_tpl_vars['subpage']):
        $this->_foreach['listofsubpages']['iteration']++;
?>
								                                    	<?php $this->assign('subpages2', $this->_tpl_vars['sub_page_list2'][$this->_tpl_vars['spk']]); ?>
								                                    	<tr <?php if ($this->_tpl_vars['subpage']->mother_page_id == '0'): ?> <?php else: ?> class="blue_background" <?php endif; ?>>
								                                            <td style="width: 5px;">
								                                            	<input type="checkbox" name="page_included_<?php echo $this->_tpl_vars['subpage']->page_id; ?>
" id="page_included_<?php echo $this->_tpl_vars['subpage']->page_id; ?>
" <?php if (isset ( $this->_tpl_vars['included_in_page_ids'] ) && ((is_array($_tmp=$this->_tpl_vars['subpage']->page_id)) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['included_in_page_ids']) : in_array($_tmp, $this->_tpl_vars['included_in_page_ids']))): ?> checked="checked" <?php endif; ?> />
																				<input type="hidden" name="page_ids[]" value="<?php echo $this->_tpl_vars['subpage']->page_id; ?>
" />
								                                            </td>
								                                            <td>
								                                            	&iota;__ &nbsp;
								                                                <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;">
								                                                <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['subpage']->page_id; ?>
"><?php echo $this->_tpl_vars['subpage']->page_title; ?>
</a>
								                                            </td>
								                                        </tr>
								                                        
								                                        	<?php $_from = $this->_tpl_vars['subpages2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofsubpages2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofsubpages2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subpage2']):
        $this->_foreach['listofsubpages2']['iteration']++;
?>
								                                        		<tr <?php if ($this->_tpl_vars['subpage2']->mother_page_id == '0'): ?> <?php else: ?> class="blue_background" <?php endif; ?>>
										                                            <td style="width: 5px;">
										                                            	<input type="checkbox" name="page_included_<?php echo $this->_tpl_vars['subpage2']->page_id; ?>
" id="page_included_<?php echo $this->_tpl_vars['subpage2']->page_id; ?>
" <?php if (isset ( $this->_tpl_vars['included_in_page_ids'] ) && ((is_array($_tmp=$this->_tpl_vars['subpage2']->page_id)) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['included_in_page_ids']) : in_array($_tmp, $this->_tpl_vars['included_in_page_ids']))): ?> checked="checked" <?php endif; ?> />
																						<input type="hidden" name="page_ids[]" value="<?php echo $this->_tpl_vars['subpage2']->page_id; ?>
" />
										                                            </td>
										                                            <td>
										                                            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&iota;__ &nbsp;
										                                                <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;">
										                                                <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['subpage2']->page_id; ?>
"><?php echo $this->_tpl_vars['subpage2']->page_title; ?>
</a>
										                                            </td>
										                                        </tr>
								                                        	<?php endforeach; endif; unset($_from); ?>
								                                        
								                                    <?php endforeach; endif; unset($_from); ?>
																<?php endforeach; endif; unset($_from); ?>																			
															</tbody>
								
														</table>
                                                        
                                                        
                                                        
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                                        <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                            <tr>
                                                <td width="200">&nbsp;</td>
                                                <td>
                                                     <input type="hidden" name="m_ref_page_id" id="m_ref_page_id" value="<?php if (isset ( $this->_tpl_vars['m_ref_page_id'] ) && $this->_tpl_vars['m_ref_page_id'] != NULL): ?><?php echo $this->_tpl_vars['m_ref_page_id']; ?>
<?php endif; ?>">
													<input type="hidden" name="page_id" id="page_id" value="<?php echo $this->_tpl_vars['page_id']; ?>
">
                                                    <input class="btn" type="submit" name="Salva" id="Salva" value="Salva">
                                                </td>
                                            </tr>
                                        </table>

                        </div>
                        </form>    




                    
<?php echo '
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
'; ?>
						
									
                        
                        	
                            
                            
                                    	
									
                    
                    
                    <form name="additional_form_element" id="additional_form_element" action="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/add_addition_field" method="post" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                    	<tr>
                        	<td>
                    			<div id="example" class="modal hide fade in">
                                    <div class="modal-header">
                                        <a class="close" data-dismiss="modal">��</a>
                                        <h3>Aggiungi campo</h3>
                                    </div>
                                    <div id="ajax_loader" style="text-align:center; display:none;"> 
                                        <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/ajax-loader.gif"> 
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
                                        <input type="hidden" name="page_id" id="page_id" value="<?php echo $this->_tpl_vars['page_id']; ?>
">
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
			
			
			
			
			
		