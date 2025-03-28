<?php
// Connection parameters
$server      = "localhost";
$username    = "root";
$password    = ""; // adjust according to your configuration

try {
    // Connect to the MySQL server (without specifying a database)
    $conn = new PDO("mysql:host=$server", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database (if it doesn't already exist)
    $sql = "CREATE DATABASE IF NOT EXISTS my_database";
    $conn->exec($sql);
    echo "Database created successfully.<br>";

    // Select the newly created database
    $conn->query("USE my_database");

    // Create a table called 'users'
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(30) NOT NULL,
                last_name VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

    $conn->exec($sql);
    echo "Table 'users' created successfully.<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
