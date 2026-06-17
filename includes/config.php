<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "hotel_reservation"
);

if(!$conn){
    die("Koneksi gagal");
}

?>