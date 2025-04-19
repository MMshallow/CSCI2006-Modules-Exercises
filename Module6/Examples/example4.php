<?php 
declare(strict_types=1);


/*
                        Example 4: Prepared Statements with mysqli
                        ==========================================
    Write a simple PHP script to insert data into the `users` table you created in `exercise 3`. 
    Use the `mysqli` to accomplish this task.
*/
// Initialize the connection parameters
$conn = new mysqli("localhost", "root", "", "test");

// Use prepared statements to insert data into the `users
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");

// Execute the statement
$stmt->bind_param("ss", $name, $email);

$name = "Jane Doe";
$email = "jane@example.com";
$stmt->execute();

echo "Record added successfully!";
$stmt->close();
$conn->close();

