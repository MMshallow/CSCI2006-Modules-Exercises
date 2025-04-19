<?php 
declare(strict_types=1);


/*
                        Example 1: Connection Success
                        ============================
    Write a simple PHP script to display a connection success message when the connection
    to the database is established successfully. 
*/
// Initialize the connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'test'; // You must create this database in PHPMyAdmin.

// Create a new mysqli instance
$conn = new mysqli($host, $username, $password, $database);

// Check if the database connection failed.
if ($conn->connect_error) {
    die('Connection failed! '. $conn->connect_error);
}

// If there is no connection failure, print success message
echo 'Connection successfully established';

// Close the database connection

$conn->close();