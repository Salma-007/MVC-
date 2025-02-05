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

    public function registerUser(){
        extract($_POST);
        $this->user->setNom($username);
        $this->user->setEmail($email);
        $this->user->setPassword($password);
        $this->user->registerUser();
        header('Location: login');
    }

}