<?php ob_start(); 

session_start();


include ($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize
echo $BusinessEmail=trim((($_POST['BusinessEmail'])));
 $LogPassword=trim((($_POST['LogPassword'])));

echo $Password=$LogPassword;
echo $PasswordHashed=md5($LogPassword.'Q1!W2@e3r4t5');


//============================================================================

$servername = "localhost";
$username = "epikesca_admin";
$password = "Q1!W2@e3r4t5";
$dbname = "epikesca_epiktour";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


echo "<hr />";


$sql = "SELECT * FROM ch_agents_2 WHERE BusinessEmail='".$BusinessEmail."'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {	

while($row = mysqli_fetch_assoc($result)) {
	echo $AgentID = $row['AgentID'];
	}
}


//================Rest the number of attempts==============================
$sql2 = "UPDATE ch_agents_1 SET Password='".$Password."', PasswordHashed='".$PasswordHashed."' WHERE AgentID='".$AgentID."'";
if (mysqli_query($conn, $sql2)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


header("location: password-reset-temp.php?res=1");


ob_flush();  ?>