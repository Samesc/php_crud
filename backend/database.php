<?php
$servername = "your_server";
$username = "your_username";
$password = "your_userPass";
$dbname = "yourDB_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
