<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ats613250022"; // Sesuai nama database di HeidiSQL Anda

$koneksi = mysqli_connect($host,$user, $pass,$db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>