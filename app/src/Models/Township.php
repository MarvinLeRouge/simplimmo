<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;

class Township extends Model
{
    private $id;
    private string $name;
    private string $postalCode;
    private string $inseeCode;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->name = $data['name'] ?? '';
        $this->postalCode = $data['postalCode'] ?? '';
        $this->inseeCode = $data['inseeCode'] ?? '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getInseeCode(): string
    {
        return $this->inseeCode;
    }
}