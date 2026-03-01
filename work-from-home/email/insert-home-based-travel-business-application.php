<?php 
ob_start();


include "/library/phpmailer/src/PHPMailer.php";
include "/library/phpmailer/src/SMTP.php";
include "/library/phpmailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//==================================================================================
 
if (isset($_POST['g-recaptcha-response'])) {
    //get verify response data
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LddJc8ZAAAAAHjejXQZeelaBNj8v1TDS8zivMxL&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);        
    if($response.success==false) {
		echo 'Recaptcha Verification failed';
        //proceed with form values
    } else {

//============================GEOLOCATION====================================================
$IP = $_SERVER['REMOTE_ADDR'];	
//include($_SERVER['DOCUMENT_ROOT'].'/geolocation/geolocation.php');	
//$FeedLocation=$City.' '.$Region;

$today = date("F d,Y"); 
$etime=time();

//===========================================================================================
$tihearaboutus;//Referred By
$sendertitle=$title;// Mr Miss
$senderfname=$fName;
$senderlname=$lName;
$chagent=$referralname;//Centre Holidays Travel Agent's Full Name
$sendermessage=$yourmessage;
$sendertico=$tico;
$plan;
$sendercity=$city;
$senderprovince=$province;
$senderphone=$phone;
$senderemail=$email;
$senderreferd=$tihearaboutus;
$pieces = explode("@", $senderemail);
$emailtype=$pieces[1]; 



//if ($emailtype !='yahoo.com' && $emailtype !='gmail.com') {
//===============send agent/center holidays to customer======================================
	$subject  = "Centre Holidays: Home Based Travel Business Application";	
	$from     = 'donotreply@centreholidays.com';	
//=======================message to center holidays==========================================	
$message1 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/work-from-home/email/home-based-travel-business-application.php");// embed php values in HTML file
$message1  = str_replace("_title_", $title, $message1);  					
$message1  = str_replace("_fName_", $fName, $message1); 
$message1  = str_replace("_lName_", $lName, $message1);  				                  
$message1  = str_replace("_phone_", $phone, $message1);
$message1  = str_replace("_email_", $email, $message1);
$message1  = str_replace("_city_", $city, $message1);	
$message1  = str_replace("_province_", $province, $message1);
$message1  = str_replace("_plan_", $plan, $message1);	
$message1  = str_replace("_tico_", $tico, $message1);
$message1  = str_replace("_message_", $yourmessage, $message1);	
$message1  = str_replace("_tihearaboutus_", $tihearaboutus, $message1);	
$message1  = str_replace("_referralname_", $referralname, $message1);	
								
					$headers1  = "From: $from\r\n";
                    $headers1 .= "Content-type: text/html\r\n";
					$to1 = 'jobs@centreholidays.com,'.$agentemail;
					mail($to1, $subject, $message1, $headers1);                   

//=======================message to consumer================================================
	
$message2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/work-from-home/email/home-based-travel-business-application-user-copy.php");// embed php values in HTML file
$message2  = str_replace("_title_", $title, $message2);  					
$message2  = str_replace("_fName_", $fName, $message2); 
$message2  = str_replace("_lName_", $lName, $message2);  				                  
$message2  = str_replace("_phone_", $phone, $message2);
$message2  = str_replace("_email_", $email, $message2);
$message2  = str_replace("_city_", $city, $message2);
$message2  = str_replace("_province_", $province, $message2);
$message2  = str_replace("_plan_", $plan, $message2);
$message2  = str_replace("_tico_", $tico, $message2);
$message2  = str_replace("_message_", $yourmessage, $message2);
$message2  = str_replace("_tihearaboutus_", $tihearaboutus, $message2);	
$message2  = str_replace("_referralname_", $referralname, $message2);										

					$headers2  = "From: $from\r\n";
                    $headers2 .= "Content-type: text/html\r\n";
					$to2 = $senderemail;
					mail($to2, $subject, $message2, $headers2);

		}
	}

//}


if ($emailtype =='yahoo.com') {
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer;
//
try {
    //Server settings
    $mail->SMTPDebug = 1;                      					//Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'centre_holidays@yahoo.com';                     //SMTP username
    $mail->Password   = 'fwklyiezvefcisjp';                               //SMTP password
  	//$mail2->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //$mail2->Port       = '465';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`    
	$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	$mail->From = 'donotreply@centreholidays.com';
	$mail->FromName = 'Centre Holidays'; //'Centre Holidays';// from name
	//$mail->AddAddress('jobs@centreholidays.com', 'Centre Holidays');  // Add a recipient  to name
	//$mail->AddAddress($agentemail, $referralname);  // additional to emails
	$mail->AddAddress($email, $fName);  // additional to emails
	//$mail->addCC('cc@example.com'); // CC 
	//$mail->addBCC($BusinessEmail); // BCC 
	$mail->addReplyTo('centre_holidays@yahoo.com', 'no-reply');// reply to email yahoo only since host/smtp is yahoo
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;//'Test Yahoo via CH';
    $mail->Body    = $message1;//'Test Yahoo via <strong>CH</strong>';
    //$mail->AltBody = 'Test Yahoo via Center holidays';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

if ($emailtype =='gmail.com') {
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
	$mail->FromName = 'Centre Holidays'; //'Centre Holidays';// from name
	//$mail->AddAddress('jobs@centreholidays.com', 'Centre Holidays');  // Add a recipient  to name
	//$mail->AddAddress($agentemail, $referralname);  // additional to emails
	$mail->AddAddress($email, $fName);  // additional to emails	
	//$mail->addCC('cc@example.com'); // CC 
	//$mail->addBCC($BusinessEmail); // BCC 
	$mail->addReplyTo('donotreply@centreholidays.com', 'donotreply');// reply to email gmail alias only since host/smtp is gmail
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;//'Test gmail via CH';
    $mail->Body    = $message1;//'Test gmail via <strong>CH</strong>';
    //$mail->AltBody = 'Test gmail via Center holidays';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


//=========================================DATABASE============================

include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_ch_new.php');

$sql = "INSERT INTO forms (formid, formtype, sendertitle, 
senderfname, senderlname, senderphone, senderemail, 
sendercity, senderprovince, sendercountry, plan, sendertico, 
sendermessage, senderreferd, chagent, senderip, formtime) 
VALUES ('', 'home-based-travel-agent-canada', '$sendertitle', 
'$senderfname', '$senderlname', '$senderphone', '$senderemail', 
'$sendercity', '$senderprovince', 'Canada', '$plan', '$sendertico', 
'$sendermessage', '$senderreferd', '$chagent', '$IP', '$etime')";

if (mysqli_query($conn, $sql)) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


ob_flush();
//echo $agentemail;
?>   
