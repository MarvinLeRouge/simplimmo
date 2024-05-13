<?php

// Load the controllers files
/*
require __DIR__ . "/Controllers/HomeController.php";
require __DIR__ . "/Controllers/StudentController.php";
*/

// Create the controller instances
use Controllers\HomeController;
use Controllers\StudentController;
$homeController = new HomeController();
$studentController = new StudentController();

// Get the current request URI to get the route asked for by the user
$route = $_SERVER['REQUEST_URI'];
zlog("route : $route");

// Use a switch/case to match the request and the controller based on the URI
switch ($route) {
    case URL_HOMEPAGE: // If the URI matches the homepage
        $homeController->index();
        break;
    case URL_STUDENTS: // If the URI matches the students page
        $studentController->index();
        break;
    default: // Default, if no route is found
        $homeController->pageNotFound();
}
