<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';

// View for testing htaccess URL rewrite
$route['foobar'] = 'main';

// Cron
$route['listing'] = "main/index";
$route['listing/(:any)'] = "main/index/$1";
$route['listing/(:any)/(:any)'] = "main/index/$1/$2";
$route['news/(:any)/(:any)'] = "main/article/$1/$2";
$route['news/(:any)/(:any)/(:any)'] = "main/article/$1/$2/$3";
$route['radio'] = "main/radio";
$route['print'] = "main/print_media";
$route['weather'] = "main/weather";
$route['markets'] = "main/markets";
$route['election'] = "main/election";
$route['travel'] = "main/travel";
$route['spiderman'] = "main/spiderman";
$route['cron/(:any)'] = "cron/index/$1";
$route['print/april'] = "printmedia/april";
$route['print/may'] = "printmedia/may";
$route['print/june'] = "printmedia/june";
$route['print/july'] = "printmedia/july";
$route['print/weekly/(:any)'] = "printmedia/weekly/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;