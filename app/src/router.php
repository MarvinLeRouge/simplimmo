<?php

// Create the controller instances
use Simplimmo\Controllers\SiteController;
use Simplimmo\Controllers\PropertyController;
use Simplimmo\Controllers\HouseController;
use Simplimmo\Controllers\AppartmentController;
use Simplimmo\Controllers\ClientController;
use Simplimmo\Controllers\AdminController;
use Simplimmo\Controllers\ContactController;
use Simplimmo\Controllers\ContactClientPropertyController;


use Simplimmo\Controllers\HomeController;
use Simplimmo\Controllers\StudentController;

$uri = $_SERVER['REQUEST_URI'];
$uri = trim($uri, "/");
$regexes = [
    "/^([a-z]+)\/(?:[a-z0-9\-_]+\-)([0-9]+)$/" => [
        "controller" => "$1",
        "method" => "details",
        "param" => "$2",
    ],
    "/^me-recontacter\/(?:[a-z0-9\-_]+\-)([0-9]+)$/" => [
        "controller" => "PropertyController",
        "method" => "callMeBack",
        "param" => "$1",
    ],
    
];
$controllersMatch = [
    "maison" => "HouseController",
    "appartement" => "ApartmentController",
];
foreach($regexes as $regex => $routing) {
    $controller = $method = $param = null;
    preg_match($regex, $uri, $matches);
    if(!empty($matches)) {
        $controller = $routing["controller"] ?? null;
        $method = $routing["method"] ?? null;
        $param = $routing["param"] ?? null;

        if(strpos($controller, "$") !== false) {
            $index = (int) substr($controller, 1);
            $controller = $matches[$index];
        }
        if(strpos($method, "$") !== false) {
            $index = (int) substr($method, 1);
            $method = $matches[$index];
        }
        if(strpos($param, "$") !== false) {
            $index = (int) substr($param, 1);
            $param = $matches[$index];
        }
        $controller = $controllersMatch[$controller] ?? $controller;
        zlog(compact("uri", "controller", "method", "param"));

        break;
    }
}

// Ici, peut-être, un filtrage de l'uri par regex pour voir si on est sur un modèle connu
if((empty($controller)) || (empty($method))) {
    $routes = [
        "default" => [
            "controller" => "SiteController",
            "method" => "pageNotFound",
        ],
        "" => [
            "controller" => "PropertyController",
            "method" => "index",
        ],
        "maison" => [
            "controller" => "HouseController",
            "method" => "index",
        ],
        "contact" => [
            "controller" => "SiteController",
            "method" => "contact",
        ],
        "mentions-legales" => [
            "controller" => "SiteController",
            "method" => "legalNotice",
        ],
        "favoris" => [
            "controller" => "FavoriteController",
            "method" => "index",
        ],
        "client" => [
            "controller" => "ClientController",
            "method" => "login",
        ],
        "client/creer-compte" => [
            "controller" => "ClientController",
            "method" => "create",
        ],
        "dashboard" => [
            "controller" => "AdminController",
            "method" => "login",
        ],
        "dashboard/login" => [
            "controller" => "AdminController",
            "method" => "login",
        ],
        "dashboard/properties" => [
            "controller" => "PropertyController",
            "method" => "index",
        ],
        "dashboard/clients" => [
            "controller" => "ClientController",
            "method" => "index",
        ],
        "dashboard/contacts" => [
            "controller" => "ContactController",
            "method" => "index",
        ],
        "dashboard/asks" => [
            "controller" => "ContactClientPropertyController",
            "method" => "index",
        ],
        "maison" => [
            "controller" => "HouseController",
            "method" => "index",
        ],
        "appartement" => [
            "controller" => "ApartmentController",
            "method" => "index",
        ],
    ];

    $route = $routes[$uri] ?? $routes["default"];
    extract($route);
}

if(!empty($controller)) {
    $controller = "Simplimmo\\Controllers\\" . $controller;
    $controller = new $controller;
}

$controller->{$method}($param);

