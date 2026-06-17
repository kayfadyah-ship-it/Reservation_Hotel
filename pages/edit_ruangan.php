<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'includes/config.php';

if (!isset($_GET['id'])) {
    header("Location: indeks.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM ruangan WHERE id_ruangan='$id'"
);

$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['update'])) {

    $no_ruangan = htmlspecialchars($_POST['no_ruangan']);
    $harga = htmlspecialchars($_POST['harga']);
    $kapasitas = htmlspecialchars($_POST['kapasitas']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    mysqli_query(
        $conn,
        "UPDATE ruangan SET
        no_ruangan='$no_ruangan',
        harga='$harga',
        kapasitas='$kapasitas',
        deskripsi='$deskripsi'
        WHERE id_ruangan='$id'"
    );

    header("Location: indeks.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Ruangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="mb-4">Edit Ruangan Hotel</h2>

        <div id="pesanError"></div>

        <form method="POST" id="formEdit">

            <div class="mb-3">
                <label class="form-label">No Ruangan</label>

                <input type="text" class="form-control" id="no_ruangan" name="no_ruangan"
                    value="<?= htmlspecialchars($row['no_ruangan']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>

                <input type="number" class="form-control" id="harga" name="harga"
                    value="<?= htmlspecialchars($row['harga']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kapasitas</label>

                <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                    value="<?= htmlspecialchars($row['kapasitas']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>

                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                    value="<?= htmlspecialchars($row['deskripsi']); ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-warning">
                Update
            </button>

            <a href="indeks.php" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

    <script>

        document
            .getElementById("formEdit")
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