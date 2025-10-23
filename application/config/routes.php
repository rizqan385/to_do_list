<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Auth Routes
| -------------------------------------------------------------------------
*/
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

/*
| -------------------------------------------------------------------------
| To-Do List Routes
| -------------------------------------------------------------------------
*/
$route['todo'] = 'todo/index';
$route['todo/add'] = 'todo/add';
$route['todo/store'] = 'todo/store';
$route['todo/edit/(:num)'] = 'todo/edit/$1';
$route['todo/update/(:num)'] = 'todo/update/$1';
$route['todo/detail/(:num)'] = 'todo/detail/$1';
$route['todo/delete/(:num)'] = 'todo/delete/$1';
