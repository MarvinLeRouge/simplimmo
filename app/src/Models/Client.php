<?php

namespace Simplimmo\Models;

use Simplimmo\Models\User as User;

class Client extends User
{

    protected string $first_name;
    protected string $last_name;
    protected string $email;
    protected string $phone_number;

    /**
     *
     * @params ...
     *
     */
    public function __construct(protected $data = [])
    {
        parent::__construct($data);
        $this->first_name = $this->data['first_name'] ?? '';
        $this->last_name = $this->data['last_name'] ?? '';
        $this->email = $this->data['email'] ?? '';
        $this->phone_number = $this->data['phone_number'] ?? '';
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }
}