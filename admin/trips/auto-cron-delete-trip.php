<?php
ob_start();
echo $_SERVER['DOCUMENT_ROOT'];
//===============================================
//CRON job to auto delete articles on due days
//===============================================

// current time
$currentt=time();

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

// sql to delete a record
$sql = "UPDATE trips SET active='0' WHERE texpiry !='' AND texpiry < $currentt";

if (mysqli_query($conn, $sql)) {
    echo "Record successfully";
} else {
    echo "Error record: " . mysqli_error($conn);
}


mysqli_close($conn);

ob_flush();
?>