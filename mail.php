<?php

//Import PHPMailer classes into the global namespace//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

$email = $_POST['user_email'];
    
    try {
 //Server settings$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output$mail->isSMTP(); //Send using SMTP$mail->Host = 'smtp.example.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'nurik.sait.rage@mail.ru'; //SMTP username
    $mail->Password = 'Nurmagomed05'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nurik.sait.rage@mail.ru', 'Mailer');
 $mail->addAddress('ebanashka.gorade@inbox.ru', 'Joe User'); //Add a recipient
 //    $mail->addAddress('ellen@example.com'); //Name is optional
 //    $mail->addReplyTo('info@example.com', 'Information');
 // $mail->addCC('cc@example.com');
 // $mail->addBCC('bcc@example.com');

 //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Заявка с тестового сайта';
 $mail->Body = '' .$email . ' оставил заявку';
 $mail->AltBody = '';

 $mail->send();
 echo 'Сообщение отправлено';
} catch (Exception $e) {
 echo "Error: {$mail->ErrorInfo}";
}
?>
