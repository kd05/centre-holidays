<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>emailtest</title>
</head>

<body>
<?php
//Import PHPMailer classes into the global namespace
include "ssi/phpmailer/src/PHPMailer.php";
include "ssi/phpmailer/src/SMTP.php";
include "ssi/phpmailer/src/Exception.php";

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
Email <input type="email" value="" name="email" />
<br />
Name <input type="text" value="" name="name" />
<br />
<input type="submit" />
<hr />
</form>

<?php
$email=$_POST['email'];
$name=$_POST['name'];

if (isset($email)) { 
//==========================================================================================
//===========BELOW FOR YAHOO, OUTLOOK, SHAW, HOTMAIL========================================
//==========================================================================================

$subject='test gmail ch';
$message1='this is a test body';


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
	$mail->AddAddress($name, $SendEmaiToFullName);  // Add a recipient  to name
	$mail->AddAddress($email, $BusinessName);  // additional to emails
	
	//$mail->addCC('cc@example.com'); // CC 
	//$mail->addBCC($BusinessEmail); // BCC 
	$mail->addReplyTo('donotreply@centreholidays.com', 'donotreply');// reply to email yahoo only since host/smtp is yahoo
	
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;//'Test Yahoo via CH';
    $mail->Body    = $message1;//'Test Yahoo via <strong>CH</strong>';
    //$mail->AltBody = 'Test Yahoo via Center holidays';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

?>
</body>
</html>
<?php ob_flush(); ?>