import telegram
from telegram.ext import Updater, MessageHandler, Filters
import platform

# Fungsi untuk mengambil informasi perangkat
def get_device_info():
    info = "Informasi Perangkat:\n"
    info += f"Nama Sistem Operasi: {platform.system()}\n"
    info += f"Versi Sistem Operasi: {platform.release()}\n"
    info += f"Nama Mesin: {platform.node()}\n"
    return info

# Fungsi untuk menangani pesan yang berisi foto
def handle_photo(update, context):
    file_id = update.message.photo[-1].file_id
    photo_file = context.bot.get_file(file_id)
    photo_file.download('foto_spy.jpg')
    update.message.reply_text('Foto berhasil disimpan.')

# Fungsi untuk menangani pesan yang berisi lokasi
def handle_location(update, context):
    latitude = update.message.location.latitude
    longitude = update.message.location.longitude
    update.message.reply_text(f"Lokasi GPS: Latitude {latitude}, Longitude {longitude}")

# Fungsi untuk menangani perintah /start
def handle_start(update, context):
    update.message.reply_text("Bot telah diaktifkan.")

# Fungsi untuk menangani perintah /info
def handle_info(update, context):
    info = get_device_info()
    update.message.reply_text(info)

def main():
    # Inisialisasi bot
    updater = Updater("6130843488:AAEcBDwepm6__C3geoFMSJtsMVrKFeWhMKQ")
    dispatcher = updater.dispatcher

    # Menambahkan handler untuk pesan foto
    photo_handler = MessageHandler(Filters.photo, handle_photo)
    dispatcher.add_handler(photo_handler)

    # Menambahkan handler untuk pesan lokasi
    location_handler = MessageHandler(Filters.location, handle_location)
    dispatcher.add_handler(location_handler)

    # Menambahkan handler untuk perintah /start
    start_handler = MessageHandler(Filters.regex('^/start$'), handle_start)
    dispatcher.add_handler(start_handler)

    # Menambahkan handler untuk perintah /info
    info_handler = MessageHandler(Filters.regex('^/info$'), handle_info)
    dispatcher.add_handler(info_handler)

    # Memulai bot
    updater.start_polling()
    updater.idle()

if __name__ == '__main__':
    main()
