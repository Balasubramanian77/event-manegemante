<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $email, $password);
    
    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
<style>
    /* General Page Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-image: url(11.jpeg);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Register Container */
.register-container {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 350px;
}

/* Register Title */
h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

/* Input Fields */
input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: 0.3s ease-in-out;
}

/* Input Focus Effect */
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #764ba2;
    outline: none;
    box-shadow: 0px 0px 8px rgba(118, 75, 162, 0.3);
}

/* Register Button */
button {
    width: 100%;
    padding: 12px;
    background: #667eea;
    color: #fff;
    font-size: 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    margin-to

</style>

</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="name" required placeholder="Full Name"><br>
        <input type="email" name="email" required placeholder="Email"><br>
        <input type="password" name="password" required placeholder="Password"><br>
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login here</a></p>
</body>
</html>




