<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\Admin as Admin;
use Simplimmo\Repositories\AdminRepository as AdminRepository;

class AdminController extends Controller {
    protected Admin $model;
    protected AdminRepository $repository;
    private $salt = "1Uq1f0ukMDZw7q36OUh7vzAwyByzLS";

    public function __construct() {
        parent::__construct();
        $this->model = new Admin();
        $this->repository = new AdminRepository();
    }
    
    /**
     * 
     * Get all features for admin
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Get details of one specific apartment
     * 
     */
    public function login() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $data = ["status" => "initial"];
        if((isset($_POST["form_src"])) && ($_POST["form_src"] == "admin/login")) {
            $admin_data = $_POST;
            unset($admin_data["form_src"]);
            $infos_ok = $this->model->verify($admin_data);
            $admin_verified = false;
            if($infos_ok) {
                $admin_data_db = $this->repository->getByEmail($admin_data["email"]);
                $password_input = $admin_data["password"];
                $password_db = $admin_data_db->getPassword();
                $admin_verified = password_verify($password_input, $password_db);
                if($admin_verified) {
                    $this->repository->access($admin_data_db->getId());
                    $_SESSION["admin_email"] = $admin_data_db->getEmail();
                    $_SESSION["admin_id"] = $admin_data_db->getId();

                }
                else {
                    session_destroy();
                }
            }
            $data["status"] = ($admin_verified ? "success" : "error");
            $data = array_merge($data, $_POST);
        }
        if($data["status"] != "success") {
            $this->render('admin/login.twig', $data);
        }
        else {
            // Récupérer les data qui vont bien
            $this->render('admin/dashboard.twig', $data);
        }
    }

    public function create($given_salt) {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        //zdebug(__CLASS__ . " / " . __FUNCTION__ . " / " . $given_salt);
        $get_out = false;
        $get_out = $get_out || ($given_salt != $this->salt);
        if($get_out) {
            session_destroy();
            header("Location: /");
        }
        if(!isset($_POST["form_src"])) {
            // State : initial
            $data = [
                "salt" => $this->salt
            ];
            $this->render('admin/create.twig', $data);
        }
        else {
            zdebug("state : reload");
            $admin_data = $_POST;
            unset($admin_data["form_src"]);
            $infos_ok = $this->model->verify($admin_data);
            if($infos_ok) {
                unset($admin_data["password2"]);
                $admin_added = $this->repository->create($admin_data);
            }
            $data["status"] = ($admin_added ? "success" : "reload");
            $data = array_merge($data, $_POST);
            $this->render('admin/create.twig', $data);
        }


    }

}
