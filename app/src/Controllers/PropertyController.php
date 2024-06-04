<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\Property as Property;
use Simplimmo\Repositories\PropertyRepository as PropertyRepository;
use Simplimmo\Services\Utils as Utils;

class PropertyController extends Controller {
    protected Property $model;
    protected PropertyRepository $repository;

    public function __construct() {
        parent::__construct();
        $this->model = new Property();
        $this->repository = new PropertyRepository();
    }
    
    /**
     * 
     * Get list of all properties
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $data = $this->repository->getAll();
        foreach($data as $i => $row) {
            $url = Utils::buildUrl([$row->getBuildingType(), $row->getTitle()], $row->getId());
            zdebug($url);
        }
        $this->render('property/property_list.twig', ['properties' => $data]);
    }

    /**
     * 
     * Get details about one property
     * 
     */
    public function details($id) {
        $data = $this->repository->getById($id);
        $this->render('property/property.twig', ['data' => $data]);
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Ask for callback about a specific property
     * 
     */
    public function callMeBack($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }
}
