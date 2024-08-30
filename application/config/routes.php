<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//check subdomain name first and get the databse name
//$subdomain = join('.', explode('.', $_SERVER['HTTP_HOST'], -1));

$parts = explode('.', $_SERVER['HTTP_HOST']);
$subdomain = array_shift($parts);
if($subdomain){
	$mysqli = mysqli_init();
	if (!$mysqli) {
		die('mysqli_init failed');
	}
	$con = mysqli_connect(getenv("DB_HOSTNAME"), getenv("DB_USERNAME"),getenv("DB_PASSWORD"), getenv("DB_DATABASE"));
	$select = mysqli_query($con, "SELECT subdomain FROM tenants WHERE subdomain = '$subdomain'") or exit(mysqli_error($con));
	if(mysqli_num_rows($select)) {
		$route['default_controller'] = 'welcome/index';
	}else{
		show_404();
	}

function my_autoloader($class)
{

    if (substr($class, 0, 9) == "MY_Addon_") {
   
       if (file_exists($file = APPPATH . 'core/' . $class . '.php')) {
            include $file;
        }
    }
}

spl_autoload_register('my_autoloader');

$route['default_controller'] = 'welcome/index';
$route['user/resetpassword/([a-z]+)/(:any)'] = 'site/resetpassword/$1/$2';
$route['admin/resetpassword/(:any)'] = 'site/admin_resetpassword/$1';
$route['admin/unauthorized'] = 'admin/admin/unauthorized';
$route['parent/unauthorized'] = 'parent/parents/unauthorized';
$route['student/unauthorized'] = 'user/user/unauthorized';
$route['teacher/unauthorized'] = 'teacher/teacher/unauthorized';
$route['accountant/unauthorized'] = 'accountant/accountant/unauthorized';
$route['librarian/unauthorized'] = 'librarian/librarian/unauthorized';

// $route['404_override'] = '';
$route['404_override'] = 'welcome/show_404';

$route['translate_uri_dashes'] = FALSE;
$route['cron/(:any)'] = 'cron/index/$1';

//======= front url rewriting==========
$route['page/(:any)'] = 'welcome/page/$1';
$route['read/(:any)'] = 'welcome/read/$1';
$route['online_admission'] = 'welcome/admission';
$route['examresult'] = 'welcome/examresult';
$route['frontend'] = 'welcome';
$route['cbseexam'] = 'welcome/cbseexam';
$route['online_course'] = 'course';

}else{
	print_r("error");die;
}
 
