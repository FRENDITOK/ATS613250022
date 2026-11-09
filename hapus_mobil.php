<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit; }
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM mobil_022 WHERE no_id = '$id'");
header("Location: mobil.php");
exit;
?>