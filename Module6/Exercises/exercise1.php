<?php 
declare(strict_types=1);

/* 
                            Exercise 1: Basic CRUD operations
                            =================================
    Write a PHP script to connect to a MySQL database and perform the following operations. 
        1. Create a table if it does not exist.
        2. Insert data into the table.
        3. Retrieve data from the table and display it in an HTML table.
        4. Update existing data.
        5. Delete a row of data from the table.
    Considering delegating the above tasks to different functions. Fore example:
        - connect_to_database() - connect to the database.
        - create_table() - creates the table if it does not exist.
        - insert_data_into_database() - inserts data into the table.
        - retrieve_data_from_database() - retrieves data from the table and displays it in an HTML table.
        - update_data_in_database() - updates existing data.
        - delete_data() - deletes a row of data from the table.
        - delete_row_from_database() - deletes a row of data from the database.
        - display_data_in_HTML_table() - displays data in HTML table.
    Your program should use the functions to perform the CRUD operations. 
    using the mysqli extension and display a success message upon the completion of the tasks.
    Your program should be able to perform basic CRUD operations on the database and display appropriate messages or an error message. 
*/

// Define the class that contains the CRUD operations
final class Module61 {
    private mysqli $conn;

    // Constructor to establish the database connection
    public function __construct() {
        $this->connect_to_database();
    }

    // Function to connect to the database
    private function connect_to_database(): void {
        // Initialize connection
        $this->conn = new mysqli("localhost", "root", "", "test");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        echo "Connected to the database successfully!<br>";
    }

    // Function to create the 'users' table if it does not exist
    public function create_table(): void {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(100) UNIQUE
        )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Table 'users' created successfully!<br>";
        } else {
            echo "Error creating table: " . $this->conn->error . "<br>";
        }
    }

    // Function to insert data into the 'users' table
    public function insert_data_into_database(string $name, string $email): void {
        // Check if the email already exists in the database
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // If email exists, show an error message
        if ($stmt->num_rows > 0) {
            echo "Insert error: The email {$email} is already in use.<br>";
            $stmt->close();
            return;
        }

        // Prepare the insert query
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Record inserted successfully for {$name}!<br>";
        } else {
            echo "Insert error: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    // Function to retrieve all data from the 'users' table
    public function retrieve_data_from_database(): array {
        $result = $this->conn->query("SELECT * FROM users");
        $data = [];

        // If there are records, store them in the data array
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Function to update data in the 'users' table
    public function update_data_in_database(int $id, string $field, string $value): void {
        // Check if the provided field is valid
        if (!in_array($field, ['name', 'email'])) {
            echo "Invalid field name.<br>";
            return;
        }

        // Prepare the update query
        $stmt = $this->conn->prepare("UPDATE users SET $field = ? WHERE id = ?");
        $stmt->bind_param("si", $value, $id);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Record with ID {$id} updated successfully!<br>";
        } else {
            echo "Update error: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    // Function to delete a record from the 'users' table by ID
    public function delete_row_from_database(int $id): void {
        // Prepare the delete query
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Execute the query and check if any rows were affected
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Record with ID {$id} deleted successfully!<br>";
            } else {
                echo "No record found with ID {$id}.<br>";
            }
        } else {
            echo "Delete error: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    // Function to display data in an HTML table
    public function display_data_in_HTML_table(array $data): void {
        // If there is no data to display
        if (empty($data)) {
            echo "No records found.<br>";
            return;
        }

        // Start the HTML table and add headers
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

        // Loop through the data and display each row
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars((string) $row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars((string) $row['email']) . "</td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table><br>";
    }

    // Destructor to close the database connection
    public function __destruct() {
        $this->conn->close();
        echo "Database connection closed.<br>";
    }
}

// Example usage of the CRUD operations
$module61 = new Module61();

// Create the table if it does not exist
$module61->create_table();

// Insert some data into the table
$module61->insert_data_into_database("John Doe", "johndoe@example.com");
$module61->insert_data_into_database("Alice Rand", "alicerand@example.com");
$module61->insert_data_into_database("Bob Grand", "bobgrand@example.com");

// Update a record (ID 1) and change the name to 'John Smith'
$module61->update_data_in_database(1, "name", "John Smith");

// Delete a record (ID 3)
$module61->delete_row_from_database(3);

// Retrieve and display all data
$data = $module61->retrieve_data_from_database();
$module61->display_data_in_HTML_table($data);
?>
