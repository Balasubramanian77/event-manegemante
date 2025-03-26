<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM bookings WHERE user_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>


<body>
    <style>
        body{ background-image: url(11.jpeg);}
    </style>
    <h2>My Bookings</h2>
    <table border="1">
        <tr>
            <th>Event Type</th>
            <th>Duration (hrs)</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['event_type']; ?></td>
                <td><?php echo $row['duration']; ?></td>
                <td><?php echo $row['payment_status']; ?></td>
                <td>
                    <?php if ($row['payment_status'] == 'Pending') { ?>
                        <a href="payment.php?booking_id=<?php echo $row['id']; ?>">Pay Now</a>
                    <?php } else { ?>
                        Paid
                    <?php } ?>
                </td>
                
            </tr>
        <?php } ?>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
