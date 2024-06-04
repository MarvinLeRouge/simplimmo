<?php

namespace Simplimmo\Repositories;

use \PDO as PDO;
use Simplimmo\Models\House as House;
use Simplimmo\Repositories\PropertyRepository as PropertyRepository;

class HouseRepository extends PropertyRepository {

    public function getAll(): array {
        $req = $this->db->query('SELECT * FROM property WHERE building_type = "house"');      
        $data = $req->fetchAll(PDO::FETCH_CLASS, House::class);

        return $data;
    }
  
    public function create($data) : void {
        $data["building_type"] = "house";
        parent::create($data);
    }
}
