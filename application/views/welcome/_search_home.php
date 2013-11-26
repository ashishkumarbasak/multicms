<div class="sixteen columns">
	<div class="info-box" style="<?php if(isset($page) && $page=="home") { ?> margin-top:-80px; <?php }else{ ?> margin-top:-5px; <?php } ?>">
    	<?php foreach($rootcategorylist as $rkey=>$rCategory) {  ?>
		<!-- 1/4 Column -->
		
        <?php if(array_key_exists($rCategory->category_id,$subcategories)) { $subcategory = $subcategories[$rCategory->category_id];?>
        	<?php if(!empty($subcategory)) { ?>
            <?php $href = "#popup_panel_".$rCategory->category_id;  ?>
                <div id="popup_panel_<?php  echo $rCategory->category_id; ?>">
                    <div id="signup-header"><h2><?php  echo $rCategory->category_name_it; ?> Suzzara</h2></div>
                    <div id="social-message">	
                        <ul class="category-list">
                        	<?php foreach($subcategory as $k=>$v) { ?>
                            	<li><a href="<?php echo base_url();?>items/suzzara/sub-category/<?php echo $v->category_id;?>"><?php echo $v->category_name_it;?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
        	<?php } else $href = base_url()."items/suzzara/sub-category/".$rCategory->category_id; ?>
        <?php } else $href = base_url()."items/suzzara/sub-category/".$rCategory->category_id; ?>
        
        <div class="one-third-short column">
			<a id="go" rel="leanModal" name="social" class="button large brown" style="width:240px;" href="<?php  echo $href; ?>"><?php echo $rCategory->category_name_it; ?> <i class="icon-play-circle icon-white" style="float:right;margin-top:6px;"></i></a>
		</div>
        
        <style type="text/css">
			#popup_panel_<?php  echo $rCategory->category_id; ?> 
			{
				width: 404px;
				padding-bottom: 2px;
				display:none;
				background: #FFF;
				border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;
				box-shadow: 0px 0px 4px rgba(0,0,0,0.7); -webkit-box-shadow: 0 0 4px rgba(0,0,0,0.7); -moz-box-shadow: 0 0px 4px rgba(0,0,0,0.7);
			}
		</style>
        
		<?php } ?>
	</div>	
</div>

	