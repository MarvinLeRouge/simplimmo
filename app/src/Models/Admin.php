<?php

namespace Simplimmo\Models;

use Simplimmo\Models\User as User;

class Admin extends User
{
    private string $login;

    /**
     *
     * @params ...
     *
     */
    public function __construct(protected $data = [])
    {
        parent::__construct($data);
        $this->login = $this->data['login'];
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }
}