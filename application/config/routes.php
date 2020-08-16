<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = "landing";
$route['404_override'] = 'user/show_404';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'landing';
$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'dashboard';
$route['chat'] = 'chat';
$route['logout'] = 'user/logout';

$route['inventory'] = 'inventory';
$route['addInventory'] = "inventory/addInventory";
$route['addNewInventory'] = "inventory/addNewInventory";
$route['editOInventory/(:num)'] = "inventory/editOInventory/$1";
$route['editInventory'] = "inventory/editInventory";
$route['deleteInventory'] = "inventory/deleteInventory";
$route['assign'] = "inventory/assign";
$route['assign-history'] = "inventory/inventoryHistoy";
$route['assign-history/(:num)'] = "inventory/inventoryHistoy/$1";
$route['assign-history/(:num)/(:num)'] = "inventory/inventoryHistoy/$1/$2";

$route['experiments'] = 'experiments';
$route['addExperiment'] = "experiments/addExperiment";
$route['addNewExperiment'] = "experiments/addNewExperiment";
$route['editOExperiment/(:num)'] = "experiments/editOExperiment/$1";
$route['editExperiment'] = "experiments/editExperiment";
$route['deleteExperiment'] = "experiments/deleteExperiment";

$route['links'] = 'links';
$route['addLink'] = "links/addLink";
$route['addNewLink'] = "links/addNewLink";
$route['editOLink/(:num)'] = "links/editOELink/$1";
$route['editLink'] = "links/editLink";
$route['deleteLink'] = "links/deleteLink";


$route['elearning'] = 'elearning';
$route['addDocument'] = "elearning/addDocument";
$route['addNewDocument'] = "elearning/addNewDocument";
$route['submitDocument'] = "elearning/submitDocument";
$route['submitNewDocument'] = "elearning/submitNewDocument";
$route['editODocument'] = "elearning/editODocument";
$route['editODocument/(:num)'] = "elearning/editODocument/$1";
$route['editDocument'] = "elearning/editDocument";
$route['deleteDocument'] = "elearning/deleteDocument";
$route['viewSubmissions'] = "elearning/viewSubmissions";

$route['reports'] = 'reports';
$route['reports/(:num)'] = 'reports/$1';

$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['users'] = 'user/users';
$route['users/(:num)'] = "user/users/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistory";
$route['login-history/(:num)'] = "user/loginHistory/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistory/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";