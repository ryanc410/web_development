<?php
$servername = "localhost";
$username = "account_admin";
$password = "CeenahM7AhK!";

// Creating connection
$conn = mysqli_connect($servername, $username, $password);

// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>