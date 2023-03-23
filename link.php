<?php

$url = 'http://example.com';

$apiKey = 'YOUR_API_KEY'; // API-ключ Google URL Shortener
$apiUrl = 'https://www.googleapis.com/urlshortener/v1/url';

$data = array(
    'longUrl' => $url,
    'key' => $apiKey
);

$options = array(
    'http' => array(
        'header'  => 'Content-type: application/json',
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($apiUrl, false, $context);
$response = json_decode($result);

echo $response->id;