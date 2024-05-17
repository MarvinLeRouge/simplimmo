<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Favorites as Favorites;

class FavoritesRepository extends Database
{
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM favorites');

        return $req->fetchAll(PDO::FETCH_CLASS, Favorites::class);
    }

    public function getByClientId(int $client_id): Favorites
    {
        $req = $this->getDb()->prepare('SELECT * FROM favorites WHERE client_id = :client_id');
        $req->execute(['client_id' => $client_id]);
        return $req->fetch(PDO::FETCH_CLASS, Favorites::class);
    }

    public function getByPropertyId(int $property_id): Favorites
    {
        $req = $this->getDb()->prepare('SELECT * FROM favorites WHERE property_id = :property_id');
        $req->execute(['property_id' => $property_id]);
        return $req->fetch(PDO::FETCH_CLASS, Favorites::class);
    }

    public function add($client_id, $property_id): void
    {
        $req = $this->getDb()->prepare('INSERT INTO favorites (client_id, property_id) VALUES (:client_id, :property_id)');
        $req->execute([
            'client_id' => $client_id,
            'property_id' => $property_id
        ]);
    }

    public function delete($client_id, $property_id): void
    {
        $req = $this->getDb()->prepare('DELETE FROM favorites WHERE client_id = :client_id AND property_id = :property_id');
        $req->execute([
            'client_id' => $client_id,
            'property_id' => $property_id
        ]);
    }
}

