<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;

class Client extends Model {

    protected ?int $client_id;
    protected string $first_name;
    protected string $last_name;
    protected string $email;
    protected string $phone;
    protected string $password;
    protected string $added_date;
    protected string $updated_date;

    /**
     *
     * @params ...
     *
     */
    public function __construct(protected $data = []) {
        parent::__construct($data);
    }

    public function getId()
    {
        return $this->client_id;
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

    public function verify($data) {
        $result = true;
        foreach($data as $label => $value) {
            $data[$label] = trim($value);
            $result = $result && !empty($value);
        }
        $result = $result && (isset($data["password2"]) ? ($data["password"] == $data["password2"]) : true);

        return $result;
    }
}