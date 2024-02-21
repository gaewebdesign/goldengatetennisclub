<?php
function read_cb($ch, $fp, $length) {
    return fread($fp, $length);
}

$fp = fopen('php://memory', 'r+');
$string = "From: <no-reply@example.com>\r\n";
$string .= "To: <tennis.mutt@gmail.com.com>\r\n";
$string .= "Date: " . date('r') . "\r\n";
$string .= "Subject: Test\r\n";
$string .= "\r\n";
$string .= "Meme message\r\n";
$string .= "\r\n";
fwrite($fp, $string);
rewind($fp);

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => 'smtps://smtp.gmail.com.com:465/gmail.com',
    CURLOPT_MAIL_FROM => '<tennis.mutt@gmail.com>',
    CURLOPT_MAIL_RCPT => ['<tennis.mutt@gmail.com'],
    CURLOPT_USERNAME => 'tennis.mutt@gmail.com',
    CURLOPT_PASSWORD => 'Janet.3722',
    CURLOPT_USE_SSL => CURLUSESSL_ALL,
    CURLOPT_READFUNCTION => 'read_cb',
    CURLOPT_INFILE => $fp,
    CURLOPT_UPLOAD => true,
    CURLOPT_VERBOSE => true,
]);

$x = curl_exec($ch);

if ($x === false) {
    echo curl_errno($ch) . ' = ' . curl_strerror(curl_errno($ch)) . PHP_EOL;
}

curl_close($ch);
fclose($fp);