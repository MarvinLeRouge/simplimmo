<?php

// Create the controller instances
use Controllers\HomeController;
use Controllers\StudentController;
$homeController = new HomeController();
$studentController = new StudentController();

$uri = $_SERVER['REQUEST_URI'];
zlog("uri : $uri");

// Ici, peut-être, un filtrage de l'uri par regex pour voir si on est sur un modèle connu

$routes = [
    "default" => [
        "controller" => $homeController,
        "method" => "pageNotFound",
    ],
    URL_HOMEPAGE => [
        "controller" => $homeController,
        "method" => "index",
    ],
    URL_STUDENTS => [
        "controller" => $studentController,
        "method" => "index",
    ],
];

$route = $routes[$uri] ?? $routes["default"];
$route["controller"]->{$route["method"]}();
zdebug(["route", $route]);

