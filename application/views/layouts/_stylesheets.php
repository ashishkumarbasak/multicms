<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/stylesheets/style.css">

<?php
	// per page styles (string or array)
	if(isset($page_css) AND $page_css != ''){
		if(is_array($page_css))	foreach ($page_css as $css)	echo '<link rel="stylesheet" type="text/css" href="'.CSSPATH.$css.'.css" />';
		else echo '<link rel="stylesheet" type="text/css" href="'.CSSPATH.$page_css.'.css" />';
	}
?>