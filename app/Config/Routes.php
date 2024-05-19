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

$routes->get('/fakultas', 'FacultyController::index');
$routes->get('/fakultas/create', 'FacultyController::create');
$routes->post('/fakultas', 'FacultyController::store');
$routes->get('/fakultas/edit/(:num)', 'FacultyController::edit/$1');
$routes->post('/fakultas/update/(:num)', 'FacultyController::update/$1');
$routes->get('/fakultas/delete/(:num)', 'FacultyController::delete/$1');
$routes->get('/fakultas/detail/(:num)', 'FacultyController::view/$1');
$routes->get('/fakultas/printpdf', 'FacultyController::printpdf');

$routes->get('/gedung', 'BuildingController::index');
$routes->get('/gedung/create', 'BuildingController::create');
$routes->post('/gedung', 'BuildingController::store');
$routes->get('/gedung/edit/(:num)', 'BuildingController::edit/$1');
$routes->post('/gedung/update/(:num)', 'BuildingController::update/$1');
$routes->get('/gedung/delete/(:num)', 'BuildingController::delete/$1');
$routes->get('/gedung/detail/(:num)', 'BuildingController::view/$1');
$routes->get('/gedung/printpdf', 'BuildingController::printpdf');

$routes->get('/prodi', 'StudyProgramController::index');
$routes->get('/prodi/create', 'StudyProgramController::create');
$routes->post('/prodi', 'StudyProgramController::store');
$routes->get('/prodi/edit/(:num)', 'StudyProgramController::edit/$1');
$routes->post('/prodi/update/(:num)', 'StudyProgramController::update/$1');
$routes->get('/prodi/delete/(:num)', 'StudyProgramController::delete/$1');
$routes->get('/prodi/detail/(:num)', 'StudyProgramController::view/$1');
$routes->get('/prodi/printpdf', 'StudyProgramController::printpdf');

$routes->get('/ruang', 'RoomCOntroller::index');
$routes->get('/ruang/create', 'RoomCOntroller::create');
$routes->post('/ruang', 'RoomCOntroller::store');
$routes->get('/ruang/edit/(:num)', 'RoomCOntroller::edit/$1');
$routes->post('/ruang/update/(:num)', 'RoomCOntroller::update/$1');
$routes->get('/ruang/delete/(:num)', 'RoomCOntroller::delete/$1');
$routes->get('/ruang/detail/(:num)', 'RoomCOntroller::view/$1');
$routes->get('/ruang/printpdf', 'RoomCOntroller::printpdf');

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

$routes->get('/jadwal', 'ScheduleController::index');
$routes->get('/jadwal/create', 'ScheduleController::create');
$routes->post('/jadwal', 'ScheduleController::store');
$routes->get('/jadwal/edit/(:num)', 'ScheduleController::edit/$1');
$routes->post('/jadwal/update/(:num)', 'ScheduleController::update/$1');
$routes->get('/jadwal/delete/(:num)', 'ScheduleController::delete/$1');
$routes->get('/jadwal/detail/(:num)', 'ScheduleController::view/$1');
$routes->get('/jadwal/printpdf', 'ScheduleController::printpdf');

$routes->get('/kelas', 'ClassController::index');
$routes->get('/kelas/create', 'ClassController::create');
$routes->post('/kelas', 'ClassController::store');
$routes->get('/kelas/edit/(:num)', 'ClassController::edit/$1');
$routes->post('/kelas/update/(:num)', 'ClassController::update/$1');
$routes->get('/kelas/delete/(:num)', 'ClassController::delete/$1');
$routes->get('/kelas/detail/(:num)', 'ClassController::view/$1');
$routes->get('/kelas/printpdf', 'ClassController::printpdf');
$routes->get('/kelas/tambah-siswa/(:num)', 'ClassController::addStudentForm/$1');
$routes->post('/kelas/tambah-siswa/(:num)', 'ClassController::addStudentToClass/$1/$2');

$routes->get('/penilaian', 'AssessmentController::index');
$routes->get('/penilaian/create', 'AssessmentController::create');
$routes->post('/penilaian', 'AssessmentController::store');
$routes->get('/penilaian/edit/(:num)', 'AssessmentController::edit/$1');
$routes->post('/penilaian/update/(:num)', 'AssessmentController::update/$1');
$routes->get('/penilaian/delete/(:num)', 'AssessmentController::delete/$1');
$routes->get('/penilaian/view/(:num)', 'AssessmentController::view/$1');
