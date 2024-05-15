<?php

namespace Simplimmo\Models\Property;

use Simplimmo\Core\Model as Model;

class Region extends Model
{
    protected int $id;
    protected string $name;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->id = $data['id'] ?? 0;
        $this->name = $data['name'] ?? '';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

}