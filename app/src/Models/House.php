<?php
namespace Simplimmo\Models;
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

    public function getLevels(): int {
        return $this->levels;
    }

    public function setLevels(int $levels): bool {
        $this->levels = $levels;
        return ($this->levels == $levels);
    }

    public function getLandSurface(): int {
        return $this->land_surface;
    }

    public function setLandSurface(int $land_surface): bool {
        $this->land_surface = $land_surface;
        return ($this->land_surface == $land_surface);
    }

}