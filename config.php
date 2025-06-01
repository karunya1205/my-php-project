<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "blog";  // Make sure this is your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
