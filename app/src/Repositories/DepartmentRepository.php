<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Department as Department;

class DepartmentRepository extends Database
{
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM department');

        $data = $req->fetchAll(PDO::FETCH_CLASS, Department::class);

        return $data;
    }

    public function getById(int $department_id):Department
    {
        $req = $this->getDb()->prepare('SELECT * FROM department WHERE id = :id');
        $req->execute(['id' => $department_id]);
        $data = $req->fetch(PDO::FETCH_CLASS, Department::class);
        return $data;
    }
    public function getByName ($department_name) :Department{
        $req = $this->getDb()->prepare('SELECT * FROM department WHERE name = :name');
        $req->execute(['name' => $department_name]);
        return $req->fetch(PDO::FETCH_CLASS, Department::class);
    }
    public function getByNumber($department_number): Department{
        $req = $this->getDb()->prepare('SELECT * FROM department WHERE number = :number');
        $req->execute(['name' => $department_number]);
        return $req->fetch(PDO::FETCH_CLASS, Department::class);
    }
}
