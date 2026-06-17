<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: pages/login.php");
    exit;
}
include 'includes/config.php';

$query = mysqli_query(
    $conn,
    "SELECT * FROM ruangan"
);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Data Ruangan Hotel</h2>

        <a href="tambah_ruangan.php" class="btn btn-primary mb-3">Tambah Ruangan</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>No Ruangan</th>
                    <th>Harga</th>
                    <th>Kapasitas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['no_ruangan']); ?></td>
                        <td><?= htmlspecialchars($row['harga']); ?></td>
                        <td><?= htmlspecialchars($row['kapasitas']); ?></td>
                        <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                        <td>
                            <a href="edit_ruangan.php?id=<?= $row['id_ruangan']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="hapus_ruangan.php?id=<?= $row['id_ruangan']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>
        </div>
</body>

</html>