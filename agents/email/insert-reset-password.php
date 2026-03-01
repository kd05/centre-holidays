<?php ob_start();

//============================sanitize input========================================
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize inputs

$RBusinessEmail = strtolower(trim(sanitize_sql_string($_POST['RBusinessEmail'])));//=====================
$RBusinessEmail = str_replace ("'","",$RBusinessEmail);
$RBusinessEmail = str_replace ('"','',$RBusinessEmail);


$pieces = explode("@", $RBusinessEmail);
if ($pieces[1] !='centreholidays.com')// $pieces[1]; this should be centreholidays.com
header('Location: https://centreholidays.com/agents/index.php?reset=2');
else
echo "";



if (!empty($RBusinessEmail))
{	
//============================GEOLOCATION===========================================
$IP = $_SERVER['REMOTE_ADDR'];	
$today = date("l - F.d.Y - h.i A"); 

//=======genertate an auto enquiry number, get time and ip location ===================
$etime=time();
//===========================connect to epik database and updat a unique timestamp==============================
	$servername = "localhost";
	$username = "epikesca_admin";
	$password = 'Q1!W2@e3r4t5';
	$dbname = "epikesca_epiktour";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

//============================get the information from DB and compare to input email to verify this email existance

$sql = "SELECT * FROM ch_agents_2, ch_agents_1 WHERE ch_agents_2.BusinessEmail='$RBusinessEmail' AND ch_agents_1.active=1 AND ch_agents_2.AgentID=ch_agents_1.AgentID LIMIT 1";

$result = mysqli_query($conn, $sql);
$row_cnt = mysqli_num_rows($result);

if ($row_cnt > 0)
{

			// output data of each row
			 while($row = mysqli_fetch_assoc($result)) {
				$AgentID=$row['AgentID']; //
				$AgentUniqID=$row['AgentUniqID']; //	
				$FirstName=$row['FirstName']; //
				$LastName=$row['LastName']; ///	
				$AgentType=$rrows['AgentType']; //	
			}


		//Update and send email with link and show success alert
		
		$sql2 = "UPDATE ch_agents_1 SET etime='$etime' WHERE AgentID='$AgentID'";
		
		if (mysqli_query($conn, $sql2)) {
		//echo "Record updated successfully";
		} else {
		echo "Error updating record: " . mysqli_error($conn);
		}
		
		
		//===============send agent/center holidays to customer======================================
		$subject  = "Reset CHAP Password";	
		$from     = "donotreply@centreholidays.com";	
		//=======================message to center holidays==========================================	
		$message = file_get_contents($_SERVER['DOCUMENT_ROOT']."/agents/email/reset-agent-portal-password.php");// embed php values in HTML file
		$message = str_replace("_RBusinessEmail_", $RBusinessEmail, $message);  
		$message = str_replace("_FirstName_", $FirstName, $message);  					
		$message = str_replace("_AgentUniqID_", $AgentUniqID, $message);  	// unique ID	
		$message = str_replace("_etime_", $etime, $message);  // timestamp		                  
		
			$headers1  = "From: $from\r\n";
			$headers1 .= "Content-type: text/html\r\n";
			$to1 = $RBusinessEmail;
			mail($to1, $subject, $message, $headers1);                   

		
//======================Display success message============================================
header('Location: https://centreholidays.com/agents/reset-password.php?reset=1'); // success email with reset was sent	
	}
	else
	{
header('Location: https://centreholidays.com/agents/reset-password.php?reset=2');	// error cause of wrong email or person not active or registered 	
	
	}


	mysqli_close($conn);	
}
ob_flush();
?>   
