<ul id="breadcrumbs">
	<li><i class="icon-home"></i></li>
	<li><a href="<?php echo base_url();?>dashboard">Home</a> <?php if(isset($breadcmp_first)) { ?><span >/</span><?php } ?></li>
	<?php if(isset($breadcmp_first)) { ?>
    	<li><a href="<?php echo base_url(); ?><?php echo $breadcmp_first_url;?>"><?php if(isset($breadcmp_first)) echo $breadcmp_first; ?></a> <?php if(isset($breadcmp_second)) { ?><span >/</span><?php } ?></li>
    <?php } ?>
    
	<?php if(isset($breadcmp_second)) { ?>
    	<li class="active"><a href="<?php echo base_url(); ?><?php echo $breadcmp_second_url;?>"><?php if(isset($breadcmp_second)) echo $breadcmp_second; ?></a><?php if(isset($breadcmp_third)) { ?><span >/</span><?php } ?></li>
    <?php } ?>
    
    <?php if(isset($breadcmp_third)) { ?>
    	<li class="active"><a href="<?php echo base_url(); ?><?php echo $breadcmp_third_url;?>"><?php if(isset($breadcmp_third)) echo $breadcmp_third; ?></a><?php if(isset($breadcmp_fourth)) { ?><span >/</span><?php } ?></li>
    <?php } ?>
    
    <?php if(isset($breadcmp_fourth)) { ?>
    	<li class="active"><a href="<?php echo base_url(); ?><?php echo $breadcmp_fourth_url;?>"><?php if(isset($breadcmp_fourth)) echo $breadcmp_fourth; ?></a></li>
    <?php } ?>
</ul>