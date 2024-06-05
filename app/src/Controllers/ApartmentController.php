<?php
namespace Simplimmo\Controllers;

use Simplimmo\Controllers\PropertyController as PropertyController;
use Simplimmo\Models\Apartment as Apartment;
use Simplimmo\Repositories\ApartmentRepository as ApartmentRepository;
use Simplimmo\Services\Utils as Utils;

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
        $data = $this->repository->getAll();
        foreach($data as $i => $row) {
            $url = Utils::buildUrl([Utils::stdReplace($row->getBuildingType()), $row->getTitle()], $row->getId());
            $data[$i] = ["property" => $row, "url" => $url];
        }
        $this->render('property/apartment_list.twig', ['properties' => $data]);
    }

    /**
     * 
     * Get details about one property
     * 
     */
    public function details($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
        $data = $this->repository->getById($id);
        $this->render('property/apartment.twig', ['data' => $data]);
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
