<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome..! <?php echo $_SESSION['name']; ?></title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(to right top, rgb(236, 134, 236), rgba(42, 192, 219, 0.705), rgb(236, 134, 236));
            font-family: sans-serif;
        }

        .nav {
            height: 10vh;
            background-color: gray;
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: end;
        }

        .temp,.logo {
            float: right;
            color: white;
            margin-right: 10px;
        }

        .temp{
            margin-top: 7px;
        }
        .logo{
            font-size: 30px;
        }

        h1 {
            text-align: center;
            margin-top: 5%;
            letter-spacing: 1.5px;
            color: white;
            text-shadow: 0 0 10px black;
            font-size: 50px;
        }
        marquee{
            font-size: 35px;
            color: yellow;
            margin-top: 6%;
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="user-details">
            <span class="logo"><i class="fa-solid fa-circle-user"></i></span>
            <span class="temp"><?php echo $_SESSION['email']; ?></span>
        </div>
    </div>
    <h1>Hello..!    <?php echo  $_SESSION['name']; ?></h1>
    <marquee>Thank you for Visiting our site.</marquee>

</body>

</html>