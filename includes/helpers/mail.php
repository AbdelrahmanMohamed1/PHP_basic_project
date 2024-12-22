<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (!function_exists('send_mail')) {
  function send_mail(array $mails, string $subject, string $message):void
  {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'bbbbbooooooddddyyyyyy@gmail.com
';                     //SMTP username
      $mail->Password   = 'eseo yfqt prdg eamz';                               //SMTP password

      $mail->Port = 587;
      $mail->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
      
      // PHPMailer::ENCRYPTION_STARTTLS;

      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('bbbbbooooooddddyyyyyy@gmail.com
', 'boody');
      $mail->addAddress($mails[0], 'abdoooooo');     //Add a recipient
      // $mail->addAddress('ellen@example.com');               //Name is optional
      $mail->addReplyTo('bbbbbooooooddddyyyyyy@gmail.com
', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      // var_dump($mail->send());
      echo 'Message has been sent';
    } catch (Exception $e) {
      //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}

// send_mail(['abdelrhmanmohamed1010@gmail.com
// '],"test message","ezayed ya boody 3amel eh ya sadeeeeeky we nta fenk dlw2ty ? ro7t el bank enhardah ?");