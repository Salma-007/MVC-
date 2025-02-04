<?php
namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/Front'); 
        $this->twig = new Environment($loader);
    }

    // Render the template with data
    public function render($view, $data = [])
    {
        echo $this->twig->render($view . '.twig', $data);
    }
}
