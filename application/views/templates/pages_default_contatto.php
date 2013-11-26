
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
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var infowindow;
(function () {

  google.maps.Map.prototype.markers = new Array();
    
  google.maps.Map.prototype.addMarker = function(marker) {
    this.markers[this.markers.length] = marker;
  };
    
  google.maps.Map.prototype.getMarkers = function() {
    return this.markers
  };
    
  google.maps.Map.prototype.clearMarkers = function() {
    if(infowindow) {
      infowindow.close();
    }
    
    for(var i=0; i<this.markers.length; i++){
      this.markers[i].set_map(null);
    }
  };
})();
   
  
  function initialize() {
  
    var latlng = new google.maps.LatLng(44.998967, 10.740789);
    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      //mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    var a = new Array();
    var t =  new Object();
    t.name = "studiomodo"
    t.lat =  44.998967
    t.lng =  10.740789
    a[0] = t;
  
     
    for (var i = 0; i < a.length; i++) {
        var latlng = new google.maps.LatLng(a[i].lat, a[i].lng);
        map.addMarker(createMarker(a[i].name,latlng));
     }
    console.log(map.getMarkers());    
    
    console.log(map.getMarkers());    
  }
  
  function createMarker(name, latlng) {
    var marker = new google.maps.Marker({position: latlng, map: map});
    google.maps.event.addListener(marker, "click", function() {
      if (infowindow) infowindow.close();
      infowindow = new google.maps.InfoWindow({content: name});
      infowindow.open(map, marker);
    });
    return marker;
  }

</script>



	    		 
	    		 
<div class="clearfix-small"></div>
<div class="one-third column">
				<div class="large-notice">

								<h5 class="headline">Sede Ufficio commerciale</h5>
					<p class="tooltips">
Via Gramsci, 1<br>
46047 Porto Mantovano (MN)</p><div class="clearfix-big"></div>

<h5 class="headline">Stabilimento di produzione</h5>
<p class="tooltips">			
Anchiplast snc<br>
Via Briana, 4<br>
46023 Bondeno di Gonzaga (MN)</p>					
					</div>

		</div>
		<!-- Slider -->
		<div class="two-thirds column">
		
	    		 <div id="map_canvas" style="width:100%; height:400px ;float:left;"></div>

		</div>
		
		<div class="clearfix-big"></div>
		<div class="clearfix-big"></div>

	</div>
	<!-- End 960 Container -->


        
		
	    <?php echo $this->template->block('footer', 'layouts/_footer.php'); ?>
	