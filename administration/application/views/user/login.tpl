<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CreativeCms</title>
	
	{include file="layouts/stylesheets.tpl"}
</head>




<body>
	
	<div id="hld">
	
		<div class="wrapper">		<!-- wrapper begins -->

			<div class="block small center login">
		
				<div class="block_content">
					
					{if isset($admin_display_error) && $admin_error_message!=NULL}
					<div class="message errormsg"><p>{$admin_error_message}</p></div>
					{else}
					<div class="message info"><p>Login with your username and password.</p></div>
					{/if}
					
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
	
	
	
	{include file="layouts/javascripts.tpl"}
	
</body>
</html>