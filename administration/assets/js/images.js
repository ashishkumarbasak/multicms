/*	
Template Name: Adminium
Description: Modern admin panel interface
Version: 1.3
URL: http://themeforest.net/item/adminium-modern-admin-panel-interface/851824

Author: enstyled
URL: http://themeforest.net/user/enstyled
*/

$(function () {


	
	// Custom file input
	$('input.file.styled').each(function() {
		var custom_file_label = $(this).attr('title');
		$(this).wrap('<span class="custom_file" />');
		$(this).parents('.custom_file').append('<input type="button" class="button" value="'+custom_file_label+'" />');
	});
	
	
	$('.custom_file input:button').live('click', function() {
		$(this).parents('span').find('input:file').click();
	});
	
	
	$('.custom_file input.file').change(function() {
		$(this).parents('span').find('em').remove();
		var filename = $(this).val().replace(/^.*\\/, '');
		$(this).parents('span').append('<em>' + filename + '</em>');
	});
	
	

	
	
	
	// Sortable images
	$('ul.imglist').sortable({
		placeholder: 'ui-state-highlight'
	});
	
	
	
	
		
	// Image actions menu
	$('ul.imglist li').hover(
		function() { $(this).find('ul').css('display', 'none').stop(true, true).fadeIn('fast').css('display', 'block'); },
		function() { $(this).find('ul').stop(true, true).fadeOut(100); }
	);
	
		
	// Image delete confirmation
	$('ul.imglist .delete a').click(function() {
		if( confirm('Are you sure you want to delete this image?') ) {
		
			// Make AJAX call to delete
						
			$(this).parents('li').fadeOut('slow', function() {
				$(this).remove();
				hudMsg('success', 'Image deleted successfully', 3000);
			});
		}
		return false;
	});

	
	
	
	
	// Show message on load (you can delete this, if not needed)
	if( ! $('#content').hasClass('loginbox') ) {
		hudMsg('success', 'Page loaded successfully');
	}

});