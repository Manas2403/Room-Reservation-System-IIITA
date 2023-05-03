<?php
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
require "../PHPMailer/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;


function sendEmail($to, $subject, $message)
{ //send an email
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "kapoorraghav944@gmail.com";
    $mail->Password = "wjcnhyovssbkiffo";
    $mail->Port = 587;
    $mail->setFrom('kapoorraghav944@gmail.com', 'Manas Gupta');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    if ($mail->send()) {
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>