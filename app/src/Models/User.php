<?php

namespace Simplimmo\Models\User;


use Simplimmo\Core\Model as Model;
use \DateTime;

class User extends Model
{
    protected int $id;
    protected string $password;
    protected DateTime $added_at;
    protected DateTime $updated_at;

    /**
     * Constructor to initialize property attributes
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->id = $data['id'] ?? 0;
        $this->password = $data['password'] ?? '';
        $this->added_at = new DateTime();
        $this->updated_at = new DateTime();
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
