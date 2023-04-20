<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Principal');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Principal::index');
///! RUTAS DE SESION
$routes->get('iniciarSesion', 'Auth::index');
$routes->post('login', 'Usuarios::login');
$routes->get('logout', 'Usuarios::logout');

// ! RUTAS DE VISTAS TABLAS
$routes->get('/ver_roles', 'roles::index');
$routes->get('/ver_acciones', 'acciones::index');
$routes->get('/ver_aulas', 'aulas::index');
<<<<<<< HEAD
$routes->get('/ver_franjas', 'franjas_horarias::index');
=======
$routes->get('/ver_permisos', 'permisos::index');
>>>>>>> ba3b72997bad01f315e560bad538b72604b43f93

// ! RUTAS DE VISTAS TABLAS ELIMINADAS
$routes->get('/eliminados_roles', 'roles::eliminados');
$routes->get('/eliminados_acciones', 'acciones::eliminados');
$routes->get('/eliminados_aulas', 'aulas::eliminados');
<<<<<<< HEAD
$routes->get('/eliminados_franjas', 'franjas_horarias::eliminados');
=======
$routes->get('/eliminados_permisos', 'permisos::eliminados');
>>>>>>> ba3b72997bad01f315e560bad538b72604b43f93

//! RUTAS PARA INSERTAR
$routes->post('/roles_insertar', 'roles::insertar');
$routes->post('/acciones_insertar', 'acciones::insertar');
<<<<<<< HEAD
$routes->post('/franjas_insertar', 'franjas_horarias::insertar');
=======
>>>>>>> ba3b72997bad01f315e560bad538b72604b43f93
$routes->post('/aulas_insertar', 'aulas::insertar');
$routes->post('/permisos_insertar', 'permisos::insertar');
// $routes->get('/paises/cambiarEstado/(:num)', 'Paises::cambiarEstado/$1');

// ! RUTAS PARA CAMBIAR ESTADOS
$routes->get('/estado_roles/(:num)/(:alpha)', 'roles::cambiarEstado/$1/$2');
$routes->get('/estado_acciones/(:num)/(:alpha)', 'acciones::cambiarEstado/$1/$2');
$routes->get('/estado_aulas/(:num)/(:alpha)', 'aulas::cambiarEstado/$1/$2');
<<<<<<< HEAD
$routes->get('/estado_franjas/(:num)/(:alpha)', 'franjas_horarias::cambiarEstado/$1/$2');
=======
$routes->get('/estado_permisos/(:num)/(:alpha)', 'permisos::cambiarEstado/$1/$2');
>>>>>>> ba3b72997bad01f315e560bad538b72604b43f93
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
