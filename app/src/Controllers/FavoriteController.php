<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\Favorite as Favorite;
use Simplimmo\Repositories\FavoriteRepository as FavoriteRepository;

class FavoriteController extends Controller {
    protected Favorite $model;
    protected FavoriteRepository $repository;

    public function __construct() {
        parent::__construct();
        $this->model = new Favorite();
        $this->repository = new FavoriteRepository();
    }

    /**
     * 
     * Get all favorites of the current client, if logged
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
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
