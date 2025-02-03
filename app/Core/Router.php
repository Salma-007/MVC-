<?php
namespace App\Core;
use App\Controllers\Front\HomeController;

class Router {
    private array $routes = [];

    // pour ajouter une route au systeme
    public function add(string $method, string $path, callable|array $action): void {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'action' => $action
        ];
    }

    public function dispatch(string $requestUri, string $requestMethod): void {
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($requestMethod) && $route['path'] === $requestUri) {
                if (is_callable($route['action'])) {
                    call_user_func($route['action']);
                } elseif (is_array($route['action'])) {
                    [$controller, $method] = $route['action'];
                    (new $controller)->$method();
                }
                return;
            }
        }

        http_response_code(404);
        echo "404 - Page non trouvée";
    }
}