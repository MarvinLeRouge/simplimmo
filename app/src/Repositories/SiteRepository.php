<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Site as Site;

class SiteRepository extends Database
{
    /*
    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM admin');

        $data = $req->fetchAll(PDO::FETCH_CLASS, Admin::class);

        return $data;
    }
    */
}
