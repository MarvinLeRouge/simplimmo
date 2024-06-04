<?php
namespace Simplimmo\Controllers;
use Simplimmo\Controllers\PropertyController as PropertyController;
use Simplimmo\Models\Apartment as Apartment;
use Simplimmo\Repositories\ApartmentRepository as ApartmentRepository;

class ApartmentController extends PropertyController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Apartment();
        $this->repository = new ApartmentRepository();
    }

    /**
     * 
     * Get list of all apartments
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
    public function details($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Create a new apartment, and returns info (sucess|failure + id|null)
     * 
     */
    public static function create($params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $params);
    }

    /**
     * 
     * Get an apartment from the model, from the id
     * 
     */
    public static function read($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Update an apartment, identified by its id
     * 
     */
    public static function update($id, $params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Delete an apartment, identified by its id
     * 
     */
    public static function delete($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

}
