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
	    <title><?php if(isset($seo_title)) echo $seo_title; else echo $site_name; ?> | AMS Medical Devices srl</title>
	    <meta name="description" content="<?php if(isset($seo_description)) echo $seo_description; else echo $site_description; ?>" />
	    <meta name="keywords" content="<?php if(isset($seo_keywords)) echo $seo_keywords; else echo $site_keywords; ?>" />
	    <meta name="author" content="studiomodo">
	    <meta http-equiv="expires" content="0" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="p:domain_verify" content="bf686c79e1fc9d362981be317a871e61" />

		<meta http-equiv="cache-control" content="no-cache, no-store, proxy-revalidate, must-revalidate" />							    
		<?php 
        echo $this->template->block('name', 'layouts/_stylesheets'); 	
        echo $this->template->block('name', 'layouts/_javascripts'); 
        ?>
	</head>
	<body>
	
	
	<body onload="initialize()">
<!-- Header -->
<div id="header">

	<!-- 960 Container Start -->
	<div class="container ie-dropdown-fix">
	
				
			
		<!-- Logo -->
		<div class="four columns">
			<a href="<?php echo base_url();?><?php if($this->config->item('project_type')=="multicms") echo CURRENT_LANGUAGE."/"; ?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt=""/></a>
		</div>
		
		<!-- Main Navigation Start -->
		<div class="twelve columns omega alpha">
		<div id="navigation-small">
				<ul id="nav">
					<?php echo render_menu($menu_id=3, $level=1); ?>
					 
					<?php if($langlist!=NULL && $this->config->item('project_type')=="multicms") { ?>
						<?php foreach($langlist as $key=>$value) { ?>
                       		<li class="language"> <a href="javascript:void(0);" onClick="setlanguage('<?php echo $value->flag; ?>');">    <img src="<?php echo base_url(); ?>administration/assets/images/flags/png/<?php echo $value->flag; ?>.png"></a></li>
                       	<?php } ?>
                   	<?php } ?>
				</ul>
			</div>


			<div id="navigation">
				<ul id="nav">
			  		<?php echo render_menu($menu_id=2, $level=3); ?>
				</ul>
			</div>
		</div>
		<!-- Main Navigation End -->
		
		
		
	</div>
	<!-- 960 Container End -->
</div>
<!-- End Header -->


