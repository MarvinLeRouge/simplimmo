<?php
namespace Simplimmo\Controllers;
use Simplimmo\Controllers\PropertyController as PropertyController;
use Simplimmo\Models\House as House;
use Simplimmo\Repositories\HouseRepository as HouseRepository;
use Simplimmo\Services\Utils as Utils;

class HouseController extends PropertyController {

    public function __construct() {
        parent::__construct();
        $this->model = new House();
        $this->repository = new HouseRepository();
    }

    /**
     * 
     * Get list of all houses
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $data = $this->repository->getAll();
        foreach($data as $i => $row) {
            $url = Utils::buildUrl([Utils::stdReplace($row->getBuildingType()), $row->getTitle()], $row->getId());
            $data[$i] = ["property" => $row, "url" => $url];
        }
        zdebug($data);
        $this->render('property/house_list.twig', ['properties' => $data]);
    }

    /**
     * 
     * Get details about one property
     * 
     */
    public function details($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
        $data = $this->repository->getById($id);
        $this->render('property/house.twig', ['data' => $data]);
    }

    /**
     * 
     * Create a new house, and returns info (sucess|failure + id|null)
     * 
     */
    public static function create($params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $params);
        $this->model->create($params);
    }

    /**
     * 
     * Get a house from the model, from the id
     * 
     */
    public static function read($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Update a house, identified by its id
     * 
     */
    public static function update($id, $params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Delete a house, identified by its id
     * 
     */
    public static function delete($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

}
