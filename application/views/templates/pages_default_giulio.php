
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
		<!-- Large Notice -->
		<div class="large-notice" style="height:160px;">
			<h4>ASSISTENZA</h4>
			<p>This is a example of style component for calling extra attention to featured content or information. 
			Adipiscing elit. Cras eu nisl quam. Cras in elit a massa fermentum bibendum.</p><br>
			<a href="#" class="button medium black">ASSISTENZA 800.254215</a>
		</div>

    
		<div class="clearfix-big"></div>

		<div class="info-box-feedback">
			<div class="info-content-feedback">
				<blockquote>
                	ui re, eum aspediost, nonsendipis modipsam coriate mperate dolupta erestiatibus<br>
                    delentum quis di aliaspe rnatem excepel inctissed et es doluptatiis digendero magnis prerfer citae.
				</blockquote>
				<h5>Studiomodo, Giulio Carra</h5>
			</div>
			<div class="clearfix"></div>
		</div>	
		<div class="clearfix-big"></div>
	    <?php echo $list_products; ?>
  	<img src="<?php echo base_url(); ?>assets/pages/<?php echo $photo_2; ?>">
  	<?php echo $additional_description[0]; ?>



    <?php echo $list_products; ?>
    <?php echo $list_news; ?>


</div>		
</div>
<div class="clearfix"></div>
        
        

        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
	</body>
</html>
