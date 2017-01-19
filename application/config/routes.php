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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['analisis/pagina/(:num)'] = '/analisis/index/$1';  
$route['cliente/pagina/(:num)'] = '/cliente/index/$1';  
$route['cita/pagina/(:num)'] = '/cita/index/$1';  
$route['compra/pagina/(:num)'] = '/compra/index/$1';
$route['diagnostico/pagina/(:num)'] = '/diagnostico/index/$1';
$route['local/pagina/(:num)'] = '/local/index/$1';
$route['paciente/pagina/(:num)'] = '/paciente/index/$1';
$route['producto/pagina/(:num)'] = '/producto/index/$1';
$route['proveedor/pagina/(:num)'] = '/proveedor/index/$1';
$route['reportes/pagina/(:num)'] = '/reportes/index/$1';
$route['stockpresen/pagina/(:num)'] = '/stockpresen/index/$1';
$route['tipocita/pagina/(:num)'] = '/tipocita/index/$1';
$route['tipoproducto/pagina/(:num)'] = '/tipoproducto/index/$1';
$route['tipotrab/pagina/(:num)'] = '/tipotrab/index/$1';
$route['trabajador/pagina/(:num)'] = '/trabajador/index/$1';
$route['venta/pagina/(:num)'] = '/venta/index/$1';
$route['cirugia/pagina/(:num)'] = '/cirugia/index/$1';


// $route['analisis/search/pagina/(:num)'] = '/analisis/search/index/$1';  
