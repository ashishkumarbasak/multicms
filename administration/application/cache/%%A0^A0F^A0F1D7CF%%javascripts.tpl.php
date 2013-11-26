<?php /* Smarty version 2.6.19, created on 2013-11-07 06:27:20
         compiled from layouts/javascripts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'layouts/javascripts.tpl', 136, false),)), $this); ?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
  	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/jquery.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/google-code-prettify/prettify.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-transition.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-alert.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-modal.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-tab.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-popover.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-button.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/application.js"></script>
    
    
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.js"></script>

	<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/wysihtml5-0.3.0.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<script src="http://jhollingworth.github.com/bootstrap-wysihtml5/lib/js/jquery-1.7.2.min.js"></script>
	<script src="http://jhollingworth.github.com/bootstrap-wysihtml5/lib/js/prettify.js"></script>
	<script src="http://jhollingworth.github.com/bootstrap-wysihtml5/lib/js/bootstrap.min.js"></script>
	<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/bootstrap/js/bootstrap-wysihtml5.js"></script>

   	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<?php echo '	
	<script type="text/javascript">
    $(function() {
        $(\'#select1\').change(function(){
            $(\'.field1\').hide();
            $(\'#\' + $(this).val()).show();
        });
	});
	</script>
     
     <script type=\'text/javascript\'>//<![CDATA[ 
		$(window).load(function(){
			$(document).ready(function() {
    			$(\'ul.menu\').sortable();
			});
		});//]]>  
	</script>


   <script type=\'text/javascript\'>
var url = document.location.toString();
if (url.match(\'#\')) {
    $(\'.nav-tabs a[href=#\'+url.split(\'#\')[1]+\']\').tab(\'show\') ;
} 

// Change hash for page-reload
$(\'.nav-tabs a\').on(\'shown\', function (e) {
    window.location.hash = e.target.hash;
})
</script>


	<script>
	$(document).ready(function() { 	
		$(\'.textarea\').wysihtml5();
	});
	</script>

	<script type="text/javascript" charset="utf-8">
        $(prettyPrint);
    </script>
	
	<script type="text/javascript" charset="utf-8">
	$("td").hover(function(){
    	$(\'.flyout\').removeClass(\'hidden\');
	},function(){
    	$(\'.flyout\').addClass(\'hidden\');
	});
	</script>
'; ?>
	
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/select2.js"></script>
<?php echo '
	<script type="text/javascript">
        $(document).ready(function() { 
         $("#e1").select2();
		 $("#e2").select2();
		 $("#select1").select2();
		});
        
    </script>    
	<script type="text/javascript">
    $(document).ready( function(){ 
        $(".cb-enable").click(function(){
            var parent = $(this).parents(\'.switch\');
            $(\'.cb-disable\',parent).removeClass(\'selected\');
            $(this).addClass(\'selected\');
            $(\'.checkbox\',parent).attr(\'checked\', true);
        });
        $(".cb-disable").click(function(){
            var parent = $(this).parents(\'.switch\');
            $(\'.cb-enable\',parent).removeClass(\'selected\');
            $(this).addClass(\'selected\');
            $(\'.checkbox\',parent).attr(\'checked\', false);
        });
    });
    </script>
	<script type="text/javascript">  
      $(document).ready(function () {  
        $("[rel=tooltip]").tooltip();  
      });  
    </script> 
'; ?>
 


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/js/jquery.fileupload.js"></script>
<!-- The form plugin -->
<?php echo '
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    \'use strict\';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === \'blueimp.github.io\' ?
                \'//jquery-file-upload.appspot.com/\' : \''; ?>
<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo 'assets/js/jQuery-File-Upload/server/php/\';
    $(\'#main_photo\').fileupload({
        url: url,
        dataType: \'json\',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				var file_link = \'<a target="_blank" href="'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
<?php echo 'assets/pages/\'+file.name+\'">\'+file.name+\'</a>\';
                $(\'#files1\').html("");
				$(\'<p/>\').html(file_link).appendTo(\'#files1\');
				$(\'#main_photo_value\').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $(\'#progress1 .bar\').css(
                \'width\',
                progress + \'%\'
            );
        }
    }).prop(\'disabled\', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : \'disabled\');
});


$(function () {
    \'use strict\';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === \'blueimp.github.io\' ?
                \'//jquery-file-upload.appspot.com/\' : \''; ?>
<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo 'assets/js/jQuery-File-Upload/server/php/\';
    $(\'#photo_1\').fileupload({
        url: url,
        dataType: \'json\',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				var file_link = \'<a target="_blank" href="'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
<?php echo 'assets/pages/\'+file.name+\'">\'+file.name+\'</a>\';
                $(\'#files2\').html("");
				$(\'<p/>\').html(file_link).appendTo(\'#files2\');
				$(\'#photo_1_value\').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $(\'#progress2 .bar\').css(
                \'width\',
                progress + \'%\'
            );
        }
    }).prop(\'disabled\', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : \'disabled\');
});

$(function () {
    \'use strict\';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === \'blueimp.github.io\' ?
                \'//jquery-file-upload.appspot.com/\' : \''; ?>
<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo 'assets/js/jQuery-File-Upload/server/php/\';
    $(\'#photo_2\').fileupload({
        url: url,
        dataType: \'json\',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				var file_link = \'<a target="_blank" href="'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
<?php echo 'assets/pages/\'+file.name+\'">\'+file.name+\'</a>\';
                $(\'#files3\').html("");
				$(\'<p/>\').html(file_link).appendTo(\'#files3\');
				$(\'#photo_2_value\').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $(\'#progress3 .bar\').css(
                \'width\',
                progress + \'%\'
            );
        }
    }).prop(\'disabled\', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : \'disabled\');
});

$(function () {
    \'use strict\';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === \'blueimp.github.io\' ?
                \'//jquery-file-upload.appspot.com/\' : \''; ?>
<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo 'assets/js/jQuery-File-Upload/server/php/\';
    $(\'#additional_file\').fileupload({
        url: url,
        dataType: \'json\',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				var file_link = \'<a target="_blank" href="'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
<?php echo 'assets/pages/\'+file.name+\'">\'+file.name+\'</a>\';
                $(\'#files_additional_file\').html("");
				$(\'<p/>\').html(file_link).appendTo(\'#files_additional_file\');
				$(\'#additional_file_value\').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $(\'#progress_additional_file .bar\').css(
                \'width\',
                progress + \'%\'
            );
        }
    }).prop(\'disabled\', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : \'disabled\');
});

$(function () {
    \'use strict\';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === \'blueimp.github.io\' ?
                \'//jquery-file-upload.appspot.com/\' : \''; ?>
<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo 'assets/js/jQuery-File-Upload/server/php/\';
    $(\'#additional_photo\').fileupload({
        url: url,
        dataType: \'json\',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				var file_link = \'<a target="_blank" href="'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
<?php echo 'assets/pages/\'+file.name+\'">\'+file.name+\'</a>\';
                $(\'#files_additional_photo\').html("");
				$(\'<p/>\').html(file_link).appendTo(\'#files_additional_photo\');
				$(\'#additional_photo_value\').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $(\'#progress_additional_photo .bar\').css(
                \'width\',
                progress + \'%\'
            );
        }
    }).prop(\'disabled\', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : \'disabled\');
});
</script>
'; ?>

<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.form.min.js"></script>
<?php echo '
<script type="text/javascript">
// prepare the form when the DOM is ready 
$(document).ready(function() { 
    var options = { 
        target:        \'#output\',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
    }; 
	
    $(\'#additional_form_element\').ajaxForm(options); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    var queryString = $.param(formData); 
    //alert(\'About to submit: \\n\\n\' + queryString); 
	$(\'#output_message\').hide();
    return true; 
} 
 
// post-submit callback 
function showResponse(data, statusText, xhr, $form)  {
	//$(\'#output_message\').show();
	//$(\'#output_message\').text("Created Successfully");
	$(data).hide().insertAfter(\'#li_add_new_field li:last\').slideDown(\'fast\');
	$(\'#example\').modal(\'hide\');
    /* alert(\'status: \' + statusText + \'\\n\\nresponseText: \\n\' + responseText + 
        \'\\n\\nThe output div should have already been updated with the responseText.\');  */
}
var baseurl = "'; ?>
<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo '";
function delete_additional_field(field_id){	
	var answer = confirm("Sei sicuro di voler cancellare il campo?")
	if(answer){
	var bodyContent = $.ajax({
									url: baseurl+"manage/pages/delete_additional_field",
									global: false,
									type: "POST",
									data: {	field_id : field_id},
									dataType: "html",
									async:false,
									success: function(msg){
										var li_id = \'#\'+field_id;										
										$(li_id).hide();
									}
							}).responseText;
	return false;
	}
}
$(document).ready(function(){
    $(\'#page_title\').blur(function(){
      $(\'#page_url\').val($(this).val().toLowerCase().replace(/\\s/g,\'-\'));
    });
  });
</script>
'; ?>
  

<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/langpicker.js"></script> 

<?php if ($this->_tpl_vars['javascript2'] == 'yes'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/javascripts2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>