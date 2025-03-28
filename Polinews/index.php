<?php
// Declare a constant (if used for autoloading in your project)
define("CHARGE_AUTOLOAD", true);

// Include the db class (and any other required classes)
require_once("db.php");

// Start the session
session_start();

// Create a new instance of the db class and initialize the database connection
$pdo = new db();
$pdo->BDD();

// If you have a View class that takes the PDO connection, you might want to pass it like this:
require_once("View.php"); // Ensure this file exists and defines the View class

$vue = new View($pdo->getConnection());
echo $vue;
?>
