# Hotel Reservation System

## Repository

GitHub Repository:
https://github.com/kayfadyah-ship-it/Reservation_Hotel

## Deskripsi Project

Hotel Reservation System adalah aplikasi web berbasis PHP dan MySQL yang digunakan untuk melakukan reservasi hotel &domestik & internasional secara online. Pengguna dapat melihat daftar hotel berdasarkan negara tujuan, melakukan pemesanan kamar, melakukan pembayaran, melihat riwayat reservasi, serta mengelola profil pengguna.

Aplikasi ini dibuat sebagai Proyek Ujian Akhir pembelajaran Praktikum Pengembangan Web menggunakan PHP, MySQL, Bootstrap, HTML, CSS, JavaScript, dan Figma(UI/UX Design & Prototyping).

## Fitur Utama

### 1. Autentikasi Admin

* Login Admin
* Logout Admin
* Session Login

### 2. Manajemen Hotel

* Menampilkan daftar hotel berdasarkan negara
* Menampilkan informasi hotel
* Menampilkan harga hotel
* Menampilkan rating hotel

### 3. Reservasi Hotel

* Tambah reservasi
* Pemilihan pelanggan
* Pemilihan ruangan
* Pemilihan tanggal booking
* Penyimpanan data reservasi

### 4. Pembayaran

* Pembayaran reservasi
* Status pembayaran

### 5. Manajemen Ruangan

* Tambah ruangan
* Edit ruangan
* Hapus ruangan
* Jadwal penggunaan ruangan

### 6. Profil Pengguna

* Melihat profil
* Edit profil

### 7. Riwayat Reservasi

* Menampilkan data reservasi yang telah dibuat
* Menampilkan status reservasi

### 8. Notifikasi

* Menampilkan informasi status reservasi dan pembayaran

## Teknologi yang Digunakan

### Frontend

* HTML5
* CSS3
* Bootstrap 5.3
* JavaScript
* Figma (UI/UX Design & Prototyping)

### Backend

* PHP Native

### Database

* MySQL / MariaDB

### Tools

* XAMPP
* phpMyAdmin
* Visual Studio Code

## Struktur Folder
hotel_reservation/
│
├── assets/
│   ├── img/
│   └── screenshots/
│
├── includes/
│
├── pages/
│   ├── booking.php
│   ├── edit_profile.php
│   ├── edit_ruangan.php
│   ├── favorite.php
│   ├── forgot_password.php
│   ├── hasil_payment.php
│   ├── history_pemesanan.php
│   ├── home.php
│   ├── hotel.php
│   ├── login.php
│   ├── logout.php
│   ├── notifikasi.php
│   ├── payment.php
│   ├── profile.php
│   ├── signup.php
│   ├── tambah_booking.php
│   ├── tambah_ruangan.php
│   └── hapus_ruangan.php
│
├── index.php
├── database.sql
├── .gitignore
└── README.md

## Database

Nama database:

database.sql

### Tabel Database

#### admin

Menyimpan data administrator.

| Field          | Tipe    |
| -------------- | ------- |
| id_admin       | int     |
| nama_admin     | varchar |
| username_admin | varchar |
| password       | varchar |

#### hotel

Menyimpan data hotel.

| Field       | Tipe    |
| ----------- | ------- |
| id_hotel    | int     |
| nama_hotel  | varchar |
| negara      | varchar |
| kota        | varchar |
| rating      | decimal |
| harga_mulai | int     |
| gambar      | varchar |

#### pelanggan

Menyimpan data pelanggan.

| Field          | Tipe    |
| -------------- | ------- |
| id_pelanggan   | int     |
| nama_pelanggan | varchar |
| email          | varchar |
| no_telepon     | varchar |

#### ruangan

Menyimpan data kamar atau ruangan hotel.

#### jadwal

Menyimpan jadwal penggunaan ruangan.

#### reservasi

Menyimpan data pemesanan hotel.

#### payment

Menyimpan data pembayaran reservasi.
---

## Cara Menjalankan Project

### 1. Clone atau Download Project

Simpan folder project ke dalam:

xampp/htdocs/

### 2. Import Database

1. Jalankan Apache dan MySQL pada XAMPP.
2. Buka phpMyAdmin.
3. Buat database:

hotel_reservation

4. Import file:

database.sql


### 3. Konfigurasi Database

File:
```
includes/config.php
```
Konfigurasi default:
```
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "hotel_reservation"
);
```

### 4. Jalankan Project

Buka browser:

http://localhost/hotel_reservation

atau

```
http://localhost/hotel_reservation/login.php
```
## Screenshot

### Home
<img src="https://github.com/kayfadyah-ship-it/Reservation_Hotel/blob/main/assets/screenshots/home.png?raw=true" width="800">

### Booking
<img src="assets/screenshots/booking.png" width="800">

### Favorite
<img src="assets/screenshots/favorite.png" width="800">

### Search Hotel
<img src="assets/screenshots/search.png" width="800">

### Mobile View
<img src="assets/screenshots/mobile.png" width="400">

## Akun Login Default

Username : admin
Password : admin123
