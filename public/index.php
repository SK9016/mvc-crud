<?php
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTP']), // Only over HTTPS
    'cookie_samesite' => 'Strict'
]);

require_once '../config/config.php';
require_once '../vendor/autoload.php';

use App\Controllers\UserController;
use Core\Router;

$router = new Router();
// Define routes using callable arrays

// Get all users list
$router->get('/users', [UserController::class, 'index']);

// Create a new user
$router->get('/user/create', [UserController::class, 'create']); // Show form
$router->post('/user/store', [UserController::class, 'store']); // Handle form submission

// Dispatch the request
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$uri = str_replace($scriptName, '', $_SERVER['REQUEST_URI']);

// echo '<pre>';
// var_dump($_SERVER['REQUEST_METHOD']);
// echo '</pre>';
$router->dispatch($_SERVER['REQUEST_METHOD'], $uri);
