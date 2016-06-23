<?php
//// $email and $message are the data that is being
//// posted to this page from our html contact form
$email = $_POST['email'] ;
$message = $_POST['message'] ;
$name = $_POST['name'];
$subject = $_POST['subject'];
//// When we unzipped PHPMailer, it unzipped to
//// public_html/PHPMailer_5.2.0
require("vendor/phpmailer/phpmailer/PHPMailerAutoload.php");
//
$mail = new PHPMailer();
//
//// set mailer to use SMTP
$mail->IsSMTP();
//
//// As this email.php script lives on the same server as our email server
//// we are setting the HOST to localhost
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;
$mail->SMTPAuth = true;     // turn on SMTP authentication

$mail->Username = "styccs@gmail.com";  // SMTP username
$mail->Password = "600ts!ll"; // SMTP password
$mail->setFrom($email, $name);
$mail->AddAddress('styccs@gmail.com', 'Alert');
$mail->IsHTML(true);
$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>