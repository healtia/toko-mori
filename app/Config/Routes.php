<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
//daftar sepatu
$routes->get('/', 'Sepatu::index');
$routes->get('/daftarsepatu', 'Sepatu::daftarsepatu');
//sepatu crud
$routes->get('/search', 'Sepatu::search');
$routes->get('/admin', 'Sepatu::indexadmin', ['filter' => 'suauth']);
$routes->get('/tambah-data', 'Sepatu::create', ['filter' => 'suauth']);
$routes->post('/tambah-data/proses', 'Sepatu::store', ['filter' => 'suauth']);
$routes->get('/update/(:any)/data', 'Sepatu::update/$1', ['filter' => 'suauth']);
$routes->post('/update-data/proses', 'Sepatu::update_proses', ['filter' => 'suauth']);
$routes->delete('/delete-data/(:num)', 'Sepatu::delete/$1', ['filter' => 'suauth']);
//daftar order
$routes->match(['get','post'],'/order/(:num)', 'Orders::vieworder/$1', ['filter' => 'auth']);
$routes->post('/sepatuorder/proses', 'Orders::proses', ['filter' => 'auth']);
$routes->get('/post/(:num)', 'Sepatu::look/$1');
$routes->get('/about', 'Sepatu::about');
$routes->get('/keranjang/(:any)', 'Orders::keranjang/$1', ['filter' => 'auth']);
$routes->get('/keranjangadmin', 'Orders::keranjangadmin', ['filter' => 'suauth']);
//daftar user
$routes->match(['get','post'],'login', 'Users::login', ['filter' => 'noauth']);
$routes->match(['get','post'],'register', 'Users::register', ['filter' => 'noauth']);
$routes->match(['get','post'],'profile', 'Users::profile', ['filter' => 'auth']);
$routes->match(['get','post'],'update-profile', 'Users::updateprofile', ['filter' => 'auth']);
$routes->get('/logout', 'Users::logout');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
