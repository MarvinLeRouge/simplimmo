<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;
use \DateTime;

class Favorites extends Model
{

    private int $id;
    private int $property_id;
    private int $client_id;
    private DateTime $added_date;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->id = $data['id'] ?? 0;
        $this->property_id = $data['property_id'] ?? 0;
        $this->client_id = $data['client_id'] ?? 0;
        $this->added_date = new DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPropertyId(): int
    {
        return $this->property_id;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

    public function getAddedDate(): DateTime
    {
        return $this->added_date;
    }

    public function setAddedDate(DateTime $date): DateTime
    {
        return $this->added_date = $date;
    }
}