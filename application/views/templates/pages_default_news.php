
	    <?php echo $this->template->block('Header', 'layouts/_header.php'); ?>
		
        


		
		
<div class="two-thirds column">
	<!-- Flexslider Start-->
	<img src="<?php echo base_url(); ?>assets/pages/<?php echo $photo_1; ?>">
    <!-- Flexslider End-->			
	<div class="portfolio-item-meta">
		<h1 class="headline"><?php echo $page_title; ?></h1>
			<p>
        	<?php echo $description_1; ?>
	
        	
  	

			</p>
	</div>
				
				
<div class="portfolio-item-meta-white">
<p><?php echo $description_2; ?></p>
</div>

<div class="clearfix"></div>
</div>
		
		
<div class="one-third column">
	<?php if($subpagelist!=NULL) { ?>
    	<?php foreach($subpagelist as $key=>$value) { ?>
        <ul class="category-list">
        	<?php 
				if(isset($mother_page_url) && $mother_page_url!=NULL)
					$usrl = base_url().$mother_page_url."/".$value->page_url;
				else
					$usrl = base_url().$value->page_url;
			?>
            <li><a href="<?php echo $usrl; ?>"><?php echo $value->page_title; ?></a></li>
        </ul>
        <?php } ?>
	<?php } ?>
    
	<div class="clearfix-big"></div>

		<!-- Large Notice -->
		<div class="large-notice" style="height:160px;">
			<h4>ASSISTENZA</h4>
			<p>This is a example of style component for calling extra attention to featured content or information. 
			Adipiscing elit. Cras eu nisl quam. Cras in elit a massa fermentum bibendum.</p><br>
			<a href="#" class="button medium black">ASSISTENZA 800.254215</a>
		</div>

    
		<div class="clearfix-small"></div>

		<div class="info-box-feedback">
			<div class="info-content-feedback">
				<blockquote>
                	ui re, eum aspediost, nonsendipis modipsam coriate mperate dolupta erestiatibus<br>
                    delentum quis di aliaspe rnatem excepel inctissed et es doluptatiis digendero magnis prerfer citae.
				</blockquote>
				<h5>Studiomodo, Giulio Carra</h5>
			</div>
			<div class="clearfix"></div>
		</div>		 			<div class="clearfix-small"></div>
   <?php echo $list_products_small; ?>

		<div class="clearfix-big"></div>

</div>		
</div>
<div class="clearfix"></div>
        
        

        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
	