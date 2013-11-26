<script src="<?php echo JSPATH;?>jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    
	var options = { 
        target:        '#hotel_paymentprofile_error_message',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback
    }; 
    // bind form using 'ajaxForm' 
    $('#payment_profile_form').ajaxForm(options); 
	
	var options2 = { 
        target:        '#account_profile_error_message',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback
    }; 
 
    // bind form using 'ajaxForm' 
    $('#account_profile_form').ajaxForm(options2);
    
    var options3 = { 
        target:        '#invoice_profile_error_message',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback
    }; 
 
    // bind form using 'ajaxForm' 
    $('#account_invoicing_form').ajaxForm(options2);
	
	var options4 = { 
        target:        '#save_struttura_message',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse_struttura  // post-submit callback
    }; 
 
    // bind form using 'ajaxForm' 
    $('#profile_edit_form').ajaxForm(options4);
	
	var options5 = { 
        target:        '#save_descrizione_message',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse_descrizione  // post-submit callback
    }; 
 
    // bind form using 'ajaxForm' 
    $('#profile_edit_form2').ajaxForm(options5);
	
	var options6 = { 
        target:        '#save_servizi_message',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse_servizi  // post-submit callback
    }; 
 
    // bind form using 'ajaxForm' 
    $('#profile_edit_form3').ajaxForm(options6);
	
	var options7 = { 
        target:        '#save_altro_message',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse_altro  // post-submit callback
    }; 
 
    // bind form using 'ajaxForm' 
    $('#profile_edit_form4').ajaxForm(options7);
	
	
}); 



// pre-submit callback 
function showRequest(formData, jqForm, options) { 
	return true; 
} 
 
// post-submit callback 

function showResponse_altro(responseText, statusText, xhr, $form){ 
		$("#save_altro_message").css("display","block");
		$("#save_altro_message").text(responseText);
		jQuery('html, body').animate({scrollTop:0}, 400);
		$("#save_altro_message").fadeOut(7000); 
	}
function showResponse_servizi(responseText, statusText, xhr, $form){ 
		$("#save_servizi_message").css("display","block");
		$("#save_servizi_message").text(responseText);
		jQuery('html, body').animate({scrollTop:0}, 400);
		$("#save_servizi_message").fadeOut(7000); 
	}
	
function showResponse_descrizione(responseText, statusText, xhr, $form){ 
		$("#save_descrizione_message").css("display","block");
		$("#save_descrizione_message").text(responseText);
		jQuery('html, body').animate({scrollTop:0}, 400);
		$("#save_descrizione_message").fadeOut(7000); 
	}
	
function showResponse_struttura(responseText, statusText, xhr, $form){ 
		$("#save_struttura_message").css("display","block");
		$("#save_struttura_message").text(responseText);
		jQuery('html, body').animate({scrollTop:0}, 400);
		$("#save_struttura_message").fadeOut(7000); 
	} 
function showResponse(responseText, statusText, xhr, $form){ 
	$("#profile_edit_message").css("display","block");
    $("#profile_edit_message").text(responseText);
    jQuery('html, body').animate({scrollTop:0}, 400);
	$("#profile_edit_message").fadeOut(7000); 
} 
</script>

<?php //echo $this->template->block('PageTopPanel','layouts/_page_top_panel.php');?>

<!-- 960 Container Start -->
<div class="container">
	<div class="clearfix-small"></div>
	<div class="sixteen columns">
    	<h1 class="title">Dashboard</h1>
	</div>	
    <div class="clearfix-small"></div>

		<!-- 1/4 Column -->
		<div class="twelve columns">
            
            
           					<ul class="mytabs">
                            <?php if(isset($profile_details) && ($profile_details->user_type==1 || $profile_details->user_type==3)) { ?>
                                <li class="active"><a href="javascript:void(0);"><?php echo lang('struttura_profilo');?></a></li>
                                <li><a href="<?php echo base_url();?><?php echo $this->config->item('user_profile_descrizione_edit_url');?>"><?php echo lang('struttura_descrizione');?></a></li>
                                <!-- 
                                <li><a href="<?php echo base_url();?><?php echo $this->config->item('user_profile_servizi_edit_url');?>"><?php echo lang('struttura_servizi');?></a></li>
                                <li><a href="<?php echo base_url();?><?php echo $this->config->item('user_profile_distanze_edit_url');?>"><?php echo lang('struttura_distanze');?></a></li>
                                //-->
                                <li><a href="<?php echo base_url();?><?php echo $this->config->item('user_profile_immagini_edit_url');?>"><?php echo lang('struttura_Immagini');?></a></li>
                            <?php } else { ?>   
                             	<li class="active"><a href="#tab1"><?php echo lang('edit_profile');?></a></li>
                            <?php } ?>
                            </ul>
                            
            <!-- Start tab container -->
            <div class="tab_container">
                    <div id="tab1" class="tab_content">
                    	<?php 	if((isset($profile_details) && ($profile_details->is_complete==0 || $profile_details->invoice_profile_complete==0)) || isset($show_profile_notification)) { 
									//echo $this->template->block('UserProfileIncompleteNotification','dashboard/_complete_profile_notification.php');
								} 
						?> 
                        
                        <div style="margin-bottom:0px;">
							<div id="profile_edit_message" class="success_message" style="<?php if(isset($display_message) && $message!='') echo "display:block;"; ?>">
								<?php if(isset($display_message) && $message!='') echo $message; ?>
							</div>
						</div>
                            
                        <?php if(isset($profile_details) && ($profile_details->user_type==1 || $profile_details->user_type==3)) { ?>
								<?php echo $this->template->block('HotelProfileForm','profile/hotel_profile_form.php');?>
						<?php } else { ?>
                         				<div class="padding">
                                    		<?php echo $this->template->block('HotelProfileForm','profile/normal_user_profile_form.php');?>
										</div>
                                    	<div class="clearfix-big"></div>				
                        <?php } ?>     
                        <div class="clearfix-big"></div>
                    </div>
                </div>
            </div>
        
            <!-- 1/4 Column -->
            <div class="four columns background">
                <?php echo $this->template->block('NormalUserSummary','dashboard/_normal_user_summary.php');?>
                <div class="portfolio-item-meta">
                    <h5><a href="artigiano.php">Aiuto</a></h5>
                </div>
                <div class="portfolio-item-description">
                    <p>	
                    	tra lorem inceptos orem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam egestas consectetur elementum class aptent taciti sociosqu ad litora torquent perea conubia nostra lorem inceptos orem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam egestas consectetur elementum class aptent taciti sociosqu ad litora torquent perea conubia nostra lorem inceptos orem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam egestas consectetur elementum class aptent taciti sociosqu ad litora torquent perea conubia nceptos orem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam egestas consectetur elementum class aptent taciti sociosqu ad litora torquent perea conubia nostra lorem inceptos orem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam egestas consectetur elementum 
                    	<a href="<?php echo base_url();?><?php echo $this->config->item('user_profile_edit_url');?>" class="button medium yellow">modifica account</a>
                    </p>
                    <div class="clearfix-big"></div>
                </div>
            </div>
	</div>		
	<div class="clearfix"></div>
	<!-- Our Clients End -->
</div>
<!-- 960 Container End -->