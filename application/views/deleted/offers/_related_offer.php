<!-- 960 Container -->
<div class="container">
	<!-- Portfolio Content -->
		
	<div class="sixteen columns">
		<h4 class="headline">Altre Offerte</h4>
	</div>
				<div class="clearfix-big"></div>
	<!-- 1/4 Column -->
	<?php if(isset($related_offers) && $related_offers!=NULL) { ?>
		<?php foreach($related_offers as $roffer_key=>$offer_item){ ?>
			 	  <!-- 1/4 Column -->
                    <div class="four columns background">
                        <div class="item-img">
                
                        <ul class="item_toolbar">da<br>
									<h3 style="color:#FFF;"><?php echo $offer_item->offer_price_adult;?>€</h3>
									
																													</ul>
                        	<a href="<?php echo base_url();?><?php echo offers_url($offer_item);?>" title="<?php echo $offer_item->offer_title;?>">
                            	<?php 
		                             $filename = offer_random_attachment($offer_item->user_id);
		                             if($filename!=NULL)
										$file = PROFILE_ATTACHMENT_FILE_PATH_FOR_AVATAR .$offer_item->user_id."/".$filename;
									else
										$file = "assets/images/default_attachment.png";
									echo image_thumb($file,160,220);
		                        ?>
                            <div class="overlay zoom"></div>   </a>
                        </div>
                        <div class="portfolio-item-meta">
                          <span class="stars">
                            <input name="star_<?php echo $offer_item->offer_id;?>" type="radio" class="star" disabled="disabled" <?php if($offer_item->hotel_rating==1) { ?> checked="checked" <?php }?> />
							<input name="star_<?php echo $offer_item->offer_id;?>" type="radio" class="star" disabled="disabled" <?php if($offer_item->hotel_rating==2) { ?> checked="checked" <?php }?> />
							<input name="star_<?php echo $offer_item->offer_id;?>" type="radio" class="star" disabled="disabled" <?php if($offer_item->hotel_rating==3) { ?> checked="checked" <?php }?> />
							<input name="star_<?php echo $offer_item->offer_id;?>" type="radio" class="star" disabled="disabled" <?php if($offer_item->hotel_rating==4) { ?> checked="checked" <?php }?> />
							<input name="star_<?php echo $offer_item->offer_id;?>" type="radio" class="star" disabled="disabled" <?php if($offer_item->hotel_rating==5) { ?> checked="checked" <?php }?> />
						</span> 
                               <div style="clear:both;"></div>
                      <h5 class="no_top_margin">

                                    <a class="hotel_name" href="<?php echo base_url();?><?php echo hotel_url($offer_item);?>" title="<?php echo $offer_item->hotel_name;?>">
                                        <?php echo $offer_item->hotel_name;?>
                                    </a>
                                </h5>
                                <div style="clear:both;"></div>
                        	<div class="hotel">
                        		<a class="offer_name" href="<?php echo base_url();?><?php echo offers_url($offer_item);?>" title="<?php echo $offer_item->offer_title;?>">
<?php echo short_title($offer_item->offer_title,20);?>
								</a>
                            </div>
                            <div class="description">
								<strong><?php echo $offer_item->offer_duration;?></strong><br><?php echo date('d M',strtotime($offer_item->offer_start_date)); ?> al <?php echo date('d M Y',strtotime($offer_item->offer_finish_date)); ?><br><?php echo $offer_item->city_name;?>
                            </div>
                        </div>
                    </div>
		<?php } ?>
	<?php } ?>
</div>
<!-- End 960 Container -->