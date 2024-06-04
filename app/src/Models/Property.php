<?php
namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;
use \DateTime;
class Property extends Model {
    protected ?int $property_id;
    protected string $building_type;
    protected string $transaction_type;
    protected int $price;
    protected int $rooms;
    protected int $bedrooms;
    protected string $title;
    protected string $description;
    protected ?int $township_id;
    protected ?string $address;
    protected int $living_space_area;
    protected string $energetic_class_type;
    protected string $ges_class_type;
    protected int $year_of_construction;
    protected ?array $features;
    protected ?string $added_date;
    protected ?string $updated_date;
    protected ?int $land_surface;
    protected int $levels;
    protected ?bool $is_furnished;
    

    /**
     * Constructor to initialize property attributes
     *
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
    }

    // Getters and setters for each property with type hinting
    public function getId(): int {
        return $this->property_id;
    }
    public function getBuildingType(): string {
        return $this->building_type;
    }

    public function setBuildingType(string $building_type): bool {
        $this->building_type = $building_type;
        return ($this->building_type == $building_type);
    }

    public function getTransactionType(): string {
        return $this->transaction_type;
    }

    public function setTransactionType(string $transaction_type): bool {
        $this->transaction_type = $transaction_type;
        return ($this->transaction_type == $transaction_type);

    }

    public function getPrice(): int {
        return $this->price;
    }

    public function setPrice(int $price): bool {
        $this->price = $price;
        return ($this->price == $price);
    }

    public function getRooms(): int {
        return $this->rooms;
    }

    public function setRooms(int $rooms): bool {
        $this->rooms = $rooms;
        return ($this->rooms == $rooms);
    }

    public function getBedrooms(): int {
        return $this->bedrooms;
    }

    public function setBedrooms(int $bedrooms): bool {
        $this->bedrooms = $bedrooms;
        return ($this->bedrooms == $bedrooms);
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): bool {
        $this->title = $title;
        return ($this->title == $title);
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): bool {
        $this->description = $description;
        return ($this->description == $description);
    }

    public function getTownshipId(): int {
        return $this->township_id;
    }

    public function setTownshipId(int $township_id): bool {
        $this->township_id = $township_id;
        return ($this->township_id == $township_id);
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): bool {
        $this->address = $address;
        return ($this->address == $address);
    }

    public function getLivingSpaceArea(): int {
        return $this->living_space_area;
        return ($this->building_type == $building_type);
    }

    public function setLivingSpaceArea(int $living_space_area): bool {
        $this->living_space_area = $living_space_area;
        return ($this->living_space_area == $living_space_area);
    }

    public function getEnergeticClassType(): string {
        return $this->energetic_class_type;
    }

    public function setEnergeticClassType(string $energetic_class_type): bool {
        $this->energetic_class_type = $energetic_class_type;
        return ($this->energetic_class_type == $energetic_class_type);
    }

    public function getGesClassType(): string {
        return $this->ges_class_type;
    }

    public function setGesClassType(string $ges_class_type): bool {
        $this->ges_class_type = $ges_class_type;
        return ($this->ges_class_type == $ges_class_type);
    }

    public function getYearOfConstruction(): int {
        return $this->year_of_construction;
    }

    public function setYearOfConstruction(int $year_of_construction): bool {
        $this->year_of_construction = $year_of_construction;
        return ($this->year_of_construction == $year_of_construction);
    }

    public function getFeatures(): array {
        return $this->features;
    }

    public function setFeatures(array $features): bool {
        $this->features = $features;
        return ($this->features == $features);
    }

    public function isFurnished(): bool {
        return $this->is_furnished;
    }

    public function setFurnished(bool $is_furnished): bool {
        $this->is_furnished = $is_furnished;
        return ($this->is_furnished == $is_furnished);
    }

    public function getAddedDate(): DateTime {
        return $this->added_date;
    }

    public function getUpdateDate(): DateTime {
        return $this->updated_date;
    }
}
