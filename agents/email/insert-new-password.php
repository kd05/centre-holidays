<?php ob_start();

//===================
session_start();

//============================sanitize input========================================
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize inputs

if (!empty ($_POST['iq']))
$iq=$_POST['iq'];
elseif (!empty ($_GET['iq']))
$iq=$_GET['iq'];

if (!empty ($_POST['ti']))
$ti=$_POST['ti'];
elseif (!empty ($_GET['ti']))
$ti=$_GET['ti'];


$iq = strtolower(trim(sanitize_sql_string($iq)));//=====================
$iq = str_replace ("'","",$iq);
$iq = str_replace ('"','',$iq);

$ti = strtolower(trim(sanitize_sql_string($ti)));//=====================
$ti = str_replace ("'","",$ti);
$ti = str_replace ('"','',$ti);


if (!empty($iq) && (!empty($ti)))
{

$LogPassword1 = (trim(($_POST['LogPassword1'])));//=====================
$LogPassword1 = str_replace ("'","",$LogPassword1);
$LogPassword1 = str_replace ('"','',$LogPassword1);
$PasswordHashed1=md5($LogPassword1.'Q1!W2@e3r4t5');

$LogPassword2 = (trim(sanitize_sql_string($_POST['LogPassword2'])));//=====================
$LogPassword2 = str_replace ("'","",$LogPassword2);
$LogPassword2 = str_replace ('"','',$LogPassword2);
$PasswordHashed2=md5($LogPassword2.'Q1!W2@e3r4t5');

$LogPassword2=$LogPassword1;

if (!empty($LogPassword1) && (!empty($LogPassword2)))// make sure something was submitted
{
	
$LogPassword1 = (trim(($_POST['LogPassword1'])));//=====================
$LogPassword1 = str_replace ("'","",$LogPassword1);
$LogPassword1 = str_replace ('"','',$LogPassword1);
$PasswordHashed1=md5($LogPassword1.'Q1!W2@e3r4t5');

$LogPassword2 = (trim(sanitize_sql_string($_POST['LogPassword1'])));//=====================
$LogPassword2 = str_replace ("'","",$LogPassword2);
$LogPassword2 = str_replace ('"','',$LogPassword2);
$PasswordHashed2=md5($LogPassword2.'Q1!W2@e3r4t5');

	
if (($PasswordHashed2==$PasswordHashed1))
{

echo "ok1";
//============================GEOLOCATION===========================================
$IP = $_SERVER['REMOTE_ADDR'];	
$today = date("l - F.d.Y - h.i A"); 

//=======genertate an auto enquiry number, get time and ip location ===================
$etime=time();
//===========================connect to epik database and updat a unique timestamp==============================

echo $iq;
echo $ti;

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');// emppik database

$sql="SELECT * FROM ch_agents_1 WHERE AgentUniqID='$iq'";
$result = mysqli_query($conn, $sql);
echo $row_cnt = mysqli_num_rows($result);

if ($row_cnt > 0)
{
	
echo "ok2";
	// output data of each row
	 while($row = mysqli_fetch_assoc($result)) {
		$RBusinessEmail=$row['BusinessEmail']; //	
		$FirstName=$row['FirstName']; //
		$LastName=$row['LastName']; ///		
	}	
	
	$sql2 = "UPDATE ch_agents_1 SET PasswordHashed='$PasswordHashed2', etime='' WHERE AgentUniqID='$iq'";
	
	if (mysqli_query($conn, $sql2)) {
		//echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);//kwiktrips@centreholidays.com
		
$_GET['iq']=$iq;
$_GET['ti']=$ti;		
				
header('Location: https://centreholidays.com/agents/index.php?resetok=2');	//error 
		
	}

                 

//============================close connection=============================================
mysqli_close($conn);	
//======================Display success message============================================
header('Location: https://centreholidays.com/agents/new-password.php?resetok=1');	//success 	

		}
		else
		{

$_GET['iq']=$iq;
$_GET['ti']=$ti;

header('Location: https://centreholidays.com/agents/index.php?resetok=2');	//error 		
			
		}
	}
	else
	{
		
$_GET['iq']=$iq;
$_GET['ti']=$ti;
		
header('Location: https://centreholidays.com/agents/index.php?resetok=2');	//passwords do not match 
	
		}

	}
	
}
ob_flush();
?> 