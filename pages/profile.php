<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include '../includes/config.php';

$id = $_SESSION['login'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM pelanggan
         WHERE id_pelanggan='$id'"
    )
);

$username = $data['nama_pelanggan'];

$tier = "Gold";
$point = "1250";
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

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
            margin: 0;
            padding: 0;
        }

        .main-container {

            min-height: 100vh;

            display: flex;
            flex-direction: column;

            background: linear-gradient(180deg,
                    #3D4A85 0%,
                    #868EB2 50%,
                    #FFFFFF 100%);
        }

        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* ======================
   HEADER
====================== */

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
            align-items: center;
            gap: 15px;
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

        /* ======================
   PROFILE CARD
====================== */

        .profile-card {

            position: relative;

            width: 100%;

            min-height: 230px;

            padding: 40px;

            border-radius: 25px;

            background: linear-gradient(135deg,
                    #896200 0%,
                    #B98D10 50%,
                    #E1B845 100%);

            color: white;

            overflow: hidden;
        }

        .profile-card::before {

            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border: 2px solid rgba(255, 255, 255, .15);

            border-radius: 50%;

            top: -120px;
            right: -50px;
        }

        .profile-card::after {

            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            border: 2px solid rgba(255, 255, 255, .12);

            border-radius: 50%;

            top: -80px;
            right: 20px;
        }

        .profile-name {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .member-tier {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .member-point {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
        }

        .tier-icon,
        .point-icon {

            width: 40px;
            height: 40px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tier-icon {
            background: #E1B845;
        }

        .point-icon {
            background: #2F66D0;
        }

        .edit-btn {

            position: absolute;

            top: 20px;
            right: 20px;

            width: 50px;
            height: 50px;

            border-radius: 50%;

            background: white;

            color: #555;

            display: flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;

            text-decoration: none;

            z-index: 999;
        }

        .menu-item {
            display: block;
            padding: 12px 0;
            color: #333;
            text-decoration: none;
            font-size: 18px;
        }

        .menu-item:hover {
            color: #3D4A85;
        }

        /* ======================
   PROFILE MENU
====================== */

        .profile-menu {

            background: white;

            border-radius: 15px;

            padding: 20px;
        }

        .profile-menu a {

            display: block;

            text-decoration: none;

            color: #444;

            padding: 10px 0;
        }

        .profile-menu a:hover {
            color: #3D4A85;
        }

        /* ======================
   FOOTER
====================== */

        .footer {
            color: #3D4A85;
        }

        .footer-logo {
            font-family: 'Molle', cursive;
            font-size: 30px;
            color: #3D4A85;
        }

        /* ======================
   TABLET
====================== */

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
                font-size: 30px;
            }

            .header-icons {
                grid-area: icons;
            }

            .search-box {
                grid-area: search;
                max-width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .menu-box {

                display: none !important;

                flex-direction: column;

                gap: 15px;

                text-align: center;
            }

            .menu-box.show {
                display: flex !important;
            }

            .profile-name {
                font-size: 2.2rem;
            }

            .member-tier {
                font-size: 1.5rem;
            }

            .member-point {
                font-size: 1.2rem;
            }

        }

        /* ======================
   MOBILE
====================== */

        @media(max-width:768px) {

            .profile-card {
                padding: 25px;
            }

            .profile-name {
                font-size: 1.8rem;
            }

            .member-tier {
                font-size: 1.2rem;
            }

            .member-point {
                font-size: 1rem;
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

        <!-- PROFILE -->

        <div class="content-wrapper">

            <div class="container mt-5">

                <div class="row g-4">

                    <div class="col-lg-8">

                        <div class="profile-card">

                            <a href="edit_profile.php" class="edit-btn">
                                ✎
                            </a>

                            <h1 class="profile-name">
                                <?= $username ?>
                            </h1>

                            <div class="member-tier">

                                <div class="tier-icon">
                                    ✦
                                </div>

                                <span>
                                    Tier
                                    <?= $tier ?>
                                </span>

                            </div>

                            <div class="member-point">

                                <div class="point-icon">
                                    🪙
                                </div>

                                <span>
                                    <?= $point ?> Points
                                </span>

                            </div>


                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="profile-menu">

                            <a href="favorite.php" class="menu-item">
                                Wishlist
                            </a>

                            <a href="#" class="menu-item" onclick="showPayment()">
                                Metode Pembayaran
                            </a>

                            <a href="history_pemesanan.php" class="menu-item">
                                Your Orders
                            </a>

                            <a href="edit_profile.php" class="menu-item">
                                Pengaturan
                            </a>

                            <a href="logout.php" class="menu-item">
                                Keluar
                            </a>

                        </div>

                    </div>

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

    <script>

        function showPayment() {
            alert(
                "Metode Pembayaran:\n\n" +
                "1. Transfer Bank\n" +
                "2. QRIS"
            );
        }

    </script>

</body>

</html>