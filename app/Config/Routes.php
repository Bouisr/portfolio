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

$routes->group('home', function ($routes){

// Poster un message
$routes->match(['post'], 'sendmessage', 'Message::sendMessage');
// Accéder à la page d'identification
$routes->get('signin', 'User::signin');
// S'identifier
$routes->match(['post'], 'signinform', 'User::signinForm');
});

// Se déconnecter
$routes->get('user/signout', 'User::signout');

$routes->group('dashboard', ['filter' => 'auth'], function ($routes){

// Accéder au tableau de bord
$routes->get('/', 'Dashboard::index');

// Archiver un message
$routes->get('message/archive/(:num)/(:num)', 'Message::updateArchiveMessage/$1/$2');
$routes->match(['post'], 'message/archive', 'Message::updateArchiveMessage');

// Accéder à la page d'ajout de sujet
$routes->get('subject/add', 'MessageSubject::consultMessageSubject');
// Ajouter un sujet
$routes->match(['post'], 'messagesubject/addmessagesubject', 'MessageSubject::addMessageSubject');
// Accéder à la page de modification de sujet en fonction de l'id
$routes->get('subject/edit/(:num)', 'MessageSubject::editMessageSubject/$1');
// Modifier un sujet
$routes->match(['post'], 'messagesubject/update', 'MessageSubject::updateMessageSubject');
// Accéder à la page de suppression d'un sujet en fonction de l'id
$routes->get('subject/delete/(:num)', 'MessageSubject::deleteMessageSubject/$1');
// Supprimer un sujet
$routes->match(['post'], 'subject/delete', 'MessageSubject::deleteMessageSubject');

// Accéder à la page d'ajout de sujet
$routes->get('skill/add', 'Skill::consultSkill');
// Ajouter un sujet
$routes->match(['post'], 'skill/addskill', 'Skill::addSkill');
// Accéder à la page de modification de sujet en fonction de l'id
$routes->get('skill/edit/(:num)', 'Skill::editSkill/$1');
// Modifier un sujet
$routes->match(['post'], 'skill/update', 'Skill::updateSkill');
// Accéder à la page de suppression d'un sujet en fonction de l'id
$routes->get('skill/delete/(:num)', 'Skill::deleteSkill/$1');
// Supprimer un sujet
$routes->match(['post'], 'skill/delete', 'Skill::deleteSkill');

// Ajouter un projet
$routes->get('project/add', 'Project::consultProject');
$routes->match(['post'], 'project/addproject', 'Project::addProject');
$routes->get('project/edit/(:num)/(:num)', 'Project::editProject/$1/$2');
$routes->match(['post'], 'project/update', 'Project::updateProject');
// Accéder à la page de suppression d'un projet en fonction de l'id ( param 1 : id projet, param 2 : id fichier )
$routes->get('project/delete/(:num)/(:num)', 'Project::deleteProject/$1/$2');
// Supprimer un projet
$routes->match(['post'], 'project/delete', 'Project::deleteProject');

// Production
$routes->get('production/add', 'Production::consultProduction');
$routes->match(['post'], 'production/addproduction', 'Production::addProduction');
$routes->get('production/edit/(:num)/(:num)/(:num)', 'Production::editProduction/$1/$2/$3');
$routes->match(['post'], 'production/update', 'Production::updateProduction');
// Accéder à la page de suppression d'un projet en fonction de l'id ( param 1 : id projet, param 2 : id fichier )
$routes->get('production/delete/(:num)/(:num)/(:num)', 'Production::deleteProduction/$1/$2/$3');
// Supprimer un projet
$routes->match(['post'], 'production/delete', 'Production::deleteProduction');

});

$routes->get('epreuve', 'Epreuve::index');

$routes->get('/', 'Epreuve::index', ['filter' => 'epreuve']);

/*

 * --------------------------------------------------------------------

 * Additional Routing

 * --------------------------------------------------------------------
 
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