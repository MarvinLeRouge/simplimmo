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
        $data = ["status" => "initial"];
        if((isset($_POST["form_src"])) && ($_POST["form_src"] == "contact")) {
            zdebug($_POST);
            $contact_data = $_POST;
            unset($contact_data["form_src"]);
            $contact_added = $this->repository->setContact($contact_data);
            $data["status"] = ($contact_added ? "success" : "reload");
            $data = array_merge($data, $_POST);
        }
        $this->render('site/contact.twig', $data);
    }

    /**
     * 
     * Page de mentions légales
     * 
     */
    public function legalNotice() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $this->render('site/legalnotice.twig');
    }

    /**
     * 
     * Page 404
     * 
     */
    public function pageNotFound() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $this->render('site/404.twig');
    }

}
