<?php
$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$_message = $_POST['message'] ?? '';

// Validation des champs
if (empty($nom) || empty($email) || empty($_message)) {
    echo 'Tous les champs sont requis.';
    exit;
}

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create an instance
$mail = new PHPMailer(true);

try {
    // Server settings                   
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vanelkenfack7@gmail.com';             // SMTP username
    $mail->Password   = 'kghf wlqx qqeb ookw';                 // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          // Enable implicit TLS encryption
    $mail->Port       = 465;                                   // TCP port to connect to

    // Recipients
    $mail->setFrom('vanelkenfack7@gmail.com', $nom);          // Use the user's name
    $mail->addAddress('vanelkenfack7@gmail.com');             // Add a recipient
   
    // Content
    $mail->isHTML(true);                                      // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $_message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}