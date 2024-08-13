<?php
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "Sabores_campus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
