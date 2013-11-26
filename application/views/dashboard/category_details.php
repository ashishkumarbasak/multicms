<!-- 960 Container Start -->

<div class="container">
	                        <div class="sixteen columns">

      	<?php echo $this->template->block('Breadcamp', 'layouts/_breadcamp.php'); ?>

		<h1 class="headline"><?php if($category_details!=NULL) { ?>
            	<?php echo $category_details->category_name;?>
            <?php  } ?></h1>
	</div>	</div>

	<div class="clearfix"></div>
	
	
	<div class="container">
						

			<div class="two-thirds column">

		<?php if($videos!=NULL && !empty($videos)){ ?>
        		<?php foreach($videos as $key=>$value){ ?> 
                    
                    <!-- 1/4 Column -->
                        <div class="large-notice shadow round video">
							<a href="<?php echo base_url();?><?php echo strtolower(str_replace(" ","-",$breadcmp_first)); ?>/<?php echo strtolower(str_replace(" ","-",$breadcmp_second)); ?>/<?php echo strtolower(str_replace(" ","-",$breadcmp_third)); ?>/videos/<?php echo $value->trv_video_id;?>">
                            	<div class="large-notice-video">
									<div class="play"></div>
									<h3><?php echo $value->video_title;?></h3>
								</div>
                            </a>
						</div>
        				<div class="clearfix"></div>
        
				<?php } ?>
		<?php } ?>                
		</div>
		<div class="one-third column">
						<h2><?php if($category_details!=NULL) { ?> <?php echo $category_details->category_name;?> <?php } ?></h2>
						<p>
                        	<?php if($category_details!=NULL) { ?> <?php echo $category_details->category_description;?> <?php } ?>
                            <br><br>
                            <a href="pdf/the_day_hospital.pdf" target="_blank">Download instructions (PDF)</a>
						</p>
					</div>

	<div class="clearfix-big"></div>
	


	
</div>
<!-- 960 Container End -->