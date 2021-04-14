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
$route['default_controller'] 			= 'session';
$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;

/*Session Section*/
$route['login']							= 'session/index';
$route['login/(.*)']            		= 'session/index/$1';
$route['logout']						= 'session/logout';
$route['register/(.*)']					= 'register/index/$1';


/*Admin Section*/
$route['admin']							= 'ad_session/index';
$route['admin/login']					= 'ad_session/index';
$route['admin/login/(.*)']            	= 'ad_session/index/$1';
$route['admin/logout']					= 'ad_session/logout';
$route['admin/recover']					= 'ad_session/recover';
$route['admin/reset_send']				= 'ad_session/reset_send';
$route['admin/new_password/(.*)']		= 'ad_session/new_password/$1';
$route['admin/dashboard']				= 'ad_dashboard/index';


/*Parents Section*/
$route['pr']						= 'pr_session/index';
$route['pr/login']					= 'pr_session/index';
$route['pr/login/(.*)']           	= 'pr_session/index/$1';
$route['pr/logout']				= 'pr_session/logout';
$route['pr/recover']				= 'pr_session/recover';
$route['pr/reset_send']			= 'pr_session/reset_send';
$route['pr/new_password/(.*)']		= 'pr_session/new_password/$1';
$route['pr/dashboard']				= 'pr_dashboard/index';
