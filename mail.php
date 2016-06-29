<?php

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer;

$email = $_POST['email'] ;
$message = $_POST['message'] ;
$name = $_POST['name'];
$subject = $_POST['subject'];

//From email address and name
$mail->From = $email;
$mail->FromName = $name;

//To address and name
$mail->addAddress("styccs@gmail.com", "Alert");

//Address to which recipient will reply
$mail->addReplyTo("styccs@gmail", "Reply");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else {
    echo "Message has been sent successfully";
    header("Location: http://thecolony.com.ng/contactus.html");
    exit;
}
?>
