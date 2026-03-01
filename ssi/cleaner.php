<?php
ob_start();

//===============================================
//CRON job to auto delete on due days
//===============================================

// current time
$currentt=time();

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

$sql1 = "SELECT * from cleaner WHERE promowebsites=2";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
		
		$cid=$row["cid"];	
        $promiid=$row["promiid"];		
        $promowebsites=$row["promowebsites"];        
		$promocoverimage=$row["promocoverimage"];
		$promosquarethumb=$row["promosquarethumb"];
		$promoimageflyer=$row["promoimageflyer"];
		$promoimageurl=$row["promoimageurl"];
		$promoimage=$row["promoimage"];
		$promohorizontalimage=$row["promohorizontalimage"]; 
		
		$path = "/home/centreho/public_html/promos/img/";
		
		unlink($path.$promocoverimage);
		unlink($path.$promosquarethumb);
		unlink($path.$promoimageflyer);
		unlink($path.$promoimageurl);
		unlink($path.$promoimage);
		unlink($path.$promohorizontalimage);
	
		
//==============================update THE ABOVE cleaner table=============================================

		$sql3 = "UPDATE cleaner SET cstatus='0' WHERE cid='$cid'";

		if (mysqli_query($conn, $sql3)) {
    		//echo "<h4>Success</h4>";
		} else {
			//echo "Error updating record: " . mysqli_error($conn);
		}		
		
    }
} else {
    //echo "0 results";
}


mysqli_close($conn);

ob_flush();
?>


test22
