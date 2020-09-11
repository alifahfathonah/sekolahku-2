# SEKOLAHKU 
manajemen data sekolah kamu mudah dan cepat dengan bantuan aplikasi _**SekolahKu**_.

_**SekolahKu**_ mampu membantu kamu dalam mengerjakan berbagai hal yang berkaitan dengan data manajemen sekolah, seperti mengelola data siswa, pelajaran, nilai pelatihan dll.

semua itu bisa kamu kerjakan dengan mudah hanya dengan satu aplikasi saja.

untuk dapat menggunakan aplikasi ini, kamu perlu melakukan beberapa hal penting terlebih dahulu.

kamu cukup mengikuti langkah-langkah dibawah ini:

## Installasi
ikuti langkah-langkah Installasi berikut:

- download source code _**SekolahKu**_
- buat database baru dengan nama _**SekolahKu**_.
- lakukan konfigurasi database melalui file _.env_ (rename file _env_ menjadi _.env_ sebelum melakukan konfigurasi)
- lakukan migrasi untuk tabel-tabel dasar _**SekolahKu**_.

  `php spark migrate -all`

- lakukan seeding untuk mengisi data di tabel _level_

  `php spark db:seed level`

- buka browser dan arahkan ke alamat App kamu:
  
  `http://localhost:8080/sekokahku`

- jika sudah tampil halaman login, itu artinya proses Installasi telah berhasil, dan fitur _**SekolahKu**_ sudah bisa kamu gunakan.

__note:__ _saya menganggap kamu sudah paham mengenai dasar-dasar konfigurasi CodeIgniter 4, jadi seharusnya kamu bisa melakukan konfigurasi diatas dengan mudah._

_untuk nama database kamu bisa custom sesuai ke inginan, tinggal disesuiakan saja konfigurasinya._

## Pengembangan
- CodeIgniter versi 4
- PHP versi 7.4.3
- MySQL versi 5.6.38
- AdminLte versi 3.0.5

## Fitur
- login multilevel (admin guru dan siswa)
- registrasi
- captcha dibagian registrasi

## Sosial Media
- Github [Nova Ardiansyah](https://github.com/novaardiansyah1)
- Facebook [Nova Ardiansyah](https://facebook.com/nova981)
- LinkedIn [Nova Ardiansyah](https://linkedin.com/mwlite/in/novaardiansyah)
- Instagram [@Novaardiansyah._](https://www.instagram.com/novaardiansyah._)

## Lisensi
- open source (_tidak untuk diperjual belikan_)

## Status
- Tahap Pembuatan.