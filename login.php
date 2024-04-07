<?php
include "conn.php";

$errorMessage = null;   // Error message variable
$successMessage = null;  // Success message variable

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") // Check if form is submitted via POST
{   
    // Function to validate input data
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // Get form data and validate
    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);
    Query($username, $pass, $conn);
}

function Query($username, $pass, $conn)
{
    global $errorMessage, $successMessage;
    
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) 
    {
        $errorMessage = 'Хэрэглэгч бүртгэлгүй байна.';
        header("Location: form.php?error=" . urlencode($errorMessage));
        exit();
    } 
    else 
    {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if(password_verify($pass, $hashed_password))
        {
            $successMessage = 'Амжилттай нэвтэрлээ.';

            // Fetch additional user data and store in session
            $sql = "SELECT phone, firstname, lastname FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $_SESSION['username'] = $username;
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];

            header("Location: home.html?error=" . urlencode($successMessage));
            exit(); 
        }
        else
        {
            $errorMessage = 'Нууц үг буруу байна';
            header("Location: form.php?error=" . urlencode($errorMessage));
            exit();
        }
    }
}
?>
