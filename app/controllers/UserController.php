<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        // Create an instance of the User model
        $userModel = new User();

        // Fetch all users from the database
        $users = $userModel->getUsers();

        // Include the view and pass the data
        include_once '../app/views/user/index.php';
    }

    public function create()
    {
        require_once '../app/views/user/create.php'; // Load the form
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            // Basic Validation
            if (empty($name) || empty($email)) {
                die('Name and Email are required.');
            }

            // Save to Database
            $userModel = new User();
            $userModel->createUser($name, $email);

            // Redirect after saving
            header("Location: " . BASE_URL . "/users");
            exit;
        }
    }
}
