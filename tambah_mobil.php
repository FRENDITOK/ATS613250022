<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit; }
include "koneksi.php";

if (isset($_POST['submit'])) {
    $nopol = $_POST['nomor_kendaraan'];
    $jenis = $_POST['jenis_kendaraan'];
    $pemilik = $_POST['pemilik'];
    $tahun = $_POST['tahun_pembuatan'];

    $query = mysqli_query($koneksi, "INSERT INTO mobil_022 (nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan) VALUES ('$nopol', '$jenis', '$pemilik', '$tahun')");
    
    if ($query) {
        header("Location: mobil.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="mb-3">Tambah Data Mobil</h3>
                        <form method="POST">
                            <div class="mb-3">
                                <label>Nomor Kendaraan</label>
                                <input type="text" name="nomor_kendaraan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kendaraan</label>
                                <select name="jenis_kendaraan" class="form-control" required>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Pickup">Pickup</option>
                                    <option value="Truk">Truk</option>
                                    <option value="Bemo">Bemo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pemilik</label>
                                <input type="text" name="pemilik" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Tahun Pembuatan</label>
                                <input type="text" name="tahun_pembuatan" maxlength="4" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <a href="mobil.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>