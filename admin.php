<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['SMTP_USERNAME'];
    $mail->Password   = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('mothilal2328@gmail.com', 'Jack');
    $mail->addAddress('mothilal044@gmail.com', 'Jack');

    $mail->isHTML(true);
    $mail->Subject = 'Registration Successful';
    $mail->Body    = "Hi 'Jacky',<br><br>Thank you for registering on our site.";

    $mail->send();
    $res = "Email has been sent.";
} catch (Exception $e) {
    $res = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

echo $res;


?>
