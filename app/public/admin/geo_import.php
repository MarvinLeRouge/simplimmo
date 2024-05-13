<?php
die();

// Create connection
try {
    $conn = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ":" . $_ENV["DB_PORT"] . ";dbname=" . $_ENV["DB_DATABASE"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection ok";
}
catch(PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

/*
$geo_path = __DIR__ . '/assets/geo_data/';

/*
Phase 1 : Données géographiques INSEE
*/
/*
// 1 Search geo files
$geo_files = glob($geo_path . "*.csv");

// 2 Parse each file
// 2a Régions
$regions_file = "v_region_2024.csv";
if (($open = fopen($geo_path . $regions_file, "r")) !== false) {
    $headers = fgetcsv($open, 1, ",");
    $headers_holders = [];
    debug($headers);
    foreach($headers as $header) {
        $headers_holders[] = "?";
    }
    $stmt = $conn->prepare("INSERT INTO geo_regions (" . implode(", ", $headers) . ") VALUES (" . implode(", ", $headers_holders) . ")");    
    while (($data = fgetcsv($open, ",")) !== false) {
        $statement = $conn->prepare("SELECT * FROM test");
        $statement->execute();
        $lines = $statement->fetchAll();
        print("<pre>" . print_r($lines, true) . "</pre>");
            $array[] = $data;
    }
    debug($array);
}
else {
    debug("no file");
}
fclose($open);
*/
/*
$lines = file($geo_path . $regions_file);
debug($lines);
$fields = array_shift($lines);
$fields[$num] = trim($field, "\"");
$fields = explode(",", $fields);

foreach($fields as $num => $field) {
    $fields[$num] = trim($field, "\"");
}
debug($fields);

*/

/* Phase 2 : Codes postaux et coordonnées GPS */
/*
$geo_data = json_decode(file_get_contents($geo_path . "cities.json"), true);
$cities = $geo_data["cities"];
$placeholder = "(?,?,?,?)";
$placeholders = [];
$data = [];
$latitude_min = 999;
$latitude_max = -999;
$longitude_min = 999;
$longitude_max = -999;
$latitudes = [];
$longitudes = [];
foreach($cities as $city) {
    extract($city);
    if(!$latitude || !$longitude) {
        debug($city);
    }
}
*/
/*
$latitude_min = min($latitudes);
$latitude_max = max($latitudes);
$longitude_min = min($longitudes);
$longitude_max = max($longitudes);
debug([$latitude_min, $latitude_max, $longitude_min, $longitude_max]);
$stmt = $conn->prepare("INSERT INTO zip_codes(com, zip_code, latitude, longitude) VALUES " . implode(", ", $placeholders));
$stmt->execute($data);
*/
/*5.932599
$nb_traites = 0;
$nb_total = count($cities);
$old_pourcentage = 0;
foreach($cities as $city) {
    $insee_code = $zip_code = $latitude = $longitude = null;
    extract($city);
    //debug([$zip_code, $label, $latitude, $longitude, $insee_code]);
    $stmt->execute([$zip_code, $latitude, $longitude, $insee_code]);
    $nb_traites++;
    if($nb_traites % 100 == 0) {
        $new_pourcentage = ceil($nb_traites * 100 / $nb_total);
        if($new_pourcentage != $old_pourcentage) {
            debug("Avancement : $new_pourcentage%");
            $old_pourcentage = $new_pourcentage;
        }
        
    }
}
*/

