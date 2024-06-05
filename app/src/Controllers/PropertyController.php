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
        if((isset($_POST["form_src"])) && ($_POST["form_src"] == "property/search")) {
            // Ici on recherche les propriétés correspondant aux critères recherchés
            $data = $this->repository->search($_POST);
        }        
        else {
            $data = $this->repository->getAll();
        }
        foreach($data as $i => $row) {
            $url = Utils::buildUrl([Utils::stdReplace($row->getBuildingType()), $row->getTitle()], $row->getId());
            $data[$i] = ["property" => $row, "url" => $url];
        }
        $this->render('property/property_list.twig', ['properties' => $data]);
    }

    /**
     * 
     * Get details about one property
     * 
     */
    public function details($property_id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $property_id);
        $data = $this->repository->getById($property_id);
        $this->render('property/property.twig', ['data' => $data]);
    }

    /**
     * 
     * Ask for callback about a specific property
     * 
     */
    public function callMeBack($property_id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $property_id);
        $data = $this->repository->getById($property_id);
        $msg = "Bonjour, je souhaite être recontacté concernant le bien suivant :\nType : " . ($data->getBuildingType() == "house" ? "maison" : "appartement") . "\n" . $data->getTitle() . " ID " . $property_id;
        $this->render('site/contact.twig', compact("msg"));

    }
}
