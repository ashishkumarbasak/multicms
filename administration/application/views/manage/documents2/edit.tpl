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
				<h1>Edit Category</h1>     
                        
                        
  				<form action="" method="post" enctype="multipart/form-data">
                	<input type="hidden" name="document_id" id="document_id" value="{$document_details->document_id}">
                    <input type="hidden" value="Submit" name="update_document">	
						
						<div class="tab-content">
							
                			{include file="manage/documents2/create_document_form_it.tpl"}
                			
          				</div>
				</form>
                
                    
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->
