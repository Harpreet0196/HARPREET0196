<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricket_world";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
