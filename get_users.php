<?php
// Database connection parameters
$servername = "localhost";
$username = "admin";
$password = "Admin@123";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Initialize an empty array to store user data
$users = [];

// Check if users exist
if ($result->num_rows > 0) {
    // Loop through each user and add them to the users array
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close the database connection
$conn->close();

// Output the user data as JSON
echo json_encode($users);
?>
