<script type="text/javascript">
	 var RecaptchaOptions = {
		theme : 'clean',
		tabindex : 2
 	};
	
	function checkusernameinput(){
		var return_var = true;
		
		if($('#recovery_email').val()==null || $('#recovery_email').val()==""){
			$("#emailInfo").css('color','red');
			if(return_var) $('#recovery_email').focus();
			return_var = false;	
		}
		
		return return_var;
	}
</script>

<div class="two-thirds column">

	<div class="portfolio-item-meta">
					<h1 class="headline">Recover Your Password</h1>
													<div id="contact-form">

                        <form id="login" method="post" action="<?php echo base_url(); ?><?php echo $this->config->item('passrecover_url'); ?>" onsubmit="return checkusernameinput();" >
                       									
                                                        
                                        <div id="profile_edit_message" class="success_message" style="<?php if(isset($display_message) && isset($message) && $message!='') echo "display:block;"; ?>">
                                            <?php if(isset($display_message) && isset($message) && $message!='') echo $message; ?>
                                        </div>
                                    
                                    <?php if (isset($email_not_registered)) { ?>
                                            <span class="suggestion error first_signup_visit" id="emailInfo"><?php echo $email_not_registered; ?></span>
                                    <?php  }else{ ?>
                                            <span class="suggestion" id="emailInfo"><?php echo lang('email_suggestion_for_recover_pass'); ?></span>
                                    <?php } ?>                                    <div class="clearfix-small"></div>

                                                                        <div class="field">

                                    <input type="text" class="text" placeholder="Username / E-mail" value="<?php if(isset($email_address)) echo $email_address;?>" name="recovery_email" id="recovery_email" />
</div>                                    <div class="clearfix"></div>
                                    
                                    
                                    <?php if (isset($recaptcha_error ) && $recaptcha_error == TRUE) { ?>
                                            <span class="suggestion error first_signup_visit" id="pass2Info"><?php echo lang('recaptcha_validation_failed'); ?></span>
                                    <?php  }else{ ?>
                                            <span class="suggestion"><?php echo lang('human_string'); ?></span>
                                    <?php } ?>
                                    <?php echo $recaptcha_html; ?>
<div class="clearfix-small"></div>                                    
                                        <div id="signup_error_message" class="error_message" style="<?php if(isset($display_error) && $error_message!='') echo "display:block;"; ?>"><?php if(isset($display_error) && $error_message!='') echo $error_message; ?></div>
                                    <input type="submit" name="recovery_email_send" id="btn_register" class="button medium yellow" value="Submit" style="float:left;">	
                                    <input type="button" name="cancel" id="btn_cancel" class="button medium red" value="Cancel" onclick="window.location='<?php echo base_url();?>users/login';">	
                                    <div class="clearfix"></div>
                            </form>
		</div>
		</div>

	</div>
	<div class="clearfix"></div>
	<!-- Our Clients End -->

