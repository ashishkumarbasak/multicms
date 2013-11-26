<script src="{$baseurl}assets/js/jQuery-File-Upload/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="{$baseurl}assets/js/jQuery-File-Upload/js/jquery.fileupload.js"></script>

													<div class="container">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn btn-success fileinput-button">
                                                            <i class="icon-plus icon-white"></i>
                                                            <span>Select files...</span>
                                                            <!-- The file input field used as target for the file upload widget -->
                                                            <input id="additional_file_{$field_details->field_id}" type="file" name="files[]" multiple>
                                                            <input type="hidden" name="additional_filed_value_{$field_details->field_id}" id="additional_file_value_{$field_details->field_id}" value="">
                                                        </span>
                                                        <br>
                                                        <br>
                                                        <!-- The global progress bar -->
                                                        <div id="progress_additional_file_{$field_details->field_id}" class="progress progress-success progress-striped">
                                                            <div class="bar"></div>
                                                        </div>
                                                        <div id="files_additional_file_{$field_details->field_id}" class="files">
                                                        {if $field_details!=NULL}
                                                            {if $field_details->field_value!=NULL}
                                                                <div class="files">
                                                                <a href="{$baseurl|replace:"administration/":""}assets/pages/{$field_details->field_value}" target="_blank">														
                                                                	{$field_details->field_value}
                                                                </a> [ <a href="#">Delete</a> ]
                                                                </div>
                                                            {/if}
                                                        {/if}
                                                        </div>
                                                    </div>
                                                    
{literal}
<script type="text/javascript">
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '{/literal}{$baseurl}{literal}assets/js/jQuery-File-Upload/server/php/';
    $('#additional_file_{/literal}{$field_details->field_id}{literal}').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				var file_link = '<a target="_blank" href="{/literal}{$baseurl|replace:"administration/":""}{literal}assets/pages/'+file.name+'">'+file.name+'</a>';
               	var file_field_id = "#files_additional_file_{/literal}{$field_details->field_id}{literal}";
				$(file_field_id).html("");
			    $('<p/>').html(file_link).appendTo(file_field_id);
				$('#additional_file_value_{/literal}{$field_details->field_id}{literal}').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_additional_file_{/literal}{$field_details->field_id}{literal} .bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
{/literal}                                                                                                        