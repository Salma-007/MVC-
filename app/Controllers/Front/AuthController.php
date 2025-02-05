<?php

namespace App\Controllers\Front;

use App\Core\View;
use App\config\Database;
use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller{
    private $user;
    
    public function __construct(){
        parent::__construct();
        $this->user = new User();
    }

    public function registerUser() {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (empty($username) || empty($email) || empty($password)) {
            $this->render('register', ['error' => 'All fields are required']);
            exit();
        }
        $this->user->setNom($username);
        $this->user->setEmail($email);
        $this->user->setPassword($password);

        $result = $this->user->registerUser();
        
        if (isset($result)) {
            $this->render('register', ['error' => $result]);
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }
    
    

    // sign in
    public function signInUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $this->render('login', ['error' => 'Tous les champs sont obligatoires.']);
                return;
            }
            $result = $this->user->loginTo($email, $password);

            if ($result) {
                header("Location: /posts");
                exit();
            } else {
                $this->render('login', ['error' => 'erreur de login']);
            }
        } else {
            $this->render('login', ['error' => 'Enter inputs']);
        }
    }
    

}