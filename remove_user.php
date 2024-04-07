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

// Check if the form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Get the user ID from the POST data
    $userId = $_POST['id'];

    // Prepare and execute the SQL query to delete the user
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    // Check if the user was successfully deleted
    if ($stmt->affected_rows > 0) {
        echo "User removed successfully";
    } else {
        echo "Error removing user";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
