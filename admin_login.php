<?php
session_start();
include('db.php'); // Remove `./` if it's in the same folder



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Admin credentials
    $admin_user = 'bala';
    $admin_pass = 'everthing'; // Change this to a secure password
    
    if ($username == $admin_user && $password == $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
        exit();
    } else {
        $error = "<script>alert('Invalid user detail')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
   <link rel="stylesheet" href="admin.css">
   <style>
   body{
    background-image: url(11.jpeg);
    display: flex;
    align-items: center;
    justify-content: center;


}
#login-box{
    width 500px
}
h2,label,input,button{



   </style>

</head>
<body>
    
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" id="login-box">
        <h2>Admin Login</h2>
        <label for="user">Username:</label>
        <input id="user" type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
