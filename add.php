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
    $price = validate($_POST['price']);
    $image = validate($_POST['image']);
    $about = validate($_POST['about']);

    Query($username, $name, $price, $image, $about, $conn);

    if($errorMessage != null) { 
        echo $errorMessage;} 
}

function Query($username, $name, $price , $image , $about , $conn)  // Define query function
{
    global $errorMessage, $successMessage;
    //echo $username;
    // Check if username already exists
    $user_check = "SELECT * FROM product WHERE name='$name'";
    $result_1 = mysqli_query($conn, $user_check);
    
    if (mysqli_num_rows($result_1) > 0) 
    {
        $errorMessage = 'Барааны нэр бүртгэлтэй байна.';
        header("Location: add_goods.php?error=" . urlencode($errorMessage));
        exit();
    } 
    else 
    {
        $sql = "INSERT INTO product VALUES ('$username', '$name', '$price', '$image', '$about')";
        mysqli_query($conn, $sql);
        $successMessage = 'Амжилттай нэмэгдлээ.';
        header("Location: user.php?success=" . urlencode($successMessage));
        exit(); 
    }
}
?>
