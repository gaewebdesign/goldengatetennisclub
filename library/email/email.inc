<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer\Exception;

$subject = "USTA Team/Captain Signup";

$message = "Thanks for registering your USTA team.<br/>  The board will meet and discuss the approval of teams.";
$message .=  "<p>";
$message .= "For more information, or questions contact the USTA Coordinator at <br/>";

$message .= "at webmasterp@goldengatetennisclub.org";
$message .=  "<hr/>";

$message .=  "Dichoun Kwan <br/>";
$message .=  "President <br/>";
$message .=  "Golden Gate Tennis Club";


//emailer( $subject, $message );


function phpemailer($_SUBJECT, $_MESSAGE ,$_TOEMAIL ="mnscuo.mutt@gmail.com", $_TOEMAIL2="mnscuo.mutt@gmail.com"){

    require 'vendor/autoload.php';

$mail = new PHPMailer(exceptions: true);

try {

 //     $mail->SMTPDebug = 2;
      $mail->Username = "webmaster@goldengatetennisclub.org";
//      $mail->Username = "santaclarawebmaster@gmail.com";
      $mail->Password = "janet.95129";
      $mail->SMTPSecure = 'tls';

      $mail->Port = 587;      
      $mail->setFrom( "webmaster@goldengatetennisclub.org" , "Golden Gate Tennis Club" ) ; 
      
 //   $mail->setFrom( "tennis.mutt@sctennisclub.org" , "Santa Clara Tennis Club" ) ; 

//    $mail->setFrom( $_FROMEMAIL , $_FROMNAME ) ; 

      
      $mail->addAddress( "tennis.mutt@@gmail.com" ) ; 
      $mail->addAddress( $_TOEMAIL ) ; 
      $mail->addAddress( $_TOEMAIL2 ) ; 

      $mail->isHTML( true);

      $mail->Subject = $_SUBJECT;      
      $mail->Body = $_MESSAGE;

      $mail->send() ;      

 //   $mail-> = ;      


}catch(Exception $e){

    echo("message error: $email->ErrorInfo ");

}










}




?>
