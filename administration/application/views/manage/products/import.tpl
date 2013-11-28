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
				<h1>Import Product</h1>
                		{if isset($product_create_successfully)}
                        	<div class="message info">
                            <p>
                            	Product Imported Successfully.
                            </p>
                            </div>
                        {/if}

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="tab-content">
                                <div class="tab-pane active" id="home"> 
    					            <table cellpadding="0" cellspacing="0" width="100%" class="sort">
                                                <tr>
                                                    <td width="200"><label>Select File (CSV, Excell):</label></td>
                                                    <td>
                                                        <div class="container">
                                                           <input type="file" name="files" id="files">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input class="btn" type="submit" name="Import" id="Salva" value="Import">
                                                    </td>
                                                </tr>
                                    </table>
                                </div>
                            </div>
                        </form>    




                    
{literal}
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
{/literal}						
					
                    
			</div>		<!-- .block_content ends -->
		</div>		<!-- .leftcol ends -->
	</div> <!-- wrapper ends -->
</div> <!-- #hld ends -->
			
			
			
			
			
		