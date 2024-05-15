<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/register', 'UserController::pageRegister');
$routes->post('/registers', 'UserController::register');
$routes->get('/login', 'UserController::index');
$routes->post('/logins', 'UserController::login');
$routes->get('/forgot', 'UserController::pageForgot');
$routes->get('/logout', 'UserController::logout');

$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/', 'HomepageController::index');
$routes->get('/home', 'HomepageController::index');
$routes->get('/info', 'HomepageController::info');
$routes->get('/contact', 'HomepageController::contact');

$routes->get('/mahasiswa', 'StudentController::index');
$routes->get('/mahasiswa/create', 'StudentController::create');
$routes->post('/mahasiswa', 'StudentController::store');
$routes->get('/mahasiswa/edit/(:num)', 'StudentController::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'StudentController::update/$1');
$routes->get('/mahasiswa/delete/(:num)', 'StudentController::delete/$1');
$routes->get('/mahasiswa/detail/(:num)', 'StudentController::view/$1');
$routes->get('/mahasiswa/printpdf', 'StudentController::printpdf');

$routes->get('/dosen', 'LecturerController::index');
$routes->get('/dosen/create', 'LecturerController::create');
$routes->post('/dosen', 'LecturerController::store');
$routes->get('/dosen/edit/(:num)', 'LecturerController::edit/$1');
$routes->post('/dosen/update/(:num)', 'LecturerController::update/$1');
$routes->get('/dosen/delete/(:num)', 'LecturerController::delete/$1');
$routes->get('/dosen/detail/(:num)', 'LecturerController::view/$1');
$routes->get('/dosen/printpdf', 'LecturerController::printpdf');

$routes->get('/makul', 'CourseController::index');
$routes->get('/makul/create', 'CourseController::create');
$routes->post('/makul', 'CourseController::store');
$routes->get('/makul/edit/(:num)', 'CourseController::edit/$1');
$routes->post('/makul/update/(:num)', 'CourseController::update/$1');
$routes->get('/makul/delete/(:num)', 'CourseController::delete/$1');
$routes->get('/makul/detail/(:num)', 'CourseController::view/$1');
$routes->get('/makul/printpdf', 'CourseController::printpdf');

$routes->get('/penilaian', 'AssessmentController::index');
$routes->get('/penilaian/create', 'AssessmentController::create');
$routes->post('/penilaian', 'AssessmentController::store');
$routes->get('/penilaian/edit/(:num)', 'AssessmentController::edit/$1');
$routes->post('/penilaian/update/(:num)', 'AssessmentController::update/$1');
$routes->get('/penilaian/delete/(:num)', 'AssessmentController::delete/$1');
$routes->get('/penilaian/view/(:num)', 'AssessmentController::view/$1');
