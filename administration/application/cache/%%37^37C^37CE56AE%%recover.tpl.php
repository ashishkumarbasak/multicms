<?php /* Smarty version 2.6.19, created on 2013-04-27 21:24:37
         compiled from user/recover.tpl */ ?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
	
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/style/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/style/fixed.css" title="fixed" media="screen" />
	
	<title>Travelly.com | Administration Panel </title>
<?php echo '
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if !IE 7]><style>#wrap {display:table;height:100%}</style><![endif]-->
'; ?>

</head>
<body id="loginpage">
<form name="login" id="login" method="post" action="<?php echo $this->_tpl_vars['baseurl']; ?>
user/recover" style="margin:0px; padding:0px;" />

				



        <div class="container_16 clearfix">
            <div class="push_5 grid_6">
                <a href="#"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/biglogo.png" ></a>
            </div>
            <div class="clear"></div>
            <div class="widget push_5 grid_6" id="login">
                <div class="widget_title">
                    <h2>Forgot Password</h2>
                </div>
				
                 <div class="widget_body">
                    <div class="widget_content">


						<?php if ($this->_tpl_vars['display_error'] == 'yes'): ?>
							<div class="notification error_box png_bg">
									<a href="javascript:void(0);" class="close_notification"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/icons/cross_red_small.png" style="border:0" /></a>
									<div>
										<p class="inside_notification">
											<?php echo $this->_tpl_vars['login_problems_message_error']; ?>

										</p>
									</div>
				
							</div>
						<?php elseif ($this->_tpl_vars['display_submit_error'] == 'yes'): ?>
								<div class="notification error_box png_bg">
									<a href="javascript:void(0);" class="close_notification"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/icons/cross_red_small.png" style="border:0" /></a>
									<div>
										<p class="inside_notification"><?php echo $this->_tpl_vars['display_message']; ?>
</p>
									</div>
				
								</div>
						 <?php elseif ($this->_tpl_vars['success_message'] == 'yes'): ?>
								<div class="notification success_box png_bg">
									<a href="javascript:void(0);" class="close_notification"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/icons/cross_grey_small.png" style="border:0" /></a>
									<div>
										<p class="inside_notification">
										<?php echo $this->_tpl_vars['display_message']; ?>

										</p>
									</div>
					
								</div>    
						<?php endif; ?>




                        <label class="block" for="username">Username:</label>
                        <input type="text" name="username_email" class="large"/>

                        <div style="margin-top:10px">
                            <input type="submit" name="submit" id="submit" class="btn right large" value="Submit">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
				
            </div>

        </div>
</form>
</body>
</html>