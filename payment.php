<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['booking_id'])) {
    die("Invalid request.");
}

$booking_id = $_GET['booking_id'];
$query = "SELECT * FROM bookings WHERE id=? AND user_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $booking_id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();

if (!$booking) {
    die("Booking not found.");
}

// PayPal Payment Integration
$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$business_email = "your-paypal-business-email@example.com";
$return_url = "payment_success.php?booking_id=$booking_id";
$cancel_url = "payment_cancel.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
 
    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url(11.jpeg);
        background-size: cover;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 50px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    input, select {
        width: 50px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    button {
        background-color:rgb(53, 138, 207);
        width: 120px;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        align-items: center;
        margin-left: 600px;
    }

    button:hover {
        background-color: #218838;
    }

    .error {
        color: red;
        font-size: 14px;
    }

    .success {
        color: green;
        font-size: 14px;
    }
    .event{
        margin-top: 80px;
    }
   
  .book{
    text-align: center;
  }
</style>


</head>


<body><div class="book">
    <h2>Pay for Your Booking</h2>
   <div class="book"><p>Event: <?php echo $booking['event_type']; ?></p>
    <p>Duration: <?php echo $booking['duration']; ?> hrs</p>
    <p>Amount: $<?php echo $booking['duration'] * 50; ?> (Assume $50 per hour)</p>
</div> 
  
<form action="<?php echo $paypal_url; ?>" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="<?php echo $business_email; ?>">
        <input type="hidden" name="item_name" value="<?php echo $booking['event_type']; ?>">
        <input type="hidden" name="amount" value="<?php echo $booking['duration'] * 50; ?>">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="return" value="<?php echo $return_url; ?>">
        <input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>">
        <button type="submit">Pay with PayPal</button><br><br>
    
    
    </form> <br>
    
    <a href="my_bookings.php" class="Event">Back to My Bookings</a>
</body>
</html>
