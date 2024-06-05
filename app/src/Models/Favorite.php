<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;
use \DateTime;

class Favorite extends Model {
    private int $favorite_id;
    private int $property_id;
    private int $client_id;
    private DateTime $added_date;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function getPropertyId(): int
    {
        return $this->property_id;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

}