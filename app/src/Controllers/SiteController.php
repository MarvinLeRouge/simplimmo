<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\Site as Site;
use Simplimmo\Repositories\SiteRepository as SiteRepository;

class SiteController extends Controller {
    protected Site $model;
    protected SiteRepository $repository;

    public function __construct() {
        parent::__construct();
        $this->model = new Site();
        $this->repository = new SiteRepository();
    }

    /**
     * 
     * Page de contact générique
     * 
     */
    public function contact() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Page de mentions légales
     * 
     */
    public function legalNotice() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Page 404
     * 
     */
    public function pageNotFound() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $this->render('404');
    }

}
