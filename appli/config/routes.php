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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "accueil";
$route['admin'] = "walkadmin/connexion";
$route['walkadmin'] = "walkadmin/connexion";
$route['walkadmin/pays/creer'] = "walkadmin/pays_admin/creer";
$route['walkadmin/map'] = "walkadmin/pays_admin/index";
$route['walkadmin/voyage/(:num)'] = "walkadmin/voyage/index/$1";
$route['walkadmin/lire-article/(:num)'] = "walkadmin/article/voir/$1";
$route['walkadmin/creer-voyage/(:num)'] = "walkadmin/voyage/creer/$1";
$route['walkadmin/creer-destination'] = "walkadmin/destinations/creer";
$route['walkadmin/creer-actualite'] = "walkadmin/actualite/creer";
$route['carnets-de-voyage'] = 'carnets_de_voyage';
$route['tous-les-carnets/(:any)'] = 'tous_les_carnets/index/$1';
$route['walkadmin/article/(:any)'] = 'walkadmin/article/index/$1';
$route['carnets-de-voyage/creer'] = 'carnets_de_voyage/creer';
$route['carnets-de-voyage/modifier/(:any)'] = 'carnets_de_voyage/modifier/$1';
$route['carnets-de-voyage/(:any)'] = 'carnets_de_voyage/load_carnet/$1';
$route['nos-actualites'] = 'nos_actualites';
$route['nos-destinations'] = 'destinations';
$route['nos-destinations/(:any)'] = 'destinations/$1';
$route['qui-sommes-nous'] = 'qui_sommes_nous';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
