	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
    <?php if(isset($hotel_profile_information) && $hotel_profile_information[0]->map_latitude!=0) { ?>
            var map_latitude=<?php echo $hotel_profile_information[0]->map_latitude; ?>;
    <?php }else{ ?>
            var map_latitude=42.83333;
    <?php } ?>
    
    <?php if(isset($hotel_profile_information) && $hotel_profile_information[0]->map_longitude!=0) { ?>
            var map_longitude=<?php echo $hotel_profile_information[0]->map_longitude; ?>;
    <?php }else{ ?>
            var map_longitude=12.83333;
    <?php } ?>
    <?php if(isset($hotel_profile_information) && $hotel_profile_information[0]->map_zoom_level!=0) { ?>
            var map_zoomlevel=<?php echo $hotel_profile_information[0]->map_zoom_level; ?>;
    <?php }else{ ?>
            var map_zoomlevel=15;
    <?php } ?>
    
    var geocoder = new google.maps.Geocoder();
    
    function geocodePosition(pos) {
      geocoder.geocode({
        latLng: pos
      }, function(responses) {
        if (responses && responses.length > 0) {
          updateMarkerAddress(responses[0].formatted_address);
        } else {
          updateMarkerAddress('Cannot determine address at this location.');
        }
      });
    }
    
    function updateMarkerStatus(str) {
      //document.getElementById('markerStatus').innerHTML = str;
    }
    
    function updateMarkerPosition(latLng) {
      /*
      document.getElementById('info').innerHTML = [
        latLng.lat(),
        latLng.lng()
      ].join(', ');
      */
        $('#hotel_latitude_from_google').val(latLng.lat());
        $('#hotel_logitude_from_google').val(latLng.lng()); 
    }
    
    function updateMarkerAddress(str) {
      //document.getElementById('address').innerHTML = str;
      
      $('#hotel_address_from_google').val(str);
    }
    var map, pinColor, pinImage, pinShadow, marker;
    function initialize() {
      var latLng = new google.maps.LatLng(map_latitude, map_longitude);
      pinColor = "FE7569";
      pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
            new google.maps.Size(21, 34),
            new google.maps.Point(0,0),
            new google.maps.Point(10, 34));
      pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
            new google.maps.Size(40, 37),
            new google.maps.Point(0, 0),
            new google.maps.Point(12, 35));
    
      map = new google.maps.Map(document.getElementById('mapCanvas'), {
        zoom: map_zoomlevel,
        center: latLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        scrollwheel: false,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_RIGHT
        },
        zoomControl: true,
        streetViewControl: false,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.BOTTOM_RIGHT
        }
      });
      marker = new google.maps.Marker({
        position: latLng,
        title: '<?php if(isset($hotel_profile_information)) echo addslashes($hotel_profile_information[0]->hotel_name); else echo "Hotel Address"?>',
        map: map,
        draggable: false,
        icon: pinImage,
        shadow: pinShadow
      });
      
      // Update current position info.
      updateMarkerPosition(latLng);
      geocodePosition(latLng);
      
      // Add dragging event listeners.
      google.maps.event.addListener(marker, 'dragstart', function() {
        updateMarkerAddress('Dragging...');
      });
      
      google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerStatus('Dragging...');
        updateMarkerPosition(marker.getPosition());
      });
      
      google.maps.event.addListener(marker, 'dragend', function() {
        updateMarkerStatus('Drag ended');
        geocodePosition(marker.getPosition());
      });
    }
    
    // Onload handler to fire off the app.
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <style>
      #mapCanvas {
        width: 640px;
        height: 250px;
      }
      #mapCanvas img{ height:auto !important; width:auto !important;}
    </style>
    

<!-- 960 Container Start -->
<div class="container">
	
	<?php echo $this->template->block('SearchHome', 'welcome/_search_home.php'); ?>

	<div class="clearfix-big"></div>
	<div id="badge" style="position:absolute; top:160px;z-index: 10000; margin-left:836px;">
    	<img src="<?php echo base_url();?>assets/images/certificate.png">
    </div>
	<div class="sixteen columns">
		<ul id="breadcrumbs">
			<li><a href="#">Home</a> <span>/</span></li>
			<li><a href="#">Layouts</a> <span >/</span></li>
			<li class="active">Services</li>
		 </ul>

		<h1 class="title">
			<?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) echo $hotel_profile_information[0]->hotel_name;?>
    	</h1>
	</div>	
    
    <div class="clearfix-small"></div>

		<!-- 1/4 Column -->
		<div class="two-thirds column">

    	<ul class="tabs">
    		<li><a href="#tab1">Informazioni</a></li>
    		<li><a href="#tab2" id="showMap">Mappa</a></li>
    	</ul>
		
        <!-- Start tab container -->
		<div class="tab_container">
		    <div id="tab1" class="tab_content">
            	<div class="five columns alpha">
					<div class="item-img">
                    		<?php if($hotel_profile_information!=NULL){ ?>
							<?php 
		                		$filename = hotel_default_attachment($hotel_profile_information[0]->user_id);
		                		if($filename!=NULL)
                                    $file = PROFILE_ATTACHMENT_FILE_PATH_FOR_AVATAR .$hotel_profile_information[0]->user_id."/".$filename;
								else
                                    $file = "assets/images/default_attachment.png";
				
                                echo image_thumb($file,185,220);
							?>
                            <?php } ?>
                    </div>
					
                    <div class="clearfix-big"></div>
					
                    <h3>Indirizzo</h3>
						<ul>
                            <li><?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) echo $hotel_profile_information[0]->hotel_address;?></li>
                            <li><?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) echo $hotel_profile_information[0]->hotel_zip;?> <?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) { echo $hotel_profile_information[0]->hotel_town.", ".$hotel_profile_information[0]->city_name;} ?></li>
                            <li><em>Tel.</em> <?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) echo $hotel_profile_information[0]->hotel_phone;?></li>
                            <li><em>Fax.</em> <?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) echo $hotel_profile_information[0]->hotel_fax;?></li>
                            <li><a href="<?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) echo str_replace("www.www.","www.",$hotel_profile_information[0]->hotel_website);?>" target="_blank">Visit website</a></li>
						</ul>
                    
                    <div class="clearfix-big"></div>
                    
                    <h3>Informazioni importanti</h3>
                    <?php if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information)) echo $hotel_profile_information[0]->important_information;?>
                    
				</div>
								
				<div class="five columns omega">
					<?php 
						if($hotel_profile_information!=NULL && array_key_exists(0,$hotel_profile_information) && ($hotel_profile_information[0]->hotel_description!=NULL || $hotel_profile_information[0]->hotel_description!=0)) 
							echo $hotel_profile_information[0]->hotel_description;
					?>
				</div>
				
		<div class="clearfix-big"></div>
    </div>

    <div id="tab2" class="tab_content">
    	<div id="mapCanvas" style="width:560px;height:400px;"></div>
    </div>
        
</div>


		</div>
	
		<!-- 1/4 Column -->
		<div class="one-third-long column background">
				<div class="portfolio-item-meta">
					<h5><a href="artigiano.php">Contatto</a></h5>
				</div>
								<div class="portfolio-item-description">

									<div id="contact-form">
			<form method="post" action="contact.php">
				
				<div class="field">
					<label>Name:</label>
					<input type="text" name="name" class="text" />
				</div>
				
				<div class="field">
					<label>Email: <span>*</span></label>
					<input type="text" name="email" class="text" />
				</div>
				<div class="field">
					<label>Telefono: <span>*</span></label>
					<input type="text" name="email" class="text" />
				</div>
				<div class="field">
					<label>Message: <span>*</span></label>
					<textarea name="message" class="text textarea" ></textarea>
				</div>
				
				<div class="field">
					<input type="button" id="send" value="Send Message"/>
					<div class="loading"></div>
				</div>
				
			</form>
		</div>
		<div class="clearfix-big"></div>
		</div>

		</div>

					
		</div>		

	<div class="clearfix"></div>
	

	<!-- Our Clients End -->

</div>
<!-- 960 Container End -->