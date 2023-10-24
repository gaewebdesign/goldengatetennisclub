<?php

include "../library/include.inc";


     TEXT("NOTIFY -- put the insert to DB at sctennisclub.org here");
 
$url = "http://www.sctennisclub.net/goldengatetennis/joinggtc_/topaypal.php";

TEXT ($url);


$year = "2025";
$fname = "Patricia";
$lname = "Redstone";
$address = "41 Madame Bovary";
$city = "Saint Francis";
$zip = "94121";
$phone = "phone";
$gender = "M";
$ntrp = "4.0";
$mtype = "RS";
$epoch = "2322";



$data = array (

    'year' => $year,
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
    'custom' => $epoch

  );

  print_r( $data);
 
  

  $payload = json_encode (  $data  );
  $ch = curl_init( $url ) ;
  curl_setopt($ch , CURLOPT_POSTFIELDS, $payload );
  curl_setopt($ch , CURLOPT_RETURNTRANSFER, $true );

  $result = curl_exec($ch);
  curl_close($ch);

  TEXT("sent");

?>