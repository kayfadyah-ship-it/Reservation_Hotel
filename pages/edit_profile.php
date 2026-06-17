<?php
session_start();

include '../includes/config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['login'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM pelanggan
         WHERE id_pelanggan='$id'"
    )
);

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];

    mysqli_query(
        $conn,
        "UPDATE pelanggan
         SET nama_pelanggan='$nama'
         WHERE id_pelanggan='$id'"
    );

    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(180deg,
                    #3D4A85 0%,
                    #868EB2 50%,
                    #FFFFFF 100%);
        }

        .form-box {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-top: 50px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="form-box">

            <h2>Edit Profile</h2>

            <form method="POST">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data['nama_pelanggan']; ?>"
                        required>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">
                    Simpan
                </button>

                <a href="profile.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</body>

</html>