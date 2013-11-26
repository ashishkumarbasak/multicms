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

  <?php if($subpagelist!=NULL) { ?>
    	<?php foreach($subpagelist as $key=>$value) { ?>
    		
        	<?php 
				if(isset($mother_page_url) && $mother_page_url!=NULL)
					$usrl = base_url().$mother_page_url."/".$value->page_url;
				else
					$usrl = base_url().$value->page_url;
			?>
            <li><a href="<?php echo base_url();?><?php echo CURRENT_LANGUAGE."/"; ?>products/<?php echo $value->page_url; ?>"><?php echo $value->page_title; ?></a></li>
        <?php } ?>
	<?php } ?> 

		</div>
		<!-- Slider -->
		<div class="two-thirds column">
		<table class="products-table">

				<tr>
					<th>Modello</th>
					<th>Codice</th>
				</tr>
		<tr>
		
		<td> 	<?php echo $description_1; ?></td>
		<td> 	<?php echo $description_2; ?></td>
		
		
		
		</tr>
		
		
		
		
		</table>
			
			
			<div class="clearfix-big"></div>
	
<div class="large-notice">

				<h5 class="headline">Important information</h5>
				<p>Dolorer ehenis idisitae pro corerro estis accullandent quia volorum aut que voles adigeniet velestiatem a si alia cum volupta tempore iusam, sedit earum, simagnam quae veliquamEverumquo tet faciis eseniatur am dolluptius adis delibus reperferem unt modionecto etur magnimp orumquae sunt.repudis molupta simaio iusa quam net etur, od quas perion eatur aribusae. Riam re, neceperspiet laccabo reicit aut liatiunt qui cumet quam volorerro tet lat ut modignianda quodi</p>
					</div>
		</div>
		
		<div class="clearfix-big"></div>
		<div class="clearfix-big"></div>

	</div>
	<!-- End 960 Container -->
	
	
	
        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
	
		