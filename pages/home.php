<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$destinations = [

    [
        "negara" => "Indonesia",
        "gambar" => "../assets/img/indonesia.jpg"
    ],

    [
        "negara" => "Korea",
        "gambar" => "../assets/img/korea.jpg"
    ],

    [
        "negara" => "Pakistan",
        "gambar" => "../assets/img/pakistan.jpg"
    ],

    [
        "negara" => "Turkey",
        "gambar" => "../assets/img/turkey.jpg"
    ],

    [
        "negara" => "China",
        "gambar" => "../assets/img/china.jpg"
    ],

    [
        "negara" => "Japan",
        "gambar" => "../assets/img/jepang.jpg"
    ],

    [
        "negara" => "Italy",
        "gambar" => "../assets/img/italia.jpg"
    ],

    [
        "negara" => "Brunei",
        "gambar" => "../assets/img/brunei.jpg"
    ],

    [
        "negara" => "Singapore",
        "gambar" => "../assets/img/singapura.jpg"
    ]
];
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Molle:ital@1&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #1f1f1f;
        }

        .main-container {
            background: linear-gradient(180deg,
                    #3D4A85 0%,
                    #868EB2 50%,
                    #FFFFFF 100%);

            min-height: 100vh;
        }

        .logo {
            font-family: 'Molle', cursive;
            font-size: 36px;
            color: white;
            white-space: nowrap;
            font-weight: bold;
        }

        .mail-icon {
            font-size: 40px;
            color: white;
            cursor: pointer;
        }

        .header-icons {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 32px;
            cursor: pointer;
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

        .title-promo {
            color: white;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        .promo-banner {
            height: 250px;

            background: url('../assets/img/brunei.jpg');
            background-size: cover;
            background-position: center;

            border-radius: 25px;

            display: flex;
            align-items: center;

            padding: 40px;

            color: white;

            position: relative;
        }

        .promo-banner::before {
            content: "";
            position: absolute;
            inset: 0;

            background: rgba(0, 0, 0, .35);

            border-radius: 25px;
        }

        .promo-content {
            position: relative;
            z-index: 1;
        }

        .popular-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .popular-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .destination-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            height: 220px;
        }

        .destination-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s;
        }

        .destination-card:hover img {
            transform: scale(1.05);
        }

        .favorite {
            position: absolute;
            top: 10px;
            left: 10px;
            color: white;
            font-size: 18px;
        }

        .country {
            position: absolute;
            bottom: 10px;
            left: 10px;

            color: white;
            font-size: 13px;
            font-weight: 500;
        }

        .stat-card {
            background: white;

            padding: 20px;

            border-radius: 15px;
        }

        .footer {
            color: #3D4A85;
            font-weight: 500;
        }

        .footer-logo {
            font-family: molle, cursive;
            font-size: 30px;
            font-weight: bold;
            color: #3D4A85;
        }


        @media(max-width:992px) {

            .top-bar {
                display: grid;
                grid-template-columns: 1fr auto;
                grid-template-areas:
                    "logo icons"
                    "search search";
                gap: 15px;
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

        }


        @media(max-width:768px) {

            .top-bar {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .menu-toggle {
                display: block;
            }

            .search-box {
                width: 100%;
                max-width: 100%;
            }

            .menu-box {
                display: none !important;
                flex-direction: column;
                text-align: center;
                gap: 15px;
                padding: 20px;
            }

            .menu-box.show {
                display: flex !important;
            }

            .destination-card {
                height: 180px;
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

                <form method="GET" action="hotel.php" class="d-flex">

                    <input type="text" name="negara" class="form-control" placeholder="Search your destination"
                        required>

                    <input type="hidden" name="from" value="home">

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

        <!-- TITLE -->

        <div class="text-center mt-4 mb-4">

            <h2 class="title-promo">
                Nikamati berbagai promo Hotel hari ini!
            </h2>

        </div>

        <div class="promo-banner mt-4 mb-5">

            <div class="promo-content">

                <h2>Diskon Hingga 50%</h2>

                <p>
                    Dapatkan harga terbaik untuk hotel impianmu
                </p>

                <a href="booking.php" class="btn btn-light">
                    Booking Sekarang
                </a>

            </div>

        </div>

        <!-- DESTINATION -->

        <div class="container">

            <div class="row g-3">

                <?php foreach ($destinations as $d) { ?>

                    <div class="col-12 col-sm-6 col-lg-4">

                        <a href="hotel.php?negara=<?= urlencode($d['negara']); ?>&from=home" class="text-decoration-none">

                            <div class="destination-card">

                                <img src="<?= $d['gambar']; ?>">

                                <div class="favorite">🤍</div>

                                <div class="country">
                                    <?= $d['negara']; ?>
                                </div>

                            </div>

                        </a>

                    </div>

                <?php } ?>

            </div>

        </div>

        <h2 class="text-center text-white mt-5 mb-4">
            Hotel Populer ⭐
        </h2>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="popular-card">

                    <img src="../assets/img/marina.jpg">

                    <div class="p-3">

                        <h5>Marina Bay Sands</h5>

                        <p>Singapore</p>

                        <strong>Rp 3.000.000</strong>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="popular-card">

                    <img src="../assets/img/seoul.jpg">

                    <div class="p-3">

                        <h5>Signiel Seoul</h5>

                        <p>Korea</p>

                        <strong>Rp 25.000.000</strong>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="popular-card">

                    <img src="../assets/img/jepan1.jpg">

                    <div class="p-3">

                        <h5>Park Hotel Tokyo</h5>

                        <p>Tokyo</p>

                        <strong>Rp 2.100.000</strong>

                    </div>

                </div>

            </div>

        </div>

        <div class="row text-center mt-5 mb-5">

            <div class="col-md-4">

                <div class="stat-card">

                    <h2>500+</h2>

                    <p>Hotel Tersedia</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="stat-card">

                    <h2>100+</h2>

                    <p>Destinasi</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="stat-card">

                    <h2>10K+</h2>

                    <p>Pelanggan</p>

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