<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ITTLINK</title>
    {include file="layouts/stylesheets.tpl"}
</head>

<body>
	<div id="header">
		<div class="wrapper">		<!-- wrapper begins -->
			<h1><a href="{$baseurl}dashboard/?lang={$lang_code}">ITLINK</a></h1>
				<ul id="nav">
					<li><a href="{$baseurl}dashboard/?lang={$lang_code}">Dashboard</a></li>
                    <li><a href="{$baseurl}manage/members/?lang={$lang_code}">Members</a>
						<ul>
							<li><a href="{$baseurl}manage/members/?lang={$lang_code}">Elenco Members</a></li>
							<li><a href="{$baseurl}manage/members/create/?lang={$lang_code}">Aggiungi Member</a></li>
                            <li><a href="{$baseurl}manage/documents/?lang={$lang_code}">Elenco Documents</a></li>
							<li><a href="{$baseurl}manage/documents/create/?lang={$lang_code}">Aggiungi Documents</a></li>
                            <li><a href="{$baseurl}manage/categories/?lang={$lang_code}">Elenco Categories</a></li>
							<li><a href="{$baseurl}manage/categories/create/?lang={$lang_code}">Aggiungi Category</a></li>
							<li><a href="{$baseurl}manage/clients/?lang={$lang_code}">Elenco clienti</a></li>
							<li><a href="{$baseurl}manage/clients/create/?lang={$lang_code}">Aggiungi clienti</a></li>
						</ul>
					</li>
                    
                    <li><a href="{$baseurl}manage/pages/?lang={$lang_code}">Pagine</a>
						<ul>
							<li><a href="{$baseurl}manage/pages/?lang={$lang_code}">Elenco Pagine</a></li>
							<li><a href="{$baseurl}manage/pages/create2/?lang={$lang_code}">Aggiungi Pagina</a></li>

						</ul>
					</li>
                    
                    <li><a href="{$baseurl}manage/products/?lang={$lang_code}">Products</a>
						<ul>
							<li><a href="{$baseurl}manage/products/?lang={$lang_code}">Elenco Prodotti</a></li>
							<li><a href="{$baseurl}manage/products/create2/?lang={$lang_code}">Aggiungi Prodotti</a></li>
							<li><a href="{$baseurl}manage/packagings/?lang={$lang_code}">Elenco Packaging</a></li>
							<li><a href="{$baseurl}manage/packagings/create2/?lang={$lang_code}">Aggiungi Packaging</a></li>
						</ul>
					</li>
					
					<li><a href="{$baseurl}manage/news/?lang={$lang_code}">News</a>
						<ul>
							<li><a href="{$baseurl}manage/news/?lang={$lang_code}">Elenco News</a></li>
							<li><a href="{$baseurl}manage/news/create2/?lang={$lang_code}">Aggiungi News</a></li>

						</ul>
					</li>
                    
                    <li><a href="{$baseurl}manage/documents2/?lang={$lang_code}">Download Area</a>
						<ul>
							<li><a href="{$baseurl}manage/documents2/?lang={$lang_code}">Elenco Documents</a></li>
							<li><a href="{$baseurl}manage/documents2/create/?lang={$lang_code}">Aggiungi Documents</a></li>

						</ul>
					</li>
					<!--
					<li><a href="{$baseurl}manage/events/?lang={$lang_code}">Eventi</a>
						<ul>
							<li><a href="{$baseurl}manage/events/?lang={$lang_code}">Elenco Eventi</a></li>
							<li><a href="{$baseurl}manage/events/create/?lang={$lang_code}">Aggiungi Eventi</a></li>
						</ul>
					</li>
					//-->					
                    <li><a href="{$baseurl}manage/account/?lang={$lang_code}">Settings</a>
                    	<ul>
							<li><a href="{$baseurl}manage/account/?lang={$lang_code}">Change Password</a></li>
                            <li><a href="{$baseurl}manage/language/?lang={$lang_code}">Language Settings</a></li>
                            <li><a href="{$baseurl}manage/menus/?lang={$lang_code}">Menu Settings</a></li>
						</ul>
                    </li>
                    
                    <!--
                    <li><a href="{$baseurl}manage/videos">Videos</a>
						<ul>
							<li><a href="{$baseurl}manage/videos">List video</a></li>
							<li><a href="{$baseurl}manage/videos/create">Add video</a></li>
						</ul>
					</li>
                    
                    <li><a href="{$baseurl}manage/exams">Online Tests</a>
						<ul>
							<li><a href="{$baseurl}manage/exams">List Online Tests</a></li>
							<li><a href="{$baseurl}manage/exams/create">Add Online Test</a></li>
						</ul>
					</li>
					//-->
					
                    
                    
                    <!--
                    <li><a href="{$baseurl}manage/comuni">Comune</a>
                    	<ul>
							<li><a href="{$baseurl}manage/comuni">Comune List</a></li>
							<li><a href="{$baseurl}manage/comuni/create">Add Comune</a></li>
						</ul>
                    </li>
                    -->
				</ul>
				<p class="user">Hello, <a href="#">John</a> | <a href="{$baseurl}user/logout">Logout</a></p>
		</div>	
	</div>		<!-- #header ends -->
		