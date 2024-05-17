<?php

namespace Simplimmo\Repositories;

use PDO;
use Simplimmo\Classes\Database as Database;
use Simplimmo\Models\House as House;


class HouseRepository extends Database {
    public function getAll() {
        $req = $this->db->query('SELECT * FROM property WHERE property_type = "house"');
      
        $data = $req->fetchAll(PDO::FETCH_CLASS, House::class);

        return $data;
    }
  
    public function findById($house_id) {
        $req = $this->db->prepare('SELECT * FROM property WHERE property_type = "house" AND id = :id');

        $req->execute([
            'id' => $house_id
        ]);

        $req->setFetchMode(PDO::FETCH_CLASS, House::class);

        return $req->fetch();
    }

    public function create($property_type, $listing_type, $price, $property_rooms, $property_bedrooms,
                           $description, $property_address, $township_id, $living_space_area,
                           $energetic_class_type, $ges_class_type, $year_of_construction, $characteristics,
                           $added_date, $update_date, $access_date, $land_surface) : void
    {
        $query = 'INSERT INTO house (property_type, listing_type, price, property_rooms, property_bedrooms,
        description, property_address, township_id, living_space_area, energetic_class_type, ges_class_type,
        year_of_construction, characteristics, added_date, update_date, access_date, land_surface)
        VALUES (:property_type, :listing_type, :price, :property_rooms, :property_bedrooms,
        :description, :property_address, :township_id, :living_space_area, :energetic_class_type, :ges_class_type,
        :year_of_construction, :characteristics, :added_date, :update_date, :access_date, :land_surface)';

        $req = $this->db->prepare($query);

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
            'land_surface' => $land_surface
        ]);
    }

    public function delete($house_id) : void
    {
        $query = 'SELECT * FROM property WHERE property_type = "house" AND id = :id';

        $req = $this->db->prepare($query);

        $req->execute([
            'id' => $house_id
        ]);
    }

    public function update($house_id, $property_type, $listing_type, $price, $property_rooms, $property_bedrooms,
                           $description, $property_address, $township_id, $living_space_area,
                           $energetic_class_type, $ges_class_type, $year_of_construction, $characteristics,
                           $added_date, $update_date, $access_date, $land_surface) : void
    {
        $query = 'UPDATE property set property_type= :property_type, listing_type= :listing_type, price= :price,
        property_rooms= :property_rooms, property_bedrooms= :property_bedrooms, description= :description,
        property_address= :property_address, township_id= :township_id, living_space_area= :living_space_area,
        energetic_class_type= :energetic_class_type, ges_class_type= :ges_class_type, year_of_construction= :year_of_construction,
        characteristics= :characteristics, added_date= :added_date, update_date= :update_date, access_date= :access_date,
        land_surface= :land_surface WHERE property_type = house AND id = :id';


        $req = $this->db->prepare($query);

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
            'land_surface' => $land_surface,
            'id' => $house_id
        ]);
    }
}
