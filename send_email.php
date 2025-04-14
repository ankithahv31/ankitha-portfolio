<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ankithahv31@gmail.com';        // ✅ Your Gmail
        $mail->Password = 'qjdv bewn oiaf feyu';           // ✅ App password from Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('ankithahv31@gmail.com', 'Portfolio Website'); // Always use your verified Gmail here
        $mail->addAddress('ankithahv31@gmail.com'); 
        $mail->addReplyTo($email, $name); // This adds user's email as a reply-to
             // ✅ Where you want to receive the message

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>$message";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.history.back();</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message sending failed. Error: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
}
?>
