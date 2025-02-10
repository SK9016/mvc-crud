<?php
namespace App\Controllers;

use App\Models\User;

class UserController {
    public function index() {
        // Create an instance of the User model
        $userModel = new User();
        
        // Fetch all users from the database
        $users = $userModel->getUsers();
        
        // Include the view and pass the data
        include_once '../app/views/user/index.php';
    }
}
?>
