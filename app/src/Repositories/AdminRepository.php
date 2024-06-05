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

    public function getByEmail($email): Admin {
        $req = $this->getDb()->prepare('SELECT * FROM admin WHERE email = :email');
        $req->execute(['email' => $email]);
        $data = $req->fetchAll(PDO::FETCH_CLASS, Admin::class);
        $data = $data[0] ?? [];

        return $data;
    }

    public function access($admin_id): bool {
        $req = $this->getDb()->prepare('UPDATE admin SET last_access_date = NOW() WHERE admin_id = :admin_id');
        $result = $req->execute(['admin_id' => $admin_id]);

        return $result;
    }


    public function create($data): bool
    {
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

        $query = 'INSERT INTO admin (email, password) VALUES (:email, :password)';
        $req = $this->getDb()->prepare($query);

        $result = $req->execute($data);

        return $result;
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
