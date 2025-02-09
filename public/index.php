<?php
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTP']), // Only over HTTPS
    'cookie_samesite' => 'Strict'
]);

require_once '../vendor/autoload.php';

use App\Controllers\UserController;
use Core\Router;

$router = new Router();
// Define routes using callable arrays
$router->get('/user', [UserController::class, 'index']);
// $router->get('/user/edit', [UserController::class, 'edit']);
// $router->post('/user/update', [UserController::class, 'update']);

// Dispatch the request
// $router->dispatch($_SERVER['REQUEST_METHOD'], '/user');
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$uri = str_replace($scriptName, '', $_SERVER['REQUEST_URI']);
// $uri = trim($uri, '/');
// echo '<pre>';
// var_dump($uri);
// // var_dump(isset($this->routes[$method][$url]));
// echo '</pre>';
$router->dispatch($_SERVER['REQUEST_METHOD'], $uri);
