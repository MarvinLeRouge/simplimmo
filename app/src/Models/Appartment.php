<?php
namespace Simplimmo\Models;

use Simplimmo\Models\Property as Property;

class Appartment extends Property {
    /**
     * 
     * @params ...
     * 
     */
    public function __construct(protected $data = []) {
        parent::__construct($data);
    }
}