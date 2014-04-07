<?php /* Smarty version 2.6.19, created on 2014-03-09 11:54:04
         compiled from user/login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CreativeCms</title>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/stylesheets.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>




<body>
	
	<div id="hld">
	
		<div class="wrapper">		<!-- wrapper begins -->

			<div class="block small center login">
		
				<div class="block_content">
					
					<?php if (isset ( $this->_tpl_vars['admin_display_error'] ) && $this->_tpl_vars['admin_error_message'] != NULL): ?>
					<div class="message errormsg"><p><?php echo $this->_tpl_vars['admin_error_message']; ?>
</p></div>
					<?php else: ?>
					<div class="message info"><p>Login with your username and password.</p></div>
					<?php endif; ?>
					
					<br>
					<form action="" method="post">
						<p>
							<input type="text" class="text" id="username_email" name="username_email" />
						</p>
						
						<p>
							<input type="password" class="text" id="password_signup" name="password_signup" />
						</p>
						
						<p>
							<input class="btn btn-info" type="submit" name="signin" value="Login"> &nbsp; 
						</p>
					</form>
					
				</div>		<!-- .block_content ends -->
		
								
			</div>		<!-- .login ends -->
			

		
		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->
	
	
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layouts/javascripts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
</body>
</html>