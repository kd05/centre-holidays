<?php 
ob_start();

//Import PHPMailer classes into the global namespace
include "../../agents/ssi/phpmailer/src/PHPMailer.php";
include "../../agents/ssi/phpmailer/src/SMTP.php";
include "../../agents/ssi/phpmailer/src/Exception.php";

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$month=strip_tags($_POST['month']);// =======================
$year=strip_tags($_POST['year']);// =======================
$type = ucwords(strip_tags(($_POST['type'])));//=====================

if (!empty($travemail))
{	
	
//if (isset($_POST['g-recaptcha-response'])) {
    //get verify response data
	//$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LddJc8ZAAAAAHjejXQZeelaBNj8v1TDS8zivMxL&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);        
    //if($response.success==false) {
		//echo 'Verification failed';
        //proceed with form values
    //} else {
		
//============================GEOLOCATION===========================================
$IP = $_SERVER['REMOTE_ADDR'];	
//include($_SERVER['DOCUMENT_ROOT'].'/geolocation/geolocation.php');	
//$FeedLocation=$City.' '.$Region;

$today = date("F d,Y"); 
$etime=time();

//===========================================================================================
$sendertitle=$salutation;
$senderfname=$travfname;
$senderlname=$travlname;
$senderphone=$travphone;
$senderemail=$travemail;
$sendermessage=$addnotes;
$senderreferd=$hearaboutus;	
$chagent=$agentname;

$type;//======================not used

$departcountry='Canada';
$departfrom;
$tripfinancing;
$destination; 
$departuredate; 
$triplength;  				                  
$numadults;
$numchildren;			
$budget;
$triptype;
$interests;	
$agentemail;
$AgentID;

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');

$sql = "INSERT INTO forms (formid, formtype, sendertitle, 
senderfname, senderlname, senderphone, senderemail, 
sendermessage, senderreferd, chagent, senderip, formtime, departcountry, 
departfrom, tripfinancing, destination, departuredate, triplength, 
numadults, numchildren, budget, triptype, interests, agentemail, AgentID) 
VALUES ('', 'custom-trip-inquiries', '$sendertitle', 
'$senderfname', '$senderlname', '$senderphone', '$senderemail',  
'$sendermessage', '$senderreferd', '$chagent', '$IP', '$etime', 
'$departcountry', '$departfrom', '$tripfinancing', '$destination', 
'$departuredate', '$triplength', '$numadults', '$numchildren', '$budget', 
'$triptype', '$interests', '$agentemail', '$AgentID')";


if (mysqli_query($conn, $sql)) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//===============send agent/center holidays to customer======================================
	$subject  = "Centre Holidays - Custom Trip Inquiry";	
	$from     = "donotreply@centreholidays.com";	
//=======================message to center holidays==========================================	
$message1 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/custom-trip-inquiry.php");// embed php values in HTML file
$message1  = str_replace("_destination_", $destination, $message1); 
$message1  = str_replace("_departuredate_", $departuredate, $message1); 
$message1  = str_replace("_triplength_", $triplength, $message1);  				                  
$message1  = str_replace("_numadults_", $numadults, $message1);
$message1  = str_replace("_numchildren_", $numchildren, $message1);			
$message1  = str_replace("_budget_", $budget, $message1);
$message1  = str_replace("_triptype_", $triptype, $message1);
$message1  = str_replace("_interests_", $interests, $message1);
$message1  = str_replace("_salutation_", $salutation, $message1);
$message1  = str_replace("_travfname_", $travfname, $message1);
$message1  = str_replace("_travlname_", $travlname, $message1);
$message1  = str_replace("_travphone_", $travphone, $message1);
$message1  = str_replace("_travemail_", $travemail, $message1);
$message1  = str_replace("_type_", $type, $message1);
$message1  = str_replace("_departcountry_", $departcountry, $message1);
$message1  = str_replace("_departfrom_", $departfrom, $message1);
$message1  = str_replace("_tripfinancing_", $tripfinancing, $message1);
$message1  = str_replace("_addnotes_", $addnotes, $message1);
$message1  = str_replace("_hearaboutus_", $hearaboutus, $message1);	
$message1  = str_replace("_AgentName_", $agentname, $message1);	
$message1  = str_replace("_AgentEmail_", $agentemail, $message1);	
								
	$headers1  = "From: $from\r\n";
	$headers1 .= "Content-type: text/html\r\n";
	//$to1 = 'ash@widewebvision.ca';
	
	if ($agentemail !='inquire@centreholidays.com')
	$to1 = 'inquire@centreholidays.com, '.$agentemail;
	elseif ($agentemail =='inquire@centreholidays.com')
	$to1 = $agentemail;
	
	mail($to1, $subject, $message1, $headers1);                   


//=======================message to consumer================================================
	
$message2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forms/email/custom-trip-inquiry-user-copy.php");// embed php values in HTML file
$message2  = str_replace("_destination_", $destination, $message2); 
$message2  = str_replace("_departuredate_", $departuredate, $message2); 
$message2  = str_replace("_triplength_", $triplength, $message2);  				                  
$message2  = str_replace("_numadults_", $numadults, $message2);
$message2  = str_replace("_numchildren_", $numchildren, $message2);			
$message2  = str_replace("_budget_", $budget, $message2);
$message2  = str_replace("_triptype_", $triptype, $message2);
$message2  = str_replace("_interests_", $interests, $message2);
$message2  = str_replace("_salutation_", $salutation, $message2);
$message2  = str_replace("_travfname_", $travfname, $message2);
$message2  = str_replace("_travlname_", $travlname, $message2);
$message2  = str_replace("_travphone_", $travphone, $message2);
$message2  = str_replace("_travemail_", $travemail, $message2);
$message2  = str_replace("_type_", $type, $message2);
$message2  = str_replace("_departcountry_", $departcountry, $message2);
$message2  = str_replace("_departfrom_", $departfrom, $message2);
$message2  = str_replace("_tripfinancing_", $tripfinancing, $message2);
$message2  = str_replace("_addnotes_", $addnotes, $message2);
$message2  = str_replace("_hearaboutus_", $hearaboutus, $message2);	
$message2  = str_replace("_AgentName_", $agentname, $message2);	
$message2  = str_replace("_AgentEmail_", $agentemail, $message2);								

if ($emailext !='gmail.com' && $emailext !='yahoo.com' &&  $emailext !='hotmail.com' && $emailext !='outlook.com' && $emailext !='shaw.ca' && $emailext !='shaw.com')
{ 

$headers2  = "From: $from\r\n";
$headers2 .= "Content-type: text/html\r\n";
$to2 = $travemail;
mail($to2, $subject, $message2, $headers2);

}

if ($emailext=='gmail.com' || $emailext=='hotmail.com' || $emailext=='outlook.com' || $emailext=='shaw.ca' || $emailext=='shaw.com')
{ 
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer;
//
try {
    //Server settings
	
    $mail->SMTPDebug = 1;                      					//Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'donotreply@centreholidays.com';//'centre_holidays@yahoo.com';                     //SMTP username
    $mail->Password   = 'ffdfkjkayimmzifd';                               //SMTP password
  	//$mail2->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //$mail2->Port       = '465';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`    
	$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	$mail->From = 'donotreply@centreholidays.com';
	$mail->FromName = $chagent; //'Centre Holidays';// from name
	$mail->AddAddress($travemail, $senderfname);  // Add a recipient  to name
	//$mail->AddAddress($BusinessEmail, $BusinessName);  // additional to emails
	
	//$mail->addCC('cc@example.com'); // CC 
	$mail->addBCC($BusinessEmail); // BCC 
	$mail->addReplyTo('donotreply@centreholidays.com', 'donotreply');// reply to email gmail alias only since host/smtp is gmail
	
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;//'Test gmail via CH';
    $mail->Body    = $message;//'Test gmail via <strong>CH</strong>';
    //$mail->AltBody = 'Test gmail via Center holidays';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}



//======================Display success message============================================
?>

<?php	

		//}
	//}
}
ob_flush();
?>   
