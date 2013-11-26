<!-- 960 Container Start -->
<div class="container">
	<?php echo $this->template->block('SearchHome', 'welcome/_search_home.php'); ?>
	<!--Recent Work -->

	<div class="clearfix-big"></div>

	<div class="sixteen columns">
		<h1 class="title">Architetto</h1>
	</div>

			
            <div id="all_hotel_lists">
				<?php echo $this->template->block('SearchPanleLeft','hotels/_hotel_list.php'); ?>
				<?php echo $pagination_link; ?>
			</div>

<div class="clearfix"></div>
</div>
<!-- 960 Container End -->