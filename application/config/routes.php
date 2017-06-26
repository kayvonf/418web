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
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['404_override'] = '';


// NOTE(kayvonf): remember order matters here


$route['users/do_login'] = 'users/do_login';
$route['users/login'] = 'users/login';
$route['users/do_create'] = 'users/do_create';
$route['users/edit'] = 'users/edit';
//$route['users/changepassword'] = 'users/changepassword';
$route['users/reset_password'] = 'users/reset_password';
$route['users/do_reset'] = 'users/do_reset';
$route['users/do_password_change'] = 'users/do_password_change';
$route['users/delete'] = 'users/delete';
$route['users/sortbycomments'] = 'users/index/sortbycomments';
$route['users/sortbyandrew'] = 'users/index/sortbyandrew';
$route['users/report/(:any)'] = 'users/report/$1';

$route['user/(:any)'] = 'newsfeed/list_activity/$1';


$route['lecture/do_create'] = 'lecture/do_create';
$route['lecture/create'] = 'lecture/create';
$route['lecture/(:any)/delete'] = 'lecture/delete/$1';
$route['lecture/(:any)/edit'] = 'lecture/edit/$1';
$route['lecture/(:any)/do_editmeta'] = 'lecture/do_editmeta/$1';
$route['lecture/(:any)/do_editslides'] = 'lecture/do_editslides/$1';
$route['lecture/(:any)/(:any)'] = 'lecture/view_slide/$1/$2';
$route['lecture/(:any)'] = 'lecture/view_summary/$1';
$route['lecture'] = 'lecture/index';

$route['comments/list'] = 'comments/list_all';
$route['comments/download'] = 'comments/comments_csv';
$route['comments/prompts/download'] = 'comments/prompts_csv';

$route['article/(:num)/do_preview'] = 'article/do_preview/$1';
$route['article/do_create'] = 'article/do_create';
$route['article/do_create_privileged'] = 'article/do_create_privileged';
$route['article/create'] = 'article/create';
$route['article/create_privileged'] = 'article/create_privileged';

// TODO(mburman): make article/xxx/delete a POST
$route['article/ajax_delete_image'] = 'article/ajax_delete_image';
$route['article/ajax_delete_author'] = 'article/ajax_delete_author';
$route['article/(:any)/do_edit/(:any)'] = 'article/do_edit/$1/$2';
$route['article/(:any)/edit'] = 'article/edit/$1';
$route['article/(:any)/delete'] = 'article/delete/$1';
$route['article/(:any)'] = 'article/view/$1';
$route['articles'] = 'article/index';

/*
$route['scoreboard/token'] = 'scoreboard/token';
$route['scoreboard/submit'] = 'scoreboard/submit';
$route['scoreboard/(:any)/(:any)/(:any)'] = 'scoreboard/index/$1/$2/$3';
$route['scoreboard/(:any)/(:any)'] = 'scoreboard/index/$1/$2';
$route['scoreboard/(:any)'] = 'scoreboard/index/$1';
*/

$route['projects'] = 'article/view/16';
$route['getstarted'] = 'users/create';
$route['welcome'] = 'simple_pages/welcome';
$route['courseinfo'] = 'simple_pages/courseinfo';
$route['lectures'] = 'simple_pages/reading';
$route['exercises'] = 'simple_pages/exercises';
$route['admin'] = 'simple_pages/admin_console';
$route['votes'] = 'simple_pages/votes_overview';
$route['home'] = 'simple_pages/index';

// We need to extend the duration of CSRF tokens at least every 2 hours, or the
// user's next request will fail.
$route['keep_alive'] = 'simple_pages/keep_alive';

$route['default_controller'] = 'simple_pages';



/* End of file routes.php */
/* Location: ./application/config/routes.php */
