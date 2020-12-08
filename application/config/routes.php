<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';

// View for testing htaccess URL rewrite
$route['foobar'] = 'main';

// Cron
$route['listing'] = "main/index";
$route['listing/(:any)'] = "main/index/$1";
$route['listing/(:any)/(:any)'] = "main/index/$1/$2";
$route['cron/(:any)'] = "cron/index/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;