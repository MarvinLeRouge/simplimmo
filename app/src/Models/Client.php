<?php

namespace Simplimmo\Models;

use Simplimmo\Models\User as User;

class Client extends User
{

    protected string $first_name;
    protected string $last_name;
    protected string $email;
    protected string $phone;
    protected string $password;

    /**
     *
     * @params ...
     *
     */
    public function __construct(protected $data = [])
    {
        parent::__construct($data);
        $this->first_name = $this->data['first_name'] ?? null;
        $this->last_name = $this->data['last_name'] ?? null;
        $this->email = $this->data['email'] ?? null;
        $this->phone = $this->data['phone'] ?? null;
        $this->password = $this->data['password'] ?? null;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): bool {
        $this->first_name = $first_name;
        return ($this->first_name == $first_name);
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function setLastName(string $last_name): bool {
        $this->last_name = $last_name;
        return ($this->last_name == $last_name);
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): bool {
        $this->email = $email;
        return ($this->email == $email);
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function setPhone(string $phone): bool {
        $this->phone = $phone;
        return ($this->phone == $phone);
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): bool {
        $this->password = $password;
        return ($this->password == $password);
    }
}