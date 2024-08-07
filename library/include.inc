<?php
/*


 insert into logger values (NULL,'update pending set custom="done" where custom="1692146269" limit 1');


*/
define("PAYPAL_EMAIL", "goldenga@goldengatetennisclub.org");
// FOR MEMBERSHIP 
define("TABLE_PAYPAL","ggtc_paypal");  
define("TABLE_PENDING","ggtc_pending"); 

// for mixers,
define("TABLE_MIXER", "ggtc_mixer_paypal");
define("TABLE_MIXER_PENDING", "ggtc_mixer_pending");
define("TABLE_MIXER_FREE", "ggtc_mixer_free");

define ("YEAR" , "2024");
define("RES_FEE" , "0.05" );
define("NONRES_SINGLE_FEE" , "0.10" );
define("NONRES_FAMILY_FEE" , "0.15" );

define("MEMBERSHIP_FEE" , "40" );

/*
define("RETURN_URL","http://www.sctennisclub.org/signup/done");
define("CANCEL_URL","http://www.sctennisclub.org/signup/cancel");
define("NOTIFY_URL","http://www.sctennisclub.org/signup/notify.php");
*/
define("RETURN_URL","http://www.goldengatetennisclub.org/boot/join_/done.php");
define("CANCEL_URL","http://www.goldengatetennisclub.org/boot/join_/cancel.php");
define("NOTIFY_URL","http://www.goldengatetennisclub.org/boot/join_/notify.php");

define("TOPAYPAL_SCTC", "http://www.sctennisclub.net/goldengatetennis/joinggtc_/topaypal_pending.php");
  
define("FNAME", "fname" );
define("LNAME", "lname" );
define("GENDER", "gender" );
define("NTRP", "ntrp" );
define("EMAIL", "email" );

define("TEAM", "team" );
define("MTYPE", "mtype" );
define("PAYMENT", "payment" );

define("ADDRESS", "address" );
define("CITY", "city" );
define("ZIP", "zip" );
define("DATE", "date" );
define("CUSTOM", "custom" );

define("INSIGNIA", "insignia" );
define("OPT", "opt" );

define("NRF","NRF");

function alert($v){
	echo "<script>alert($v)</script>";

}

function DEBUG($message){
  // echo( $message );
  // echo("<br>");
  // echo("\n");

 }

 function TEXT($message){
    print("<br>");
    print( $message );

 }

 function LOGGER( $text )
 {
 
 
 $query = "insert into logger values (NULL,";
 
 $query .= "'";
 $query .= $text;
 $query .= "'";
 $query.= ')';
 
 //print("<br>".$query."<br>");
 
 $con = DBMembership();
 $qr = mysqli_query($con, $query );
 
 
 }

 function add ($p)
 {
   return ',"'.$p.'"';
 }

 function savetoDB(){
 
 
  echo "to DB";

  
}


function toMemberDB($theTABLE, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$team, $mtype,$date,$insignia,$payment,$custom,$opt)
{
  
 // compared to mixer.. these are the extra keys
 // address, city, state

   $con = DBMembership();


   $query = 'insert into '.$theTABLE.'(_id,fname,lname,email,gender,ntrp,address,city,zip,year,team,mtype,date,insignia,payment,custom,opt) values';

  $query .= '(NULL'.add($fname).add($lname).add($email).add($gender).add($ntrp).add($address);
  $query .= add($city).add($zip).add($year).add($team).add($mtype).add($date).add($insignia).add($payment).add($custom).add($opt);
  $query .= ")";

  LOGGER($query);

  //print("<br>".$query);
  LOGGER($query);

  $query_results=mysqli_query($con, $query);
  
  $query = "update $theTABLE set insignia = insignia +1 where date = $custom";
  $query_results=mysqli_query($con, $query);

} 


function toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event){

  $con = DBMembership();

  $query = 'insert into '.$theTABLE.'(_id,fname,lname,gender,ntrp,email,member,paid,date,custom,event) values';
  $query .= '(NULL'.add($fname).add($lname).add($gender).add($ntrp).add($email).add($member).add($paid);
  $query .= add($date).add($custom).add($event) ;
  $query .= ")";

//  echo "<br>";
  LOGGER( $query );
  $query_results=mysqli_query($con, $query);

}

function DBMembership() {

  return  Configure();
  

}

function Configure()
 {
          
        $HOST = "127.0.0.1";
        $USER = "root";      // on my localhost
        $PASSWORD = "tomato1349";
        $DB= "southb56_ggtc";
        $DB = "golden19_ggtc";
           

        if(strstr($_SERVER["SERVER_NAME"],"gold")){
         // must add user to database with privileges

          $HOST = "localhost";
          $USER  = "golden19_ggtc";    // inmotion
          $USER  = "golden19_roger";    // A2

          $PASSWORD="tomato1349";
          $PASSWORD="mona.ramsey.1349";

        } 

//        TEXT($HOST." -- ".$USER." - ".$DB." - ".$PASSWORD." <br>" );

        $con = mysqli_connect($HOST,$USER, $PASSWORD);

        if (!$con) {
                    echo("CONNECTION ERROR<br>");
                    die('Could not connect: ' . mysqli_connect_error());
                 }else{

                 }

                $ret = mysqli_select_db($con,$DB );
                if(!$ret){
                  echo( "mysqli_connect_error() = ");
                  echo( mysqli_connect_error() );
                  echo( "<br>");
                }

                return $con;
          }

 function copyto( $src, $dest, $epoch){
  
  LOGGER("copyto");
  
  $con = DBMembership();

  $query = "insert into $dest select * from $src where custom=\"$epoch\" "; 
  $query_results=mysqli_query($con,$query);

  
  LOGGER( $src." -> ".$dest." or ".$epoch);
  LOGGER ($query);
  LOGGER ($query_results);

  // Get all the data in the $src pending table 
  $query = "select * from $src where custom=\"$epoch\" "; 
  $query_results=mysqli_query($con,$query);
  $n = mysqli_num_rows($query_results);
  $row = mysqli_fetch_assoc($query_results);
  $_MTYPE= $row[MTYPE];
  $_OPT = $row[OPT];
  $_ADDRESS = $row[ADDRESS];

  if ($_OPT != "911"){
  
    $query = "update $dest set insignia = insignia +1  where custom=\"$_OPT\" limit 1";
    
    $query_results=mysqli_query($con,$query);
  
    // by changing the address, only one Adult associated 
    // if the person pays again, at full price, this same address will work once
    if( $_MTYPE == NRF."_" ) {
      $_ADDRESS .= "*";
      $query = "update $dest set address=\"$_ADDRESS\" where custom=\"$_OPT\" limit 1";
      $query_results=mysqli_query($con,$query);
      LOGGER("$_MTYPE:  $_ADDRESS updated ");
    }
  }

}


 function FindAddress($ADDRESS,$CITY)
 {
 
        $YEAR=YEAR; 
        $_city =  substr(trim($CITY),0,5);

//  LOOK  TABLE_PAYPAL for address and similar city
         $query = "select * from ".TABLE_PAYPAL.' where address = "'.trim($ADDRESS).'"';
 
//         select * from paypal where city regexp('san');
         $query.= " and (city regexp(\"$_city\" )    ) ";
         $query .= ' and ( mtype ="RF" or mtype = "NRF")';
         $query .= ' and year = "'.$YEAR.'"';   
 
         TEXT($query);

         $con = DBMembership();
         $query_results=mysqli_query($con, $query);
         $n = mysqli_num_rows($query_results);
  
         // FOUND matching address
         if($n > 0)  {
              $row = mysqli_fetch_assoc( $query_results);
              $fname = $row[FNAME];
              $lname = $row[LNAME];
              $epoch = $row[CUSTOM];
              $mtype = $row[MTYPE];
              $insignia = $row[INSIGNIA];
              $epoch = $row[DATE];

              // Check if already has a family member
              // applies only to NRF and if $opt has primary member id
              // INSIGNIA>1 
              // primary member contains the seconary member id
              // secondary member contains the primary id
              // this id is used to locate the primary member and
              // increment INSIGNIA
              // this is done in transfering from pending to paypal
              // on the return from Paypal 
              $primary_member = "($fname $lname $epoch $mtype $insignia $opt )";
              
              if($mtype == "NRF" && $insignia > 1){
                    TEXT("FOUND NRF with $insignia members  <br>");
                    TEXT( $primary_member );
                    return false;
              }

              return $epoch;

            }
 
              return false;
 
 
 }

 function Members(){
   $con = DBMembership();
   $query = "select * from ".TABLE_PAYPAL." where year = ".YEAR;
   $query_results=mysqli_query($con,$query);
   $n = mysqli_num_rows($query_results);

   return $n;

  }

  
  function Residents(){
    $con = DBMembership();
    $query = "select * from ".TABLE_PAYPAL." where year = ".YEAR;
    $qr=mysqli_query($con,$query);
    $res=0;
    while ($row = mysqli_fetch_assoc($qr)) {  
      $city = $row[CITY];
      preg_match("/santa/i",$city) ? $res +=1 : $res+=0;
      }
     
      return $res;

  }

  function NonResidents(){
    $m = Members();
    $res =  Residents();
    $non = $m - $res;
    
//    TEXT("residents: $res/$non total$m ");

    return $non;



  }
 
  function ResidentMajority(){
  $res = Residents();
  $mem = Members();
  
  if( $res>$mem-$res +1 ) return true;
  return false;

 }

 // log to sctennisclub.net 
 function LOGGER_EXT( $log){

  $url = "http://www.sctennisclub.net/goldengatetennis/joinggtc_/tologger.php";
  
/*  //$payload = json_encode (  $log  );
  TEXT("logger_ext:   attempt to log externally");
  TEXT("logger_ext: URL  $url ");
  TEXT("logger_ext: LOG  $log ");
*/
  $ch = curl_init( $url ) ;
  curl_setopt($ch , CURLOPT_POSTFIELDS, $log );
  curl_setopt($ch , CURLOPT_RETURNTRANSFER, $true );
  $result = curl_exec($ch);
  curl_close($ch);

 }

?>
