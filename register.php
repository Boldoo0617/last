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
    
    // Get form data and validate
    $username = validate($_POST['username']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $phone = validate($_POST['phone']);
    $pass = validate($_POST['password']);
    $repassword = validate($_POST['repassword']);
    Query($username, $firstname, $lastname, $phone, $pass, $repassword, $conn);

    if($errorMessage != null) { 
        echo $errorMessage;} 
}

function Query($username, $firstname, $lastname, $phone, $pass, $repassword, $conn)  // Define query function
{
    global $errorMessage, $successMessage;
    
    // Check if username already exists
    $user_check = "SELECT * FROM users WHERE username='$username'";
    $result_1 = mysqli_query($conn, $user_check);
    
    if (mysqli_num_rows($result_1) > 0) 
    {
        $errorMessage = 'Хэрэглэгчийн нэр бүртгэлтэй байна.';
        header("Location: register.php?error=" . urlencode($errorMessage));
        exit();
    } 
    else 
    {
        // Check if phone number already exists
        $number_check = "SELECT * FROM users WHERE phone='$phone'";
        $result_2 = mysqli_query($conn, $number_check);

        if (mysqli_num_rows($result_2) > 0) 
        {
            $errorMessage = 'Хэрэглэгчийн утасны дугаар бүртгэлтэй байна.';
            header("Location: register.php?error=" . urlencode($errorMessage));
            exit();
        } 
        else
        {
            // Check if passwords match
            if ($pass != $repassword) {
                $errorMessage = 'Нууц үг таарсангүй.';
                header("Location: register.php?error=" . urlencode($errorMessage));
                exit();
            }
            else {
                // Hash password and insert user data into database
                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users VALUES ('$username', '$firstname', '$lastname', '$phone', '$hashed_password')";
                mysqli_query($conn, $sql);
                $successMessage = 'Амжилттай бүртгэгдлээ.';
                header("Location: form.php?success=" . urlencode($successMessage));
                exit(); 
            }
        }
    }
}
function password_checker()
{

}
?>
