<?php

namespace App\Controllers\Front;

use App\Core\View;
use App\config\Database;
use App\Core\Controller;

class HomeController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        echo "the router is working, tape login in the url to login !";
    }

    public function loginpage(){
        $this->render('login');
    }

    public function registerpage(){
        $this->render('register');
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