	    <?php echo $this->template->block('Header', 'layouts/_header.php'); ?>

			<div class="two-thirds column">


					<h1 class="headline"><?php echo $page_title; ?></h1>
<div class="text">
<p><?php echo $description_2; ?></p>
</div>


		<div class="clearfix-big"></div>

	<!-- Tabs Navigation -->
			<ul class="tabs-nav">
				<li class="active"><a href="#tab1"><?php echo $additional_title[0]; ?></a></li>
				<li><a href="#tab2"><?php echo $additional_title[1]; ?></i></a></li>
			</ul>

			<!-- Tabs Content -->
			<div class="tabs-container">
				<div class="tab-content" id="tab1"><?php echo $additional_description[1]; ?></div>
				<div class="tab-content" id="tab2"><?php echo $additional_description[2]; ?></div>
				
			</div>
			

			
		</div>
		
		
					<div class="one-third column">				<div class="item-img"><img src="<?php echo base_url(); ?>assets/pages/<?php echo $photo_1; ?>"></div>
												    <?php echo $this->template->block('Header', 'layouts/share.php'); ?>

		<div class="clearfix-small"></div>

						<p><?php echo $additional_description[0]; ?></p>

    
		<div class="clearfix-small"></div>



		
</div>
      

        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>

		