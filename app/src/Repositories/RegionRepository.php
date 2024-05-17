<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Department as Region;

class RegionRepository extends Database
{
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM region');

        return $req->fetchAll(PDO::FETCH_CLASS, Region::class);
    }
    public function getById(int $region_id): Region
    {
        $req = $this->getDb()->prepare('SELECT * FROM region WHERE id = :id');
        $req->execute(['id' => $region_id]);
        return $req->fetch(PDO::FETCH_CLASS, Region::class);
    }
    public function getByName ($region_name): Region{
        $req = $this->getDb()->prepare('SELECT * FROM region WHERE name = :name');
        $req->execute(['name' => $region_name]);
        return $req->fetch(PDO::FETCH_CLASS, Region::class);
    }
}
