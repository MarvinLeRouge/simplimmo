<?php
namespace Simplimmo\Controllers;

class HomeController {
    use \Services\Response;

    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        zdebug(__CLASS__ . " / " . __FUNCTION__);
        $title = "Welcome!";

        $viewData = [
            'title' => $title
        ];

        $this->render('HomePageTemplate', $viewData);
    }
}
