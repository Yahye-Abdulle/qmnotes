<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//fill variables with POST data from form
$fname   = $_POST['firstname'];
$lname   = $_POST['lastname'];
$email   = $_POST['email'];
$comment = $_POST['comment'];

//sanitize function
function sanitize($data) {
	$data = filter_var($data, FILTER_SANITIZE_STRING);
	return $data;
}

//sanitize data
$fname     = sanitize($fname);
$lname     = sanitize($lname);
$comment = sanitize($comment);
$email      = filter_var($email, FILTER_SANITIZE_EMAIL);
$name      = $fname . ' ' . $lname;

//instantiate PHPmailer
$mail = new PHPmailer;
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//debug is html friendly
$mail->Debugoutput = 'html';

//hostname of mail server 
$mail->Host = 'smtp.gmail.com';
// PHPmailer suggests using
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'mobilegameratyt@gmail.com';
$mail->Password = 'Yahyeabdulle10';

//Set who the message is to be sent from
$mail->setFrom($email, $name);

//Set an alternative reply-to address
$mail->addReplyTo($email, $name);

//Set who the message is to be sent to
$mail->addAddress('yabdulle@outlook.com', 'first last');

//Set the subject line
$mail->Subject = 'New message via PHPmailer';

//comment from form
$mail->Body = $comment;

//sends message and checks for errors. 
//Since form uses Ajax, echos wont be displayed in browser.
if(!$mail->send()) {
    echo "mailer error" . $mail->ErrorInfo;
} else {
    echo "Your email has been successfully sent and we will be in contact with you shortly\r\n";
    echo "\nYou will be redirected in 5 seconds, if not, please manually click on this link <a href='contact.html'>Click here</a>";
}

header( "refresh:5;contact.html" );

?>