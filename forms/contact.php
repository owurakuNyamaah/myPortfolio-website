<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include autoload if installed via Composer
// require 'vendor/autoload.php';

// OR if installed manually, adjust path as needed
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'owurakun@gmail.com';                 // SMTP username
    $mail->Password   = 'iodo pvel njik ulin';                    // SMTP password (use an App Password for Gmail)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Encryption (SSL)
    $mail->Port       = 465;                                    // TCP port

    // Recipients
    $mail->setFrom('owurakun@gmail.com', 'Owuraku Nyamaah' );
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->addAddress('owurakun@gmail.com', 'Owuraku' );

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];

    $mail->send();
    echo 'Your message has been sent. Thank you!';
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>
