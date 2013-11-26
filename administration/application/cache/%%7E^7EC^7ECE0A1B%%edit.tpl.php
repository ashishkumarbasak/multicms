<?php /* Smarty version 2.6.19, created on 2013-08-25 21:02:36
         compiled from manage/categories/edit.tpl */ ?>
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
                	<input type="hidden" name="category_id" id="category_id" value="<?php echo $this->_tpl_vars['category_details']->category_id; ?>
">
                    <input type="hidden" value="Submit" name="update_category">	
						
						<div class="tab-content">
							
                			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/categories/create_category_form_it.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                			
          				</div>
				</form>
                
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->