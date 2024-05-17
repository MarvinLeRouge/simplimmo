<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Admin as Admin;

class AdminRepository extends Database
{
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM admin');

        $data = $req->fetchAll(PDO::FETCH_CLASS, Admin::class);

        return $data;
    }
    public function findById($admin_id): Admin
    {
        $req = $this->getDb()->prepare('SELECT * FROM admin WHERE id = :id');

        $req->execute([
            'id' => $admin_id
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, Admin::class);

        return $req->fetch();
    }

    public function create($login, $password, $added_date, $update_date): void
    {
        $query = 'INSERT INTO property (login, password, added_date, update_date)
                VALUES (:login, :password, :added_date, :update_date)';

        $req = $this->getDb()->prepare($query);

         $req->execute([
            'login' => $login,
            'password' => $password,
            'added_date' => $added_date,
            'update_date' => $update_date
        ]);
    }
    public function delete($admin_id): void
    {
        $query = 'SELECT * FROM admin WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $admin_id
        ]);
    }

    public function update($admin_id, $login, $password, $added_date, $update_date): void
    {
        $query = 'UPDATE admin SET login = :login, password = :password, added_date = :added_date, update_date = :update_date WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $admin_id,
            'login' => $login,
            'password' => $password,
            'added_date' => $added_date,
            'update_date' => $update_date
        ]);
    }
}
