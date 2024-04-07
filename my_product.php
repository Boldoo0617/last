<?php
include "conn.php";
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM product WHERE username = $username";
$result = $conn->query($sql);
$products = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
$conn->close();
// Return products as JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
