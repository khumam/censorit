# Hallo selamat datang di Censorit
Censorit merupakan sebuah package PHP yang memiliki fungsi untuk memberikan efek sensor terhadap suatu kata. Censorit sebagian besar menggunakan regex untuk menentukan posisi karakter mana yang akan disensor.

## Cara instalasi
Pastikan sudah memiliki composer di mesin kalian. Jika belum, silakan install composer terlebih dahulu.

Untuk menginstall Censorit, jalankan perintah di bawah

```
composer require khumam/censorit
```

Jika sudah selesai, artinya Censorit siap digunakan.

## Cara penggunaan
Cara penggunaannya sangat mudah. Contohnya dapat dilihat di bawah ini.

```php
<?php

// Pastikan load vendor terlebih dahulu
require './vendor/autoload.php';

// Kemudian load package nya
use khumam\censorit\Censorit;

// Misalkan kita memiliki suatu kata yang akan disensor
$string = 'ABCDEF GHIJK';

// Dan cara sensornya
$censoredString = Censorit::censor($string)->full() // Hasil ***********
$censoredString = Censorit::censor($string)->half() // Hasil ABCDEF GHI**
$censoredString = Censorit::censor($string)->middle() // Hasil AB**** ***JK
```

## Kumpulan method
Ada beberapa method yang bisa digunakan di dalam Censorit.

|Method|Parameter|Deskripsi|Example|
|---|---|---|---|
|full|With space (default: true)|Untuk mensensor seluruh teks. Jika memasukan parameter false, maka spasi tidak akan ikut tersensor|full() atau full(false)|
|half|offset (default: 2)|Untuk mensensor sebagian teks. Jika offset diisi positif, akan mensensor huruf sebanyak offset dari belakang. Jika negatif, dari depan|half(2) atau half(-2)|
|middle|offset (default: 2), reverse (default: false)|Untuk mensensor karakter yang berada di tengah teks sebanyak offset. Jika reverse true, yang disensor yang disamping kiri kanan nya|middle(2) atau middle(2, true)|

Jika offset lebih besar dari kata, maka hasilnya akan disensor seluruh kata.

## To do list
- [X] Sensor full teks
- [X] Sensor full teks selain spasi
- [X] Sensor di awal teks sebanyak offset
- [X] Sensor di akhir teks sebanyak offset
- [X] Sensor di tengah teks sebanyak offset
- [X] Sensor kecuali di tengah teks sebanyak offset
- [ ] Sensor di posisi random 

## Kontribusi
Saya sangat mengharapkan teman-teman untuk berkontribusi di repo ini. Detail kontribusi akan dijelaskan di lain waktu.
