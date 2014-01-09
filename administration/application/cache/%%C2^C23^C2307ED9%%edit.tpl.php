<?php /* Smarty version 2.6.19, created on 2014-01-09 15:55:07
         compiled from manage/documents2/edit.tpl */ ?>
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
				<h1>Edit Category</h1>     
                        
                        
  				<form action="" method="post" enctype="multipart/form-data">
                	<input type="hidden" name="document_id" id="document_id" value="<?php echo $this->_tpl_vars['document_details']->document_id; ?>
">
                    <input type="hidden" value="Submit" name="update_document">	
						
						<div class="tab-content">
							
                			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/documents2/create_document_form_it.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                			
          				</div>
				</form>
                
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->