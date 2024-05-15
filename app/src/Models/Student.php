<?php

namespace Models;

class Student
{
    private $id;
    private $name;
    private $surname;
    private $birthdate;
    private $email;
    private $department_id;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDepartmentId()
    {
        return $this->department_id;
    }

    public function setDepartmentId($departmentId)
    {
        $this->department_id = $departmentId;
    }
}
