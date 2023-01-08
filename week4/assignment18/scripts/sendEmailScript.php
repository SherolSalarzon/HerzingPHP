<?php
require "functions.php";
require "../vendor/autoload.php";

// ======= Change =======
// Change the Host of the Email
$host = "sherolsalarzon@gmail.com";
// ======= Change =======

$email = strip_tags($_POST['email']);
$subject = strip_tags($_POST['subject']);
$message = strip_tags($_POST['message']);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


// Sends Email
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;

$mail->Username = $host;
// ======= Change =======
// Use the Password Given by google 2 Factor authentication
$mail->Password = 'cdljalrtuaqzmnxw';
// ======= Change =======
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom($host);
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->send();

header("Location:../welcomePage.php");
exit();
?>