<?php
$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$dbname = 'user_registration';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    echo "Database Connected Successfully!";
}
?>
