<?php ob_start(); ?>

<?php
//Import PHPMailer classes into the global namespace
include "ssi/phpmailer/src/PHPMailer.php";
include "ssi/phpmailer/src/SMTP.php";
include "ssi/phpmailer/src/Exception.php";

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


echo $CurrentTime=time();
$Today = date("F d,Y"); 
$ptime=$CurrentTime - (60*60*24*7);// how far in the past 7 days

//===================================================================================

$servername = "localhost";
$username = "epikesca_admin";
$password = "Q1!W2@e3r4t5";
$dbname = "epikesca_epiktour";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM booking_1 WHERE FormCancelled='' AND FormApproved='' AND BookingTime > $ptime AND BookingStatus=1 ORDER BY BookID DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {

//==============
$BookingTime=$row['BookingTime'];
$BookUnique=$row['BookUnique'];
$urllink='https://centreholidays.com/clients/booking-authorization-email-form.php?bq='.$BookUnique;

//==============
$PTravellerFName=$row['PTravellerFName'];
$PTravellerLName=$row['PTravellerLName'];

//==============
$PTravellerFullName=$PTravellerFName.' '.$PTravellerLName;
$EmaiToFullName=$row['EmaiToFullName'];
$EmaiToEmail=$row['EmaiToEmail'];

//==============
$BusinessName=$row['BusinessName'];
$BusinessFullName=$row['BusinessFullName'];
$BusinessPhone=$row['BusinessPhone'];
$BusinessEmail=$row['BusinessEmail'];

//====================ACTUAL EMAIL BODY=======================================
$subject  = 'Booking Authorization Email Form Reminder';	
$from     = 'donoreply@centreholidays.com';	
	
$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Booking Authorization Email Form Reminder - Client | Centre Holidays</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
<div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
  <tbody>

  <tr>
    <td style="background:#082340; padding:30px; color:#fff; text-align:center;"><a href="#" target="_blank"><img src="https://centreholidays.com/img/centre-holidays-logo-footer.png" alt="Centre Holidays" style="border:none" /></a></td>
  </tr>
  <tr>
    <td style="background:#001431; padding:12px; color:#fff; text-align:center; font-size: 18px;"><strong>Booking Authorization Email Form Reminder</strong></td>
  </tr>
  </tbody>
</table>

<div style="padding: 20px; background: #fff; color: #001431;">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tbody>

<tr>
  <td width="520" colspan="2"><div>
  <table width="100%" cellpadding="0" cellspacing="0">
  <tbody>
    
  <tr>
    <td><p>Dear '.$EmaiToFullName.',<br />
      <br />
      Your travel advisor has sent you a booking authorization email form to review and fill in accordingly. Please go over the details provided and submit the email form back to them.<br />
<br />
If you have any questions in regards to the email form, please contact:<br />
<b>'.$BusinessName.'</b><br />'.$BusinessFullName.'<br />'.$BusinessPhone.'<br />'.$BusinessEmail.'</p>
      <center>
        <a href="'.$urllink.'" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #c69a50; border-radius: 0.42rem; text-decoration:none;" title="Go" target="_blank">See Booking Authorization Email Form</a>
      </center></td>
  </tr>
  </tbody>
  </table>
  </div></td>
</tr>
</tbody>
</table>
</div>
<div style="text-align: center; font-size: 12px; color: #7E8299; margin-top: 20px">
<p>Centre Holidays: 221-2155 Leanne Blvd. Mississauga, ON L5K 2K8<br>
TICO 50018114</p>
</div>
</div>
</div>
</body>
</html>';			
	
$pieces = explode("@", $EmaiToEmail);
echo $emailext=strtolower($pieces[1]);		
		
if ($emailext !='gmail.com' && $emailext !='yahoo.com' && $emailext !='hotmail.com' && $emailext !='outlook.com' && $emailext !='shaw.ca' && $emailext !='shaw.com')
{		
$headers  = "From: $from\r\n";
$headers .= "Content-type: text/html\r\n";	
//$headers1 .= 'Bcc: '.$EmaiToEmail . "\r\n";
$to = $EmaiToEmail;
mail($to, $subject, $message, $headers);   
}


if ($emailext=='yahoo.com')
{   
//==========================================================================================
//===========BELOW FOR YAHOO, OUTLOOK, SHAW, HOTMAIL========================================
//==========================================================================================

if (!empty($BusinessName))
$BusinessName=$BusinessName;
else
$BusinessName='Centre Holidays';

echo "seconed email";

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
    $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	$mail->From = 'centre_holidays@yahoo.com';
	$mail->FromName = $BusinessName; //'Centre Holidays';// from name
	$mail->AddAddress($EmaiToEmail, $EmaiToFullName);  // Add a recipient  to name
	//$mail->AddAddress($BusinessEmail, '');  // additional to emails
	//$mail->addCC('cc@example.com'); // CC 
	$mail->addBCC($BusinessEmail); // BCC 
	$mail->addReplyTo('centre_holidays@yahoo.com', 'no-reply');// reply to email yahoo only since host/smtp is yahoo
	
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;//'Test Yahoo via CH';
    $mail->Body    = $message;//'Test Yahoo via <strong>CH</strong>';
    //$mail->AltBody = 'Test Yahoo via Center holidays';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

if ($emailext=='gmail.com' || $emailext=='hotmail.com' || $emailext=='outlook.com' || $emailext=='shaw.ca' || $emailext=='shaw.com')
{ 
 
if (!empty($BusinessName))
$BusinessName=$BusinessName;
else
$BusinessName='Centre Holidays';

echo "third email";

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
	$mail->FromName = $BusinessName; //'Centre Holidays';// from name
	$mail->AddAddress($EmaiToEmail, $SendEmaiToFullName);  // Add a recipient  to name
	$mail->AddAddress($BusinessEmail, $BusinessName);  // additional to emails
	
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


										 
	}
}
?>

<?php ob_flush(); ?>
