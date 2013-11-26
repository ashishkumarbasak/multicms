<script>
	$.backstretch(["<?php echo base_url();?>assets/images/bg.jpg"]);
</script>

<div class="sixteen columns">
	<!-- Flexslider Start-->
	<div class="flexslider" style="background: #fafafa;">
		<ul class="slides">
			<!-- Slide -->
			<li class="custom-slide" style="background: url('<?php echo base_url();?>assets/images/slide2.jpg')">
				<div class="eight columns">
					<div class="slider_description">
						<h2>
                        	SEMPRE IN ALTO CON PRODOTTI SISTEMI ERP
						</h2>
						<p>
                        	SAP ERP può essere adattato in qualunque momento in modo rapido e vantaggioso alle molte esigenze di mercato. SAP ERP può essere adattato 
                            in qualunque momento in modo rapido e vantaggioso alle molte
						</p>
						<a href="#" class="button medium yellow">visualizza prodotto</a>
					</div>
				</div>
			</li>
			
			<!-- Slide -->
			<li class="custom-slide" style="background: url('<?php echo base_url();?>assets/images/slide.jpg')">
				<div class="eight columns">
					
				</div>
			</li>
		</ul>
	<!-- Flexslider End-->
	</div>
</div>
<div class="clearfix-15"></div>

<!-- 1/4 Column -->
<div class="one-third column">
	<div class="item-img">
    	<a href="product-detail.php" title="SockMonkee">
        	<img src="<?php echo base_url();?>assets/images/ser.jpg" alt=""/>
		</a>
	</div>
	<div class="portfolio-item-meta">
		<h5>
        	<a href="product-detail.php">SAP ERP</a>
        </h5>
		<p>Aenean sit amet ligula est, conseact etur lectus. Maecenas hendrerit, lorem.</p>
	</div>
</div>
	

<div class="one-third column">
	<div class="item-img">
    	<a href="product-detail.php" title="SockMonkee">
        	<img src="<?php echo base_url();?>assets/images/ser.jpg" alt=""/>
		</a>
	</div>
	<div class="portfolio-item-meta">
		<h5>
        	<a href="product-detail.php">SAP ERP</a>
		</h5>
		<p>Aenean sit amet ligula est, conseact etur lectus. Maecenas hendrerit, lorem.</p>
	</div>
</div>


<div class="one-third column">
	<?php echo $this->template->block('AssistenzaBig', 'layouts/_assistenza_big.php'); ?>
</div>

<div class="clearfix-small"></div>
	
<div class="sixteen columns">
	<?php echo $this->template->block('Feedback', 'layouts/_feedback.php'); ?>
</div>
<!-- Our Clients End -->