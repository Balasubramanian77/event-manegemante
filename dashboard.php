
<?php
include("db.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="book_event.php"><i class="fas fa-users"></i> Book Event</a></li>
            <li><a href="my_bookings.php"><i class="fas fa-calendar"></i> MY Booking</a></li>
            <li><a href="contect.php"><i class="fas fa-cog"></i> Contact</a></li>
            <li><a href="admin.php"><i class="fas fa-cog"></i> Admin</a></li>
        </ul>
    </div>
    
    <div class="main-content">
        <div class="header">
            <h1>Everything dance Crew</h1>
        </div>
        <h2 class="i">Project gallery</h2><br>
        <img src="project1 (1).jpeg" alt=""class="img">
        <img src="project2.jpeg" alt=""class="img">
        <img src="14.jpeg" alt="" class="ime">
        

        
        <h1>About</h1>
        <p> Welcome to EveryThing dance crew, the ultimate platform for booking and managing spectacular dance events! Discover talented dancers, schedule performances, and make your event unforgettable<br>
        Experience the magic of dance with our seamless booking system, vibrant event listings, and top-tier performers ready to elevate your celebration.<br>
        From elegant ballroom to high-energy hip-hop, we bring the best dancers to your stage</p>
    <footer><h4>"Your feedback helps us improve! Share your experience and let us know how we can make our events even better.<br>
    "We’d love to hear from you! Tell us what you enjoyed and what we can enhance for an even more spectacular dance experience so your feedback send this email everythingdancecrew@gamil.com </h4></footer>
  
        
      
</body>
</html>

<style>
    .ime{
        width: 250px;
    }
    footer{
        background: transparent;
        color: black;
    }
    .img{
        width: 250px;
    }
    .i{
        margin-top: 50px;
    }
    body {
       background-image: url(11.jpeg);
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
    }
    .sidebar {
        width: 250px;
        height: 100vh;
        background: transparent;
        color: black;
        padding: 20px;
        position: fixed;
    }
    .sidebar h2 {
        text-align: center;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar ul li {
        padding: 15px;
        border-bottom: 1px solid #555;
    }
    .sidebar ul li a {
        color: black;
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    .sidebar ul li a i {
        margin-right: 10px;
    }
    .main-content {
        margin-left: 250px;
        padding: 20px;
        flex-grow: 1;
    }
    .header {
        background: transparent;
        color: black;
        padding: 20px;
        text-align: center;
    }
    .cards {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }
    .card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        flex: 1;
        text-align: center;
    }
    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }
        .main-content {
            margin-left: 200px;
        }
        .cards {
            flex-direction: column;
        }
    }
</style>


