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
    <title>History Pemesanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(180deg,
                    #3D4A85 0%,
                    #868EB2 50%,
                    #FFFFFF 100%);
        }

        .card-box {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-top: 30px;
        }
    </style>

</head>

<body>

    <div class="container mt-5">

        <div class="card-box">

            <h2>History Pemesanan</h2>

            <p>
                Daftar pemesanan hotel akan tampil di sini.
            </p>

            <a href="profile.php" class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</body>

</html>