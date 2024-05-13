<?php
namespace app\controllers;

/**
 * Class AboutController
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\controllers
 */
class AboutController extends Controller
{
    public function index() {
        return $this->render('about');
    }
}