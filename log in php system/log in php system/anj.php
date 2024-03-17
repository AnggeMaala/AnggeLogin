<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ieulin7@gmail.com';                     //SMTP username
    $mail->Password   = 'kxgr xjmt ymgp gtij';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('ieulin7@gmail.com', 'irene');
    $mail->addAddress('angelinemaala2002@gmail.com', 'angeline');     //Add a recipient

    $confirmationLink = 'http://localhost/log%20in%20php%20system/log%20in%20php%20system/register.php' . md5(uniqid());
    //Content

    $mail->isHTML(true);
    $mail->Subject = 'Registration Confirmation Link';
    $mail->Body    = 'You are registered pls click the link: <a href="' . $confirmationLink . '">Click Me</a>';



    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
