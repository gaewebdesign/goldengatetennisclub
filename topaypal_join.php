<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

/*
define("PAYPAL_MAIL","treasurer@sctennisclub.org");
define("RETURN_URL","http://www.sctennisclub.org/signup/done");
define("CANCEL_URL","http://www.sctennisclub.org/signup/cancel");
define("NOTIFY_URL","http://www.sctennisclub.org/signup/notify.php");
*/

$year = "2024";// YEAR ;      // defined in library/include.inc
$fname = $_POST[FNAME];
$lname = $_POST[LNAME];
$email = $_POST[EMAIL]; //"rwokamoto@gmail.com";   ///$_POST["email"];
$gender = $_POST[GENDER];
$ntrp   =$_POST[NTRP]; 
$member =$_POST["membership"];
$event = $_POST["event"];

$address = $_POST[ADDRESS];
$city = $_POST[CITY];
$zip = $_POST[ZIP];
$team = $_POST[TEAM];

$opt="911";
$insignia = "0";
$paid = "0.03";
$payment = $paid;
$mtype = "RS";

$custom = time()-60*60*7;
$date = $custom;
$epoch = $custom;


/*
TEXT("POST DATA ****");
TEXT("year = ".YEAR);
TEXT("paypal_email = ".PAYPAL_EMAIL);
print_r($_POST);
TEXT("POST DATA ****");
*/


$paypal = new paypal();

$paypal->price = $paid;

// The price has to be set before enable_payment
define ("LADYGAGA", "treasurer@sctennisclub.org");

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",LADYGAGA);
$paypal->add("item_name","SCTC Membership");
$paypal->add("quantity",1);

$paypal->add("return",RETURN_URL);
$paypal->add("cancel_return",CANCEL_URL);
$paypal->add("notify_url",NOTIFY_URL);
$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;


$data = array (

    'year' => $year,  // this is define() from this file
    'fname' => $fname,
    'lname' => $lname,
    'address' => $address,
    'city' => $city,
    'zip' => $zip,
    'phone' => $phone,
    'email' => $email,
    'gender' => $gender,
    'ntrp' => $ntrp,
    'mtype' => $mtype,
    'custom' => $custom,
    'date' => $custom
  );
  
  /*
  TEXT("data ***");
  print_r($data);
  TEXT("data ***");
  */
  
  $url = TOPAYPAL_SCTC;
  
  //TEXT($url);

  //$url = "http://www.sctennisclub.net/goldengatetennis/joinggtc_/topaypal_pending.php";
  
  

  $payload = json_encode (  $data  );

  $ch = curl_init( $url ) ;
  curl_setopt($ch , CURLOPT_POSTFIELDS, $data );
  curl_setopt($ch , CURLOPT_RETURNTRANSFER, $true );
  $result = curl_exec($ch);
  curl_close($ch);

  $paypal->output_form();


?>