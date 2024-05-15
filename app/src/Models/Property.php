<?php
namespace Simplimmo\Models\Property;


use Simplimmo\Core\Model as Model;
use \DateTime;
class Property extends Model {
    protected int $id;
    protected string $property_type;
    protected string $listing_type;
    protected float $price;
    protected int $property_rooms;
    protected int $property_bedrooms;
    protected string $description;
    protected string $property_address;
    protected int $geolocation_township_id;
    protected float $living_space_area;
    protected string $energetic_class_type;
    protected string $ges_class_type;
    protected int $year_of_construction;
    protected array $characteristics;
    protected DateTime $added_date;
    protected DateTime $update_date;
    protected DateTime $access_date;

    /**
     * Constructor to initialize property attributes
     *
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        $this->id = $data['id'] ;
        $this->property_type = $data['property_type'] ?? '';
        $this->listing_type = $data['listing_type'] ?? '';
        $this->price = $data['price'] ?? 0.0;
        $this->property_rooms = $data['property_rooms'] ?? 0;
        $this->property_bedrooms = $data['property_bedrooms'] ?? 0;
        $this->description = $data['description'] ?? '';
        $this->property_address = $data['property_address'] ?? '';
        $this->geolocation_township_id = $data['geolocation_township_id'] ?? 0;
        $this->living_space_area = $data['living_space_area'] ?? 0.0;
        $this->energetic_class_type = $data['energetic_class_type'] ?? '';
        $this->ges_class_type = $data['ges_class_type'] ?? '';
        $this->year_of_construction = $data['year_of_construction'] ?? 0;
        $this->characteristics = $data['caracteristics'] ?? [];
        $this->added_date = new DateTime($data['added_date'] ?? 'now');
        $this->update_date = new DateTime($data['update_date'] ?? 'now');
        $this->access_date = new DateTime($data['access_date'] ?? 'now');
    }

    // Getters and setters for each property with type hinting
    public function getPropertyId(): int {
        return $this->property_id;
    }
    public function getPropertyType(): string {
        return $this->property_type;
    }

    public function setPropertyType(string $property_type): void {
        $this->property_type = $property_type;
    }

    public function getListingType(): string {
        return $this->listing_type;
    }

    public function setListingType(string $listing_type): void {
        $this->listing_type = $listing_type;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getPropertyRooms(): int {
        return $this->property_rooms;
    }

    public function setPropertyRooms(int $property_rooms): void {
        $this->property_rooms = $property_rooms;
    }

    public function getPropertyBedrooms(): int {
        return $this->property_bedrooms;
    }

    public function setPropertyBedrooms(int $property_bedrooms): void {
        $this->property_bedrooms = $property_bedrooms;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getPropertyAddress(): string {
        return $this->property_address;
    }

    public function setPropertyAddress(string $property_address): void {
        $this->property_address = $property_address;
    }

    public function getGeolocationTownshipId(): int {
        return $this->geolocation_township_id;
    }

    public function setGeolocationTownshipId(int $geolocation_township_id): void {
        $this->geolocation_township_id = $geolocation_township_id;
    }

    public function getLivingSpaceArea(): float {
        return $this->living_space_area;
    }

    public function setLivingSpaceArea(float $living_space_area): void {
        $this->living_space_area = $living_space_area;
    }

    public function getEnergeticClassType(): string {
        return $this->energetic_class_type;
    }

    public function setEnergeticClassType(string $energetic_class_type): void {
        $this->energetic_class_type = $energetic_class_type;
    }

    public function getGesClassType(): string {
        return $this->ges_class_type;
    }

    public function setGesClassType(string $ges_class_type): void {
        $this->ges_class_type = $ges_class_type;
    }

    public function getYearOfConstruction(): int {
        return $this->year_of_construction;
    }

    public function setYearOfConstruction(int $year_of_construction): void {
        $this->year_of_construction = $year_of_construction;
    }

    public function getCharacteristics(): array {
        return $this->characteristics;
    }

    public function setCharacteristics(array $characteristics): void {
        $this->characteristics = $characteristics;
    }

    public function getAddedDate(): DateTime {
        return $this->added_date;
    }

    public function setAddedDate(DateTime $added_date): void {
        $this->added_date = $added_date;
    }

    public function getUpdateDate(): DateTime {
        return $this->update_date;
    }

    public function setUpdateDate(\DateTime $update_date): void {
        $this->update_date = $update_date;
    }

    public function getAccessDate(): DateTime {
        return $this->access_date;
    }

    public function setAccessDate(DateTime $access_date): void {
        $this->access_date = $access_date;
    }
}
