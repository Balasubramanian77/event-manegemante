<?php
session_start();
include('../db.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    switch ($_GET['action']) {
        case 'delete_user':
            mysqli_query($conn, "DELETE FROM users WHERE id = $id");
            header('Location: admin.php');
            break;
        
        case 'approve_booking':
            mysqli_query($conn, "UPDATE bookings SET status = 'Approved' WHERE id = $id");
            header('Location: admin.php');
            break;
        
        case 'reject_booking':
            mysqli_query($conn, "UPDATE bookings SET status = 'Rejected' WHERE id = $id");
            header('Location: admin.php');
            break;
        
        case 'delete_booking':
            mysqli_query($conn, "DELETE FROM bookings WHERE id = $id");
            header('Location: admin.php');
            break;
    }
}
?>
