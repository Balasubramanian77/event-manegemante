<?php
$host = "localhost";  // Change if needed
$user = "root";       // Default for XAMPP
$pass = "";           // Default is empty for XAMPP
$dbname = "event_management"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
