<?php

namespace App\Models;

use Core\Database;
use PDO;

class User
{
    private $conn;
    private $table_name = "users";  // The table we're interacting with

    public function __construct()
    {
        // Create a new instance of the Database class
        $database = new Database();
        $this->conn = $database->getConnection();  // Get the database connection
    }

    // Method to fetch all users
    public function getUsers()
    {
        $query = "SELECT * FROM " . $this->table_name;  // SQL query to get all users

        // Prepare the query and execute
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Return the results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($name, $email)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table_name . " (name, email) VALUES (:name, :email)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }
}
