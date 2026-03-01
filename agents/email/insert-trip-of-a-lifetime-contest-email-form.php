<?php 
ob_start();
 
//============================sanitize input========================================
//include_once($_SERVER['DOCUMENT_ROOT'].'/library/sanatize.php');// sanitize inputs

//Travel Advisor Details
$AgentID=strip_tags(trim($_POST['AgentID']));
//
$agentname=strip_tags(trim($_POST['agentname']));
//
$agentemail=strip_tags(trim($_POST['agentemail']));
//
//Booking Details
$bookingtype=strip_tags(trim($_POST['bookingtype']));
//
$supplier=strip_tags(trim(($_POST['supplier'])));
//
$supplierbookingnumber= strip_tags(strtolower(trim(($_POST['supplierbookingnumber']))));
//
$invoicenumber=strip_tags(trim($_POST['invoicenumber']));
//
$bookingdate=strip_tags(trim($_POST['bookingdate']));
//
$traveldate=strip_tags(trim($_POST['traveldate']));
//
//Primary Traveller
$pttitle=strip_tags(trim($_POST['pttitle']));
//
$ptfirstname=strip_tags(trim($_POST['ptfirstname']));
//
$ptlastname=strip_tags(trim($_POST['ptlastname']));
//
$ptage=strip_tags(trim($_POST['ptage']));
//
$ptphone=strip_tags(trim($_POST['ptphone']));
//
$ptemail=strip_tags(trim($_POST['ptemail']));
//
//Additional Traveller 1
$at1title=strip_tags(trim($_POST['at1title']));
//
$at1firstname=strip_tags(trim($_POST['at1firstname']));
//
$at1lastname=strip_tags(trim($_POST['at1lastname']));
//
$at1age=strip_tags(trim($_POST['at1age']));
//
//Additional Traveller 2
$at2title=strip_tags(trim($_POST['at2title']));
//
$at2firstname=strip_tags(trim($_POST['at2firstname']));
//
$at2lastname=strip_tags(trim($_POST['at2lastname']));
//
$at2age=strip_tags(trim($_POST['at2age']));
//
//Additional Traveller 3
$at3title=strip_tags(trim($_POST['at3title']));
//
$at3firstname=strip_tags(trim($_POST['at3firstname']));
//
$at3lastname=strip_tags(trim($_POST['at3lastname']));
//
$at3age=strip_tags(trim($_POST['at3age']));
//
//Additional Traveller 4
$at4title=strip_tags(trim($_POST['at4title']));
//
$at4firstname=strip_tags(trim($_POST['at4firstname']));
//
$at4lastname=strip_tags(trim($_POST['at4lastname']));
//
$at4age=strip_tags(trim($_POST['at4age']));
//
//===============send agent/center holidays to customer======================================
	$subject  = "Centre Holidays - Trip Of A Lifetime Contest Booking Details";	
	$from     = 'donotreply@centreholidays.com';	
//=======================message to center holidays==========================================	
$message1 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/agents/email/trip-of-a-lifetime-contest-email-form.php");// embed php values in HTML file
$message1  = str_replace("_AgentID_", $AgentID, $message1); 
$message1  = str_replace("_agentname_", $agentname, $message1);  					
$message1  = str_replace("_agentemail_", $agentemail, $message1); 
$message1  = str_replace("_bookingtype_", $bookingtype, $message1);
$message1  = str_replace("_supplier_", $supplier, $message1);
$message1  = str_replace("_supplierbookingnumber_", $supplierbookingnumber, $message1);
$message1  = str_replace("_invoicenumber_", $invoicenumber, $message1);	
$message1  = str_replace("_bookingdate_", $bookingdate, $message1);
$message1  = str_replace("_traveldate_", $traveldate, $message1);	
$message1  = str_replace("_pttitle_", $pttitle, $message1);
$message1  = str_replace("_ptfirstname_", $ptfirstname, $message1);	
$message1  = str_replace("_ptlastname_", $ptlastname, $message1);	
$message1  = str_replace("_ptage_", $ptage, $message1);
$message1  = str_replace("_ptphone_", $ptphone, $message1);
$message1  = str_replace("_ptemail_", $ptemail, $message1);
$message1  = str_replace("_at1title_", $at1title, $message1);
$message1  = str_replace("_at1firstname_", $at1firstname, $message1);
$message1  = str_replace("_at1lastname_", $at1lastname, $message1);
$message1  = str_replace("_at1age_", $at1age, $message1);
$message1  = str_replace("_at2title_", $at2title, $message1);
$message1  = str_replace("_at2firstname_", $at2firstname, $message1);
$message1  = str_replace("_at2lastname_", $at2lastname, $message1);
$message1  = str_replace("_at2age_", $at2age, $message1);
$message1  = str_replace("_at3title_", $at3title, $message1);
$message1  = str_replace("_at3firstname_", $at3firstname, $message1);
$message1  = str_replace("_at3lastname_", $at3lastname, $message1);
$message1  = str_replace("_at3age_", $at3age, $message1);
$message1  = str_replace("_at4title_", $at4title, $message1);
$message1  = str_replace("_at4firstname_", $at4firstname, $message1);
$message1  = str_replace("_at4lastname_", $at4lastname, $message1);
$message1  = str_replace("_at4age_", $at4age, $message1);	
								
					$headers1  = "From: $from\r\n";
                    $headers1 .= "Content-type: text/html\r\n";
					$to1 = 'jillian@centreholidays.com, '.$agentemail;
					mail($to1, $subject, $message1, $headers1);                   

ob_flush();
//echo $agentemail;
?>   
