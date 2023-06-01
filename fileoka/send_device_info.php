<?php

$botToken = $_POST['botToken'];
$chatId = $_POST['chatId'];
$screenWidth = $_POST['screenWidth'];
$screenHeight = $_POST['screenHeight'];
$platform = $_POST['platform'];

$message = 'Informasi Perangkat:' . PHP_EOL;
$message .= 'Lebar Layar: ' . $screenWidth . PHP_EOL;
$message .= 'Tinggi Layar: ' . $screenHeight . PHP_EOL;
$message .= 'Platform: ' . $platform;

$url = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';

$data = [
    'chat_id' => $chatId,
    'text' => $message
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
