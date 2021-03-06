<?php /* Smarty version 2.6.19, created on 2012-02-11 16:09:02
         compiled from manage/invitation/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'manage/invitation/index.tpl', 247, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
	
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/style/style.css" />
	<link id='sfluid' class="sswitch" rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/style/fluid.css" title="fluid" media="screen" />
	<link id='sfixed' class="sswitch" rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/style/fixed.css" title="fluid" media="screen" />
        
	<title>Chameleon Circuit | Admin Panel from Themio</title>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery-ui-1.8.14.custom.min.js"></script>

        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/excanvas.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.flot.stack.min.js"></script>

        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.labelify.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/iphone-style-checkboxes.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.ui.selectmenu.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/vanadium-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.cleditor.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/superfish.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.colorbox-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/styleswitch.js"></script>

        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/fullcalendar.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.uploadify.v2.1.4.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/uploadify.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.tipsy.js"></script>

        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/gcal.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/swfobject.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jquery.pnotify.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/examples.js"></script>

        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/sidemenu.js">// Strictly for sidebar </script>

        <!-- Toolbar for Demo Only -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/demo/toolbar.css" />
        <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/demo/colorpicker/css/colorpicker.css" />
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/demo/colorpicker/js/colorpicker.js"></script>
        <!-- Demo js Only -->
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/demo.js"></script>

        <!--[if lt IE 9]>
            <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/html5.js"></script>
        <![endif]-->
        
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/style/IE7.css" />
        <![endif]-->
</head>
<body>
<div id="wrap">
    <div id="main">
        
        <div id="toolbar"> <!-- used for demo purpose only. Remove -->
            <div class="container_16 clearfix">
                <div class="grid_4">
                    <span class="left">Header Color</span> <div id="in-header" class="picker"></div>
                </div>
                <div class="grid_4">
                    <span class="left">Navigation Color</span> <div id="in-nav" class="picker"></div>
                </div>
                <div class="grid_4">
                    <span class="left">Widget Color</span> <div id="in-widget" class="picker"></div>
                </div>
                <div class="grid_4">
                    <span class="left">Select Preset</span> 
                        <select name="colors" id="colorChanger">
                            <option value="222936,222936,222936">Dark Azure</option>
                            <option value="300108,4D0713,000000">Royal Red</option>
                            <option value="1b282b,1b4352,212121">Ice Blue</option>
                            <option value="000F1F,002047,1c1c1c">Bright Navy</option>
                            <option value="022100,002e21,373823">Green Earth</option>
                            <option value="210a00,470f01,2e2e2e">Saffron</option>
                            <option value="070021,140e42,1f1c42">Indigo</option>
                            <option value="1a150e,5c1d06,524235">Chocolate Brown</option>
                            <option value="000000,3a093d,7a7a7a">Purple Black</option>
                            <option value="000000,000000,000000">Pure Black</option>
                        </select>
                </div>
            </div>
        </div>
        
        <header>
            <div class="container_16 clearfix">
                <div class="clearfix">
                    <a id="logo" href="index.html"></a>
                    <input type="text" class="search" title="Search..."/>
                </div>
                
                <nav>
                    <div id="navcontainer" class="clearfix">
                    <div id="user" class="clearfix">
                        <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/demo/avatar.png" alt="" />
                        <strong class="username">Welcome, <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
dashboard"><?php echo $this->_tpl_vars['profile_details']->username; ?>
</a></strong>
                        <ul class="piped">
                            <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
dashboard">My Account</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
user/logout">Logout</a></li>
                        </ul>
                    </div>
                    
                    <div id="navclose"></div>
                    
                    <ul class="sf-menu">
                        <li class="active">
                            <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
dashboard">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/dashboard.png" /></span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables.html">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/tables.png" /></span>
                                <span class="title">Tables</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms.html">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/form.png" /></span>
                                <span class="title">Form Elements</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/styles.png" /></span>
                                <span class="title">Styles</span>
                            </a>
                            <ul>
                                <li><a href="#" class="styleswitcher" rel="fluid">Fluid</a></li>
                                <li><a href="#" class="styleswitcher" rel="fixed">Fixed</a></li>
								<li><a href="sidebar_index.html">Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="pages.html">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/pages.png" /></span>
                                <span class="title">Sample Pages</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="gallery.html">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/gallery.png" /></span>
                                <span class="title">Gallery</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="charts.html">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/charts.png" /></span>
                                <span class="title">Statistics</span>
                            </a>
                        </li>
                        <li class="sep">
                            <a href="#">
                                <span class="notification">3</span>
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/msg.png" /></span>
                                <span class="title">Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/images/menu/settings.png" /></span>
                                <span class="title">Settings</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </nav>
                <div id="pagetitle" class="clearfix">
                    <h1 class="left">
                        Manage Invitation
                    </h1>
                    <a class="btn grey right medium" href="<?php echo $this->_tpl_vars['mainsite_url']; ?>
" target="_blank"><span>View Site</span></a>
                </div>
            </div>
        </header>
        <div class="container_16 clearfix" id="actualbody">

<ul class="breadcrumbs first">
    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
dashboard">Home</a></li>
	<li class="active"><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/invitation">Manage Invitation</a></li>
</ul>

<div class="clear"></div>

<?php if ($this->_tpl_vars['email_send_success'] == 'yes'): ?>
	<div style="width:95%; margin:0 auto;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "notification/success_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<?php endif; ?>

<div class="grid_16 widget tabs first">
        <div class="widget_title clearfix">
            <h2>Tables</h2>
            <ul>
                <li class="active"><a href="#table1">Data Table</a></li>
            </ul>
        </div>
        <div class="widget_body"> 
<?php echo '           
<script type="text/javascript">            
function checkAll(total_checkbox)
{
	for (i = 0; i < total_checkbox; i++)
	{
		var id="checkbox_"+i;
		document.getElementById(id).checked = true ;
	}
}

function uncheckAll(total_checkbox)
{
	for (i = 0; i < total_checkbox; i++)
	{
		var id="checkbox_"+i;
		document.getElementById(id).checked = false ;
	}
}

function toggle(total_checkbox)
{
	if ($(\'#select_all\').attr(\'checked\'))
		checkAll(total_checkbox);
	else
		uncheckAll(total_checkbox);

}
function confirmDelete() 
{
	if (confirm("Are you sure you want to delete")) 
	{
   		return true;
  	}
	return false;
}
</script>
'; ?>

            <div id="table1">
                <form name="send_invitation" id="send_invitation_to_all" method="post" action="">
					<div style="margin:7px;"><input type="submit" name="submit" id="submit" value="Send Invitation To All"></div>
				<table class='dataTable'>
                   <thead>
                        <tr>
                            	<th class="align-left"><input type="checkbox" id="select_all" name="select_all" value="<?php echo count($this->_tpl_vars['list_of_invitation']); ?>
" onClick="toggle(this.value);"/></th>
                                <th class="align-left">SI</th>
                                <th class="align-left">Email Address</th>
                                <th class="align-left">Invitastion Code</th>
                                <th>Engine version</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php $_from = $this->_tpl_vars['list_of_invitation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofusers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofusers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uk'] => $this->_tpl_vars['user']):
        $this->_foreach['listofusers']['iteration']++;
?>
							<tr class="gradeX">
                                <td>
									<input type="checkbox" id="checkbox_<?php echo $this->_tpl_vars['uk']; ?>
" name="email_address[]" value="<?php echo $this->_tpl_vars['user']->email_address; ?>
" />
									<input type="hidden"   id="posted_invitation_code" name="invitation_code[]" value="<?php echo $this->_tpl_vars['user']->invitation_code; ?>
">
								</td>
                                <td><?php echo $this->_tpl_vars['uk']+1; ?>
</td>
                                <td><?php echo $this->_tpl_vars['user']->email_address; ?>
</td>
								<td><?php echo $this->_tpl_vars['user']->invitation_code; ?>
</td>
                                <td class="center">
										<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/invitation/send_invitation/<?php echo $this->_tpl_vars['user']->invitation_id; ?>
">Send Invitation</a> &nbsp;|&nbsp; 
										<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/invitation/delete/<?php echo $this->_tpl_vars['user']->invitation_id; ?>
" onClick="return confirmDelete();">Delete</a></td>
                            </tr>
                       		<?php endforeach; endif; unset($_from); ?>     
                        </tbody>
                    </table>
				</form>

                <div class="clear"></div>
            </div>
            
            
        </div>
</div>

<div class="clear"></div>



<!--
<div id="dialog" title="Hello, Hello, Twisted Transistor">
	<p>Chameleon Circuit features unlimited color schemes. Try moving the color sliders on the top right corner of your screen and see how you would like YOUR theme to be!</p>
</div>
-->
            </div> <!-- #actualbody -->
        </div> <!-- #main -->
    </div> <!-- #wrap -->
    <footer>
        <div class="container_12">
            <div class="grid_12 clearfix">
                <p class="left">
                    Powered by Chameleon Circuit
                </p>
                <p class="right">
                    &copy <a href="http://themio.net">Themio</a> 2011
                </p>
            </div>
        </div>
    </footer>
</body>
</html>