<?php
namespace Controllers;

//require_once __DIR__ . '/../Services/Response.php';
//use \Response;

class HomeController {
    use \Services\Response;

    public function index() {
        zlog("home/index");
        $title = "Welcome!";

        $viewData = [
            'title' => $title
        ];

        $this->render('HomePageTemplate', $viewData);
    }

    public function pageNotFound() {
        zlog("home/404");
        $this->render('404');
    }
}
