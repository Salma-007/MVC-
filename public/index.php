<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\Front\HomeController;
use App\Controllers\Front\PostController;
use App\Controllers\Front\AuthController;
use App\config\Database;
use App\Services\Session;

// starting the session
Session::start();

$router = new Router(); 

$router->add('GET', '/', [HomeController::class, 'index']); 
$router->add('GET', '/test', [HomeController::class, 'checkDatabase']); 
$router->add('GET', '/posts', [PostController::class, 'posts']); 
$router->add('GET', '/logout', [AuthController::class, 'logingout']); 
$router->add('GET', '/login', [HomeController::class, 'loginpage']);
$router->add('POST', '/loginTo', [AuthController::class, 'signInUser']);
$router->add('GET', '/register', [HomeController::class, 'registerpage']);
$router->add('POST', '/registerUser', [AuthController::class, 'registerUser']);
$router->add('GET', '/post/{id}', [PostController::class, 'post']);


$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
