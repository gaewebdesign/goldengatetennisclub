<?php


 function checker( $to , $from  ,$date, $custom, $count ){

    $headers['From'] = $from;
    $headers['MIME-Version'] = 'MIME-Version: 1.0';
    $headers['Content-type'] = 'text/html; charset=iso-8859-1';

    $subject = "EMAIL Check $date [$custom] ($count)";
    $message = "[$custom] PHP program to programtically send multiple copies of an email to one address within a tight loop\n";
    $message .= "making it appear that several copies are sent at once, but they're actually sent separately\n ";

    $message .= "Time check: $date ";

    $result = mail($to, $subject, $message, $headers);
    
    if ($result) {
        echo 'Success! [$custom]' . PHP_EOL."<br>";
        echo "from $from to $to ($count) ". PHP_EOL."<br>";
    } else {
        echo 'Error.' . PHP_EOL;
    }
}

    $result=0;
    $to = 'tennis.mutt@gmail.com, santaclarawebmaster@gmail.com, tennis.mutt@gmail.com';
    $from = 'rogero.tennis@gmail.com, docker.mutt@gmail.com';
    $from = 'nodejs.mutt@gmail.com';


    $last=0;
    $custom = time()-60*60*7;
    $dt = new DateTime("@$custom");
    $date = ltrim($dt->format('m/d/Y H:i:s '),0);

    do{
    
        checker($to, $from , $date ,$custom, $last );

    }while($last++ < 5);       











