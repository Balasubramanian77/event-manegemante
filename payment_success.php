<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id']) || !isset($_GET['booking_id'])) {
    header("Location: login.php");
    exit();
}

$booking_id = $_GET['booking_id'];
$query = "UPDATE bookings SET payment_status='Completed' WHERE id=? AND user_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $booking_id, $_SESSION['user_id']);

if ($stmt->execute()) {
    echo "Payment successful!";
} else {
    echo "Error updating payment status.";
}
?>


<a href="my_bookings.php">View My Bookings</a>
