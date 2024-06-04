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
    public function getById($client_id): array
    {
        $req = $this->getDb()->prepare('SELECT * FROM client WHERE client_id = :client_id');

        $req->execute([
            'client_id' => $client_id
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, Client::class);

        return $req->fetch();
    }

    public function create($first_name, $last_name, $phone_number, $email, $password, $added_date, $updated_date): void
    {
        $query = 'INSERT INTO property (firstname, lastname, phone_number, email, password)
                VALUES ( :firstname, :lastname, :phone_number, :email, :password)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'firstname' => $first_name,
            'lastname' => $last_name,
            'phone_number' => $phone_number,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function delete($client_id): void
    {
        $query = 'SELECT * FROM client WHERE client_id = :client_id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'client_id' => $client_id
        ]);
    }

    public function update($client_id, $first_name, $last_name, $phone_number, $email, $password): void
    {
        $query = 'UPDATE client SET firstname = :firstname, lastname = :lastname, phone_number = :phone_number, email = :email, password = :password WHERE client_id = :client_id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'firstname' => $first_name,
            'lastname' => $last_name,
            'phone_number' => $phone_number,
            'email' => $email,
            'password' => $password,
            'client_id' => $client_id
        ]);
    }
}
