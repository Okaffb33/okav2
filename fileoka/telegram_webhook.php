<?php
// Mendapatkan data yang dikirim dari bot Telegram
$update = json_decode(file_get_contents('php://input'), true);
$message = $update['message'];
$chatId = $message['chat']['id'];

// Ambil informasi IP perangkat menggunakan API ip-api.com
$response = json_decode(file_get_contents('https://ipapi.co/json/'), true);

// Ambil nilai-nilai yang diperlukan dari respons API
$isp = $response['org'];
$country = $response['country_name'];
$region = $response['region'];
$city = $response['city'];
$coordinates = $response['latitude'] . ', ' . $response['longitude'];
$localTime = date('Y-m-d H:i:s');
$domain = $response['hostname'];
$netSpeed = $response['connection'];
$mobileCarrier = $response['org'];

// Format pesan yang akan dikirim ke bot Telegram
$messageText = "
  ISP: $isp
  Country: $country
  Region: $region
  City: $city
  Coordinates of City: $coordinates
  Local Time: $localTime
  Domain: $domain
  Net Speed: $netSpeed
  Mobile Carrier: $mobileCarrier
";

// Kirim pesan ke bot Telegram
$botToken = 'YOUR_BOT_TOKEN';
$url = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';
$data = array(
  'chat_id' => $chatId,
  'text' => $messageText
);
$options = array(
  'http' => array(
    'method' => 'POST',
    'header' => 'Content-type: application/x-www-form-urlencoded',
    'content' => http_build_query($data)
  )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Cetak hasil
echo $result;
