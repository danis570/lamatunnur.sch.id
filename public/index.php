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
Router::add("GET", "/users/register", UserController::class, "register", [MustNotLoginMiddleware::class]);
Router::add("POST", "/users/register", UserController::class, "postRegister", [MustNotLoginMiddleware::class]);
Router::add("GET", "/users/login", UserController::class, "login", [MustNotLoginMiddleware::class]);
Router::add("POST", "/users/login", UserController::class, "postLogin", [MustNotLoginMiddleware::class]);
Router::add("GET", "/users/logout", UserController::class, "logout", [MustLoginMiddleware::class]);
Router::add("POST", "/users/logout", UserController::class, "logout", [MustLoginMiddleware::class]);

// user role admin controller
Router::add(
    'GET',
    '/students/edit/([0-9]+)',
    StudentController::class,
    'edit'
);
Router::add(
    'GET',
    '/students/show/([0-9]+)',
    StudentController::class,
    'show'
);
Router::add(
    'POST',
    '/students/update',
    StudentController::class,
    'update'
);
Router::add(
    'POST',
    '/students/delete',
    StudentController::class,
    'delete'
);
Router::add(
    'POST',
    '/students/delete-multiple',
    StudentController::class,
    'deleteMultiple'
);
Router::add(
    "GET",
    "/students/export/pdf/([0-9]+)",
    StudentController::class,
    "exportPdf",
    [MustLoginMiddleware::class]
);
Router::add(
    "POST",
    "/students/export/pdf-multiple",
    StudentController::class,
    "exportPdfMultiple"
);
Router::add(
    "POST",
    "/students/export/excel-multiple",
    StudentController::class,
    "exportExcelMultiple",
    [MustLoginMiddleware::class]
);
Router::add(
    "POST",
    "/students/accept-multiple",
    StudentController::class,
    "acceptMultiple",
    [MustAdminMiddleware::class]
);

// user role user controller

// student controller
Router::add("GET", "/students/registration", StudentController::class, "registration", []);
Router::add("POST", "/students/registration", StudentController::class, "postRegistration", []);

Router::run();