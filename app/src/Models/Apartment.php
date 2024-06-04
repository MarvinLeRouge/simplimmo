<?php

namespace Simplimmo\Models;

use Simplimmo\Models\Property as Property;

class Apartment extends Property {
    

    /**
     *
     * @params ...
     *
     */
    public function __construct(protected $data = []) {
        parent::__construct($data);
    }

    public function isFurnished(): bool {
        return $this->is_furnished;
    }

    public function setFurnished(bool $is_furnished): bool {
        $this->is_furnished = $is_furnished;
        return ($this->is_furnished == $is_furnished);
    }

}