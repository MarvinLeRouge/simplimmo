<?php
namespace Simplimmo\Models\House;

use Simplimmo\Models\Property as Property;

class House extends Property {
    /**
     * 
     * @params ...
     * 
     */
    public function __construct(protected $data = []) {
        parent::__construct($data);
    }
}