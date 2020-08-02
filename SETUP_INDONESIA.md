# Panduan Setup (Windows)

## Setup Environment 
1. Install XAMPP versi 7.4.8 [(download disini)](https://www.apachefriends.org/download.html)
2. Install composer [(download disini)](https://getcomposer.org/Composer-Setup.exe)
3. Install ImageMagick (baca panduan di bawah)  

### Install ImageMagick
1. Install ImageMagick [(download disini)](https://imagemagick.org/script/download.php#windows)
2. Buka folder di mana anda menginstall ImageMagick
3. Buka module/coders copy semua file tersebut dan paste ke dalam xampp\apache\bin (direktori install xampp)
4. download imagick modul sesuikan dengan versi xampp [(disini)](https://pecl.php.net/package/imagick/3.4.4/windows)
5. Ekstrak dan copy php_imagick.dll ke xampp\php\ext (direktori install xampp)
6. Edit file php.ini tambahkan php_imagick.dll di bagian module atau ekstensi php
7. Copy 8 CORE_*.dll ke xampp\apache\bin (direktori install xampp)
8. Restart apache

## Laravel Setup
1. Buka cmd di folder ini.
2. ketik `composer install` lalu tekan enter, laravel akan otomatis di install
3. Buat database baru di myphpadmin: contoh: sipk3
4. Duplikat file `.env.example` ubah namanya menjadi `.env` saja
5. Edit file `.env` ganti bagian `DB_DATABASE` sesuai nama database yg telah dibuat; contoh: `DB_DATABASE=sipk3` 
6. Buka kembali cmd dan ketik `php artisan key:generate` lalu enter, akan muncul `Application key set successfully.` jika berhasil.
7. Lanjut ketik `php artisan migrate --seed`, jika berhasil maka database akan otomatis dibuat

## Cara menjalankan
1. Buka cmd di folder ini.
2. ketik `php artisan serve`
3. Jika berhasil akan mendapat alamat seperti: `http://127.0.0.1:8000`
4. Buka alamat tersebut di browser

