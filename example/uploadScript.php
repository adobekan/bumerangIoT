<?php
/**
 * Created by PhpStorm.
 * User: Ado
 * Date: 10.6.2015
 * Time: 11:00
 */


// Your ID and token
$deviceKey = 'hjgkkkdjjjgkkdfmkk8843773kkfnbsjkjglfdfdsd90';
$userAccountKey='ss37gwUTaZxbXySlwcAQQfWdB';

// The data to send to the API

// Setup cURL
$url = 'http://localhost:8000/api/data';

$ch = curl_init( $url );
# Setup request to send json via POST.

$options = array(
    'http'=>array(
        'method'=>"POST",
        'content' => "",
        'header'=>"Accept-language: en\r\n" .
            "Content-Type: application/json\r\n" .
            "key:".$deviceKey."\r\n" .
            "access-key:".$userAccountKey."\r\n"
    )
);

while(1){
    $options['http']['content']=json_encode(
        array(
            'data'=>array(
                rand(10,25),
                rand(10,25),
                rand(22,29),
                "194.249.231.".rand(2,122)
            )));

    $context  = stream_context_create($options);
    $result = file_get_contents($url, 0, $context);
    var_dump($result);
    sleep(5);
}

