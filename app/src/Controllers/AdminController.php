<?php
namespace Simplimmo\Controllers;
use Simplimmo\Core\Controller as Controller;
use Simplimmo\Models\Admin as Admin;
use Simplimmo\Repositories\AdminRepository as AdminRepository;

class AdminController extends Controller {
    protected Admin $model;
    protected AdminRepository $repository;

    public function __construct() {
        parent::__construct();
        $this->model = new Admin();
        $this->repository = new AdminRepository();
    }
    
    /**
     * 
     * Get all features for admin
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
    public function login() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
    }

}
