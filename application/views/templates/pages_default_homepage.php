
	    <?php echo $this->template->block('Header', 'layouts/_header.php'); ?>
		
    

<!-- 960 Container Start -->
<div class="container background-white">
	
<!-- Slider -->
<div id="slider">

	<!-- Flexslider Start-->
	<div class="flexslider" style="background: #fafafa;">
		<ul class="slides">
		
			<!-- Slide -->
			<li class="custom-slide" style="background: url(<?php echo base_url();?>assets/images/home1.jpg)">
			<div class="container">
					<div class="eight columns" style="float:right;margin-right:30px;">
						<div class="slider_description">
							<h2>Irrigatori Meccanici</h2>
							<p>Phasellus - ut augue at sapien bibendum bibendum amet magna. Aenean condimentum, lacus sit amet luctus lobortis, enim tellus ultrices elit, amet consequat enim elit noneas.</p>						</div>
					</div>
				</div>
				
			</li>
			<li class="custom-slide" style="background: url(<?php echo base_url();?>assets/images/home2.jpg)">
			<div class="container">
					<div class="eight columns" style="float:right; margin-right:30px;">
						<div class="slider_description">
							<h2>Prodotti Odontoiatria</h2>
							<p>Phasellus - ut augue at sapien bibendum bibendum amet magna. Aenean condimentum, lacus sit amet luctus lobortis, enim tellus ultrices elit, amet consequat enim elit noneas.</p>						</div>
					</div>
				</div>
			
			</li>
		</ul>
	</div>
	<!-- Flexslider End-->
			
</div>
<!-- End Slider -->		<!-- Portfolio Content -->
<!--  Page Title -->

	<div class="clearfix-big"></div>
		<!-- Icon Box Start -->
		
		<!-- Icon Box Start -->
		<div class="one-third column">		
		<div class="large-notice">

				</div>
					</div>
		<!-- Icon Box End -->
		
		
		<div class="one-third column">	
					<a href="page.php"><img src="<?php echo base_url();?>assets/images/home1.jpg"></a>
	
					<div class="portfolio-item-meta">
					<h4><a href="page.php">Irrigatori Meccanici</a></h4>
					<p>Proin iaculis purus consequat sem cursus digni ssim. Donec porttitor entume suscipit. Aenean rhoncus posuere odio in tincidunt.</p>
			</div>
		</div>
		<!-- Icon Box End -->	
		
		<!-- Icon Box Start -->
			<div class="one-third column">	
					<a href="page.php"><img src="<?php echo base_url();?>assets/images/home2.jpg"></a>
	
					<div class="portfolio-item-meta">
					<h4><a href="page.php">Prodotti Odontoiatria</a></h4>
					<p>Proin iaculis purus consequat sem cursus digni ssim. Donec porttitor entume suscipit. Aenean rhoncus posuere odio in tincidunt.</p>
			</div>
		</div>
		<!-- Icon Box End -->
		
		
	
	
		<div class="clearfix-big"></div>

	
</div>
<!-- 960 Container End -->        
        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
	