<?php
// Parse the request URL path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// The pattern '/[^A-Za-z0-9 ]/' matches anything that isn't a letter, number, or space.
//$path = preg_replace("/\//", '', $path);
//echo $new_string; // Output: abcdeddfd abcd der


//print_r($path);
$array = preg_split('/(\\d+)/', $path, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

//print_r($array);



//$url = parse_url($url, PHP_URL_PATH); 
//$url = trim($path, '/'); 
//$parts = explode ('/' , $url); 
//echo( "Requested path: " . $path . "\n"); 
$array = preg_split('/(\\d+)/', $path, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
/*
if( isset($parts[1]) ){
    echo( "Trimmed URL: parts[]=" . $parts[0]. " , ".$parts[1]. "\n");
} else {
    echo( "Trimmed URL: parts[]=" . $parts[0]. "\n");

}   
*/
//echo( "Trimmed URL: parts[]=" . $parts[0]. " , ".$parts[1]. "\n");

//print_r($_GET);
//echo("switch  path = . $path  ********** \n");
//$u = $parts[0];
$p = $array[0];
if(isset($array[1])){
    $_GET[0] = $array[1];
} else {
    $d = "";
}

switch ($p) {
    case '/':
        // Handle the home page
        require 'main.php';
        break;


    case '/membership':
        // Handle the membership page
        require 'membership.php';
        break;

    case '/tournament':
        // Handle the membership page
//        echo( "get =  $_GET[0] ");
        require 'tournament.php';
        break;

    case '/members':
        require 'members.php';
        break;

    case '/events':
        // Handle the events page
        require 'events.php';
        break;

    case '/join':
        // Handle the events page
        require 'join.php';
        break;

    case '/tournaments':
        // Handle the events page
    //    if (isset($parts[1]))
     //   $_GET[0] = 1;
        require 'tournament.php';
        break; 




      case '/photos':
        // Handle the events page
        require 'photos.php';
        break;

      case '/archive':
        // Handle the events page
        require 'archive.php';
        break;
        


    case '/contact':
        // Handle the contact page
        require 'contact.php';
        break;
        
    case '/about':
        // Perform an *actual* HTTP redirect to a different URL if needed
        require 'main.php';
 //       header('Location: https://example.com/new-about-page', true, 301);
        exit();

    default:
        // Handle 404 Not Found
//        http_response_code(404);
//        exit('Not Found');
        require 'main.php';
        break;


}


?>
