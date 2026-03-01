<?php ob_start(); ?>




<?php
//phpinfo();

//Import PHPMailer classes into the global namespace
include "ssi/phpmailer/src/PHPMailer.php";
include "ssi/phpmailer/src/SMTP.php";
include "ssi/phpmailer/src/Exception.php";

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;




//echo "<h1>2</h1>";

$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Username = 'krunal.work.05@gmail.com';
$mail->Password = 'ospe fioh danv qnlo';
//$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';

$mail->SMTPSecure = 'ssl';
$mail->Port = 465; // Define recipient, subject, and message
$mail->setFrom('krunal.work.05@gmail.com');
$mail->addAddress('krunal@geekpower.ca');
$mail->Subject = 'Test Email';
$mail->Body = 'This is a test email message.'; // Send the email


if (!$mail->send()) {
    echo 'Message could not be sent. '
        .'Mailer Error: '.$mail->ErrorInfo;
//    die($mail->ErrorInfo);

    var_dump($mail);

} else {

    echo 'Message has been sent.';
}


?>

<?php ob_flush() ?>