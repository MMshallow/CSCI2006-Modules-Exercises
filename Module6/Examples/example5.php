<?php 
declare(strict_types=1);


/*
                        Example 5: Deleting Records
                        ===========================
    Write a simple PHP script to delete a record from the `users` table. 
*/
// Initialize the connection parameters
$conn = new mysqli("localhost", "root", "", "test");

$sql = "DELETE FROM users WHERE id = 1";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();

