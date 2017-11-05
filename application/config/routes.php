<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['wall/index']='wall/index';
$route['wall/create']='wall/create';
$route['wall']='wall/index';
$route['pages']='pages/view';
$route['photos/create']='photos/create';
//$route['photos/index']='photos';
$route['photos']='photos/index';
$route['default_controller'] = 'pages/view';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
