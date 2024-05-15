<?php
namespace Controllers;
use Controllers\Controller;

class PropertyController extends Controller {

    /**
     * 
     * Get list of all properties
     * 
     */
    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        zdebug(__CLASS__ . " / " . __FUNCTION__);
    }

    /**
     * 
     * Get details about one property
     * 
     */
    public function details($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
        zdebug(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }

    /**
     * 
     * Ask for callback about a specific property
     * 
     */
    public function callMeBack($id) {
        zlog(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
        zdebug(__CLASS__ . " / " . __FUNCTION__ . " / " . $id);
    }
}
