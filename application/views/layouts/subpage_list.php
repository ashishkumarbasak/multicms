	<div class="info-box-feedback">
			<div class="widget">

        <ul class="categories">
        <?php if($subpagelist!=NULL) { ?>
    	<?php foreach($subpagelist as $key=>$value) { ?>
    		
        	<?php 
				if(isset($mother_page_url) && $mother_page_url!=NULL)
					$usrl = base_url().$mother_page_url."/".$value->page_url;
				else
					$usrl = base_url().$value->page_url;
			?>
            <li><a href="<?php echo $usrl; ?><?php echo "/?lang=".CURRENT_LANGUAGE;?>"><?php echo $value->page_title; ?></a></li>
        <?php } ?>
	<?php } ?>  </ul></div></div>
