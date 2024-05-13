<?php
// Create connection
debug($_ENV);
try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ":" . $_ENV["DB_PORT"] . ";dbname=" . $_ENV["DB_DATABASE"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare("SELECT * FROM geo_region");
    $statement->execute();
    $lines = $statement->fetchAll();
    print("<pre>" . print_r($lines, true) . "</pre>");


    echo "coucou tout s'est bien passé";
}
catch(PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}



?> 