<?php
$servername="localhost";
$username="root";
$password= "Sict@057";
$dbname= "biydaalt";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_errno())
{
   echo "Failed to connect!";
   exit();
}
?>