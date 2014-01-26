
	    <?php echo $this->template->block('Header', 'layouts/_header.php'); ?>
		<?php //echo $this->template->block('navHeadermenu', 'layouts/_navigation_menu.php'); ?>
				
		<?php echo $this->template->message(); ?>
		<?php echo $this->template->yieldContent(); ?>
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
	