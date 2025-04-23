<?php
include 'db_connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password_input = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password_input, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        echo "<script>alert('Login successful!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Invalid credentials'); window.location.href = 'index.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
