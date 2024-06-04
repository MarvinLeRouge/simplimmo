<?php
namespace Simplimmo\Repositories;

use Simplimmo\Models\Apartment as Apartment;
use Simplimmo\Repositories\PropertyRepository as PropertyRepository;

class ApartmentRepository extends PropertyRepository {

    public function getAll(): array {
        $req = $this->getDb()->query('SELECT * FROM property WHERE building_type = "apartment"');
        $data = $req->fetchAll(PDO::FETCH_CLASS, Apartment::class);

        return $data;
    }

    public function create($data) : void {
        $data["building_type"] = "apartment";
        parent::create($data);
    }
}
