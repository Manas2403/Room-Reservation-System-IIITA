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
    $mail->Username = "iit2021146@iiita.ac.in";
    $mail->Password = "tzatkghphgaotkbi";
    $mail->Port = 587;
    $mail->setFrom('iit2021146@iiita.ac.in', 'Manas Gupta');
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