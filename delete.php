<?php
include "conn.php";

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

    $name = validate($_POST['name']);
    Query($name, $conn);

    if($errorMessage != null) { 
        echo $errorMessage;} 
}

function Query($name, $conn)  // Define query function
{
    global $errorMessage, $successMessage;

    $user_check = "SELECT * FROM product WHERE name='$name'";
    $result_1 = mysqli_query($conn, $user_check);
    
    if (mysqli_num_rows($result_1) < 1) 
    {
        $errorMessage = 'Ийм бараа байхгүй байна.';
        header("Location: delete_goods.php?error=" . urlencode($errorMessage));
        exit();
    } 
    else 
    {
        $sql = "DELETE FROM product WHERE name = '$name'";
        mysqli_query($conn, $sql);
        $successMessage = 'Амжилттай хасагдлаа.';
        header("Location: user.php?success=" . urlencode($successMessage));
        exit(); 
    }
}
?>
