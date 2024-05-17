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
        $this->id = $data['id'] ?? 0;
        $this->name = $data['name'] ?? '';
        $this->number = $data['number'] ?? 0;
    }

    public function getId(): int
    {
        return $this->id;
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