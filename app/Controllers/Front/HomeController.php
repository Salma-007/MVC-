<?php

namespace App\Controllers\Front;

use App\Core\View;
use App\config\Database;

class HomeController {
    public function index() {
        echo "Stop fix !";
    }

    public function checkDatabase() {
        try {
            $pdo = Database::getInstance(); 
            $pdo->query("SELECT 1"); 
            echo "Connexion à PostgreSQL réussie !";
        } catch (PDOException $e) {
            echo " Erreur de connexion : " . $e->getMessage();
        }
    }
}