<script type="text/javascript">
<!--    
    var CI = { 'base_url': '<?php echo base_url(); ?>' };
-->
</script>
<?php if(isset($is_loggedin) && $is_loggedin=="true" && isset($profile_details)){ ?>
<script type="text/javascript">
<!--
    var User = {
      			'logged_id_username': '<?php echo $profile_details->username; ?>'
    		};
-->
</script>
<?php } ?>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/javascripts/libs/jquery/jquery.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<script src="<?php echo base_url(); ?>assets/javascripts/flexslider.js"></script>
<script src="<?php echo base_url(); ?>assets/javascripts/jquery.isotope.min.js"></script>
<script src="<?php echo base_url(); ?>assets/javascripts/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/javascripts/ender.min.js"></script>
<script src="<?php echo base_url(); ?>assets/javascripts/effects.js"></script>

<?php
	// per page scripts (string or array)
	if(isset($page_js) AND $page_js != ''){
		if(is_array($page_js)) foreach ($page_js as $js) echo '<script type="text/javascript" src="'.JSPATH.$js.'.js"></script>';
		else echo '<script type="text/javascript" src="'.JSPATH.$page_js.'.js"></script>';
	}
?>

<link href="<?php echo base_url(); ?>assets/assets/css/contact.css" rel="stylesheet" type="text/css" /> 

<script type="text/javascript" src="http://leanmodal.finelysliced.com.au/js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/jquery.jigowatt.js"></script>
<script src="<?php echo base_url(); ?>assets/javascripts/src/jquery.backstretch.js"></script>
	<script type="text/javascript">
			$(function() {
    			$('a[rel*=leanModal]').leanModal({ top : 200, closeButton: ".modal_close" });		
			});
		</script>
<script src="<?php echo base_url(); ?>assets/javascripts/langpicker.js"></script>