<?php
namespace Simplimmo\Classes;

// Inclut une seule fois le fichier de configuration pour accéder aux constantes de connexion à la base de données.
/*require_once __DIR__ . "/../config.php";*/
use \PDO;

/**
 * Classe Database pour gérer la connexion à la base de données.
 */
class Database {
    // Propriété privée pour stocker l'instance de la connexion PDO.
    private $db;

    /**
     * Constructeur de la classe Database.
     * Établit la connexion à la base de données lors de la création d'une instance de Database.
     */
    public function __construct() {
        // L'utilisation d'un bloc try-catch permet de capturer et gérer les exceptions pouvant survenir pendant l'exécution du code.
        try {
            // Initialise une connexion avec la base de données en utilisant l'extension PDO (PHP Data Objects).
            // Les informations de connexion sont récupérées à partir des variables définies dans `config.php`.
            $this->db = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ":" . $_ENV["DB_PORT"] . ";dbname=" . $_ENV["DB_DATABASE"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /* DEBUG */
            /*
            $statement = $this->db->prepare("SELECT * FROM geo_region");
            $statement->execute();
            $lines = $statement->fetchAll();
            zdebug($lines);
            */
            zlog("DB Connection Ok");
        } catch (Exception $error) {
            // En cas d'erreur de connexion, le script est arrêté et un message d'erreur est affiché.
            zlog("DB Connection failed");
            //die('Erreur : ' . $error->getMessage());
        }
    }

    /**
     * Méthode pour récupérer l'instance de la connexion à la base de données.
     * 
     * @return PDO L'instance de PDO représentant la connexion à la base de données.
     */
    public function getDb()
    {
        return $this->db;
    }
}
