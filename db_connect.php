<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "barangay_monitoring"; // dapat ito yung name ng DB mo

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
