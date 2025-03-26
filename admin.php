<?php
session_start();
include('db.php');

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "event_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch statistics
$totalUsers = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];
$totalBookings = $conn->query("SELECT COUNT(*) as count FROM bookings")->fetch_assoc()['count'];
$totalRevenue = $conn->query("SELECT SUM(amount) as total FROM payments")->fetch_assoc()['total'];
$totalRevenue = $totalRevenue ? $totalRevenue : 0;

// Fetch all bookings
date_default_timezone_set('Asia/Kolkata');
$bookings = $conn->query("SELECT * FROM bookings");
$bookingsQuery = "SELECT * FROM bookings"; // Your SQL query
$bookings = $conn->query($bookingsQuery); 

// Debugging step: Check if the query failed
if (!$bookings) {
    die("Query failed: " . $conn->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(11.jpeg);
            padding: 20px;
        }
        .container {
            max-width: 90%;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2, h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .dashboard {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .card {
            background: #2575fc;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 22%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin: 0;
            font-size: 18px;
        }
        .card p {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }
        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 10px;
        }
        th {
            background: #2575fc;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #2575fc;
            font-weight: bold;
        }
        a:hover {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <div class="dashboard">
            <div class="card">
                <h3>Total Users</h3>
                <p><?php echo $totalUsers; ?></p>
            </div>
            <div class="card">
                <h3>Total Bookings</h3>
                <p><?php echo $totalBookings; ?></p>
            </div>
            <div class="card">
                <h3>Total Revenue</h3>
                <p>$<?php echo number_format($totalRevenue, 2); ?></p>
            </div>
        </div>
        
        <h3>All Bookings</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Event Type</th>
                <th>Duration (hrs)</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $bookings->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['event_type']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                    <td><?php echo $row['payment_status']; ?></td>
                    <td>
                        |
                        <a href="delete_booking.php?id=<?php echo $row['id']; ?>" style="color:black;">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
<?php
$conn->close();
?>