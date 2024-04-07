<?php
include "conn.php";
session_start();

$errorMessage = null;   // Error message variable
$successMessage = null;  // Success message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") // Check if form is submitted via POST
{
    global $errorMessage, $successMessage;
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = $_SESSION['username'];
    $name = validate($_POST['name']);

    Query($username, $name, $conn);

    if($errorMessage != null) { 
        echo $errorMessage;} 
}

function Query($username, $name, $conn)  // Define query function
{
    global $errorMessage, $successMessage;

    $user_check = "SELECT * FROM product WHERE name='$name'";
    $result_1 = mysqli_query($conn, $user_check);
    
    if (mysqli_num_rows($result_1) > 0) 
    {
        $errorMessage = 'Ийм бараа байхгүй байна.';
        header("Location: add_goods.php?error=" . urlencode($errorMessage));
        exit();
    } 
    else 
    {
        $sql = "DELETE FROM users WHERE name = $name";
        mysqli_query($conn, $sql);
        $successMessage = 'Амжилттай хасагдлаа.';
        header("Location: user.php?success=" . urlencode($successMessage));
        exit(); 
    }
}
?>
