<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\Front\HomeController;

$router = new Router();

$router->add('GET', '/', [HomeController::class, 'index']); 

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
