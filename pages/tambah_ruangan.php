<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../includes/config.php';

if (isset($_POST['simpan'])) {
    $no_ruangan = $_POST['no_ruangan'];
    $harga = $_POST['harga'];
    $kapasitas = $_POST['kapasitas'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query(
        $conn,
        "INSERT INTO ruangan
        (no_ruangan,harga,kapasitas,deskripsi)
        VALUES
        ('$no_ruangan','$harga','$kapasitas','$deskripsi')"
    );

    header("Location: indeks.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Ruangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="mb-4">Tambah Ruangan Hotel</h2>

        <div id="pesanError"></div>

        <form method="POST" id="formRuangan">

            <div class="mb-3">
                <label class="form-label">No Ruangan</label>
                <input type="text" class="form-control" id="no_ruangan" name="no_ruangan" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">
                Simpan
            </button>

            <a href="indeks.php" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

    <script>

        document
            .getElementById("formRuangan")
            .addEventListener("submit", function (e) {
                let no_ruangan =
                    document.getElementById("no_ruangan").value;

                let harga =
                    document.getElementById("harga").value;

                let kapasitas =
                    document.getElementById("kapasitas").value;

                let deskripsi =
                    document.getElementById("deskripsi").value;

                if (
                    no_ruangan == "" ||
                    harga == "" ||
                    kapasitas == "" ||
                    deskripsi == ""
                ) {
                    e.preventDefault();

                    document.getElementById("pesanError").innerHTML =
                        '<div class="alert alert-danger">Semua field harus diisi!</div>';
                }
            });

    </script>

</body>

</html>