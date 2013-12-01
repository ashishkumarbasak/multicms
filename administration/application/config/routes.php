<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "user/login";
$route['404_override'] = '';

$route['manage/pages/edit/(:num)/slideshow'] = 'manage/slideshow/create/$1';
$route['manage/products/edit/(:num)/slideshow'] = 'manage/slideshow/create/$1';
$route['manage/news/edit/(:num)/slideshow'] = 'manage/slideshow/create/$1';
$route['manage/pages/edit/(:num)/videos'] = 'manage/page_videos/create/$1';
$route['manage/products/edit/(:num)/videos'] = 'manage/page_videos/create/$1';
$route['manage/news/edit/(:num)/videos'] = 'manage/page_videos/create/$1';
$route['manage/pages/edit/(:num)/files'] = 'manage/page_files/create/$1';
$route['manage/products/edit/(:num)/files'] = 'manage/page_files/create/$1';
$route['manage/news/edit/(:num)/files'] = 'manage/page_files/create/$1';

$route['manage/account'] = 'manage/account/index';
$route['manage/members/page'] = 'manage/members/index';
$route['manage/members/page/(:num)'] = 'manage/members/index/$1';
$route['manage/clients/page'] = 'manage/clients/index';
$route['manage/clients/page/(:num)'] = 'manage/clients/index/$1';
$route['manage/categories/page'] = 'manage/categories/index';
$route['manage/categories/page/(:num)'] = 'manage/categories/index/$1';
$route['manage/comuni/page'] = 'manage/comuni/index';
$route['manage/comuni/page/(:num)'] = 'manage/comuni/index/$1';
$route['manage/pages/page'] = 'manage/pages/index';
$route['manage/pages/page/(:num)'] = 'manage/pages/index/$1';
$route['manage/products/page'] = 'manage/products/index';
$route['manage/products/page/(:num)'] = 'manage/products/index/$1';
$route['manage/packagings/page'] = 'manage/packagings/index';
$route['manage/packagings/page/(:num)'] = 'manage/packagings/index/$1';
$route['manage/news/page'] = 'manage/news/index';
$route['manage/news/page/(:num)'] = 'manage/news/index/$1';
$route['manage/documents/page'] = 'manage/documents/index';
$route['manage/documents/page/(:num)'] = 'manage/documents/index/$1';
$route['manage/documents2/page'] = 'manage/documents2/index';
$route['manage/documents2/page/(:num)'] = 'manage/documents2/index/$1';
$route['manage/pages/edit/(:num)/slideshow/saveorder'] = 'manage/slideshow/saveorder/$1';
$route['manage/products/edit/(:num)/slideshow/saveorder'] = 'manage/slideshow/saveorder/$1';
$route['manage/news/edit/(:num)/slideshow/saveorder'] = 'manage/slideshow/saveorder/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */