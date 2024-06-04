<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;

class Department extends Model
{
    protected int $id;
    protected string $name;
    protected int $number;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

}