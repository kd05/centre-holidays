<?php
ob_start();

$servername = "localhost";
$username = "centreho_centreh";
$password = "EeA92485nb&r4&@Y4AfCe^nf%";
$dbname = "centreho_ch";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql2 = "Delete from master_pass";

if (mysqli_query($conn, $sql2)) {
	echo "Success";
} else {
	echo "Error updating record: " . mysqli_error($conn);
}



ob_flush();
?>