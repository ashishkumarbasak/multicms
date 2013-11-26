
	    <?php echo $this->template->block('Header', 'layouts/_header.php'); ?>
		
       <!-- 960 Container -->
	<div class="container">
		<!-- Portfolio Content -->
<!--  Page Title -->
<div id="page-title">

	<!-- 960 Container Start -->
	<div class="container">
		<div class="sixteen columns">
			<h2><?php echo $page_title; ?></h2>
		</div>
	</div>
	<!-- 960 Container End -->
	
</div>
<!-- Page Title End -->
</div>

	<!-- 960 Container Start -->
<div class="container background-white">
	
<div class="clearfix-big"></div>
<div class="one-third column">

				<div class="large-notice">

				<h5 class="headline">Scegli una marca</h5>
				<ul class="categories">
  <?php if($subpagelist!=NULL) { ?>
    	<?php foreach($subpagelist as $key=>$value) { ?>
    		
        	<?php 
				if(isset($mother_page_url) && $mother_page_url!=NULL)
					$usrl = base_url().CURRENT_LANGUAGE."/".$mother_page_url."/".$value->page_url;
				else
					$usrl = base_url().CURRENT_LANGUAGE."/".$value->page_url;
			?>
            <li><a href="<?php echo $usrl; ?>"><?php echo $value->page_title; ?></a></li>
        <?php } ?>
	<?php } ?> 
	
	

			</ul>

					</div>
									

		</div>
		<!-- Slider -->
		<div class="two-thirds column">
			<div class="project">
				<div class="flexslider">
					<ul class="slides">
						<li><img src="<?php echo base_url();?>assets/images/sirona.jpg" alt="" /></li>
					 </ul>
				</div>
			</div>
			<div class="clearfix-big"></div>
<h5 class="headline">Prodotti disponibili</h5>
<table class="products-table">

				<tr>
					<th>Modello</th>
					<th>Codice</th>
					<th></th>
				</tr>

    <?php echo $list_products; ?>


				
			
			</table>
			
			
			

		<div class="clearfix"></div>

<div class="large-notice">

				<h5 class="headline">Legenda</h5>
				<p>1  = Irrigazione singola<br>
1/2 = Irrigazione interna ed esterna<br>
1/2Y= Irrigazione interna ed esterna con connessione ad Y<br>
Mettere simbolo del rubinetto:  Rubinetto<br>
</p>

					</div>
		</div>
		
		<div class="clearfix-big"></div>
		<div class="clearfix-big"></div>

	</div>
	<!-- End 960 Container -->

        
        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
