<div class="background padding" style="margin:10px;">
    <?php if(isset($profile_details) && $profile_details->avatar!=NULL){ 
            $file_source = PROFILE_ATTACHMENT_FILE_PATH_FOR_AVATAR.$profile_details->user_id."/".$profile_details->avatar;
            echo "<div class='user_avatar'>".image_thumb($file_source,48,48)."</div>";
          } 
    ?>
    <h3><?php echo lang('welcome');?>,</h3>
    <em>
        <?php if(isset($profile_details)) echo $profile_details->display_name;?>
    </em>
    <?php if(isset($profile_details) && $profile_details->account_expiry_date!=NULL && $profile_details->user_type==1) { ?>
    <br>
        <?php } ?>
    <div>    
    <a href="<?php echo base_url();?><?php echo $this->config->item('dashboard_url');?>"><?php echo lang('edit_profile_sidebar');?></a>
    <?php if(isset($is_loggedin) && $is_loggedin=="true"){ ?>
		 &nbsp;|&nbsp; <a href="<?php echo base_url();?><?php echo $this->config->item('logout_url');?>"><?php echo lang('signout'); ?></a>
	<?php } ?>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix-big"></div>
			
