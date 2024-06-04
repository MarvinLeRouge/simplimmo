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
    public function getById($admin_id): Admin
    {
        $req = $this->getDb()->prepare('SELECT * FROM admin WHERE admin_id = :admin_id');

        $req->execute([
            'admin_id' => $admin_id
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, Admin::class);

        return $req->fetch();
    }

    public function create($login, $password): void
    {
        $query = 'INSERT INTO admin (login, password)
                VALUES (:login, :password)';

        $req = $this->getDb()->prepare($query);

         $req->execute([
            'login' => $login,
            'password' => $password,
        ]);
    }
    public function delete($admin_id): void
    {
        $query = 'DELETE FROM admin WHERE admin_id = :admin_id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'admin_id' => $admin_id
        ]);
    }

    public function update($admin_id, $login, $password,): void
    {
        $query = 'UPDATE admin SET login = :login, password = :password WHERE admin_id = :admin_id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'admin_id' => $admin_id,
            'login' => $login,
            'password' => $password
        ]);
    }
}
