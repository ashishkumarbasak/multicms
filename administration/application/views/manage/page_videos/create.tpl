<link rel="stylesheet" href="{$baseurl}assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">
{literal}
<style type="text/css">
	#add_additional_field_ul li:hover{ background-color:#CCCCCC; cursor:move;}
	.image-preview{ width:25%; float:left; display:inline;}
	.image-name{ width:25%; float:left; display:inline;}
	.image-size{ width:25%; float:left; display:inline;}
	.image-action{ width:25%; float:left; display:inline;}
</style>
{/literal}
<div id="hld">
	<!-- wrapper begins -->
	<div class="wrapper">		
		<div class="block">
			<div class="block_content">
				{if $from_page eq "products"}
                	<h1>Edit Products</h1>                    
                    <ul class="nav nav-tabs">
                    	<li><a href="{$baseurl}manage/products/edit/{$page_id}#home">Informazioni</a></li>
                        <li><a href="{$baseurl}manage/products/edit/{$page_id}#profile">Additional Fields</a></li>
                        <li><a href="{$baseurl}manage/products/edit/{$page_id}#seo">Seo</a></li>
                        <li><a href="{$baseurl}manage/products/edit/{$page_id}#show_in_pages">Show In Pages</a></li>
                       	<li  class="active"><a href="{$baseurl}manage/products/edit/{$page_id}/slideshow">Slideshow</a></li>
                       	<li><a href="javascript:void(0);">Videos</a></li>
                       	<li><a href="{$baseurl}manage/products/edit/{$page_id}/files">Files</a></li>
                   	</ul>   
                {elseif $from_page eq "news"}
                	<h1>Edit News</h1>
                    <ul class="nav nav-tabs">
                    	<li><a href="{$baseurl}manage/news/edit/{$page_id}#home">Informazioni</a></li>
                        <li><a href="{$baseurl}manage/news/edit/{$page_id}#profile">Additional Fields</a></li>
                        <li><a href="{$baseurl}manage/news/edit/{$page_id}#seo">Seo</a></li>
                        <li><a href="{$baseurl}manage/news/edit/{$page_id}#show_in_pages">Show In Pages</a></li>
                       	<li><a href="{$baseurl}manage/news/edit/{$page_id}/slideshow">Slideshow</a></li>
                       	<li class="active"><a href="javascript:void(0);">Videos</a></li>
                       	<li><a href="{$baseurl}manage/news/edit/{$page_id}/files">Files</a></li>
                   	</ul>   
                {else}
                	<h1>Edit Page</h1>
                    <ul class="nav nav-tabs">
                    	<li><a href="{$baseurl}manage/pages/edit/{$page_id}#home" >Informazioni</a></li>
                       	<li><a href="{$baseurl}manage/pages/edit/{$page_id}#profile" >Additional Fields</a></li>
                        <li><a href="{$baseurl}manage/pages/edit/23/{$page_id}#seo" >Seo</a></li>
                       <li><a href="{$baseurl}manage/pages/edit/{$page_id}/slideshow">Slideshow</a></li>
                       	<li class="active"><a href="javascript:void(0);">Videos</a></li>
                       	<li><a href="{$baseurl}manage/pages/edit/{$page_id}/files">Files</a></li>
                   	</ul>   
                {/if}
                		
                        
                        
  				
                <form id="fileupload" action="" method="post" enctype="multipart/form-data">	
                <div style="display:none;">					
						      <textarea class="textarea" style="display:none;"></textarea>
                  <ul class="menu" style="display:none;"><li></li></ul>
                </div> 
                        <h1 style="margin-left:18px;">Upload Slideshow Images</h1>     
						<div class="tab-content">
                				{include file="manage/slideshow/create_slideshow_form.tpl"}
          				</div>
        				<div style="text-align: center">
        					<input class="btn" type="submit" name="Salva" id="Salva" value="Salva">
        				</div>
				</form>
                
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->