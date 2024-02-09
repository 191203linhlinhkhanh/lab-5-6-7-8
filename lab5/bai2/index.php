<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'dre';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
     $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_smtp_username';
    $mail->Password = 'your_smtp_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('your_email@example.com', 'Your Name');
    
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = "Name: $name <br> Email: $email <br> Message: $message";
    
    $mail->send();
    echo 'Dã gửi mail';
} catch (Exception $e) {
    echo "Lỗi ròi chị linh ơi: {$mail->ErrorInfo}";
}
?>