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


//Load Composer's autoloader
//require 'vendor/autoload.php';

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
  	$mail2->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail2->Port       = '465';      
	$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    //$mail->setFrom('centre_holidays@yahoo.com', 'Mailer');
    //$mail->addAddress('centre_holidays@yahoo.com', 'Joe User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

	$mail->From = 'centre_holidays@yahoo.com';
	$mail->FromName = 'Centre Holidays';// from name
	$mail->AddAddress($email, $name);  // Add a recipient  to name
	//$mail->AddAddress('andre@centreholidays.com', 'Andre');  // Name is option
	$mail->addReplyTo('centre_holidays@yahoo.com', 'no-reply');
	
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test Yahoo via CH';
    $mail->Body    = 'Test Yahoo via <strong>CH</strong>';
    $mail->AltBody = 'Test Yahoo via Center holidays';

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