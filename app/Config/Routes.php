<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\StudentController;
use App\Controllers\CourseController;

/**
 * @var RouteCollection $routes
 */

 // Ruta por defecto
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


// Rutas adicionales para estudiantes y cursos
$routes->get('students/courses/(:num)', 'StudentController::courses/$1'); // Mostrar cursos de estudiante
$routes->get('students/manage_courses/(:num)', 'StudentController::manage_courses/$1'); // Administrar cursos de estudiante
$routes->get('students/remove_one_course/(:num)/(:num)', 'StudentController::remove_one_course/$1/$2'); // Eliminar curso de estudiante
$routes->post('students/add_course/(:num)', 'StudentController::add_course/$1'); // Agregar curso a estudiante
$routes->post('students/remove_course/(:num)', 'StudentController::remove_course/$1'); // Eliminar curso de estudiante
$routes->post('students/remove_course/(:num)/(:num)', 'StudentController::remove_course/$1/$2'); // Eliminar curso de estudiante
$routes->post('students/remove_course/(:num)/(:num)', 'StudentController::delete_one_courses_for_student/$1/$2'); // Eliminar curso de estudiante


//Rutas adicionales para la relacion 1 a N

// Rutas para Departamentos
$routes->get('departments', 'DepartmentController::index');
$routes->get('department/show/(:num)', 'DepartmentController::show/$1');
$routes->get('department/create', 'DepartmentController::create');
$routes->post('department/store', 'DepartmentController::store');
$routes->get('department/edit/(:num)', 'DepartmentController::edit/$1');
$routes->post('department/update/(:num)', 'DepartmentController::update/$1');
$routes->get('department/delete/(:num)', 'DepartmentController::delete/$1');

// Rutas para Empleados
$routes->get('employees', 'EmployeeController::index');
$routes->get('employee/create', 'EmployeeController::create');
$routes->post('employee/store', 'EmployeeController::store');
$routes->get('employee/edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('employee/update/(:num)', 'EmployeeController::update/$1');
$routes->get('employee/delete/(:num)', 'EmployeeController::delete/$1');
$routes->get('employee/show/(:num)', 'Employee::show/$1');


// Ruta para la búsqueda de empleados
$routes->get('employee/search', 'EmployeeController::search');
$routes->get('employee/department-statistics', 'EmployeeController::departmentStatistics');


$routes->get('report/generate-employee-report', 'ReportController::generateEmployeeReport');
$routes->get('employee/generate-report/(:num)', 'EmployeeController::generateEmployeeReportById/$1');
$routes->get('report/generate-employees-by-department-report', 'ReportController::generateEmployeesByDepartmentReport');



//LastRoutes
//$routes->get('/(:any)', 'Home::index/$1');