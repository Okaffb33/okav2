<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mendapatkan pesan dari permintaan POST
  $message = $_POST['message'];

  // Ganti dengan token bot Anda
  $botToken = '6130843488:AAEcBDwepm6__C3geoFMSJtsMVrKFeWhMKQ';
  $chatId = '1121369247';

  // Kirim pesan ke bot Telegram menggunakan cURL
  $url = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';
  $data = array(
    'chat_id' => $chatId,
    'text' => $message
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
}
?>
