<?php

namespace Simplimmo\Models;


use Simplimmo\Core\Model as Model;
use \DateTime;

class User extends Model
{
    protected int $id;
    protected string $login;
    protected string $password;
    protected DateTime $added_date;
    protected DateTime $updated_date;
    protected DateTime $last_access_date;

    /**
     * Constructor to initialize property attributes
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    // Getters and setters for each property with type hinting
    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): string
    {
        return $this->password = $password;
    }

    public function getAddedAt(): DateTime
    {
        return $this->added_at;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

}
