<?php
include("db.php");// Include database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get booking ID

    // SQL query to delete the booking
    $sql = "DELETE FROM bookings WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Booking deleted successfully!'); window.location='admin.php';</script>";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>

