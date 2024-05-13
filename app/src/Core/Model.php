<?php
namespace Simplimmo\Core\Model;

class Model {
    protected $properties;

    public function __construct() {
        $this->properties = [];
        
    }

    public function set($property_name, $property_value) {
        $result = false;
        if (array_key_exists($property_name, $this->properties)) {
            $this->properties[$property_name] = $property_value;
            $result = true;
        }

        return $result;
    }

    public function get($property_name) {
        $result = $this->properties[$property_name] ?? null;

        return $result;
    }

}