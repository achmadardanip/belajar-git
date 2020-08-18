<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['login_successful']['POST'] ='web/login_success';
// $route['home'] = 'web';
$route['about'] = 'web/about';
// $route['login'] = 'web/login';
// $route['login_success'] = 'web/login';
$route['web/1'] = 'web/index';
$route['web/2'] = 'web/about';
$route['web/3'] = 'web/login';
$route['web/(:num)'] = 'web';
$route['web/(:num)/(:any)'] = 'web';
$route['(situs|website)/(:any)'] = 'web';
$route['aplikasi/([a-z]+)'] = 'web';
$route['hitung_success']['POST'] = 'web/calculator';
$route['dataform']['POST'] ='web/aboutme';
$route['dataforminput']['POST'] = 'web/form';
// $route['forgot_pass/reset_password'] = 'log/index';
// $route['forgot_pass/view_reset_password'] = 'log/index';




