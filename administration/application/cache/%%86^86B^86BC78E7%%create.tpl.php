<?php /* Smarty version 2.6.19, created on 2013-12-01 20:02:16
         compiled from manage/page_files/create.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">
<?php echo '
<style type="text/css">
	#add_additional_field_ul li:hover{ background-color:#CCCCCC; cursor:move;}
	.image-preview{ width:25%; float:left; display:inline;}
	.image-name{ width:25%; float:left; display:inline;}
	.image-size{ width:25%; float:left; display:inline;}
	.image-action{ width:25%; float:left; display:inline;}
</style>
'; ?>

<div id="hld">
	<!-- wrapper begins -->
	<div class="wrapper">		
		<div class="block">
			<div class="block_content">
				<?php if ($this->_tpl_vars['from_page'] == 'products'): ?>
                	<h1>Edit Products</h1>                    
                    <ul class="nav nav-tabs">
                    	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/products/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#home">Informazioni</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/products/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#profile">Additional Fields</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/products/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#seo">Seo</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/products/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#show_in_pages">Show In Pages</a></li>
                       	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/products/edit/<?php echo $this->_tpl_vars['page_id']; ?>
/slideshow">Slideshow</a></li>
                       	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/products/edit/<?php echo $this->_tpl_vars['page_id']; ?>
/videos">Videos</a></li>
                       	<li class="active"><a href="javascript:void(0);">Files</a></li>
                   	</ul>   
                <?php elseif ($this->_tpl_vars['from_page'] == 'news'): ?>
                	<h1>Edit News</h1>
                    <ul class="nav nav-tabs">
                    	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/news/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#home">Informazioni</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/news/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#profile">Additional Fields</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/news/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#seo">Seo</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/news/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#show_in_pages">Show In Pages</a></li>
                       	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/news/edit/<?php echo $this->_tpl_vars['page_id']; ?>
/slideshow">Slideshow</a></li>
                       	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/news/edit/<?php echo $this->_tpl_vars['page_id']; ?>
/videos">Videos</a></li>
                       	<li class="active"><a href="javascript:void(0);">Files</a></li>
                   	</ul>   
                <?php else: ?>
                	<h1>Edit Page</h1>
                    <ul class="nav nav-tabs">
                    	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#home" >Informazioni</a></li>
                       	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['page_id']; ?>
#profile" >Additional Fields</a></li>
                        <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/23/<?php echo $this->_tpl_vars['page_id']; ?>
#seo" >Seo</a></li>
                       	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['page_id']; ?>
/slideshow">Slideshow</a></li>
                       	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/pages/edit/<?php echo $this->_tpl_vars['page_id']; ?>
/videos">Videos</a></li>
                       	<li class="active"><a href="javascript:void(0);">Files</a></li>
                   	</ul>   
                <?php endif; ?>
                		
                        
                        
  				
                <form id="fileupload" action="" method="post" enctype="multipart/form-data">	
                <div style="display:none;">					
						      <textarea class="textarea" style="display:none;"></textarea>
                  <ul class="menu" style="display:none;"><li></li></ul>
                </div> 
                        <h1 style="margin-left:18px;">Upload Slideshow Images</h1>     
						<div class="tab-content">
                				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/slideshow/create_slideshow_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          				</div>
        				<div style="text-align: center">
        					<input class="btn" type="submit" name="Salva" id="Salva" value="Salva">
        				</div>
				</form>
                
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->