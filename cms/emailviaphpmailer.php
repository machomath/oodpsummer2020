<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require_once 'gmailpassword.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
function sendEmail($to, $to_name, $subject, $body)
{
  global $gmail_password;
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';//'smtp1.example.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'aurangzeb.muhammad40@gmail.com';//'user@example.com';                     // SMTP username
      $mail->Password   = $gmail_password;//'secret';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('aurangzeb.muhammad40@gmail.com', 'Dr. Zeb CMS');
      // $mail->setFrom('from@example.com', 'Mailer');
      $mail->addAddress($to, $to_name);     // Add a recipient
      // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
      // $mail->addAddress('ellen@example.com');               // Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $body;
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $mail->send();
      return 'Message has been sent';
  } catch (Exception $e) {
      throw new Exception("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
  }
}

// $to = "manthanvpatel@gmail.com";
// $to_name = "Manthan Patel";
// $subject = "Testing";
// $body = "Hello testing 1 2 3 hello hello hello";
// sendEmail($to, $to_name, $subject, $body);
