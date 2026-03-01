<?php ob_start();

//phpinfo();

//Import PHPMailer classes into the global namespace
include "ssi/phpmailer/src/PHPMailer.php";
include "ssi/phpmailer/src/SMTP.php";
include "ssi/phpmailer/src/Exception.php";

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer;
//
try {
    //Server settings

    $mail->SMTPDebug = 1;                      					//Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'donotreply@centreholidays.com';    //'centre_holidays@yahoo.com';                     //SMTP username
    $mail->Password   = 'ffdfkjkayimmzifd';                               //SMTP password
    //$mail2->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //$mail2->Port       = '465';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';//'ssl';//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->From = 'donotreply@centreholidays.com';
    $mail->FromName = 'Centre Holidays'; //'Centre Holidays';// from name

//    $mail->AddAddress($EmaiToEmail, $SendEmaiToFullName);  // Add a recipient  to name
//    $mail->AddAddress($BusinessEmail, $BusinessName);  // additional to emails


    $mail->AddAddress('krunal@geekpower.ca', 'Krunal');  // Add a recipient  to name
//    $mail->AddAddress($BusinessEmail, $BusinessName);  // additional to emails

    //$mail->addCC('cc@example.com'); // CC
//    $mail->addBCC($BusinessEmail); // BCC
    $mail->addReplyTo('donotreply@centreholidays.com', 'donotreply');// reply to email gmail alias only since host/smtp is gmail

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test gmail via CH';
    $mail->Body    = 'Test gmail via <strong>Centre holiday</strong>';
    //$mail->AltBody = 'Test gmail via Center holidays';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
