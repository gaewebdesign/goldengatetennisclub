<?php

include "../library/include.inc";


     TEXT("NOTIFY -- put the insert to DB at sctennisclub.org here");
// just need to pass CUSTOM  sctennisclub.net to copy from pending to paypal;
  $url = "http://www.sctennisclub.net/goldengatetennis/joinggtc_/topaypal.php";
  TEXT ($url);
  LOGGER_EXT( $url);

  $custom="1694642644";
  $data = array (
    'custom' => $custom
  );

  $payload = json_encode (  $data  );
  $ch = curl_init( $url ) ;
  curl_setopt($ch , CURLOPT_POSTFIELDS, $data );
  curl_setopt($ch , CURLOPT_RETURNTRANSFER, $true );

  $result = curl_exec($ch);
  curl_close($ch);

  TEXT("sent");

?>