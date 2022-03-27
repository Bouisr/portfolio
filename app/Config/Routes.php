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

$routes->setAutoRoute(false);



/*

 * --------------------------------------------------------------------

 * Route Definitions

 * --------------------------------------------------------------------

 */



// We get a performance increase by specifying the default

// route since we don't have to scan directories.



//





$routes->get('home', 'Home::index');



// Si l'utilisateur accède à la racine du site la requête est filtré et il est redirigé sur la page d'accueil

$routes->get('/', 'Home::index', ['filter' => 'home']);



$routes->get('user/signout', 'User::signout');

$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);



$routes->get('subject/add', 'MessageSubject::consultMessageSubject');
$routes->match(['post'], 'messagesubject/addmessagesubject', 'MessageSubject::addMessageSubject');

$routes->get('subject/edit/(:num)', 'MessageSubject::editMessageSubject/$1');
$routes->match(['post'], 'messagesubject/update', 'MessageSubject::updateMessageSubject');
// A faire
$routes->get('subject/delete/(:num)', 'MessageSubject::deleteMessageSubject/$1');
$routes->match(['post'], 'subject/delete', 'MessageSubject::deleteMessageSubject');


$routes->get('signin', 'User::signin');

$routes->match(['post'], 'user/signinform', 'User::signinForm');

$routes->match(['post'], 'message/insertmessage', 'Message::insertMessage');



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

