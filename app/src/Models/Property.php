<?php
namespace Simplimmo\Models\Property;

use Simplimmo\Core\Model as Model;

class Property extends Model {
    /**
     * 
     * @params ...
     * 
     */
    public function __construct(protected $data = []) {
        parent::__construct($data);
    }
}