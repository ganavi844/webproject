<?php
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = ""; // Default empty
$dbname = "community_help";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
