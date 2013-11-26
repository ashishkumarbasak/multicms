<!-- 960 Container Start -->

<div class="two-thirds column">



	<div class="portfolio-item-meta">

					<h1 class="headline">AREA RISERVATA</h1>

  </div>

						<div class="clearfix-small"></div>

						
                        
                        <div class="search">
                        	<form name="search_document" id="search_document" method="post" action="">
                                <table style="width:100%;" border="1">
                                    <tr>
                                        <td width="80%" valign="top">
                                        	<input type="text" name="search_text" id="search" style="width:92%; padding-left:30px;" />
                                        </td>
                                        <td width="20%" style="vertical-align:top;">
                                        	<input type="submit" name="search" id="search_text" value="Search" class="button yellow" style="width:100px; padding-top:12px; padding-bottom:9px;" />
                                        </td>
                                    </tr>
                                </table>
                        	</form>
                        </div>

    	<?php //echo $this->template->block('Breadcamp', 'layouts/_breadcamp.php'); ?>

       

				<?php if($rootcategories!=NULL && !empty($rootcategories)){ ?>

					<?php foreach($rootcategories as $key=>$value){ ?>

                    <!-- 1/4 Column -->

                    <!--

                    <div class="four-large columns">

                        <div class="large-notice">

                            <h3><?php echo $value->category_name;?><br></h3>

                            <div class="clearfix-small"></div>        

                            <a href="<?php echo base_url(); ?>category/<?php echo $value->category_id;?>/<?php echo str_replace(' ','-',$value->category_name);?>" class="button small yellow">visualizza</a>

                        </div>                    

                    </div>

                    -->

                    <?php } ?>

                <?php } ?>

                

                

                



					<?php if($all_documents!=NULL && !empty($all_documents)){ ?>

					

                    <table class="standard-table">

                      

    					<?php foreach($all_documents as $key=>$value){ ?>
								<?php 
									$file_type = explode(".",$value->document_file_name); 
									if(is_array($file_type) && array_key_exists(1,$file_type)){
										$file_type = $file_type[1];
									}else{
										$file_type = NULL;
									}
								
								?>
                        <tr>

                            <td><a target="_blank" href="<?php echo base_url();?>assets/documents/<?php echo $value->document_file_name; ?>"><?php echo $value->document_name; ?> (<?php echo $file_type; ?>)</a></td>

                            <td width="100px"><a target="_blank" href="<?php echo base_url();?>assets/documents/<?php echo $value->document_file_name; ?>" class="button small white">download</a>

</td>

                        </tr>

                         <?php } ?>

                         

					</table>

                    	<?php echo $pagination_link; ?>

                     <?php } ?>

					<div class="clearfix-small"></div>

			</div>

<div class="one-third column">

			<!-- Large Notice -->

				<div class="large-notice">

					<em>Benvenuto</em><h2><?php if(isset($profile_details)){ if($profile_details->last_name!=NULL) echo $profile_details->last_name; else echo $profile_details->first_name; } ?></h2>

					<div class="clearfix-small"></div>

					<?php if($rootcategories!=NULL && !empty($rootcategories)){ ?>

                    <ul class="links-list">

                    	<?php foreach($rootcategories as $key=>$value){ ?>

							<li><a href="<?php echo base_url(); ?><?php echo CURRENT_LANGUAGE."/";?>documents/category/<?php echo $value->category_id; ?>/page/1"><?php echo $value->category_name; ?></a></li>

                         <?php } ?>    						

					</ul>

                     <?php } ?>

			

	</div>

    	</div>



          

      