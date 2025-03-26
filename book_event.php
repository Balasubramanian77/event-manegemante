<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $duration = $_POST['duration'];
    $event_type = $_POST['event_type'];

    $query = "INSERT INTO bookings (user_id, name, email, address, contact, duration, event_type, payment_status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issssis", $user_id, $name, $email, $address, $contact, $duration, $event_type);

    if ($stmt->execute()) {
        echo "Booking successful! Proceed to payment.";
        echo "<br><a href='payment.php?booking_id=" . $conn->insert_id . "'>Pay Now</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Event</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(11.jpeg);
            text-align: center;
            padding: 20px;
        }
        .container {
            width: 50%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-button {
            background: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-button:hover {
            background: #218838;
        }
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
        .pay-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .pay-button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <a href="dashboard.php" >Back to Dashboard</a>
    <div class="container">
        <h2>Book Your Event</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="duration">Event Duration (hours):</label>
                <input type="number" id="duration" name="duration" required>
            </div>
            <div class="form-group">
                <label for="event_type">Event Type:</label>
                <select id="event_type" name="event_type" required>
                    <option value="wedding">Wedding</option>
                    <option value="birthday">Birthday</option>
                    <option value="corporate">Corporate Event</option>
                    <option value="surprise">surprise dance</option>
                    <option value="culture">culture Event</option>
                    <option value="karagam">karagam dance</option>
                    <option value="kummi">kummi dance</option>
                    <option value="paraiattam">paraiattam</option>
                    <option value="mailaattam">mailaattam</option>
                    <option value="silambattam">silambattam</option>
                    <option value="oyilaattam">oyilaattam</option>
                </select>
            </div>
            <button type="submit" class="submit-button">Book Now</button>
        </form>
    </div>
</body>
</html>