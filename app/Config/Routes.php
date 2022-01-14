<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//Home Controller routes
$routes->get('/', 'Home::index');
$routes->get('about','Home::about');
$routes->get('profile', 'Home::profile');
$routes->post('savedetails', 'Home::savedetails');
$routes->get('viewpost', 'Home::viewpost');
$routes->get('changepassword', 'Home::changepassword');
$routes->post('updatepassword', 'Home::updatepassword');
$routes->get('edit/(:num)', 'Home::edit/$1');
$routes->post('update/(:num)', 'Home::update/$1');
$routes->get('delete/(:num)', 'Home::delete/$1');


//Email Controller routes
$routes->get('/contact','EmailController::index');
$routes->post('/send', 'EmailController::send');




//Auth Controller routes

$routes->get('/register','AuthController::index',['filter'=>'LoggedInFilter']);
$routes->post('save', 'AuthController::save');
$routes->get('login', 'AuthController::login',['filter'=>'LoggedInFilter']);
$routes->post('check', 'AuthController::check');
$routes->get('logout', 'AuthController::logout');

//Dashboard controller routes
$routes->get('dashboard', 'DashboardController::index',['filter'=>'Admin']);



//Categories controller routes
$routes->get('categories','CategoryController::index');
$routes->get('categories/get-data','CategoryController::getData');
$routes->get('categories/create','CategoryController::create');
$routes->post('categories/create','CategoryController::create');
$routes->get('categories/edit/(:num)','CategoryController::edit/$1');
$routes->post('categories/update','CategoryController::update');
$routes->post('categories/delete','CategoryController::delete');




//posts controller
 $routes->get('posts/create','PostsController::create');
 $routes->post('posts/store','PostsController::store');
 $routes->get('posts/view/(:any)','PostsController::view/$1');




//users controller routes
$routes->get('users','UsersController::index');
$routes->get('users/create','UsersController::create');
$routes->post('store', 'UsersController::store');
$routes->get('users/edit/(:num)','UsersController::edit/$1');
$routes->post('users/update/(:num)','UsersController::update/$1');
$routes->get('delete/(:num)','UsersController::delete/$1');
































































/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
