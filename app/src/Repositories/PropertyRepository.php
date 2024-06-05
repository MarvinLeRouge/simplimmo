<?php
namespace Simplimmo\Repositories;

use \PDO as PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Property as Property;
use \DateTime;

class PropertyRepository extends Database {

    public function getAll(): array {
        $req = $this->getDb()->query('SELECT * FROM property');
        $data = $req->fetchAll(PDO::FETCH_CLASS, Property::class);

        return $data;
    }

    public function getById($property_id): Property {
        $req = $this->getDb()->prepare('SELECT * FROM property WHERE property_id = :property_id');
        $req->execute(['property_id' => $property_id]);
        $data = $req->fetchAll(PDO::FETCH_CLASS, Property::class);
        $data = $data[0] ?? [];

        return($data);

    }

    public function search($criteria): array {
        $data = [];

        // Construire ici les requètes de recherche
        /*
        Par type
        Par prix
        Par localisation (ville, département, région)
        */

        return $data;
    }

    public function create($data) : void {
        $query = 'INSERT INTO property (
            building_type, transaction_type, price, rooms, 
            bedrooms, description, address, township_id, 
            living_space_area, energetic_class_type, ges_class_type,
            year_of_construction, features, is_furnished, levels)
            VALUES (
                :building_type, :transaction_type, :price, :rooms, 
                :bedrooms, :description, :address, :township_id, 
                :living_space_area, :energetic_class_type, :ges_class_type,
                :year_of_construction, :features, :is_furnished, :levels)';

        $req = $this->getDb()->prepare($query);

        $req->execute($data);
    }

    public function delete($apartment_id) : void {
        $query = 'DELETE FROM property WHERE property_id = :property_id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'apartment_id' => $apartment_id
        ]);
    }

    public function update($data) : void {
        $query = 'UPDATE property SET 
            building_type = :building_type, transaction_type = :transaction_type, price = :price, rooms = :rooms, 
            bedrooms = :bedrooms, description = :description, address = :address, township_id = :township_id,
            living_space_area = :living_space_area, energetic_class_type= :energetic_class_type, ges_class_type= :ges_class_type,
            year_of_construction= :year_of_construction, features= :features, is_furnished= :is_furnished, levels= :levels WHERE property_id = :property_id';


        $req = $this->getDb()->prepare($query);

        $req->execute($data);
    }
}
