<?php

namespace Simplimmo\Models\House;

use Simplimmo\Models\Property as Property;

class Apartment extends Property
{
    protected bool $isFurnished;
    protected int $levels;

    /**
     *
     * @params ...
     *
     */
    public function __construct(protected $data = [])
    {
        parent::__construct($data);
        $this->isFurnished = $this->data['isFurnished'] ?? false;
        $this->levels = $this->data['levels'] ?? 0;
    }

    public function isFurnished(): bool
    {
        return $this->isFurnished;
    }

    public function setFurnished(bool $isFurnished): bool
    {
        return $this->isFurnished = $isFurnished;
    }

    public function getLevels(): int
    {
        return $this->levels;
    }

    public function setLevels(int $levels): int
    {
        return $this->levels = $levels;
    }


}