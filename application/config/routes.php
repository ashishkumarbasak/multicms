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

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['it'] = "welcome";
$route['en'] = "welcome";

$route['(:any)/dashboard'] = "dashboard";
$route['(:any)/documents'] = "dashboard";
$route['(:any)/download'] = "download";
$route['(:any)/download/page'] = "download/index/1";
$route['download/files/(:any)/(:num)/(:any)'] = "download/files/$1/$2/$3";
$route['(:any)/download/category/(:any)/page'] = "download/index";
$route['(:any)/download/category/(:any)/page/(:num)'] = "download/index";

$route['(:any)/users/login'] = "users/login";
$route['(:any)/users/recover'] = "users/recover";
$route['(:any)/users/logout'] = "users/logout";
$route['(:any)/documents/page'] = "dashboard/index/1";
$route['(:any)/documents/category/(:any)/page'] = "dashboard/index";
$route['(:any)/documents/category/(:any)/page/(:num)'] = "dashboard/index";

$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = "pages/index/$7";
$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = "pages/index/$6";
$route['(:any)/(:any)/(:any)/(:any)/(:any)'] = "pages/index/$5";
$route['(:any)/(:any)/(:any)/(:any)'] = "pages/index/$4";
$route['(:any)/(:any)/(:any)'] = "pages/index/$3";
$route['(:any)/(:any)'] = "pages/index/$2";





/* End of file routes.php */
/* Location: ./application/config/routes.php */
?>