<?php 
ob_start();

$returnpage=$_POST['returnpage'];

$pro=$_POST['pro'];
$promocode=$_POST['promocode'];

$tid=$_POST['tid'];
$trp=$_POST['trp'];

if (!empty($tid))
$returnpage=$returnpage.'?tid='.$tid.'&trp='.$trp;
else
$returnpage=$returnpage.'?pro='.$pro.'&promocode='.$promocode;


if(!empty($_POST['travemail']) && ($_POST['question']==21) && !empty($_POST['travfname']) && !empty($_POST['salutation']) && !empty($_POST['numadults'])) 
{

//============================sanitize input========================================
include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize inputs

$AgentID=sanitize_system_string($_POST['AgentID']);
$AgentID=str_replace ('"',"",$AgentID);
$AgentID=str_replace ("'","",$AgentID);

$AgentEmail=sanitize_system_string($_POST['AgentEmail']);
$AgentEmail=str_replace ('"',"",$AgentEmail);
$AgentEmail=str_replace ("'","",$AgentEmail);

$AgentName=sanitize_system_string($_POST['AgentName']);
$AgentName=str_replace ('"',"",$AgentName);
$AgentName=str_replace ("'","",$AgentName);

$Title=sanitize_system_string($_POST['Title']);// Trip or promo title
$Title=str_replace ('"',"",$Title);
$Title=str_replace ("'","",$Title);

$Linkeds=$_POST['Linkeds'];//'https://centreholidays.com/special-offers/featured-offer.php?pro='.$pro.'&promocode='.$promocode;
$Linkeds=str_replace ('"',"",$Linkeds);
$Linkeds=str_replace ("'","",$Linkeds);

$salutation=sanitize_system_string($_POST['salutation']);
$salutation=str_replace ('"',"",$salutation);
$salutation=str_replace ("'","",$salutation);

$travfname=sanitize_system_string($_POST['travfname']);
$travfname=str_replace ('"',"",$travfname);
$travfname=str_replace ("'","",$travfname);

$travlname=sanitize_system_string($_POST['travlname']);
$travlname=str_replace ('"',"",$travlname);
$travlname=str_replace ("'","",$travlname); 

$travphone=sanitize_system_string($_POST['travphone']);
$travphone=str_replace ('"',"",$travphone);
$travphone=str_replace ("'","",$travphone);

$travemail=sanitize_system_string($_POST['travemail']);
$travemail=str_replace ('"',"",$travemail);
$travemail=str_replace ("'","",$travemail);

$Operator=sanitize_system_string($_POST['Operator']);
$Operator=str_replace ('"',"",$Operator);
$Operator=str_replace ("'","",$Operator);

$tripfinancing=sanitize_system_string($_POST['tripfinancing']);
$tripfinancing=str_replace ('"',"",$tripfinancing);
$tripfinancing=str_replace ("'","",$tripfinancing);

$departuredate=sanitize_system_string($_POST['departuredate']);
$departuredate=str_replace ('"',"",$departuredate);
$departuredate=str_replace ("'","",$departuredate);

$numadults=sanitize_system_string($_POST['numadults']);
$numadults=str_replace ('"',"",$numadults);
$numadults=str_replace ("'","",$numadults);

$numchildren=sanitize_system_string($_POST['numchildren']);
$numchildren=str_replace ('"',"",$numchildren);
$numchildren=str_replace ("'","",$numchildren);

$departfrom=sanitize_system_string($_POST['departfrom']);
$departfrom=str_replace ('"',"",$departfrom);
$departfrom=str_replace ("'","",$departfrom);

$tripdetails=sanitize_system_string($_POST['tripdetails']);
$tripdetails=str_replace ('"',"",$tripdetails);
$tripdetails=str_replace ("'","",$tripdetails);

$hearaboutus=sanitize_system_string($_POST['hearaboutus']);	
$hearaboutus=str_replace ('"',"",$hearaboutus);
$hearaboutus=str_replace ("'","",$hearaboutus);
	
//if (isset($_POST['g-recaptcha-response'])) {
	//$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LddJc8ZAAAAAHjejXQZeelaBNj8v1TDS8zivMxL&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);        
    //if($response.success==false) {
		//echo 'Verification failed';
		//header('Location:'.$returnpage.'&resp=0');// ie https://centreholidays.com/special-offers/featured-offer.php
    //} else {

//============================GEOLOCATION===========================================
$IP = $_SERVER['REMOTE_ADDR'];	
//include($_SERVER['DOCUMENT_ROOT'].'/geolocation/geolocation.php');	
//$FeedLocation=$City.' '.$Region;

$today = date("F d,Y"); 
$etime=time();


//===============send agent/center holidays to customer======================================
	$subject  = "Centre Holidays - Trip / Offer Inquiry";	
	$from     = 'donotreply@centreholidays.com';	
//=======================message to center holidays==========================================	
$message1 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/trip-offer-inquiry.php");// embed php values in HTML file
$message1  = str_replace("_AgentEmail_", $AgentEmail, $message1);  					
$message1  = str_replace("_AgentName_", $AgentName, $message1); 
$message1  = str_replace("_salutation_", $salutation, $message1);  				                  
$message1  = str_replace("_firstname_", $travfname, $message1);
$message1  = str_replace("_lastname_", $travlname, $message1);
$message1  = str_replace("_travphone_", $travphone, $message1);
$message1  = str_replace("_travemail_", $travemail, $message1);	
$message1  = str_replace("_Title_", $Title, $message1);	
$message1  = str_replace("_Linkeds_", $Linkeds, $message1);	
$message1  = str_replace("_departuredate_", $departuredate, $message1);	
$message1  = str_replace("_numadults_", $numadults, $message1);	
$message1  = str_replace("_numchildren_", $numchildren, $message1);	
$message1  = str_replace("_Operator_", $Operator, $message1);	
$message1  = str_replace("_departfrom_", $departfrom, $message1);
$message1  = str_replace("_tripfinancing_", $tripfinancing, $message1);
$message1  = str_replace("_hearaboutus_", $hearaboutus, $message1);					
								
					$headers1  = "From: $from\r\n";
                    $headers1 .= "Content-type: text/html\r\n";
					$to1 = 'inquire@centreholidays.com, '.$AgentEmail;
					mail($to1, $subject, $message1, $headers1);                   

//=======================message to consumer================================================
	
$message2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/trip-offer-inquiry-user-copy.php");// embed php values in HTML file
$message2  = str_replace("_AgentEmail_", $AgentEmail, $message2);  					
$message2  = str_replace("_AgentName_", $AgentName, $message2); 
$message2  = str_replace("_salutation_", $salutation, $message2);  				                  
$message2  = str_replace("_firstname_", $travfname, $message2);
$message2  = str_replace("_lastname_", $travlname, $message2);
$message2  = str_replace("_travphone_", $travphone, $message2);
$message2  = str_replace("_travemail_", $travemail, $message2);	
$message2  = str_replace("_Title_", $Title, $message2);	
$message2  = str_replace("_Linkeds_", $Linkeds, $message2);
$message2  = str_replace("_departuredate_", $departuredate, $message2);		
$message2  = str_replace("_numadults_", $numadults, $message2);	
$message2  = str_replace("_numchildren_", $numchildren, $message2);	
$message2  = str_replace("_Operator_", $Operator, $message2);
$message2  = str_replace("_departfrom_", $departfrom, $message2);
$message2  = str_replace("_tripfinancing_", $tripfinancing, $message2);
$message2  = str_replace("_hearaboutus_", $hearaboutus, $message2);										

					$headers2  = "From: $from\r\n";
                    $headers2 .= "Content-type: text/html\r\n";
					$to2 = $travemail; 
					mail($to2, $subject, $message2, $headers2);



	include($_SERVER['DOCUMENT_ROOT'].'/library/ipinfo-geo.php');// check if country blacklisted
	
	$flname=$_POST['travfname'];	
	include($_SERVER['DOCUMENT_ROOT'].'/library/ipinfo.php');	


	header('Location:'.$returnpage.'&resp=1');// ie https://centreholidays.com/special-offers/featured-offer.php

		//}
	//}
	//else
	//header('Location:'.$returnpage.'&resp=0');// ie https://centreholidays.com/special-offers/featured-offer.php
}
else
header('Location:'.$returnpage.'&resp=0');// ie https://centreholidays.com/special-offers/featured-offer.php

ob_flush(); ?>   


