<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About USES

- git clone.
- composer install.
- cp .env.example .env
- php artisan key:generate
- di env ubah database jd mysql nama database laravel_saw 
- bikin database di phpmyadmin laravel_saw lalu import database dari projek ini 
- donee.....


Sistem Penunjang Keputusan (SPK) - Metode SAW
Repositori ini berisi kode sumber untuk aplikasi web Sistem Penunjang Keputusan (SPK) yang dibangun untuk membantu proses pengambilan keputusan dengan mengimplementasikan metode Simple Additive Weighting (SAW).


(Disarankan untuk mengganti gambar di atas dengan tangkapan layar (screenshot) aplikasi Anda)

📖 Tentang Proyek
Sistem ini dirancang sebagai alat bantu untuk menyelesaikan masalah pemilihan alternatif terbaik dari sejumlah pilihan berdasarkan kriteria-kriteria yang telah ditentukan. Metode SAW dipilih karena kesederhanaan konsepnya dan kemampuannya untuk melakukan penilaian secara transparan dengan cara mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif.

Studi kasus yang digunakan dalam sistem ini adalah [Contoh: Pemilihan Karyawan Terbaik / Rekomendasi Laptop untuk Mahasiswa / Penentuan Penerima Bantuan Sosial].

✨ Fitur Utama
Manajemen Data Alternatif: Tambah, Lihat, Ubah, dan Hapus (CRUD) data alternatif yang akan dinilai (misalnya: data karyawan, data laptop).

Manajemen Data Kriteria: CRUD untuk data kriteria penilaian beserta tipe atribut (Benefit atau Cost) dan bobot kepentingannya.

Manajemen Nilai Alternatif: Menginputkan nilai untuk setiap alternatif berdasarkan setiap kriteria.

Proses Perhitungan SAW Otomatis: Melakukan proses normalisasi matriks dan perhitungan nilai preferensi (perankingan) secara otomatis dan cepat.

Hasil Perankingan: Menampilkan hasil akhir berupa daftar alternatif yang sudah terurut dari nilai tertinggi hingga terendah sebagai rekomendasi utama.

Antarmuka Responsif: Tampilan yang dapat diakses dengan baik di berbagai ukuran perangkat, mulai dari desktop hingga mobile.

🚀 Teknologi yang Digunakan
Backend: PHP (Native / Framework seperti Laravel atau CodeIgniter)

Frontend: HTML, CSS, JavaScript

Framework CSS: Bootstrap 5

Database: MySQL / MariaDB

Web Server: Apache / Nginx

🛠️ Panduan Instalasi
Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

Clone Repositori

git clone https://github.com/[nama-pengguna-anda]/[nama-repositori-anda].git

Pindah ke Direktori Proyek

cd [nama-repositori-anda]

Setup Database

Buat sebuah database baru melalui phpMyAdmin (atau tools sejenis) dengan nama, contohnya: db_spk_saw.

Impor file .sql yang telah disediakan di dalam folder database/ ke dalam database yang baru saja Anda buat.

Konfigurasi Koneksi Database

Buka file konfigurasi database (biasanya bernama config.php, database.php, atau .env jika menggunakan framework).

Sesuaikan detail koneksi (host, username, password, dan nama database) dengan pengaturan di lingkungan lokal Anda.

// Contoh pada file config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_spk_saw');

Jalankan Aplikasi

Letakkan folder proyek di dalam direktori root web server Anda (misalnya: htdocs/ untuk XAMPP atau www/ untuk WAMP).

Jalankan modul Apache dan MySQL melalui panel kontrol server lokal Anda.

Buka browser dan akses proyek melalui alamat http://localhost/[nama-repositori-anda].

⚙️ Cara Kerja Metode SAW
Metode Simple Additive Weighting (SAW) sering juga dikenal dengan istilah metode penjumlahan terbobot. Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif di semua atribut. Proses ini melibatkan langkah-langkah berikut:

1. Membuat Matriks Keputusan (X)
Matriks ini dibentuk dari data alternatif dan kriteria, di mana x 
ij
​
  adalah rating kinerja dari alternatif ke-i pada kriteria ke-j.

2. Melakukan Normalisasi Matriks (R)
Setiap nilai pada matriks keputusan dinormalisasi agar dapat diperbandingkan satu sama lain. Proses normalisasi (r 
ij
​
 ) dibedakan berdasarkan jenis atribut (kriteria):

Jika kriteria merupakan Benefit (semakin besar nilainya semakin baik):

r 
ij
​
 = 
max(x 
ij
​
 )
x 
ij
​
 
​
 
Jika kriteria merupakan Cost (semakin kecil nilainya semakin baik):

r 
ij
​
 = 
x 
ij
​
 
min(x 
ij
​
 )
​
 
3. Menghitung Nilai Preferensi / Perankingan (V 
i
​
 )
Nilai akhir atau nilai preferensi (V 
i
​
 ) untuk setiap alternatif dihitung dengan menjumlahkan hasil perkalian antara matriks yang telah dinormalisasi (r 
ij
​
 ) dengan vektor bobot (w 
j
​
 ) yang telah ditentukan sebelumnya.


V 
i
​
 = 
j=1
∑
n
​
 (w 
j
​
 ×r 
ij
​
 )
Alternatif dengan nilai V 
i
​
  tertinggi merupakan alternatif terbaik yang direkomendasikan oleh sistem.

📸 Tampilan Aplikasi
Berikut adalah beberapa tangkapan layar dari antarmuka aplikasi:

1. Halaman Dashboard / Beranda


2. Halaman Pengelolaan Data Kriteria


3. Halaman Hasil Akhir Perankingan


(Tips: Upload gambar screenshot Anda ke dalam folder di repositori, lalu ganti link placeholder di atas dengan path relatif ke gambar tersebut)

🤝 Kontribusi
Kontribusi dari komunitas sangat diharapkan untuk membuat proyek ini lebih baik. Jika Anda ingin berkontribusi, silakan lakukan fork pada repositori ini dan buat pull request dengan perubahan yang Anda usulkan.

Fork repositori ini.

Buat branch fitur baru (git checkout -b fitur/FiturLuarBiasa).

Commit perubahan Anda (git commit -m 'Menambahkan FiturLuarBiasa').

Push ke branch tersebut (git push origin fitur/FiturLuarBiasa).

Buka sebuah Pull Request.

📄 Lisensi
Proyek ini dilisensikan di bawah Lisensi MIT.

Dibuat dengan ❤️ oleh [Nama Anda]

