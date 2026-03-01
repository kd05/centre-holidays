<?php
ob_start();

$flip=$_SERVER['REMOTE_ADDR'];// IP ADDRESS

"PHP_SELF ".$_SERVER['PHP_SELF'];

"GATEWAY_INTERFACE ".$_SERVER['GATEWAY_INTERFACE'];

"SERVER_ADDR ".$_SERVER['SERVER_ADDR'];

"REMOTE_ADDR ".$_SERVER['REMOTE_ADDR'];

"SERVER_NAME ".$_SERVER['SERVER_NAME'];

"SERVER_SOFTWARE ".$_SERVER['SERVER_SOFTWARE'];

"SERVER_PROTOCOL ".$_SERVER['SERVER_PROTOCOL'];

"REQUEST_METHOD ".$_SERVER['REQUEST_METHOD'];

"REQUEST_TIME ".$_SERVER['REQUEST_TIME'];

"QUERY_STRING ". $_SERVER['QUERY_STRING'];

"HTTP_ACCEPT ".$_SERVER['HTTP_ACCEPT'];

"HTTP_ACCEPT_CHARSET ".$_SERVER['HTTP_ACCEPT_CHARSET'];

"HTTP_REFERER ".$_SERVER['HTTP_REFERER'];

"REMOTE_HOST ".$_SERVER['REMOTE_HOST'];

"REMOTE_PORT ".$_SERVER['REMOTE_PORT'];

"SCRIPT_FILENAME ".$_SERVER['SCRIPT_FILENAME'];

"SERVER_ADMIN ".$_SERVER['SERVER_ADMIN'];

"SERVER_PORT ".$_SERVER['SERVER_PORT'];

"SERVER_SIGNATURE ".$_SERVER['SERVER_SIGNATURE'];

"PATH_TRANSLATED ".$_SERVER['PATH_TRANSLATED'];

"SCRIPT_NAME ".$_SERVER['SCRIPT_NAME'];

"SCRIPT_URI ".$_SERVER['SCRIPT_URI'];

"HTTP_USER_AGENT ".$_SERVER['HTTP_USER_AGENT'];

"HTTP_X_FORWARDED_FOR".$_SERVER['HTTP_X_FORWARDED_FOR'];

//============================USING FREE IPSTACK KEY=======@widewebvision.ca=================

$flpage=$_SERVER['PHP_SELF'];
$fltimestamp=$_SERVER['REQUEST_TIME'];
$fltime=date('l jS \of F Y h:i:s A', $fltimestamp);
$flinfo='HTTP_X_FORWARDED_FOR: '.$_SERVER['HTTP_X_FORWARDED_FOR'].', REMOTE_HOST: '.$_SERVER['REMOTE_HOST'].', REMOTE_PORT: '.$_SERVER['REMOTE_PORT'].', HTTP_USER_AGENT: '.$_SERVER['HTTP_USER_AGENT'];


/*if (empty($_SESSION["flcountry"]))
{
$access_key = '5c36d311533cc22c9cab9d89226fbcf7';//
$ch = curl_init('http://api.ipstack.com/'.$flip.'?access_key='.$access_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);
$api_result = json_decode($json, true);
$_SESSION["flarea"] =$api_result['region_name'];
$_SESSION["flcity"] = $api_result['city'];
$_SESSION["flcountry"] = $api_result['country_name'];
$flcookie=$_COOKIE['flcookie'];
$flarea = $_SESSION["flarea"];
$flcity = $_SESSION["flcity"];
$flcountry = $_SESSION["flcountry"];

if ($flcount1 > 3 || $flcountry=='Russia' || $flcountry=='Bulgaria' || $flcountry=='Ukraine' || $flcountry=='Netherlands')
header('Location: http://www.google.com/');
}

if ($flcount1 > 3 || $flcountry=='Russia' || $flcountry=='Bulgaria' || $flcountry=='Ukraine' || $flcountry=='Netherlands')
header('Location: http://www.google.com/');*/

$flarea = $_SESSION["flarea"];
$flcity = $_SESSION["flcity"];
$flcountry = $_SESSION["flcountry"];

//==========================collect and insert into database===========================

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');// NEW CH DATABASE SAME NAMING===========


$sqlinfo = "INSERT INTO formsiplist (flid, flip, fltimestamp, fltime, flcountry, flarea, flcity, flpage, flinfo)
VALUES ('', '$flip', '$fltimestamp', '$fltime', '$flcountry', '$flarea', '$flcity', '$flpage', '$flinfo')";

if (mysqli_query($conn, $sqlinfo)) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sqlinfo . "<br>" . mysqli_error($conn);
}


//================================IF THIS IP USED SEVERAL TIMES WITHIN 60 SECONEDS DIVERT AWAY=================

$fltidiff = $fltimestamp-86400;// the last 24 hrs

$sqlinfo1 = "SELECT * FROM formsiplist WHERE flip='$flip' AND fltimestamp > $fltidiff ";
$result1 = mysqli_query($conn, $sqlinfo1);
$flcount1=mysqli_num_rows($result1);// number of messages in the last 24 hrs 

//if ($flcount1 > 4 || $flcountry=='United Arab Emirates' || $flcountry=='United States' || $flcountry=='France' || $flcountry=='Poland' || $flcountry=='India' || $flcountry=='Thailand' || $flcountry=='Belgium' || $flcountry=='Germany' || $flcountry=='Switzerland' || $flcountry=='Russia' || $flcountry=='Bulgaria' || $flcountry=='Ukraine' || $flcountry=='Taiwan' || $flcountry=='China' || $flcountry=='Netherlands' || $flcountry=='Brazil' || $flcountry=='Vietnam'  || $flcountry=='Hong Kong')
if ($flcount1 > 3)
{
	$sqlbl = "INSERT INTO blacklist (blid, blip, bltime, blcountry, blarea, blcity) VALUES ('', '$flip', '$fltimestamp', '$flcountry', '$flarea', '$flcity')";
	
	if (mysqli_query($conn, $sqlbl)) {
	header('Location: http://www.google.com/');
	} else {
	header('Location: http://www.google.com/');
	}
	
}

ob_flush();
?>