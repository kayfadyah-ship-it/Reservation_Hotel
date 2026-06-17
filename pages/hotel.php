<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$negara = $_GET['negara'] ?? '';
$from = $_GET['from'] ?? 'home';

$backPage = ($from == 'favorite')
    ? 'favorite.php'
    : 'home.php';

$hotels = [

    "Indonesia" => [
        [
            "nama" => "Hotel Indonesia Kempinski",
            "gambar" => "../assets/img/kepin.jpg",
            "harga" => "Rp 950.000 / malam"
        ],
        [
            "nama" => "The Ritz-Carlton Jakarta",
            "gambar" => "../assets/img/jakarta.jpg",
            "harga" => "Rp 500.000 / malam"
        ]
    ],

    "Korea" => [
        [
            "nama" => "Lotte Hotel Busan",
            "gambar" => "../assets/img/busan.jpg",
            "harga" => "Rp 18.000.000 / malam"
        ],
        [
            "nama" => "Signiel Seoul",
            "gambar" => "../assets/img/seoul.jpg",
            "harga" => "Rp 25.000.000 / malam"
        ]
    ],

    "Pakistan" => [
        [
            "nama" => "Pearl Continental",
            "gambar" => "../assets/img/pakistan1.jpg",
            "harga" => "Rp 1.200.000 / malam"
        ],
        [
            "nama" => "Serena Hotel",
            "gambar" => "../assets/img/pakistan2.jpg",
            "harga" => "Rp 700.000 / malam"
        ]
    ],

    "Turkey" => [
        [
            "nama" => "CVK Taksim Hotel",
            "gambar" => "../assets/img/istanbul.jpg",
            "harga" => "Rp 14.000.000 / malam"
        ],
        [
            "nama" => "Four Seasons Hotel Sultanahmet",
            "gambar" => "../assets/img/turkey1.jpg",
            "harga" => "Rp 11.000.000 / malam"
        ]
    ],

    "China" => [
        [
            "nama" => "Mecure Hotel",
            "gambar" => "../assets/img/mecure.jpg",
            "harga" => "Rp 1.700.000 / malam"
        ],
        [
            "nama" => "Echarm Hotel",
            "gambar" => "../assets/img/echarm.jpg",
            "harga" => "Rp 2.200.000 / malam"
        ]
    ],

    "Japan" => [
        [
            "nama" => "Park Hotel Tokyo",
            "gambar" => "../assets/img/jepan1.jpg",
            "harga" => "Rp 2.100.000 / malam"
        ],
        [
            "nama" => "Grand MS Kyoto Hotel",
            "gambar" => "../assets/img/grand.jpg",
            "harga" => "Rp 1.900.000 / malam"
        ]
    ],

    "Italy" => [
        [
            "nama" => "Excelsior Hotel Gallia",
            "gambar" => "../assets/img/mian.jpg",
            "harga" => "Rp 8.000.000 / malam"
        ],
        [
            "nama" => "Grand Hotel Tremezzo",
            "gambar" => "../assets/img/italia1.jpg",
            "harga" => "Rp 2.300.000 / malam"
        ]
    ],

    "Brunei" => [
        [
            "nama" => "The Empire Brunei",
            "gambar" => "../assets/img/brunei1.jpg",
            "harga" => "Rp 2.500.000 / malam"
        ],
        [
            "nama" => "Radisson Hotel Brunei",
            "gambar" => "../assets/img/brunei2.jpg",
            "harga" => "Rp 1.500.000 / malam"
        ]
    ],

    "Singapore" => [
        [
            "nama" => "Marina Bay Sands",
            "gambar" => "../assets/img/marina.jpg",
            "harga" => "Rp 3.000.000 / malam"
        ],
        [
            "nama" => "Pan Pacific Singapore",
            "gambar" => "../assets/img/pan.jpg",
            "harga" => "Rp 2.200.000 / malam"
        ]
    ]
];

$dataHotel = $hotels[$negara] ?? [];

$background = [

    "Indonesia" => "../assets/img/indonesia.jpg",
    "Korea" => "../assets/img/korea.jpg",
    "Pakistan" => "../assets/img/pakistan.jpg",
    "Turkey" => "../assets/img/turkey.jpg",
    "China" => "../assets/img/china.jpg",
    "Japan" => "../assets/img/jepang.jpg",
    "Italy" => "../assets/img/italia.jpg",
    "Brunei" => "../assets/img/brunei.jpg",
    "Singapore" => "../assets/img/singapura.jpg"

];

$bg = $background[$negara];
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotel
        <?= $negara; ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(180deg,
                    #3D4A85 0%,
                    #868EB2 50%,
                    #FFFFFF 100%);
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;

            background: linear-gradient(rgba(61, 74, 133, 0.65),
                    rgba(134, 142, 178, 0.55),
                    rgba(255, 255, 255, 0.45)),
                url('<?= $bg ?>');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;

        }

        .hotel-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .15);
        }

        .hotel-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .hotel-info {
            padding: 20px;
        }

        .hotel-name {
            font-size: 22px;
            font-weight: 600;
        }

        .hotel-price {
            color: #3D4A85;
            font-weight: 600;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            text-decoration: none;

            color: white;
            font-size: 18px;
            font-weight: 600;

            transition: 0.3s;
        }

        .back-btn:hover {
            color: #d9d9d9;
        }
    </style>

</head>

<body>

    <div class="container py-5">

        <h1 class="text-center text-white mb-5">

            Rekomendasi Hotel di
            <?= $negara; ?>

        </h1>

        <div class="row g-4">

            <div class="container mt-4">

                <a href="home.php" class="back-btn">
                    ← Kembali
                </a>

            </div>

            <?php foreach ($dataHotel as $hotel) { ?>

                <div class="col-md-6">

                    <div class="hotel-card">

                        <img src="<?= $hotel['gambar']; ?>">

                        <div class="hotel-info">

                            <div class="hotel-name">
                                <?= $hotel['nama']; ?>
                            </div>

                            <div class="hotel-price">
                                <?= $hotel['harga']; ?>
                            </div>

                            <a href="tambah_booking.php?
                            hotel=<?= urlencode($hotel['nama']); ?>
                            &harga=<?= urlencode($hotel['harga']); ?>" class="btn btn-primary">

                                Booking Sekarang

                            </a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>



</body>

</html>