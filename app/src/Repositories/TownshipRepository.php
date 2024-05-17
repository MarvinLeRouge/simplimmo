<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Department as Township;

class TownshipRepository extends Database
{
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM township');

        $data = $req->fetchAll(PDO::FETCH_CLASS, Township::class);

        return $data;
    }

    public function getById(int $township_id): Township
    {
        $req = $this->getDb()->prepare('SELECT * FROM township WHERE id = :id');
        $req->execute(['id' => $township_id]);
        return $req->fetch(PDO::FETCH_CLASS, Township::class);
    }

    public function getByName($township_name): Township
    {
        $req = $this->getDb()->prepare('SELECT * FROM township WHERE name = :name');
        $req->execute(['name' => $township_name]);
        return $req->fetch(PDO::FETCH_CLASS, Township::class);
    }

    public function getByPostalCode($township_postal_code): Township
    {
        $req = $this->getDb()->prepare('SELECT * FROM township WHERE postal_code = :postal_code');
        $req->execute(['postal_code' => $township_postal_code]);
        return $req->fetch(PDO::FETCH_CLASS, Township::class);
    }

    public function getByInseeCode($township_insee_code): Township
    {
        $req = $this->getDb()->prepare('SELECT * FROM township WHERE insee_code = :insee_code');
        $req->execute(['insee_code' => $township_insee_code]);
        return $req->fetch(PDO::FETCH_CLASS, Township::class);
    }

}
