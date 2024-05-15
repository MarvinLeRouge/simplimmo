<?php

namespace Repositories;

use \PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\House as House;

class HouseRepository extends Database
{

    public function getAll()
    {
        $req = $this->getDb()->query('SELECT * FROM property WHERE property_type = "house"');

        $data = $req->fetchAll(PDO::FETCH_CLASS, House::class);

        return $data;
    }

    public function findById($house_id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM property WHERE property_type = "house" AND id = :id');

        $req->execute([
            'id' => $house_id
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, House::class);

        return $req->fetch();
    }


    public function create($property_type, $listing_type, $price, $property_rooms, $property_bedrooms,
                           $description, $property_address, $township_id, $living_space_area,
                           $energetic_class_type, $ges_class_type, $year_of_construction, $characteristics,
                           $added_date, $update_date, $access_date)
    {
        $query = 'INSERT INTO student (property_type, listing_type, price, property_rooms, property_bedrooms,
        description, property_address, township_id, living_space_area, energetic_class_type, ges_class_type,
        year_of_construction, characteristics, added_date, update_date, access_date)
        VALUES (:property_type, :listing_type, :price, :property_rooms, :property_bedrooms,
        :description, :property_address, :township_id, :living_space_area, :energetic_class_type, :ges_class_type,
        :year_of_construction, :characteristics, :added_date, :update_date, :access_date)';

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
        ]);
    }

    public function delete($house_id)
    {
        $query = 'SELECT * FROM property WHERE property_type = "house" AND id = :id';

        $req = $this->getDb()->prepare($query);

        $req->execute([
            'id' => $house_id
        ]);
    }

    public function update($house_id,$property_type, $listing_type, $price, $property_rooms, $property_bedrooms,
                           $description, $property_address, $township_id, $living_space_area,
                           $energetic_class_type, $ges_class_type, $year_of_construction, $characteristics,
                           $added_date, $update_date, $access_date)
    {
        $query = 'UPDATE property set property_type= :property_type, listing_type= :listing_type, price= :price,
        property_rooms= :property_rooms, property_bedrooms= :property_bedrooms, description= :description,
        property_address= :property_address, township_id= :township_id, living_space_area= :living_space_area,
        energetic_class_type= :energetic_class_type, ges_class_type= :ges_class_type, year_of_construction= :year_of_construction,
        characteristics= :characteristics, added_date= :added_date, update_date= :update_date, access_date= :access_date
        WHERE property_type = house AND id = :id';


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
            'id' => $house_id
        ]);
    }
}
