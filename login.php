<?php
session_start();
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM user_data WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        header('Location: ../dashboard/dashboard.php');
    } else {
        echo "<script>alert('Invalid Email or Password!'); window.location.href='index.html';</script>";
    }
}
?>