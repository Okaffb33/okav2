<?php

$botToken = $_POST['botToken'];
$chatId = $_POST['chatId'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$accuracy = $_POST['accuracy'];

$url = 'https://api.telegram.org/bot' . $botToken . '/sendLocation';

$data = [
    'chat_id' => $chatId,
    'latitude' => $latitude,
    'longitude' => $longitude,
    'accuracy' => $accuracy
];

$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

?>
