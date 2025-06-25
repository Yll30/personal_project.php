<?php
$host = 'localhost';      // Usually 'localhost'
$db   = 'hotel_db';       // Your database name
$user = 'root';           // Your DB username (default is 'root' for XAMPP)
$pass = '';               // Your DB password ('' if using XAMPP default)

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
