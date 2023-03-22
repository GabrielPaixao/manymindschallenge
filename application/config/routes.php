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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login';
$route['login_ws'] = 'login/autenticar_ws';
$route['dashboard'] = 'dashboard';

//CRUD COLABORADORES
$route['colaboradores'] = 'colaboradores';
$route['colaboradores/register'] = 'colaboradores/form_register';
$route['colaboradores/save'] = 'colaboradores/form_save';
$route['colaboradores/list'] = 'colaboradores/list';
$route['colaboradores/listws'] = 'colaboradores/list_ws';				//WS
$route['colaboradores/delete/(:any)'] = 'colaboradores/delete/$1';
$route['colaboradores/reativa/(:any)'] = 'colaboradores/reativa/$1';
$route['colaboradores/edit/(:any)'] = 'colaboradores/form_edit/$1';

//CRUD PRODUTOS
$route['produtos'] = 'produtos';
$route['produtos/register'] = 'produtos/form_register';
$route['produtos/save'] = 'produtos/form_save';
$route['produtos/list'] = 'produtos/list';
$route['produtos/delete/(:any)'] = 'produtos/delete/$1';
$route['produtos/reativa/(:any)'] = 'produtos/reativa/$1';
$route['produtos/edit/(:any)'] = 'produtos/form_edit/$1';

//CRUD PEDIDOS
$route['pedidos'] = 'pedidos';
$route['pedidos/register'] = 'pedidos/form_register';
$route['pedidos/save'] = 'pedidos/form_save';
$route['pedidos/list'] = 'pedidos/list';
$route['pedidos/listws'] = 'pedidos/list_ws';						//WS
$route['pedidos/inativa/(:any)'] = 'pedidos/inativa/$1';
$route['pedidos/deleta/(:any)'] = 'pedidos/deleta/$1';
$route['pedidos/reativa/(:any)'] = 'pedidos/reativa/$1';
$route['pedidos/edit/(:any)'] = 'pedidos/form_edit/$1';

//CRUD ITENS
$route['itens'] = 'itens';
$route['itens/register/(:any)'] = 'itens/form_register/$1';
$route['itens/save'] = 'itens/form_save';
$route['itens/list/(:any)'] = 'itens/list/$1';
$route['itens/delete/(:any)/(:any)'] = 'itens/delete/$1/$2';
$route['itens/reativa/(:any)'] = 'itens/reativa/$1';
$route['itens/edit/(:any)'] = 'itens/form_edit/$1';
$route['itens/preco/(:any)'] = 'itens/get_produto_by_id/$1';

//API'S
$route['colaboradores/api/list'] = 'colaboradores/list_ws';
