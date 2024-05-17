<?php
namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\Apartment as Apartment;

class ApartmentRepository extends Database
{

    public function getAll(): array
    {
        $req = $this->getDb()->query('SELECT * FROM property WHERE property_type = "apartment"');

        $data = $req->fetchAll(PDO::FETCH_CLASS, Apartment::class);

        return $data;
    }

    public function findById($apartment_id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM property WHERE property_type = "apartment" AND id = :id');

        $req->execute([
            'id' => $apartment_id
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, Apartment::class);

        return $req->fetch();
    }


    public function create($property_type, $listing_type, $price, $property_rooms, $property_bedrooms,
                           $description, $property_address, $township_id, $living_space_area,
                           $energetic_class_type, $ges_class_type, $year_of_construction, $characteristics,
                           $added_date, $update_date, $access_date, $is_furnished, $levels) : void
    {
        $query = 'INSERT INTO property (property_type, listing_type, price, property_rooms, property_bedrooms,
        description, property_address, township_id, living_space_area, energetic_class_type, ges_class_type,
        year_of_construction, characteristics, added_date, update_date, access_date, is_furnished, levels)
        VALUES (:property_type, :listing_type, :price, :property_rooms, :property_bedrooms,
        :description, :property_address, :township_id, :living_space_area, :energetic_class_type, :ges_class_type,
        :year_of_construction, :characteristics, :added_date, :update_date, :access_date, :is_furnished, :levels)';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'property_type' => $property_type,
            'listing_type' => $listing_type,
            'price' => $price,
            'property_rooms' => $property_rooms,
            'property_bedrooms' => $property_bedrooms,
            'description' => $description,
            'property_address' => $property_address,
            'township_id' => $township_id,
            'living_space_area' => $living_space_area,
            'energetic_class_type' => $energetic_class_type,
            'ges_class_type' => $ges_class_type,
            'year_of_construction' => $year_of_construction,
            'characteristics' => $characteristics,
            'added_date' => $added_date,
            'update_date' => $update_date,
            'access_date' => $access_date,
            'is_furnished' => $is_furnished,
            'levels' => $levels
        ]);
    }

    public function delete($apartment_id) : void
    {
        $query = 'SELECT * FROM property WHERE property_type = "apartment" AND id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $apartment_id
        ]);
    }

    public function update($house_id, $property_type, $listing_type, $price, $property_rooms, $property_bedrooms,
                           $description, $property_address, $township_id, $living_space_area,
                           $energetic_class_type, $ges_class_type, $year_of_construction, $characteristics,
                           $added_date, $update_date, $access_date,$is_furnished, $levels) : void
    {
        $query = 'UPDATE property set property_type= :property_type, listing_type= :listing_type, price= :price,
        property_rooms= :property_rooms, property_bedrooms= :property_bedrooms, description= :description,
        property_address= :property_address, township_id= :township_id, living_space_area= :living_space_area,
        energetic_class_type= :energetic_class_type, ges_class_type= :ges_class_type, year_of_construction= :year_of_construction,
        characteristics= :characteristics, added_date= :added_date, update_date= :update_date, access_date= :access_date,
        is_furnished= :is_furnished, levels= :levels WHERE property_type = house AND id = :id';


        $req = $this->getDb()->prepare($query);

        $req->execute([
            'property_type' => $property_type,
            'listing_type' => $listing_type,
            'price' => $price,
            'property_rooms' => $property_rooms,
            'property_bedrooms' => $property_bedrooms,
            'description' => $description,
            'property_address' => $property_address,
            'township_id' => $township_id,
            'living_space_area' => $living_space_area,
            'energetic_class_type' => $energetic_class_type,
            'ges_class_type' => $ges_class_type,
            'year_of_construction' => $year_of_construction,
            'characteristics' => $characteristics,
            'added_date' => $added_date,
            'update_date' => $update_date,
            'access_date' => $access_date,
            'is_furnished' => $is_furnished,
            'levels' => $levels,
            'id' => $house_id
        ]);
    }
}
