<?php
session_start();

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

    <title>Notifikasi</title>

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
            display:flex;
            flex-direction:column;
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

        /* NOTIFICATION */

        .notification-container {

            display: flex;
            gap: 25px;

            margin-top: 50px;
        }

        .notification-sidebar {

            width: 280px;

            background: white;

            border-radius: 20px;

            padding: 30px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
        }

        .sidebar-title {

            font-size: 2rem;

            font-weight: 700;

            margin-bottom: 40px;

            color: #24355A;
        }

        .sidebar-menu {

            display: flex;

            align-items: center;

            gap: 15px;

            text-decoration: none;

            color: #24355A;

            font-size: 1.2rem;

            font-weight: 600;

            margin-bottom: 25px;
        }

        .sidebar-menu.active {
            color: #0D6EFD;
        }

        .notification-badge {

            margin-left: auto;

            width: 35px;
            height: 35px;

            border-radius: 50%;

            background: red;

            color: white;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .notification-content {

            flex: 1;

            background: white;

            border-radius: 20px;

            overflow: hidden;

            box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
        }

        .notification-title {

            padding: 30px;

            font-size: 2.2rem;

            font-weight: 700;

            color: #24355A;
        }

        .notification-card {

            background: #EEF0F7;

            padding: 30px;

            display: flex;

            gap: 20px;
        }

        .notification-icon {

            width: 50px;
            height: 50px;

            border-radius: 50%;

            background: #FFD500;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 1.5rem;
        }

        .notification-body {
            flex: 1;
        }

        .notification-header {

            display: flex;

            gap: 15px;

            align-items: center;

            flex-wrap: wrap;

            margin-bottom: 10px;
        }

        .notification-subject {

            font-size: 1.5rem;

            font-weight: 700;

            color: #24355A;
        }

        .notification-date {

            color: #6C757D;
        }

        .notification-message {

            font-size: 1.1rem;

            line-height: 1.6;

            color: #24355A;
        }

        /* FOOTER */

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

            .notification-container {
                flex-direction: column;
            }

            .notification-sidebar {
                width: 100%;
            }

        }

        /* MOBILE */

        @media(max-width:768px) {

            .notification-title {
                font-size: 1.6rem;
            }

            .notification-subject {
                font-size: 1.1rem;
            }

            .notification-message {
                font-size: 0.95rem;
            }

            .sidebar-title {
                font-size: 1.5rem;
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
                <input type="text" class="form-control" placeholder="Search your destination">
            </div>

            <div class="header-icons">

                <div class="mail-icon">
                    ✉️
                </div>

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

        <!-- NOTIFICATION -->

        <div class="content-wrapper">
            <div class="notification-container">

                <div class="notification-sidebar">

                    <h2 class="sidebar-title">
                        Inbox
                    </h2>

                    <a href="#" class="sidebar-menu active">

                        <span>🔔</span>

                        <span>Notifikasi</span>

                        <span class="notification-badge">
                            1
                        </span>

                    </a>

                    <a href="#" class="sidebar-menu">

                        <span>💬</span>

                        <span>Chat</span>

                    </a>

                </div>

                <div class="notification-content">

                    <h2 class="notification-title">
                        Notifikasi
                    </h2>

                    <div class="notification-card">

                        <div class="notification-icon">
                            🏢
                        </div>

                        <div class="notification-body">

                            <div class="notification-header">

                                <div class="notification-subject">
                                    Beli tiket hotel sekarang dengan diskon spesial 🤩
                                </div>

                                <div class="notification-date">
                                    • 24 Jun
                                </div>

                            </div>

                            <div class="notification-message">

                                Berlaku hanya untuk pemesanan hotel menggunakan
                                brand HOTELreserve tanpa batas
                                transaksi minimum 😲 !
                                Pesan hotelnya sekarang juga.

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- FOOTER -->

        <div class="d-flex justify-content-between align-items-center mt-auto pt-5">

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