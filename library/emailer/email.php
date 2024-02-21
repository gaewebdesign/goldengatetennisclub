<?php

echo("test email<br>");

$fname = "***";

if ( !empty ($_POST["fname"] ) ){

$fname = $_POST["fname"]; 

}else{
    echo("empty");
}

$to = "notify@sctennisclub.org";
$subject = "SCTC Membership ( Jill Ireland) ";
$message = "Membershp Jill Ireland  signed up";
$message .= $fname;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: notify@sctennisclub.org  \r\n";

echo("to $to");
echo("<br>");

echo($subject);
echo("<br>");

echo($headers);
echo("<br>");

$r=mail($to,$subject,$message,$headers);
echo($r);
echo("<br>");

$headers = 'From: notify@sctennisclub.org' . "\r\n" .
'Reply-To: notify@sctenisclub.org' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

echo("send another email <br>");
$to = "notify@sctennisclub.org";
$subject = "SCTC Mixer Signup (Joseph Conrad)";
$message = "Mixer signup Joseph Conrad mixer signup";
$r=mail($to,$subject,$message,$headers);
echo($r);
echo("<br>");

echo($to);
echo("<br>");

echo($subject);
echo("<br>");

echo($headers);
echo("<br>");





?>