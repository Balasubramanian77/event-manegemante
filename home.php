<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <style>body{
        background-image: url(12.jpeg);
        
    }
        .home-btn {
            display: inline-block;
            margin-top: 490px;
            margin-left: 640px;
            padding: 12px 25px;
            background: #0056b3;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s, transform 0.2s;
            align-items: center;
        }
        .home-btn:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
    

    </style>
</head>
<body>
<a href="dashboard.php" class="home-btn">Home</a>
</body>
</html>