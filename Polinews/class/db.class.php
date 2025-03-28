<?php
class db {
    // Property to hold the PDO connection
    private $conn;

    // Method to create/connect to the database
    public function BDD() {
        $server   = "localhost";
        $username = "root";
        $password = ""; // adjust according to your configuration

        try {
            // Connect to the MySQL server (without specifying a database)
            $this->conn = new PDO("mysql:host=$server", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create the database if it doesn't exist
            $sql = "CREATE DATABASE IF NOT EXISTS my_database";
            $this->conn->exec($sql);
            // Optional: echo a message if needed
            // echo "Database created successfully.<br>";

            // Select the database
            $this->conn->query("USE my_database");

            // Create the 'users' table if it doesn't exist
            $sql = "CREATE TABLE IF NOT EXISTS users (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        first_name VARCHAR(30) NOT NULL,
                        last_name VARCHAR(30) NOT NULL,
                        email VARCHAR(50),
                        registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
            $this->conn->exec($sql);
            // Optional: echo a message if needed
            // echo "Table 'users' created successfully.<br>";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    // Getter method to retrieve the PDO connection if needed elsewhere
    public function getConnection() {
        return $this->conn;
    }
}
?>
