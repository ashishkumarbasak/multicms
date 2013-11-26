<!-- 960 Container Start -->
<div class="container">
		<?php if(isset($is_loggedin) && $is_loggedin=="true"){ ?>
        	<a style="float:right;" class="button medium yellow" href="<?php echo base_url();?><?php echo $this->config->item('logout_url');?>"><?php echo lang('signout'); ?></a>
		<?php } ?>	
		<h1 class="headline">
        	<?php if($category_details!=NULL) { ?>
            	<?php echo $category_details->category_name;?>
            <?php  } ?>
        </h1>
	</div>
	<div class="clearfix"></div>
	
	<div class="container" style="background-color:#FFF;">
		<?php echo $this->template->block('Breadcamp', 'layouts/_breadcamp.php'); ?>
    	<div class="padding">
			<div class="sixteen-small columns">
				<div class="large-notice">
					<div class="five columns alpha">
						<?php if($category_details!=NULL) { ?>
                        		<?php if($category_details->category_image!=NULL) { ?>
                                	<img src="<?php echo base_url();?>assets/category_images/<?php echo $category_details->category_image;?>">
                                <?php }else if($category_details->category_image_it!=NULL){ ?>
                                	<img src="<?php echo base_url();?>assets/category_images/<?php echo $category_details->category_image_it;?>">
                                <?php } ?>    
                        <?php } ?>
					</div>
					<div class="nine columns omega"><br>
						<h2>COURSE INTRODUCTION</h2>
						<p>
                        	<?php if($category_details!=NULL) { ?> <?php echo $category_details->category_description;?> <?php } ?>
                       	</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix-big"></div>


		<?php if($rootcategories!=NULL && !empty($rootcategories)){ ?>
        		<?php foreach($rootcategories as $key=>$value){ ?> 
                    <!-- 1/4 Column -->
                    <div class="eight-small columns">
                        <div class="large-notice">
                            <h3><a href="<?php echo base_url(); ?>details/<?php echo $value->category_id;?>/<?php echo str_replace(' ','-',$value->category_name);?>"><?php echo ($key+1); ?>.  <?php echo $value->category_name;?></a></h3>
                            <div class="clearfix-small"></div>
                            <a href="<?php echo base_url(); ?>details/<?php echo $value->category_id;?>/<?php echo str_replace(' ','-',$value->category_name);?>">show more</a>
                        </div>		
                    </div>
				<?php } ?>
		<?php } ?>                
		
		
		</div>

	<div class="clearfix-big"></div>
	


	
</div>
<!-- 960 Container End -->