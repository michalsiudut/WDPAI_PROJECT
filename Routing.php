<?php

require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/DashboardController.php';


// TODO musimty zapewnic ze utworzony oboekt ma tylko jedna iinstacje - singleton

//  TODO /dashboard - wszystkie dane
//  /dashboiard/12234 - wyciagnie nam jakis elemtn o konkretnym id 12234
//  regex
class Routing {


    public static $routes= [
        "login" => [
            "controller" => "SecurityController",
            "action" => "login",
        ],
        "register" => [
            "controller" => "SecurityController",
            "action" => "register",
        ],
        "dashboard" => [
            "controller" => "DashboardController",
            "action" => "dashboard",
        ]
    ];

    public static function run(string $path){

        switch($path){
         case 'dashboard':
            $controller = Routing::$routes[$path]["controller"];
            $action = Routing::$routes[$path]["action"];


            $controllerObj = new $controller;
            $controllerObj -> $action();

            break;
        case 'login':
        case 'register':
            $controller = Routing::$routes[$path]["controller"];
            $action = Routing::$routes[$path]["action"];


            $controllerObj = new $controller;
            $controllerObj -> $action();
            break;
        case 'test':
            include 'public/views/test.html';
            break;
        case 'profile':
            include 'public/views/profile.html';
            break;
        default:
            include 'public/views/404.html';
            break;
        }
    }
}