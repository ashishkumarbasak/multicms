<?php 
	if($hotel_list!=NULL){
            foreach($hotel_list as $hotel_key=>$hotel_item) {
?>
       
	   
	   
	   		<!-- 1/4 Column -->
			<div class="eight columns background">
				<div class="portfolio-item-meta">
					<h5>
                    	<a  class="offer_name" href="<?php echo base_url();?><?php echo hotel_url($hotel_item);?>" title="<?php echo $hotel_item->hotel_name;?>"><?php echo short_title($hotel_item->hotel_name,30);?></a>
                    </h5>
				</div>
				<div class="three columns alpha omega">
					<div class="item-img">
                    	<a href="<?php echo base_url();?><?php echo hotel_url($hotel_item);?>" title="<?php echo $hotel_item->hotel_name;?>">
                        	<?php 
		                		$filename = hotel_default_attachment($hotel_item->user_id);
		                		if($filename!=NULL)
                                    $file = PROFILE_ATTACHMENT_FILE_PATH_FOR_AVATAR .$hotel_item->user_id."/".$filename;
								else
                                    $file = "assets/images/default_attachment.png";
				
                                echo image_thumb($file,160,220);
							?>
                    </a>
                    </div>
                </div>
				<div class="five columns alpha omega">
					<div class="portfolio-item-description">
						<?php echo short_description($hotel_item->hotel_description, 10); ?>
                    </div>
				</div>
			</div>
	   
	   
	   		<?php if($hotel_key%2==1 && $hotel_key>0){ ?>
                <div class="clearfix-big"></div>
            <?php } ?>

<?php	
	}
    }
    else{
?>            
      <div class="error_message" style="display:block;">No hotel found.</div>      
 <?php           
        } 
?>
<div class="clearfix-small"></div>