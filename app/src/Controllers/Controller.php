<?php
namespace Simplimmo\Controllers;

class Controller {
    use \Simplimmo\Services\Response;

    public function __construct() {
        zlog(get_class($this) . " instantiation");
    }
}

