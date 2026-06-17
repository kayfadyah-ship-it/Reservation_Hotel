<?php

$status = $_GET['status'] ?? '';

if ($status == "Lunas") {

    $judul = "Pembayaran Berhasil";
    $pesan = "Terima kasih telah melakukan pembayaran.";
    $warna = "#28a745";
    $icon = "✓";

} else {

    $judul = "Pembayaran Menunggu";
    $pesan = "Silakan lakukan pembayaran sebelum tanggal booking.";
    $warna = "#ffc107";
    $icon = "⌛";

}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Status Pembayaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            position: relative;
        }

        body::before {

            content: "";

            position: fixed;
            inset: 0;

            background:
                linear-gradient(rgba(61, 74, 133, 0.65),
                    rgba(134, 142, 178, 0.55),
                    rgba(255, 255, 255, 0.45)),
                url('assets/img/pulau bajo.jpg');

            background-size: cover;
            background-position: center;

            z-index: -1;
        }

        .result-card {

            max-width: 700px;

            margin: auto;
            margin-top: 100px;

            background: white;

            border-radius: 25px;

            padding: 40px;

            text-align: center;

            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
        }

        .icon {

            font-size: 80px;

            color:  <?= $warna ?>;
        }

        .title {

            font-size: 42px;
            font-weight: 700;

            margin-top: 10px;
        }

        .status {

            font-size: 24px;

            margin-top: 15px;

            color:  <?= $warna ?>;

            font-weight: 600;
        }

        .message {

            margin-top: 20px;

            font-size: 18px;
        }

        .btn-home {

            margin-top: 30px;

            background: #3D4A85;
            color: white;

            border: none;

            padding: 12px 30px;

            border-radius: 12px;

            text-decoration: none;

            display: inline-block;
        }

        .btn-home:hover {

            background: #2f3969;
            color: white;
        }

        @media(max-width:768px) {

            .result-card {

                margin: 20px;
                margin-top: 80px;

                padding: 25px;
            }

            .title {

                font-size: 30px;
            }

            .icon {

                font-size: 60px;
            }
        }
    </style>

</head>

<body>

    <div class="result-card">

        <div class="icon">
                <?= $icon ?>
        </div>

        <div class="title">
                <?= $judul ?>
        </div>

        <div class="status">
            Status : <?= $status ?>
        </div>

        <div class="message">
                <?= $pesan ?>
        </div>

        <a href="booking.php" class="btn-home">

            Kembali ke Booking

        </a>

    </div>

</body>

</html>