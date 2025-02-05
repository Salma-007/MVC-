<?php
namespace App\config;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database {
    private static ?PDO $instance = null; 

    private function __construct() {} 
    private function __clone() {} 
    public function __wakeup() {} 

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                // Charger les variables d'environnement
                $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
                $dotenv->load();

                // Récupérer les variables depuis .env
                $host = $_ENV['DB_HOST'];
                $dbname = $_ENV['DB_NAME'];
                $username = $_ENV['DB_USER'];
                $password = $_ENV['DB_PASS'];
                $driver = $_ENV['DB_DRIVER'];
                $port = $_ENV['DB_PORT'];
                

                $dsn = "$driver:host=$host;dbname=$dbname;port={$port}";

                // Création de la connexion PDO
                self::$instance = new PDO($dsn, $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false 
                ]);

            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}


?>