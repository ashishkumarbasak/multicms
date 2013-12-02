{literal}                       
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <li class="template-upload fade">
        <div class="image-preview">
            <span class="preview"></span>
        </div>
        <div class="image-name">
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </div>
        <div class="image-size">
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            {% } %}
        </div>
        <div class="image-action">
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </div>
		<div style="clear:both;"></div>
    </li>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <li id="file-{%=file.name%}" class="template-download fade">
        <div class="image-preview">
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
						<img src="{%=file.thumbnailUrl%}">
					</a>
                {% } %}
            </span>
        </div>
        <div class="image-name" style="width: 400px;">
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                <span class="size">( {%=o.formatFileSize(file.size)%} )</span>
            </p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
            <textarea name="image_descriptions[]" id="image_descriptions_{%= i %}" style="width: 90%; margin-top: 7px; font-sie:12px;">{%=file.description%}</textarea>
        </div>
        <div class="image-action">
            <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </button>
			<input type="hidden" name="uploaded_files[]" id="uploaded_files_{%= i %}" value="{%=file.name%}">
            <input type="checkbox" name="delete" value="1" class="toggle">
        </div>
		<div style="clear:both;"></div>
    </li>
{% } %}
</script>  
{/literal}                      

<script type="text/javascript">

</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload.js"></script>

<!-- The File Upload processing plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->



<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

{literal}                        
<script>
$(function() {
	$("#upload-file-lists" ).sortable({
    axis: 'y',
    stop: function (event, ui) {
			var data = $(this).sortable('serialize');
			// POST to server using $.post or $.ajax
			$.ajax({
				data: data,
				type: 'POST',
				url: '{/literal}{$baseurl}{literal}manage/pages/edit/{/literal}{$page_id}{literal}/slideshow/saveorder'
			});
			
		}
	});
});
</script> 
{/literal}  