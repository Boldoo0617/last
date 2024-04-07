<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
        }

        /* Container Styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Profile Header Styles */
        .profile-header {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            color: #fff;
            margin-top: 15px;
        }

        .profile-header-1 {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            color: #fff;
            width: 50%;
            margin-right: 10px;
        }
        .profile-header-2 {
            background-color: #006bff;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            color: #fff;
            width: 50%;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 4px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-picture img {
            width: 100%;
            height: auto;
        }

        /* Profile Info Styles */
        .profile{
            display: flex;
            flex-direction: row;
            width: 100%;
        }
        .profile-info {
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: -10px;
            padding: 10px;
        }

        .profile-info-1 {
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: -10px;
            padding: 20px;
            width: 50%;
        }

        .profile-info h3 {
            margin-bottom: 20px;
            color: #007bff;
            font-size: 24px;
            text-align: center;
        }

        .profile-info p {
            margin: 0;
            color: #555;
        }

        /* Button Styles */
        .button-log {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            background: #33A5FF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .button-log:hover {
            background: #0056b3;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: #0056b3;
        }

        /* Card Styles */
        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            width: 250px;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .box{
            padding: 0px 20px 10px 20px;
            background: var(--alter-text);
            box-shadow: 5px 30px 56.1276px rgb(55 55 55 / 12%);
            border-radius: 10px;
            position: relative;
            transition: all .35s ease;
        }
        .box img{
            overflow: hidden;
            margin-top: 15px;
            width: auto;
            max-height: 300px;
            border-radius: 10px;
        }
        .box h4{
            font-size: 15px;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        .box h5{
            font-size: 14px;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        .box .cart i{
            position: absolute;
            top: 0;
            left: 0;
            width: 35px;
            height: 35px;
            background: var(--text-color);
            color: var(--bg-color);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .box:hover{
            transform: translateY(-5px);
        }

    </style>

</head>

<body>
    <div class="container">
        <!-- Profile Header Section -->
        <div class="profile">
            <div class="profile-header-1">
                <div class="profile-picture">
                    <img src="./img/profile.jpg" alt="Profile Picture">
                </div>
                <h2><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?></h2>
                <a href="index.html" class="button-log">ГАРАХ</a>
                <a href="home.html" class="button-log">БУЦАХ</a>
            </div>

            <!-- Profile Info Section -->
            <div class="profile-header-2">
                <h3>ХЭРЭГЛЭГЧИЙН МЭДЭЭЛЭЛ</h3>
                <p>ОВОГ: <?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : ''; ?></p>
                <p>НЭР: <?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : ''; ?> </p>
                <p>УТАСНЫ ДУГААР: <?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?> </p>
                <br>
                <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="my_image">
                    <input type="submit" name="submit" value="Upload">
                </form> -->
            </div>
        </div>

        <!-- Add Goods Button Section -->
        <div class="profile-header">
            <a href="add_goods.php" class="button-log">ЗАР НЭМЭХ</a>
            <a href="delete_goods.php" class="button-log">ЗАР ХАСАХ</a>
    
        </div>

        <!-- Added Goods Section -->
        <div class="profile-info">
            <h3>ТАНЫ ЗАРУУД</h3>
            <div class="card-container">
                <div class="box">
                    <img src="./img/aa.jpg" alt="negymbsimaa">
                        <h4>I'm a product</h4>
                        <h5>$15.00</h5>
                    <div class="cart">
                            <a href="#"><i class='bx bx-cart' ></i></a>
                     </div>
                    </div>
            </div>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>