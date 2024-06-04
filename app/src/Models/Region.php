<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;

class Region extends Model
{
    protected int $id;
    protected string $name;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function getName(): string
    {
        return $this->name;
    }

}