<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\Favorite as Favorite;
use Simplimmo\Repositories\FavoriteRepository as FavoriteRepository;
use Simplimmo\Repositories\PropertyRepository as PropertyRepository;
use Simplimmo\Services\Utils as Utils;

class FavoriteController extends Controller {
    protected Favorite $model;
    protected FavoriteRepository $repository;
    protected PropertyRepository $property_repository;

    public function __construct() {
        parent::__construct();
        $this->model = new Favorite();
        $this->repository = new FavoriteRepository();
        $this->property_repository = new PropertyRepository();
    }

    /**
     * 
     * Get all favorites of the current client, if logged
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $data = [];
        if($_SESSION["client_id"]) {
            $data = $this->repository->getByClientId($_SESSION["client_id"]);
            foreach($data as $i => $favorite) {
                $property = $this->property_repository->getById($favorite->getPropertyId());
                $url = Utils::buildUrl([Utils::stdReplace($property->getBuildingType()), $property->getTitle()], $property->getId());
                $data[$i] = compact("favorite", "property", "url");
            }
        }
        $this->render('favorite/client_favorite_list.twig', ["favorites" => $data]);
    }

    /**
     * 
     * Get détails about a favorite, identified by its id
     * 
     */
    public function details($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Create a new favorite, and returns info (sucess|failure + id|null)
     * 
     */
    public static function create($params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $params);
    }

    /**
     * 
     * Get a favorite from the model, from the id
     * 
     */
    public static function read($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Update a favorite, identified by its id
     * 
     */
    public static function update($id, $params) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Delete a favorite, identified by its id
     * 
     */
    public static function delete($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

}
