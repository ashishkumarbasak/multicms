<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title><?php if(isset($seo_title)) echo $seo_title; else echo $site_name; ?> </title>
	    <meta name="description" content="<?php if(isset($seo_description)) echo $seo_description; else echo $site_description; ?>" />
	    <meta name="keywords" content="<?php if(isset($seo_keywords)) echo $seo_keywords; else echo $site_keywords; ?>" />
	    <link rel="shortcut icon" type="image/x-icon" href="<? echo IMAGEPATH; ?>favicon.ico" />
	    <meta name="author" content="studiomodo">
	    <link rel="canonical" href="<?php //echo current_url(); ?>" />  <!-- this line is for load canonocal url using helper function, have to implement later after development-->  
	    <meta http-equiv="expires" content="0" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="p:domain_verify" content="bf686c79e1fc9d362981be317a871e61" />

		<meta name="google-site-verification" content="HSKucyailJ9ne6p-IGQX4SqTLd2bZEFu-P7UBnppnSs" />
		<meta http-equiv="cache-control" content="no-cache, no-store, proxy-revalidate, must-revalidate" />							    
		<?php 
        echo $this->template->block('name', 'layouts/_stylesheets'); 	
        echo $this->template->block('name', 'layouts/_javascripts'); 
        ?>
	</head>
	<body>
	    <?php echo $this->template->block('Header', 'layouts/_header.php'); ?>
		
        
        
        
        
        
        
        
<script>
	$.backstretch(["<?php echo base_url(); ?>assets/images/bg.jpg"]);
</script>

		
		
<div class="two-thirds column">
	<!-- Flexslider Start-->
	<div class="flexslider" style="background: #fafafa;">
		<ul class="slides">		
			<!-- Slide -->
			<li class="custom-slide" style="background: url(<?php echo base_url(); ?>assets/images/slider.jpg)"></li>
		</ul>
	</div>
    <!-- Flexslider End-->			

	<div class="portfolio-item-meta">
		<h1 class="headline"><?php echo $page_title; ?></h1>
			<p>
        	<?php echo $description_1; ?>
	
        	
        	

			</p>
	</div>
				
				
	<div class="portfolio-item-meta-white">
		
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
</div>	
<div class="clearfix"></div>
        
        
        
        
        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
	</body>
</html>
