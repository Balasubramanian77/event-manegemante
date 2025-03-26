<?php
include("db.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS for better organization -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(11.jpeg);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
        }
        header {
            background: #333;
            color: white;
            padding: 20px;
            font-size: 26px;
            border-radius: 15px 15px 0 0;
        }
        h3 {
            color: #444;
            margin: 15px 0;
            font-size: 18px;
        }
        .home-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #0056b3;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s, transform 0.2s;
        }
        .home-btn:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <header>Contact Us</header>
        <h3>Name: Chellam</h3>
        <h3>Phone: </h3>
        <h3>Email: everythingdance@gmail.com</h3>
        <a href="dashboard.php" class="home-btn">Dashboard</a>
    </div>
</body>
</html>

