<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean',
	tabindex : 2
 };
</script>



<div class="two-thirds column">

	<div class="portfolio-item-meta">
					<h1 class="headline">AREA RISERVATA</h1>
							<div id="contact-form">
			<form id="login" name="login_form" method="post" action="<?php echo base_url();?><?php echo CURRENT_LANGUAGE."/";?><?php echo $this->config->item('login_url');?>">
                            
      									
                                                        
                                    <div style="margin-bottom:10px; margin-left: 0px;">
                                        <div id="profile_edit_message" class="success_message" style="<?php if(isset($display_message) && $message!='') echo "display:block;"; ?>">
                                            <?php if(isset($display_message) && $message!='') echo $message; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="field">
                                    <input type="text" placeholder="indirizzo email" class="text" name="username_email" id="username_email" value="" />
                                     </div>
                                    <div class="clearfix"></div>
            
            
                                    <div class="field">
                                    <input type="password" placeholder="<?php echo lang('password');?>" name="password_signup" id="password" class="text" value="" />
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <?php if(isset($display_captcha) && $display_captcha=="yes"){ ?>
                                        <label><?php echo lang('verification');?></label>
                                        <span class="suggestion"><?php echo lang('human_string'); ?></span>
                                        <?php echo $recaptcha_html; ?>
                                        <input type="hidden" name="recaptcha_validate" id="recaptcha_validate" value="yes">
                                        <div class="clearfix"></div>
                                    <?php } ?>
                                    
                                 
                                    
                                    <div style="margin-bottom:10px; margin-left: 0px;">
                                        <div id="login_error_message" class="error_message" style="<?php if(isset($display_error) && $error_message!='') echo "display:block;"; ?>">
                                            <?php if(isset($display_error) && $error_message!='') echo $error_message; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
            
                                    <input type="submit" name="signin" id="signin" class="button medium yellow" value="<?php echo lang('login');?>">
                                    
                        </form>
		</div>

				</div>

		</div>
		
			<div class="one-third column">

		
				<!-- Large Notice -->
		<div class="large-notice" style="height:160px;">
			<h4>ASSISTENZA</h4>
			<p>This is a example of style component for calling extra attention to featured content or information. 
			Adipiscing elit. Cras eu nisl quam. Cras in elit a massa fermentum bibendum.</p><br>
			<a href="#" class="button medium black">ASSISTENZA 800.254215</a>
		</div>

		
</div>




						
	<div class="clearfix"></div>



  
<!-- 960 Container End -->
</div>

