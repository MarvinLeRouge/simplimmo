<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Department as Township;

class TownshipRepository extends Database {
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM geo_township');

        $data = $req->fetchAll(PDO::FETCH_CLASS, Township::class);

        return $data;
    }

    public function getById(int $township_id): Township {
        $req = $this->getDb()->prepare('SELECT * FROM geo_township WHERE township_id = :township_id');
        $req->execute(['township_id' => $township_id]);
        $data = $req->fetchAll(PDO::FETCH_CLASS, Township::class);
        $data = $data ? $data[0] : null;

        return $data;
    }

    public function getByName($township_name): array {
        $req = $this->getDb()->prepare('SELECT * FROM geo_township WHERE libelle like %:township_name%');
        $req->execute(['township_name' => $township_name]);
        $data = $req->fetchAll(PDO::FETCH_CLASS, Township::class);

        return $data;
    }

    public function getByZipcode($zipcode): Township {
        $req = $this->getDb()->prepare('SELECT t.* FROM geo_township t INNER JOIN geo_zipcode z ON t.township_id = z.township_id WHERE z.zipcode = :zipcode GROUP BY t.township_id');
        $req->execute(['zipcode' => $zipcode]);
        $data = $req->fetchAll(PDO::FETCH_CLASS, Township::class);

        return $data;
    }

}
