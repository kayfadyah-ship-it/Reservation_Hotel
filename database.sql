-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2026 pada 04.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_pajak` (`total` DECIMAL(10,2)) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
    RETURN total * 0.10;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `total_dengan_pajak` (`total` DECIMAL(10,2)) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
    RETURN total + (total * 0.10);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username_admin` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(100) DEFAULT NULL,
  `negara` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `harga_mulai` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `negara`, `kota`, `rating`, `harga_mulai`, `gambar`) VALUES
(1, 'Hotel Indonesia Kempinski', 'Indonesia', 'Bali', 4.5, 950000, 'kepin.jpg'),
(2, 'The Ritz-Carlton Jakarta', 'Indonesia', 'Jakarta', 4.8, 500000, 'jakarta.jpg'),
(3, 'Pearl Continental', 'Pakistan', 'pakistan', 4.7, 1200000, 'pakistan1.jpg'),
(4, 'Four Seasons Hotel Sultanahmet', 'Turkey', 'Sultanahmet', 4.4, 1000000, 'turkey1.jpg'),
(5, 'Lotte Hotel Busan', 'Korea', 'Busan', 4.9, 18000000, 'busan.jpg'),
(6, 'Grand Hotel Tremezzo', 'Italia', 'Milan', 4.6, 1300000, 'italia1.jpg'),
(7, 'Marina Bay Sands', 'Singapura', 'Singapura', 4.5, 3000000, 'marina.jpg'),
(8, 'Pan Pacific Singapore', 'SIngapura', 'Singapura', 4.5, 2200000, 'pan.jpg'),
(9, 'Serena Hotel', 'Pakistan', 'Pakistan', 4.5, 700000, 'pakistan2.jpg'),
(10, 'Mecure Hotel', 'China', 'China', 4.5, 2, 'mecure.jpg'),
(11, 'Echarm Hotel', 'China', 'China', 4.5, 2200000, 'echarm.jpg'),
(12, 'CVK Taksim Hotel', 'Turkey', 'Istanbul', 4.8, 14000000, 'istanbul.jpg'),
(13, 'Signiel Seoul', 'Korea', 'Seoul', 4.7, 25000000, 'seoul.jpg'),
(14, 'Park Hotel Tokyo', 'Jepang', 'Osaka', 4.4, 2100000, 'jepan1.jpg'),
(15, 'Grand MS Kyoto Hotel', 'Jepang', 'Osaka', 4.9, 19000000, 'grand.jpg'),
(16, 'Excelsior Hotel Gallia', 'Italia', 'Milan', 4.6, 8000000, 'mian.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_ruangan`, `tanggal`, `jam_masuk`, `jam_keluar`, `status`) VALUES
(1, 1, '2026-06-15', '14:00:00', '12:00:00', 'Dipesan'),
(2, 2, '2026-06-15', '14:00:00', '12:00:00', 'Tersedia'),
(3, 3, '2026-06-15', '14:00:00', '12:00:00', 'Dipesan'),
(4, 4, '2026-06-15', '14:00:00', '12:00:00', 'Tersedia'),
(5, 6, '2026-06-16', '14:00:00', '12:00:00', 'Dipesan'),
(6, 7, '2026-06-16', '14:00:00', '12:00:00', 'Tersedia'),
(7, 8, '2026-06-16', '14:00:00', '12:00:00', 'Tersedia'),
(8, 9, '2026-06-17', '14:00:00', '12:00:00', 'Dipesan'),
(9, 10, '2026-06-17', '14:00:00', '12:00:00', 'Tersedia'),
(10, 11, '2026-06-17', '14:00:00', '12:00:00', 'Tersedia'),
(11, 12, '2026-06-18', '14:00:00', '12:00:00', 'Tersedia'),
(12, 13, '2026-06-18', '14:00:00', '12:00:00', 'Dipesan'),
(13, 14, '2026-06-18', '14:00:00', '12:00:00', 'Tersedia'),
(14, 15, '2026-06-19', '14:00:00', '12:00:00', 'Dipesan'),
(15, 16, '2026-06-19', '14:00:00', '12:00:00', 'Dipesan'),
(16, 17, '2026-06-19', '14:00:00', '12:00:00', 'Tersedia'),
(17, 18, '2026-06-20', '14:00:00', '12:00:00', 'Tersedia'),
(18, 19, '2026-06-20', '14:00:00', '12:00:00', 'Dipesan'),
(19, 20, '2026-06-20', '14:00:00', '12:00:00', 'Tersedia'),
(20, 21, '2026-06-21', '14:00:00', '12:00:00', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_reservasi` int(11) DEFAULT NULL,
  `tanggal_payment` datetime DEFAULT NULL,
  `metode_payment` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `bukti_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `id_reservasi`, `tanggal_payment`, `metode_payment`, `status`, `bukti_payment`) VALUES
(1, 1, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti1.jpg'),
(2, 2, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti2.jpg'),
(3, 3, '2026-06-14 19:20:07', 'E-Wallet', 'Menunggu', 'bukti3.jpg'),
(4, 4, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti4.jpg'),
(5, 5, '2026-06-14 19:20:07', 'QRIS', 'Menunggu', 'bukti5.jpg'),
(6, 6, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti6.jpg'),
(7, 7, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti7.jpg'),
(8, 8, '2026-06-14 19:20:07', 'QRIS', 'Menunggu', 'bukti8.jpg'),
(9, 9, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti9.jpg'),
(10, 10, '2026-06-14 19:20:07', 'E-Wallet', 'Lunas', 'bukti10.jpg'),
(11, 11, '2026-06-14 19:20:07', 'Transfer Bank', 'Menunggu', 'bukti11.jpg'),
(12, 12, '2026-06-14 19:20:07', 'QRIS', 'Lunas', 'bukti12.jpg'),
(13, 13, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti13.jpg'),
(14, 14, '2026-06-14 19:20:07', 'E-Wallet', 'Menunggu', 'bukti14.jpg'),
(15, 15, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti15.jpg'),
(16, 16, '2026-06-14 19:20:07', 'QRIS', 'Lunas', 'bukti16.jpg'),
(17, 17, '2026-06-14 19:20:07', 'Transfer Bank', 'Menunggu', 'bukti17.jpg'),
(18, 18, '2026-06-14 19:20:07', 'E-Wallet', 'Lunas', 'bukti18.jpg'),
(19, 19, '2026-06-14 19:20:07', 'Transfer Bank', 'Lunas', 'bukti19.jpg'),
(20, 20, '2026-06-14 19:20:07', 'QRIS', 'Menunggu', 'bukti20.jpg'),
(21, 1, '2026-06-15 21:13:32', 'QRIS', 'Lunas', 'bukti_test.jpg');

--
-- Trigger `payment`
--
DELIMITER $$
CREATE TRIGGER `trg_payment_lunas` BEFORE INSERT ON `payment` FOR EACH ROW BEGIN
    IF NEW.metode_payment IS NOT NULL THEN
        SET NEW.status = 'Lunas';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `no_telepon`) VALUES
(1, 'miaww', 'andi@gmail.com', '081111111'),
(2, 'Budi', 'budi@gmail.com', '082222222'),
(3, 'Citra', 'citra@gmail.com', '083333333'),
(4, 'Siska', 'siska@gmail.com', '089999999'),
(5, 'Rina', 'rina@gmail.com', '0811111112'),
(6, 'Doni', 'doni@gmail.com', '0811111113'),
(7, 'Nadia', 'nadia@gmail.com', '0811111114'),
(8, 'Yoga', 'yoga@gmail.com', '0811111115'),
(9, 'Putri', 'putri@gmail.com', '0811111116'),
(10, 'Farhan', 'farhan@gmail.com', '0811111117'),
(11, 'Alya', 'alya@gmail.com', '0811111118'),
(12, 'Bima', 'bima@gmail.com', '0811111119'),
(13, 'Santi', 'santi@gmail.com', '0811111120'),
(14, 'Dewi', 'dewi@gmail.com', '0811111121'),
(15, 'Rafi', 'rafi@gmail.com', '0811111122'),
(16, 'Naufal', 'naufal@gmail.com', '0811111123'),
(17, 'Tiara', 'tiara@gmail.com', '0811111124'),
(18, 'Kevin', 'kevin@gmail.com', '0811111125'),
(19, 'Intan', 'intan@gmail.com', '0811111126'),
(20, 'Fajar', 'fajar@gmail.com', '0811111127'),
(21, 'Rina', 'rina@gmail.com', '0811111112'),
(22, 'Doni', 'doni@gmail.com', '0811111113'),
(23, 'Nadia', 'nadia@gmail.com', '0811111114'),
(24, 'Yoga', 'yoga@gmail.com', '0811111115'),
(25, 'Putri', 'putri@gmail.com', '0811111116'),
(26, 'Farhan', 'farhan@gmail.com', '0811111117'),
(27, 'Alya', 'alya@gmail.com', '0811111118'),
(28, 'Bima', 'bima@gmail.com', '0811111119'),
(29, 'Santi', 'santi@gmail.com', '0811111120'),
(30, 'Dewi', 'dewi@gmail.com', '0811111121'),
(31, 'Rafi', 'rafi@gmail.com', '0811111122'),
(32, 'Naufal', 'naufal@gmail.com', '0811111123'),
(33, 'Tiara', 'tiara@gmail.com', '0811111124'),
(34, 'Kevin', 'kevin@gmail.com', '0811111125'),
(35, 'Intan', 'intan@gmail.com', '0811111126'),
(36, 'Fajar', 'fajar@gmail.com', '0811111127');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal_reservasi` datetime DEFAULT NULL,
  `tanggal_booking` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `total_pembayaran` decimal(10,2) DEFAULT NULL,
  `id_hotel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_pelanggan`, `id_ruangan`, `id_admin`, `tanggal_reservasi`, `tanggal_booking`, `status`, `total_pembayaran`, `id_hotel`) VALUES
(1, 1, 1, 1, '2026-06-14 19:19:40', '2026-06-15', 'Selesai', 500000.00, NULL),
(2, 2, 2, 1, '2026-06-14 19:19:40', '2026-06-15', 'Selesai', 500000.00, NULL),
(3, 3, 3, 1, '2026-06-14 19:19:40', '2026-06-15', 'Pending', 950000.00, NULL),
(4, 4, 4, 1, '2026-06-14 19:19:40', '2026-06-15', 'Selesai', 500000.00, NULL),
(5, 5, 6, 1, '2026-06-14 19:19:40', '2026-06-16', 'Pending', 500000.00, NULL),
(6, 6, 7, 1, '2026-06-14 19:19:40', '2026-06-16', 'Selesai', 500000.00, NULL),
(7, 7, 8, 1, '2026-06-14 19:19:40', '2026-06-16', 'Selesai', 500000.00, NULL),
(8, 8, 9, 1, '2026-06-14 19:19:40', '2026-06-17', 'Pending', 700000.00, NULL),
(9, 9, 10, 1, '2026-06-14 19:19:40', '2026-06-17', 'Selesai', 700000.00, NULL),
(10, 10, 11, 1, '2026-06-14 19:19:40', '2026-06-17', 'Selesai', 700000.00, NULL),
(11, 11, 12, 1, '2026-06-14 19:19:40', '2026-06-18', 'Pending', 950000.00, NULL),
(12, 12, 13, 1, '2026-06-14 19:19:40', '2026-06-18', 'Selesai', 950000.00, NULL),
(13, 13, 14, 1, '2026-06-14 19:19:40', '2026-06-18', 'Selesai', 950000.00, NULL),
(14, 14, 15, 1, '2026-06-14 19:19:40', '2026-06-19', 'Pending', 1200000.00, NULL),
(15, 15, 16, 1, '2026-06-14 19:19:40', '2026-06-19', 'Selesai', 1200000.00, NULL),
(16, 16, 17, 1, '2026-06-14 19:19:40', '2026-06-19', 'Selesai', 1200000.00, NULL),
(17, 17, 18, 1, '2026-06-14 19:19:40', '2026-06-20', 'Pending', 700000.00, NULL),
(18, 18, 19, 1, '2026-06-14 19:19:40', '2026-06-20', 'Selesai', 700000.00, NULL),
(19, 19, 20, 1, '2026-06-14 19:19:40', '2026-06-20', 'Selesai', 700000.00, NULL),
(20, 20, 21, 1, '2026-06-14 19:19:40', '2026-06-21', 'Pending', 950000.00, NULL),
(21, 1, 1, 1, '2026-06-14 00:00:00', '2026-06-20', 'Pending', 500000.00, NULL),
(22, 1, 22, 1, '2026-06-15 21:08:17', '2026-06-25', 'Pending', 500000.00, NULL),
(23, 1, 1, 1, '2026-06-16 00:00:00', '2026-06-27', 'Pending', 500000.00, NULL),
(24, 1, 32, 1, '2026-06-16 00:00:00', '2026-06-27', 'Pending', 1200000.00, NULL),
(25, 2, 31, 1, '2026-06-16 00:00:00', '2026-09-10', 'Pending', 1200000.00, NULL),
(26, 33, 15, 1, '2026-06-16 00:00:00', '2026-07-10', 'Pending', 1200000.00, NULL),
(27, 1, 37, 1, '2026-06-16 00:00:00', '2026-06-16', 'Pending', 950000.00, NULL),
(28, 1, 1, 1, '2026-06-16 00:00:00', '2026-06-26', 'Pending', 500000.00, NULL),
(29, 1, 1, 1, '2026-06-16 00:00:00', '2026-06-13', 'Pending', 500000.00, NULL),
(30, 1, 3, 1, '2026-06-16 00:00:00', '2026-07-11', 'Pending', 950000.00, NULL),
(31, 34, NULL, 1, '2026-06-16 00:00:00', '2026-10-14', 'Lunas', 0.00, NULL),
(32, 12, NULL, 1, '2026-06-16 00:00:00', '2026-06-17', 'Lunas', 0.00, NULL),
(33, 1, NULL, 1, '2026-06-16 00:00:00', '2026-07-11', 'Menunggu', 0.00, NULL),
(34, 1, NULL, 1, '2026-06-16 00:00:00', '2026-07-11', 'Lunas', 0.00, NULL),
(35, 1, NULL, 1, '2026-06-16 00:00:00', '2026-09-30', 'Menunggu', 0.00, NULL),
(36, 1, NULL, 1, '2026-06-16 00:00:00', '2026-07-11', 'Lunas', 0.00, NULL),
(37, 1, NULL, 1, '2026-06-17 00:00:00', '2026-06-30', 'Lunas', 0.00, NULL);

--
-- Trigger `reservasi`
--
DELIMITER $$
CREATE TRIGGER `trg_reservasi_insert` AFTER INSERT ON `reservasi` FOR EACH ROW BEGIN
    UPDATE jadwal
    SET status='Dipesan'
    WHERE id_ruangan = NEW.id_ruangan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `no_ruangan` varchar(20) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `no_ruangan`, `harga`, `kapasitas`, `deskripsi`) VALUES
(1, '101', 500000.00, 2, 'Deluxe Room'),
(2, '102', 700000.00, 2, 'Deluxe Room'),
(3, '107', 950000.00, 3, 'Deluxe Room'),
(4, '103', 1200000.00, 2, 'Deluxe Room'),
(6, '104', 1500000.00, 2, 'Deluxe Room'),
(7, '105', 1700000.00, 2, 'Deluxe Room'),
(8, '106', 1900000.00, 2, 'Deluxe Room'),
(9, '108', 2100000.00, 2, 'Deluxe Room'),
(10, '109', 2200000.00, 2, 'Deluxe Room'),
(11, '110', 2300000.00, 2, 'Deluxe Room'),
(12, '201', 2500000.00, 2, 'Deluxe Room'),
(13, '202', 3000000.00, 2, 'Deluxe Room'),
(14, '203', 8000000.00, 2, 'Deluxe Room'),
(15, '204', 11000000.00, 2, 'Deluxe Room'),
(16, '205', 14000000.00, 2, 'Deluxe Room'),
(17, '206', 18000000.00, 2, 'Deluxe Room'),
(18, '301', 25000000.00, 2, 'Deluxe Room'),
(19, '302', 1000000.00, 4, 'Superior Room'),
(20, '303', 700000.00, 4, 'Superior Room'),
(21, '304', 35000000.00, 4, 'Premium Room'),
(22, '104', 500000.00, 2, 'Deluxe Room'),
(23, '105', 500000.00, 2, 'Deluxe Room'),
(24, '106', 16000000.00, 4, 'Superior Room'),
(25, '108', 700000.00, 4, 'Superior Room'),
(26, '109', 700000.00, 4, 'Superior Room'),
(27, '110', 700000.00, 4, 'Superior Room'),
(28, '201', 950000.00, 3, 'Premium Room'),
(29, '202', 950000.00, 3, 'Premium Room'),
(30, '203', 950000.00, 3, 'Premium Room'),
(31, '204', 1200000.00, 5, 'Family Room'),
(32, '205', 1200000.00, 5, 'Family Room'),
(33, '206', 1200000.00, 5, 'Family Room'),
(34, '301', 700000.00, 4, 'Superior Room'),
(35, '302', 700000.00, 4, 'Superior Room'),
(36, '303', 700000.00, 4, 'Superior Room'),
(37, '304', 950000.00, 3, 'Premium Room');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_payment_lengkap`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_payment_lengkap` (
`nama_pelanggan` varchar(100)
,`no_ruangan` varchar(20)
,`metode_payment` varchar(50)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_reservasi_lengkap`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_reservasi_lengkap` (
`id_reservasi` int(11)
,`nama_pelanggan` varchar(100)
,`no_ruangan` varchar(20)
,`tanggal_booking` date
,`status` varchar(20)
,`total_pembayaran` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_payment_lengkap`
--
DROP TABLE IF EXISTS `view_payment_lengkap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_payment_lengkap`  AS SELECT `p`.`nama_pelanggan` AS `nama_pelanggan`, `ru`.`no_ruangan` AS `no_ruangan`, `pay`.`metode_payment` AS `metode_payment`, `pay`.`status` AS `status` FROM (((`payment` `pay` join `reservasi` `r` on(`pay`.`id_reservasi` = `r`.`id_reservasi`)) join `pelanggan` `p` on(`r`.`id_pelanggan` = `p`.`id_pelanggan`)) join `ruangan` `ru` on(`r`.`id_ruangan` = `ru`.`id_ruangan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_reservasi_lengkap`
--
DROP TABLE IF EXISTS `view_reservasi_lengkap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_reservasi_lengkap`  AS SELECT `r`.`id_reservasi` AS `id_reservasi`, `p`.`nama_pelanggan` AS `nama_pelanggan`, `ru`.`no_ruangan` AS `no_ruangan`, `r`.`tanggal_booking` AS `tanggal_booking`, `r`.`status` AS `status`, `r`.`total_pembayaran` AS `total_pembayaran` FROM ((`reservasi` `r` join `pelanggan` `p` on(`r`.`id_pelanggan` = `p`.`id_pelanggan`)) join `ruangan` `ru` on(`r`.`id_ruangan` = `ru`.`id_ruangan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`);

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `reservasi_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
