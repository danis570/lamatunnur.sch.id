<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Danish\LamatunnurSchId\App\Router;
use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Controller\HomeController;
use Danish\LamatunnurSchId\Controller\StudentController;
use Danish\LamatunnurSchId\Controller\UserController;
use Danish\LamatunnurSchId\Middleware\MustAdminMiddleware;
use Danish\LamatunnurSchId\Middleware\MustLoginMiddleware;
use Danish\LamatunnurSchId\Middleware\MustNotLoginMiddleware;

Database::getConnection('prod');

// home controller
Router::add("GET", "/", HomeController::class, "index", []);

// user controller
Router::add("GET", "/users/login", UserController::class, "login", [MustNotLoginMiddleware::class]);
Router::add("POST", "/users/login", UserController::class, "postLogin", [MustNotLoginMiddleware::class]);
Router::add("GET", "/users/logout", UserController::class, "logout", [MustLoginMiddleware::class]);
Router::add("POST", "/users/logout", UserController::class, "logout", [MustLoginMiddleware::class]);

// user role admin controller
Router::add('GET', '/students/data', StudentController::class, 'data');
Router::add('GET', '/students/edit/([0-9]+)', StudentController::class, 'edit');
Router::add('GET', '/students/show/([0-9]+)', StudentController::class, 'show');
Router::add('POST', '/students/update', StudentController::class, 'update');
Router::add('POST', '/students/delete', StudentController::class, 'delete');
Router::add('POST', '/students/delete-multiple', StudentController::class, 'deleteMultiple');

// Route untuk PDF yang bisa diakses tanpa login
Router::add("GET", "/students/export/pdf/([0-9]+)", StudentController::class, "exportPdf", []);

// ============ MULTI-STEP REGISTRATION ROUTES ============
Router::add("GET", "/students/registration-multi", StudentController::class, "registrationMultiStep", []);
Router::add("POST", "/students/registration-step", StudentController::class, "postRegistrationStep", []);
Router::add("GET", "/students/cancel-registration", StudentController::class, "cancelRegistration", []);
Router::add("GET", "/students/registration-success", StudentController::class, "registrationSuccess", []); // HANYA SATU

// Route untuk PDF yang butuh login (untuk admin)
Router::add("GET", "/students/export/pdf-admin/([0-9]+)", StudentController::class, "exportPdf", [MustLoginMiddleware::class]);
Router::add("POST", "/students/export/pdf-multiple", StudentController::class, "exportPdfMultiple");
Router::add("POST", "/students/export/excel-multiple", StudentController::class, "exportExcelMultiple", [MustLoginMiddleware::class]);
Router::add("POST", "/students/accept-multiple", StudentController::class, "acceptMultiple", [MustAdminMiddleware::class]);

// Single step registration (old)
Router::add("GET", "/students/registration", StudentController::class, "registration", []);
Router::add("POST", "/students/registration", StudentController::class, "postRegistration", []);

Router::run();