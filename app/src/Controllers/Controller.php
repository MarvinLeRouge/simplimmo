<?php
namespace Controllers;

class Controller {
    use \Services\Response;

    public function __construct() {
        zlog(get_class($this) . " instantiation");
    }
}

