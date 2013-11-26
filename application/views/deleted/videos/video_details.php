<!-- 960 Container Start -->
<div class="container">
	                        <div class="sixteen columns">

      	<?php echo $this->template->block('Breadcamp', 'layouts/_breadcamp.php'); ?>

				<h1 class="headline"><?php if($video_details!=NULL) echo $video_details[0]->video_title; ?></h1>

	</div>	</div>

	<div class="clearfix"></div>
	
	<div class="container">

				

			<div class="two-thirds column">
				
		
		   <iframe style="visibility: hidden" onload="this.style.visibility='visible';" 
            
            data-auto-play="false" 
            data-video="<?php echo base_url(); ?>assets/videos/<?php if($video_details!=NULL) echo $video_details[0]->video_file_name; ?>" 
            data-poster="<?php echo base_url(); ?>assets/videos/<?php if($video_details!=NULL){ if($video_details[0]->video_image_name!=NULL) echo $video_details[0]->video_image_name; else echo "default.jpg"; } else echo "default.jpg";  ?>" 
            
            data-skin="light" 
            data-firefox-uses-flash="true" 
            
            data-use-share-buttons="false" 
            data-share-text="dugoni" 
            data-copyright="dugoni" 
            data-copyright-link="dugoni"
            data-copyright-target="_blank"  
            
            data-fallback-light="cj-video-player/swf/video_fallback_light.swf" 
            
            width="620" 
            height="380" 
            scrolling="no" 
            frameborder="0" 
            type="text/html" 
            mozallowfullscreen="mozallowfullscreen" 
            webkitallowfullscreen="webkitallowfullscreen" 
            allowfullscreen="allowfullscreen" 
            src="<?php echo base_url(); ?>assets/cj-video-player/cj-video.html">
            
        </iframe>
        
        </div>
			<div class="one-third column shadow round">
			<div class="padding-20">
			<h4>Download</h4>
			<p>PDF (Descrizione pdf)</p>
           <p><?php if($video_details!=NULL) echo $video_details[0]->video_description; ?></p>

			</div>
		</div>
	

	
	<div class="clearfix-big"></div>
	


	
</div>
<!-- 960 Container End -->