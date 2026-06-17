<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Molle:ital@1&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #1f1f1f;
        }

        .main-container {
            min-height: 100vh;

            background: linear-gradient(180deg,
                    #3D4A85 0%,
                    #868EB2 50%,
                    #FFFFFF 100%);
        }

        /* HEADER */

        .logo {
            font-family: 'Molle', cursive;
            font-size: 36px;
            color: white;
        }

        .top-bar {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            flex: 1;
            max-width: 450px;
        }

        .search-box input {
            border-radius: 30px;
            height: 45px;
        }

        .header-icons {
            margin-left: auto;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .mail-icon {
            font-size: 30px;
            color: white;
        }

        .menu-toggle {
            display: none;
            border: none;
            background: none;
            color: white;
            font-size: 30px;
        }

        .menu-box {
            background: white;
            border-radius: 15px;
            padding: 12px 30px;
        }

        .menu-box a {
            text-decoration: none;
            color: #3D4A85;
            font-weight: 500;
        }

        /* HERO */

        .hero {
            position: relative;
            margin-top: 30px;
        }

        .hero img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .booking-form {

            position: absolute;

            top: 50%;
            right: 8%;

            transform: translateY(-50%);

            width: 320px;

            background: #d9d9d9;

            padding: 20px;

            border-radius: 25px;
        }

        .booking-form input {
            margin-bottom: 15px;
            border-radius: 20px;
        }

        .booking-btn {
            width: 100%;
            border: none;

            padding: 12px;

            border-radius: 10px;

            background: #3D4A85;
            color: white;
        }

        .stat-card {
            background: white;

            padding: 20px;

            border-radius: 15px;
        }

        /* HISTORY */

        .history-title {
            margin-top: 20px;
            margin-bottom: 15px;
            color: #1f1f1f;
            font-weight: 600;
        }

        .history-card {
            border: 1px solid #888;
            background: rgba(255, 255, 255, .4);
            padding: 12px;
        }

        .history-city {
            font-weight: 600;
        }

        .footer {
            color: #3D4A85;
        }

        .footer-logo {
            font-family: 'Molle', cursive;
            font-size: 30px;
            color: #3D4A85;
        }

        /* TABLET */

        @media(max-width:992px) {

            .top-bar {
                display: grid;

                grid-template-columns: 1fr auto;

                grid-template-areas:
                    "logo icons"
                    "search search";
            }

            .logo {
                grid-area: logo;
            }

            .header-icons {
                grid-area: icons;
            }

            .search-box {
                grid-area: search;
                max-width: 100%;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .menu-box {
                display: none !important;
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .menu-box.show {
                display: flex !important;
            }

            .hero img {
                height: 400px;
            }

            .booking-form {
                width: 280px;
            }
        }

        /* MOBILE */

        @media(max-width:768px) {

            .logo {
                font-size: 28px;
            }

            .hero img {
                height: 350px;
            }

            .booking-form {

                position: static;

                transform: none;

                width: 100%;

                margin-top: 20px;
            }

            .footer-logo {
                font-size: 24px;
            }
        }
    </style>

</head>

<body>

    <div class="container-fluid p-4 main-container">

        <!-- HEADER -->

        <div class="top-bar">

            <div class="logo">
                HOTELreserve
            </div>

            <div class="search-box">

                <form method="GET" class="d-flex">

                    <input type="text" name="tujuan" class="form-control" placeholder="Search your destination">

                    <button type="submit" class="btn btn-light ms-2">
                        Cari
                    </button>

                </form>

            </div>

            <div class="header-icons">

                <a href="notifikasi.php" class="mail-icon text-decoration-none">
                    ✉️
                </a>

                <button class="menu-toggle" onclick="toggleMenu()">
                    ☰
                </button>

            </div>

        </div>

        <!-- MENU -->

        <div class="row justify-content-center mt-4">

            <div class="col-lg-8">

                <div id="menuBox" class="menu-box d-flex justify-content-around">

                    <a href="home.php">Home</a>
                    <a href="favorite.php">Favorite</a>
                    <a href="booking.php">Booking</a>
                    <a href="profile.php">Profile</a>

                </div>

            </div>

        </div>

        <div class="row mt-4 text-center">

            <div class="col-md-4">
                <div class="stat-card">
                    <h3>500+</h3>
                    <p>Total Hotel</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card">
                    <h3>12K+</h3>
                    <p>Total Booking</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card">
                    <h3>100+</h3>
                    <p>Negara Tersedia</p>
                </div>
            </div>

        </div>

        <!-- HERO -->

        <div class="hero">

            <img src="../assets/img/brunei.jpg">

            <div class="booking-form">

                <form method="GET">

                    <input type="text" name="tujuan" class="form-control" placeholder="Search your destination">

                    <input type="date" name="tanggal" class="form-control">

                    <button type="submit" class="booking-btn">

                        Cari

                    </button>

                </form>

            </div>

        </div>

        <div class="text-end mb-3">

            <a href="tambah_booking.php" class="btn btn-primary">

                + Tambah Reservasi

            </a>

        </div>

        <?php
        if (isset($_GET['tujuan']) && $_GET['tujuan'] != '') {
            $search = mysqli_real_escape_string(
                $conn,
                $_GET['tujuan']
            );

            echo "<h3>Mencari: "
                . htmlspecialchars($search)
                . "</h3>";

            $query = mysqli_query(
                $conn,
                "SELECT *
         FROM hotel
         WHERE nama_hotel LIKE '%$search%'
         OR negara LIKE '%$search%'
         OR kota LIKE '%$search%'"
            );

            $jumlah = mysqli_num_rows($query);

            echo "<p>Jumlah data ditemukan: $jumlah</p>";

            echo "<h3>Hasil Pencarian</h3>";

            if ($jumlah > 0) {
                while ($hotel = mysqli_fetch_assoc($query)) {
                    echo "
            <div class='card mb-3'>
                <div class='card-body'>

                    <h5>{$hotel['nama_hotel']}</h5>

                    <p>
                        {$hotel['kota']},
                        {$hotel['negara']}
                    </p>

                    <p>
                        Rating:
                        {$hotel['rating']}
                    </p>

                    <p>
                        Rp " . number_format($hotel['harga_mulai']) . "
                    </p>

                </div>
            </div>
            ";
                }
            } else {
                echo "
        <div class='alert alert-warning'>
            Hotel tidak ditemukan
        </div>
        ";
            }
        }

        ?>

        <!-- HISTORY -->

        <h3 class="history-title">
            Riwayat Pencarian
        </h3>

        <div class="row g-3">

            <div class="col-md-4">
                <div class="history-card">
                    <div class="history-city">Yogyakarta</div>
                    <small>14 Juni 2026 - 1 kamar, 2 orang</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="history-card">
                    <div class="history-city">Bali</div>
                    <small>30 Juli 2026 - 4 kamar, 8 orang</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="history-card">
                    <div class="history-city">Bandung</div>
                    <small>30 Juni 2026 - 1 kamar, 1 orang</small>
                </div>
            </div>

        </div>

        <!-- FOOTER -->

        <div class="d-flex justify-content-between align-items-center mt-5">

            <div class="footer">
                © 2026 All Rights Reserved.
            </div>

            <div class="footer-logo">
                HOTELreserve
            </div>

        </div>

    </div>

    <script>

        function toggleMenu() {
            document
                .getElementById("menuBox")
                .classList
                .toggle("show");
        }

    </script>

</body>

</html>