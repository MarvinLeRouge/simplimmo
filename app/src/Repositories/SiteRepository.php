<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Site as Site;

class SiteRepository extends Database {

    public function setContact($data): bool {
        $query = 'INSERT INTO contact (name, email, msg) VALUES (:name, :email, :msg)';
        $req = $this->getDb()->prepare($query);
        $result = $req->execute($data);

        return $result;
    }
}
