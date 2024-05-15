<?php
namespace Simplimmo\Controllers;
use Simplimmo\Controllers\Controller;

class SiteController extends Controller {

    /**
     * 
     * Page de contact générique
     * 
     */
    public function contact() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        zdebug(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Page de mentions légales
     * 
     */
    public function legalNotice() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        zdebug(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Page 404
     * 
     */
    public function pageNotFound() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        zdebug(__CLASS__ . " / " . __FUNCTION__);
        $this->render('404');
    }

}
