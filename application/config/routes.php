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
$route['default_controller'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['welcome/data_atribut'] = 'welcome/datajember';
$route['welcome/pemetaan_banjir'] = 'welcome/petabanjir';
$route['welcome/jenis_tanah'] = 'admin/atribut_j_tanah';
$route['welcome/kemiringan'] = 'admin/atribut_kemiringan';
$route['welcome/landuse'] = 'admin/atribut_landuse';
$route['welcome/buffer'] = 'admin/atribut_buffer';
$route['welcome/curah_hujan'] = 'admin/atribut_CH';
$route['admin/overview'] = 'admin/admin';
$route['admin/clustering'] = 'admin/admin/clustering';
$route['admin/atribut'] = 'admin/admin/atribut';
$route['admin/UploadFile'] = 'admin/admin/load_upload';
$route['admin/centroid'] = 'admin/admin/centroid';
$route['admin/kmeans'] = 'admin/admin/iterasi_kmeans';
$route['admin/hasil_clustering'] = 'admin/admin/iterasi_kmeans_hasil';
$route['admin/pemetaan_banjir'] = 'welcome/petabanjir';
$route['logout'] = 'admin/login/logout';

