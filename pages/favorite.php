<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$favorites = [

    [
        "negara" => "Indonesia",
        "gambar" => "../assets/img/indonesia.jpg"
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

    <title>Favorite</title>

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
            font-size: 32px;
            color: white;
        }

        .menu-toggle {
            display: none;
            border: none;
            background: none;
            color: white;
            font-size: 32px;
            cursor: pointer;
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
            font-weight: 700;
        }

        .favorite-card {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            height: 300px;
            cursor: pointer;
        }

        .favorite-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s;
        }

        .favorite-card:hover img {
            transform: scale(1.05);
        }

        .love-icon {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: 24px;
        }

        .country-name {
            position: absolute;
            left: 15px;
            bottom: 15px;

            color: white;
            font-size: 18px;
            font-weight: 600;
        }

        .footer {
            color: #3D4A85;
            font-weight: 500;
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
                font-size: 30px;
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
                padding: 20px;
            }

            .menu-box.show {
                display: flex !important;
            }

            .favorite-card {
                height: 250px;
            }

        }

        /* MOBILE */
        @media(max-width:768px) {

            .logo {
                font-size: 26px;
            }

            .favorite-card {
                height: 220px;
            }

            .country-name {
                font-size: 16px;
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

        <div class="text-center mt-5 mb-4">

            <h2 class="title-promo">
                Your Favorite Destinations ❤️
            </h2>

        </div>

        <!-- FAVORITE DESTINATION -->

        <div class="container">

            <div class="row justify-content-center g-4">

                <?php foreach ($favorites as $f) { ?>

                    <div class="col-12 col-sm-6 col-lg-3">

                        <a href="hotel.php?negara=<?= urlencode($f['negara']); ?>&from=favorite"
                            class="text-decoration-none">

                            <div class="favorite-card">

                                <img src="<?= $f['gambar']; ?>">

                                <div class="love-icon">
                                    ❤️
                                </div>

                                <div class="country-name">
                                    <?= $f['negara']; ?>
                                </div>

                            </div>

                        </a>

                    </div>

                <?php } ?>

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