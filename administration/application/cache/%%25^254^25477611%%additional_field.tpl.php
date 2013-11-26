<?php /* Smarty version 2.6.19, created on 2013-09-18 17:47:45
         compiled from manage/pages/additional_field.tpl */ ?>
<li id="<?php echo $this->_tpl_vars['field_details']->field_id; ?>
" class="lvl-3">
	<span>
		<table cellpadding="0" cellspacing="0" width="100%" class="sort">
			<tr>
				<td width="200"><label style=" text-transform:capitalize;">Additional <?php echo $this->_tpl_vars['field_details']->field_type; ?>
: <br><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/flags/png/<?php echo $this->_tpl_vars['lang_code']; ?>
.png" style="border:0px; padding-top:3px;"></label></td>
				<td>
                	<?php echo $this->_tpl_vars['additional_field']->field_type; ?>

                	<?php if ($this->_tpl_vars['field_details']->field_type == 'description'): ?>                    	
                    	<textarea class="textarea" id="additional_description_<?php echo $this->_tpl_vars['field_details']->field_id; ?>
" name="additional_description_<?php echo $this->_tpl_vars['field_details']->field_id; ?>
"><?php echo $this->_tpl_vars['field_details']->field_value; ?>
</textarea>
                        <?php echo '
						<script>
							var id="#additional_description_'; ?>
<?php echo $this->_tpl_vars['field_details']->field_id; ?>
<?php echo '";
							$(document).ready(function() { 	
								$(id).wysihtml5();
							});
						</script>
                        '; ?>

                        <br><code>&lt;?php echo additional_description[<?php echo $this->_tpl_vars['number_of_fields']; ?>
]; &gt;</code>
                    <?php elseif ($this->_tpl_vars['field_details']->field_type == 'title'): ?>
                    	<input name="additional_title_<?php echo $this->_tpl_vars['field_details']->field_id; ?>
" type="text" class="text small" value="<?php echo $this->_tpl_vars['field_details']->field_value; ?>
" />
                        <br><code>&lt;?php echo additional_title[<?php echo $this->_tpl_vars['number_of_fields']; ?>
]; &gt;</code>
                    <?php elseif ($this->_tpl_vars['field_details']->field_type == 'photo'): ?> 
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/pages/additional_photo.tpl", 'smarty_include_vars' => array('field_details' => $this->_tpl_vars['field_details'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <br><code>&lt;?php echo additional_photo[<?php echo $this->_tpl_vars['number_of_fields']; ?>
]; &gt;</code>
					<?php elseif ($this->_tpl_vars['field_details']->field_type == 'file'): ?>    
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/pages/additional_file.tpl", 'smarty_include_vars' => array('field_details' => $this->_tpl_vars['field_details'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>                            
                        <br><code>&lt;?php echo additional_file[<?php echo $this->_tpl_vars['number_of_fields']; ?>
]; &gt;</code>
                    <?php endif; ?>
                
                </td>
                <td>
                	<a class="close" href="javascript:void(0);" onclick="delete_additional_field('<?php echo $this->_tpl_vars['field_details']->field_id; ?>
');">x</a>
                </td>
			</tr>
		</table>
	</span>
</li>