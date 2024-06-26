<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\ContactClientProperty as ContactClientProperty;
use Simplimmo\Repositories\ContactClientPropertyRepository as ContactClientPropertyRepository;

class ContactClientPropertyController extends Controller {
    protected ContactClientProperty $model;
    protected ContactClientPropertyRepository $repository;

    public function __construct() {
        parent::__construct();
        $this->model = new ContactClientProperty();
        $this->repository = new ContactClientPropertyRepository();
    }
    
    /**
     * 
     * Get list of all contact requests from clients about propreties
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Get details of one specific contact requests
     * 
     */
    public function details($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Create a new contact request, and returns info (sucess|failure + id|null)
     * 
     */
    public static function create($params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $params);
    }

    /**
     * 
     * Get a contact request from the model, from the id
     * 
     */
    public static function read($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Update a contact request, identified by its id
     * 
     */
    public static function update($id, $params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Delete a contact request, identified by its id
     * 
     */
    public static function delete($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

}
