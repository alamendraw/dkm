<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$route['default_controller'] = 'login';
$route['404_override'] = 'home/get_404';
$route['coming_soon'] = 'home/coming_soon';
$route['dkm'] = 'login';
$route['translate_uri_dashes'] = FALSE;

$route['laporan-jumat'] = 'laporan/keuangan/jumat';