<?php

session_start();
include '../includes/config.php';

$hotelDipilih = $_GET['hotel'] ?? '';
$hargaHotel = $_GET['harga'] ?? '';

if (isset($_POST['bayar'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $id_ruangan = $_POST['id_ruangan'];
    $tanggal_booking = $_POST['tanggal_booking'];

    header(
        "Location: payment.php?hotel=" .
        urlencode($hotelDipilih) .
        "&harga=" .
        urlencode($hargaHotel) .
        "&pelanggan=" .
        $id_pelanggan .
        "&ruangan=" .
        $id_ruangan .
        "&tanggal=" .
        $tanggal_booking
    );

    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Reservasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;

            background: linear-gradient(rgba(61, 74, 133, 0.65),
                    rgba(134, 142, 178, 0.55),
                    rgba(255, 255, 255, 0.45)),
                url('assets/img/pulau bajo.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;

        }

        .form-card {

            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            max-width: 700px;
            margin: auto;
            margin-top: 50px;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="form-card">

            <h2 class="mb-4">
                Tambah Reservasi
            </h2>

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Hotel
                    </label>

                    <input type="text" class="form-control" value="<?= $hotelDipilih ?>" readonly>

                    <input type="hidden" name="hotel" value="<?= $hotelDipilih ?>">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Pelanggan
                    </label>

                    <select name="id_pelanggan" class="form-control">

                        <?php

                        $pelanggan =
                            mysqli_query(
                                $conn,
                                "SELECT * FROM pelanggan"
                            );

                        while ($p = mysqli_fetch_assoc($pelanggan)) {
                            ?>

                            <option value="<?= $p['id_pelanggan']; ?>">

                                <?= $p['nama_pelanggan']; ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Ruangan</label>

                    <select name="id_ruangan" class="form-control">

                        <?php

                        $ruangan =
                            mysqli_query(
                                $conn,
                                "SELECT * FROM ruangan"
                            );

                        while ($r = mysqli_fetch_assoc($ruangan)) {
                            ?>

                            <option value="<?= $r['id_ruangan']; ?>">

                                Kamar
                                <?= $r['no_ruangan']; ?>
                                - Rp
                                <?= number_format($r['harga']); ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Tanggal Booking</label>

                    <input type="date" name="tanggal_booking" class="form-control" required>

                </div>

                <div class="mb-3">

                    <label>Harga Hotel</label>

                    <input type="text" class="form-control" value="<?= $hargaHotel ?>" readonly>

                </div>

                <button type="submit" name="bayar" class="btn btn-primary">

                    Lanjut Pembayaran

                </button>

                <a href="booking.php" class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</body>

</html>