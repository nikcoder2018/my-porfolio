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
$route['default_controller'] = 'Students';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Authentication
$route['auth/(:any)'] = 'Auth/$1';
$route['login'] = 'auth/login';
$route['login/validation'] = 'auth/login_validation';
$route['signup'] = 'auth/signup';
$route['register'] = 'auth/register';
$route['logout']  = 'auth/logout';

//Basic Pages
$route['home']  = 'students/home';
$route['events'] = 'students/events';
$route['annoucements'] = 'students/announcements';
$route['faq'] = 'students/faq';
$route['about'] = 'students/about';
$route['myaccount'] = 'students/account';
$route['activities/(:any)'] = 'students/activities/$1';

//Admin
$route['admin'] = 'admin/index';
$route['admin/login'] = 'admin/login';
$route['admin/auth']  = 'admin/validation';
$route['admin/logout'] = 'admin/logout';

//basic page
$route['admin/dashboard'] = 'admin/index';
$route['admin/events'] = 'admin/events';
$route['admin/activities/$1'] = 'admin/activities';
$route['admin/announcements'] = 'admin/announcements';
$route['admin/student-list'] = 'admin/student_list';
$route['admin/president-list'] = 'admin/president_list';
$route['admin/settings'] = 'admin/settings';

//admin settings
$route['admin/settings/(:any)'] = 'Settings/$1';

//action
$route['admin/post']  = 'admin/send_announcement';
$route['admin/createevent']  = 'admin/create_event';
$route['admin/send_direct_sms'] = 'admin/send_direct_sms';
$route['admin/update_event'] = 'admin/update_event';
$route['admin/delete_event'] = 'admin/delete_event';
$route['admin/createactivity']  = 'admin/create_activity';
$route['admin/delete_activity/(:num)'] = 'admin/delete_activity/$1';
//api
$route['api/del_announcement/(:num)'] = 'admin/delete_announcement/$1';
$route['api/showhide_announcement'] = 'admin/showhide_announcement';
$route['api/get_announcement/(:num)'] = 'admin/get_announcement/$1';
$route['api/get_event/(:num)'] = 'admin/get_event/$1';
$route['api/get_account_data/(:num)'] = 'adminsettings/account_data/$1';
$route['api/get_student_data/(:num)'] = 'adminsettings/student_data/$1';


$route['api/sms/(:any)'] = 'BREAD_SMS/$1';
$route['api/account/(:any)'] = 'BREAD_Users/$1';
$route['api/students/(:any)'] = 'BREAD_Students/$1';
$route['api/presidents/(:any)'] = 'BREAD_Presidents/$1';
$route['api/events/(:any)'] = 'BREAD_Events/$1';
$route['api/activities/(:any)'] = 'BREAD_Activities/$1';
$route['api/announcements/(:any)'] = 'BREAD_Announcements/$1';
$route['api/slider/(:any)'] = 'BREAD_Slider/$1';
