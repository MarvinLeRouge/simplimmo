<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;

class Township extends Model
{
    private $id;
    private string $name;
    private string $postal_code;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
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

}