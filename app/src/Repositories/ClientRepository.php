<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Client as Client;

class ClientRepository extends Database
{
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM client');

        $data = $req->fetchAll(PDO::FETCH_CLASS, Client::class);

        return $data;
    }
    public function findById($client_id): array
    {
        $req = $this->getDb()->prepare('SELECT * FROM client WHERE id = :id');

        $req->execute([
            'id' => $client_id
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, Client::class);

        return $req->fetch();
    }

    public function create($first_name, $last_name, $phone_number, $email, $password, $added_date, $update_date): void
    {
        $query = 'INSERT INTO property (firstname, lastname, phone_number, email, password, added_date, update_date)
                VALUES ( :firstname, :lastname, :phone_number, :email, :password, :added_date, :update_date)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'firstname' => $first_name,
            'lastname' => $last_name,
            'phone_number' => $phone_number,
            'email' => $email,
            'password' => $password,
            'added_date' => $added_date,
            'update_date' => $update_date
        ]);
    }

    public function delete($client_id): void
    {
        $query = 'SELECT * FROM client WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $client_id
        ]);
    }

    public function update($client_id, $first_name, $last_name, $phone_number, $email, $password, $added_date, $update_date): void
    {
        $query = 'UPDATE client SET firstname = :firstname, lastname = :lastname, phone_number = :phone_number, email = :email, password = :password, added_date = :added_date, update_date = :update_date WHERE id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'firstname' => $first_name,
            'lastname' => $last_name,
            'phone_number' => $phone_number,
            'email' => $email,
            'password' => $password,
            'added_date' => $added_date,
            'update_date' => $update_date,
            'id' => $client_id
        ]);
    }
}
