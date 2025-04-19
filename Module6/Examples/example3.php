<?php 
declare(strict_types=1);


/*
                        Example 3: Creating Database Table with mysqli
                        ==============================================
    Write a simple PHP script to create a `user` table with `id`, `name`, `email` fields.
    The `id` field is required, auto incrementing, and is the primary key. The `name` field is required
    but the `email` field is optional and unique. 
*/

$conn = new mysqli("localhost", "root", "", "test");

$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();

