<?php
session_start();
include '../includes/config.php';

$hotel = $_GET['hotel'] ?? '';
$harga = $_GET['harga'] ?? '';
$id_pelanggan = $_GET['pelanggan'] ?? '';
$tanggal_booking = $_GET['tanggal'] ?? '';

if (isset($_POST['bayar'])) {

    $status = "Lunas";

    mysqli_query($conn, "
    INSERT INTO reservasi
    (
        id_pelanggan,
        id_admin,
        tanggal_reservasi,
        tanggal_booking,
        status,
        total_pembayaran
    )

    VALUES
    (
        '$id_pelanggan',
        '1',
        CURDATE(),
        '$tanggal_booking',
        '$status',
        '$harga'
    )
    ");

    header("Location: hasil_payment.php?status=Lunas");
    exit();
}

if (isset($_POST['nanti'])) {

    $status = "Menunggu";

    mysqli_query($conn, "
    INSERT INTO reservasi
    (
        id_pelanggan,
        id_admin,
        tanggal_reservasi,
        tanggal_booking,
        status,
        total_pembayaran
    )

    VALUES
    (
        '$id_pelanggan',
        '1',
        CURDATE(),
        '$tanggal_booking',
        '$status',
        '$harga'
    )
    ");

    header("Location: hasil_payment.php?status=Menunggu");;
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pembayaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

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

        .payment-card {

            background: rgba(255, 255, 255, 0.95);

            max-width: 700px;

            margin: auto;
            margin-top: 60px;

            padding: 35px;

            border-radius: 25px;

            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
        }

        .page-title {

            font-size: 50px;
            font-weight: 700;

            margin-bottom: 30px;

            color: #1f1f1f;
        }

        .info-box {

            background: #f8f9fa;

            padding: 15px;

            border-radius: 12px;

            margin-bottom: 15px;
        }

        .info-label {

            font-weight: 600;

            color: #3D4A85;
        }

        .total-box {

            background: #3D4A85;

            color: white;

            padding: 20px;

            border-radius: 15px;

            text-align: center;

            margin-top: 20px;
            margin-bottom: 25px;
        }

        .total-title {

            font-size: 18px;
        }

        .total-price {

            font-size: 32px;
            font-weight: 700;
        }

        .btn-bayar {

            background: #3D4A85;
            color: white;

            border: none;

            width: 100%;
            height: 55px;

            border-radius: 12px;

            font-size: 18px;
            font-weight: 600;
        }

        .btn-bayar:hover {

            background: #2f3969;
        }

        .btn-nanti {

            width: 100%;
            height: 55px;

            border-radius: 12px;

            font-size: 18px;
            font-weight: 600;
        }

        @media(max-width:768px) {

            .payment-card {

                margin: 20px;
                padding: 25px;
            }

            .page-title {

                font-size: 35px;
            }

            .total-price {

                font-size: 24px;
            }
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="payment-card">

            <h1 class="page-title">
                Pembayaran
            </h1>

            <div class="info-box">

                <div class="info-label">
                    Hotel
                </div>

                <?= $hotel ?>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Tanggal Booking
                </div>

                <?= $tanggal_booking ?>

            </div>

            <div class="total-box">

                <div class="total-title">
                    Total Pembayaran
                </div>

                <div class="total-price">
                    <?= $harga ?>
                </div>

            </div>

            <form method="POST">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <button type="submit" name="bayar" class="btn-bayar">

                            Bayar Sekarang

                        </button>

                    </div>

                    <div class="col-md-6">

                        <button type="submit" name="nanti" class="btn btn-secondary btn-nanti">

                            Bayar Nanti

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</body>

</html>