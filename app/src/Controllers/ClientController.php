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
    }

    /**
     * 
     * Allows client to login
     * 
     */
    public function login() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Create a new client, and returns info (sucess|failure + id|null)
     * 
     */
    public static function create($params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $params);
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
