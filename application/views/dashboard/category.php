<!-- 960 Container Start -->
	<div class="container">
    	<?php if(isset($is_loggedin) && $is_loggedin=="true"){ ?>
        	<a style="float:right;" class="button medium yellow" href="<?php echo base_url();?><?php echo $this->config->item('logout_url');?>"><?php echo lang('signout'); ?></a>
		<?php } ?>
		<h1 class="headline">Area di Formazione online</h1>
	</div>
	<div class="clearfix"></div>
	
    <div class="container" style="background-color:#FFF;">
    	<?php echo $this->template->block('Breadcamp', 'layouts/_breadcamp.php'); ?>
		<div class="padding">
				<?php if($rootcategories!=NULL && !empty($rootcategories)){ ?>
					<?php foreach($rootcategories as $key=>$value){ ?>                    
                        <!-- 1/4 Column -->
                        <div class="eight-small columns">
                            <div class="large-notice">
                                <h3>
                                    <?php echo $value->category_name;?><br>
                                    <span class="blue"></span>
                                </h3><br>
                                <p>
                                    <?php echo short_description($value->category_description,30);?>
                                </p>
                                <div class="clearfix-small"></div>
                                <div class="three columns alpha">
                                    <a href="<?php echo base_url(); ?>category/sub-category/<?php echo $value->category_id;?>/<?php echo str_replace(' ','-',$value->category_name);?>" class="button small yellow">visualizza</a>
                                </div>
                                <?php if($value->category_image!=NULL) { ?>
                                	<img style="height:51px; width:130px; float:right;" src="<?php echo base_url();?>assets/category_images/<?php echo $value->category_image;?>">
                                <?php }else if($value->category_image_it!=NULL){ ?>
                                	<img style="height:51px; width:130px; float:right;" src="<?php echo base_url();?>assets/category_images/<?php echo $value->category_image_it;?>">
                                <?php } ?>
                                <div class="clearfix"></div>
                            </div>			
                        </div>
                   	<?php } ?>
                <?php } ?>
            	
		</div>
		<div class="clearfix-big"></div>
	</div>
<!-- 960 Container End -->