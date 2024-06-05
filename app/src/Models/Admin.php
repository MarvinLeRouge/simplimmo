<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;

class Admin extends Model {

    protected int $admin_id;
    protected string $email;
    protected string $password;
    protected string $added_date;
    protected string $updated_date;
    protected ?string $last_access_date;

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
        return $this->admin_id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): bool {
        $this->email = $email;
        return ($this->email == $email);
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