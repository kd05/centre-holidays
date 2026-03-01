<?php ob_start(); 


$actual_link=$_POST['actual_link'];
//===================================================
include 'geoplugin.class/index.php';

$today = time(); 

if (isset($_POST['g-recaptcha-response'])) {
    //get verify response data
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LddJc8ZAAAAAHjejXQZeelaBNj8v1TDS8zivMxL&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);        
    if($response.success==false) {	
	header('Location: index.php?captcha=wrong&att=1');
	//proceed with form values
    } else {
			
//=================================reset visitor ip and date information if log in is a success=============== 

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');// emppik database

$IP = $_SERVER['REMOTE_ADDR'];// IP address

//===============================================================================================			

include ($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize

// username and password sent from form==========================================================
echo "------------<br />";
echo $BusinessEmail=sanitize_sql_string(strtolower($_POST['BusinessEmail']));
echo "------------<br />";
echo $LogPassword=trim(sanitize_sql_string($_POST['LogPassword']));
echo "------------<br />";
echo $LogPassword=md5($LogPassword.'Q1!W2@e3r4t5');


$sql="SELECT * FROM ch_agents_1, ch_agents_2 WHERE ch_agents_2.BusinessEmail = '$BusinessEmail' AND ch_agents_1.PasswordHashed = '$LogPassword' AND ch_agents_1.active=1 AND ch_agents_2.AgentID=ch_agents_1.AgentID";

$result = mysqli_query($conn, $sql);
$row_cnt = mysqli_num_rows($result);

if($row_cnt==1){

while($rrows = mysqli_fetch_assoc($result)) {
echo $AgentUniqID = $rrows['AgentUniqID'];
$AgentID = $rrows['AgentID'];
$FirstName=$rrows['FirstName']; //
$LastName=$rrows['LastName']; //
$AgentType=$rrows['AgentType']; //
$BusinessEmail=$rrows['BusinessEmail']; //
}

		if ($AgentType !='Non-Paying Sub-Agent' && $AgentType !='Non-Paying Partner')
		{	
		
		//==========================AGENT COOKIE AgentUniqID
		
		$cookie_name = "AgentUniqID";
		$cookie_value = $AgentUniqID;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
		
		session_start();
		$_SESSION["AgentUniqID"] = $AgentUniqID;
		

		$code=rand();
		$code=substr($code, 0, 6);
		
		$tm=time();	
		$ran=$code.'_'.$tm;	

//=================================================================		

		if (!empty($_POST['currentpage2']))
		{
		$currentpage2=$_POST['currentpage2'];
		$option=1;
		}
		elseif (!empty($actual_link))
		$currentpage2='verification.php?actual_link='.$actual_link;	
		else
		$currentpage2='verification.php';
		
			
		$sql5432="INSERT INTO ch_agents_log_in (agentlogid, agentlogip, country_name, agentlogdate, AgentUniqID, BusinessEmail, FirstName, LastName, code) VALUES ('', '$IP', '$country_name', '$today', '$AgentID', '$BusinessEmail', '$FirstName', '$LastName', '$code')";
		
		if (!mysqli_query($conn,$sql5432))
		die('Error: ' . mysqli_error($conn));
		
		
		mysqli_close($conn);
		
		
//=================================================================		

		
		$to = $BusinessEmail;
		$subject = "Centre Holidays: Agent Portal Verification";
		
		$message = file_get_contents($_SERVER['DOCUMENT_ROOT']."/agents/email/agent-portal-verification.php");
		$message  = str_replace("_code_", $code, $message);  					
		$message  = str_replace("_FirstName_", $FirstName, $message); 
		$message  = str_replace("_LastName_", $LastName, $message);  				                  
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: donotreply@centreholidays.com' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		

header("location: ".$currentpage2);

}
else
{
header('Location: index.php?captcha=okay&type=wrongagenttype&att=1&bemail='.$BusinessEmail);	
echo "Wrong agent type.";	
}


	}
	else
	{
	header('Location: index.php?captcha=okay&att=1&bemail='.$BusinessEmail);	
	echo "Wrong Username or Password or Captcha";	
	}

	}
		}
		
ob_flush();  ?>