<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\StudentController;
use App\Controllers\CourseController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('students', 'StudentController::index');
$routes->get('students/(:num)', 'StudentController::show/$1');
$routes->get('students/create', 'StudentController::create');
$routes->post('students/store', 'StudentController::store');
$routes->get('students/edit/(:num)', 'StudentController::edit/$1');
$routes->post('students/update/(:num)', 'StudentController::update/$1');
$routes->get('students/delete/(:num)', 'StudentController::delete/$1');

// Rutas para el controlador CourseController
$routes->get('courses', 'CourseController::index');
$routes->get('courses/(:num)', 'CourseController::show/$1');
$routes->get('courses/create', 'CourseController::create');
$routes->post('courses/store', 'CourseController::store');
$routes->get('courses/edit/(:num)', 'CourseController::edit/$1');
$routes->post('courses/update/(:num)', 'CourseController::update/$1');
$routes->get('courses/delete/(:num)', 'CourseController::delete/$1');


