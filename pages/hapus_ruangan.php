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

$id = htmlspecialchars($_GET['id']);

mysqli_query(
    $conn,
    "DELETE FROM ruangan
    WHERE id_ruangan='$id'"
);

header("Location: indeks.php");
exit;