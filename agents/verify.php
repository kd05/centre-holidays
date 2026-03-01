<?php ob_start(); 

session_start();

//==================================================================================

if (!empty($_POST['actual_link']))
$actual_link=$_POST['actual_link'];
else
$actual_link='home.php';



include ($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize
echo $code=trim(sanitize_sql_string(($_POST['code'])));
echo "<br />";

//============================================================================
include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');//

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

$sql="SELECT * FROM ch_agents_log_in WHERE code='".$code."'";//code='".$code."' AND 

$result = mysqli_query($conn, $sql);
echo $row_cnt = mysqli_num_rows($result);

if($row_cnt >= 1){
	
while($rrows = mysqli_fetch_assoc($result)) {
	echo "<br />";
echo $agentlogid = $rrows['agentlogid'];
	echo "<br />";
echo $AgentUniqID = $rrows['AgentUniqID'];
}	
	

//================Rest the number of attempts==============================
$sql2 = "UPDATE ch_agents_log_in SET code='' WHERE agentlogid='".$agentlogid."'";
if (mysqli_query($conn, $sql2)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


		// unset cookies old cookies
/*		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie($name, '', time()-1000);
				setcookie($name, '', time()-1000, '/');
			}
		}*/

	
		$cookie_name = "VerifyID";
		$cookie_value = $agentlogid;
		setcookie($cookie_name, $cookie_value, time() + (21600 * 1), "/");
		
		$cookie_name = "AgentUniqID";
		$cookie_value = $AgentUniqID;
		setcookie($cookie_name, $cookie_value, time() + (21600 * 1), "/");	
		
		session_start();
		$_SESSION["VerifyID"] = $agentlogid;
		$_SESSION["AgentUniqID"] = $AgentUniqID;		




//====================================FINAL TARGET===========================

		header("location:".$actual_link);


//===================================================================






		}
		else
		{
		header('Location: two-step-verification.php?me=0');		
		}



ob_flush();  ?>