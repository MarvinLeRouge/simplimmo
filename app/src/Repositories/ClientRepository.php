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

    public function getByEmail($email): Client {
        $req = $this->getDb()->prepare('SELECT * FROM client WHERE email = :email');
        $req->execute(['email' => $email]);
        $data = $req->fetchAll(PDO::FETCH_CLASS, Client::class);
        $data = $data[0] ?? [];

        return $data;
    }

    public function create($data): bool {
        zdebug($data);
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        $query = 'INSERT INTO client (first_name, last_name, email, phone, password)
                VALUES ( :first_name, :last_name, :email, :phone, :password)';

        $req = $this->getDb()->prepare($query);

        $result = $req->execute($data);

        return $result;
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
