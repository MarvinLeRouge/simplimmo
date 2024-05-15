<?php
namespace Simplimmo\Models;
use Simplimmo\Models\Property as Property;

class House extends Property {

    protected int $land_surface;

    /**
     *
     * @params ...
     *
     */
    public function __construct(protected $data = [])
    {
        parent::__construct($data);
        $this->land_surface = $this->data['land_surface'] ?? 0;
    }

    public function getLandSurface(): int
    {
        return $this->land_surface;
    }

    public function setLandSurface(int $land_surface): int
    {
        return $this->land_surface = $land_surface;
    }

}