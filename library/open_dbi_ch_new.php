<?php
$servername = "localhost";
$username = "epikesca_admin";
$password = "Q1!W2@e3r4t5";
$dbname = "epikesca_epiktour";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	
    die("Connection failed: " . mysqli_connect_error());

}
?>
