<?php 
declare(strict_types=1);


/*
                        Example 2: Database Connection Using PDO
                        ========================================
    Write a simple PHP script to display a connection success message when the connection
    to the database is established successfully. 
*/
// Initialize the connection parameters
$dsn = "mysql:host=localhost;dbname=test";
$username = "root";
$password = "";

// Try to connect to the database
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to `test` database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

