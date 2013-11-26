<link rel="stylesheet" href="{$baseurl}assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">

<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			<div class="block_content">
				
                <form action="" method="post" enctype="multipart/form-data">	
					<div class="tabbable">
						<ul class="nav nav-tabs" style="height:52px !important;">
                            <li class="active"><a data-toggle="tab" href="#tab1"> italiano</a></li>
                            <li><a data-toggle="tab" href="#tab2">english</a></li>
                            <li><a data-toggle="tab" href="#tab3">french</a></li>
							<li><a data-toggle="tab" href="#tab4">Breton</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane active">
                				{include file="manage/videos/create_video_form_it.tpl"}
                			</div>
                            <div id="tab2" class="tab-pane">
                				{include file="manage/videos/create_video_form_en.tpl"}
                			</div>
                            <div id="tab3" class="tab-pane">
                				{include file="manage/videos/create_video_form_fr.tpl"}
                			</div>
                            <div id="tab4" class="tab-pane">
                				{include file="manage/videos/create_video_form_br.tpl"}
                			</div>
          				</div>
        			</div>
				</form>
			
            </div>		<!-- .block_content ends -->
		</div>		<!-- .block_content ends -->
	</div>		<!-- wrapper ends -->
</div>		<!-- #hld ends -->