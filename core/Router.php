<?php
namespace Core;

class Router {
    protected $routes = [];

    // Method to register routes
    public function get($route, $action) {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action) {
        $this->routes['POST'][$route] = $action;
    }

    // Dispatch request to the correct controller method
    public function dispatch($method, $url) {
        if (isset($this->routes[$method][$url])) {
            $action = $this->routes[$method][$url];

            if (is_array($action)) {
                $controllerName = $action[0]; // Class name
                $controllerMethod = $action[1]; // Method name

                $controller = new $controllerName(); // Instantiate the controller
                $controller->$controllerMethod(); // Call the method
                return;
            }
        }
        echo "404 Not Found!";
    }
}

