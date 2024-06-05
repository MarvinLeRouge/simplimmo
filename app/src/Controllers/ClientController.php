<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\Client as Client;
use Simplimmo\Repositories\ClientRepository as ClientRepository;

class ClientController extends Controller {
    protected Client $model;
    protected ClientRepository $repository;

    public function __construct() {
        parent::__construct();
        $this->model = new Client();
        $this->repository = new ClientRepository();
    }

    /**
     * 
     * Get all features available to clients
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        if(($_SESSION["client_email"]) && ($_SESSION["client_id"])) {
            zdebug("you are logged");
        }
        else {
            header("Location: /client/login");
        }
    }

    /**
     * 
     * Allows client to login
     * 
     */
    public function login() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        zdebug(__CLASS__ . " / " . __FUNCTION__);
        zdebug($_SESSION);
        $data = ["status" => "initial"];
        if((isset($_POST["form_src"])) && ($_POST["form_src"] == "client/login")) {
            $client_data = $_POST;
            unset($client_data["form_src"]);
            $infos_ok = $this->model->verify($client_data);
            $client_verified = false;
            if($infos_ok) {
                $client_data_db = $this->repository->getByEmail($client_data["email"]);
                $password_input = $client_data["password"];
                $password_db = $client_data_db->getPassword();
                $client_verified = password_verify($password_input, $password_db);
                if($client_verified) {
                    $_SESSION["client_email"] = $client_data_db->getEmail();
                    $_SESSION["client_id"] = $client_data_db->getId();

                }
                else {
                    session_destroy();
                }
            }
            $data["status"] = ($client_verified ? "success" : "error");
            $data = array_merge($data, $_POST);
        }
        $this->render('client/login.twig', $data);
    }

    /**
     * 
     * Create a new client, and returns info (sucess|failure + id|null)
     * 
     */
    public function create() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $data = ["status" => "initial"];
        if((isset($_POST["form_src"])) && ($_POST["form_src"] == "client/create")) {
            zdebug($_POST);
            $client_data = $_POST;
            unset($client_data["form_src"]);
            $infos_ok = $this->model->verify($client_data);
            if($infos_ok) {
                unset($client_data["password2"]);
                $client_added = $this->repository->create($client_data);
            }
            $data["status"] = ($client_added ? "success" : "reload");
            $data = array_merge($data, $_POST);
        }
        $this->render('client/create.twig', $data);
    }

    /**
     * 
     * Get an client from the model, from the id
     * 
     */
    public static function read($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Update an client, identified by its id
     * 
     */
    public static function update($id, $params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Delete a client, identified by its id
     * 
     */
    public static function delete($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }
}
