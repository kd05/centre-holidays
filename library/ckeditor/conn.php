<?php 
$servername = "nickdo.netfirmsmysql.com";
$username = "ash";
$password = "q1w2e3r4";
$dbname = "events";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>