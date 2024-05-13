<?php
namespace app\controllers;

class SiteController extends Controller {
    public function __construct() {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home() {
    }

}
