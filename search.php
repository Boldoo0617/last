<?php
// Establish MySQL connection
$host = "localhost";
$username = "admin";
$password = "Admin@123";
$database = "test";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search query
$search = $_GET["search"];

// Perform SQL query
$sql = "SELECT * FROM product WHERE name LIKE '%$search%' OR about LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<div class='product-grid'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h3>" . $row["name"]. "</h3>";
        echo "<p>" . $row["about"]. "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>No results found</p>";
}

$conn->close();
?>