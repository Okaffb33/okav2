<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  // Simpan data lokasi ke file PHP
  $file = 'location_history.php';
  $data = "<?php\n\$locationHistory[] = array('latitude' => $latitude, 'longitude' => $longitude);\n?>";

  // Menulis data ke file
  file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

  echo 'Location saved successfully.';
}
?>
