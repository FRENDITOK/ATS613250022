<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit; }
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mobil_022 WHERE no_id = '$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nopol = $_POST['nomor_kendaraan'];
    $jenis = $_POST['jenis_kendaraan'];
    $pemilik = $_POST['pemilik'];
    $tahun = $_POST['tahun_pembuatan'];

    $query = mysqli_query($koneksi, "UPDATE mobil_022 SET nomor_kendaraan='$nopol', jenis_kendaraan='$jenis', pemilik='$pemilik', tahun_pembuatan='$tahun' WHERE no_id='$id'");
    
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
    <title>Edit Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="mb-3">Edit Data Mobil</h3>
                        <form method="POST">
                            <div class="mb-3">
                                <label>Nomor Kendaraan</label>
                                <input type="text" name="nomor_kendaraan" value="<?= $row['nomor_kendaraan']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kendaraan</label>
                                <select name="jenis_kendaraan" class="form-control" required>
                                    <option value="Sedan" <?= ($row['jenis_kendaraan'] == 'Sedan') ? 'selected':''; ?>>Sedan</option>
                                    <option value="Pickup" <?= ($row['jenis_kendaraan'] == 'Pickup') ? 'selected':''; ?>>Pickup</option>
                                    <option value="Truk" <?= ($row['jenis_kendaraan'] == 'Truk') ? 'selected':''; ?>>Truk</option>
                                    <option value="Bemo" <?= ($row['jenis_kendaraan'] == 'Bemo') ? 'selected':''; ?>>Bemo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pemilik</label>
                                <input type="text" name="pemilik" value="<?= $row['pemilik']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Tahun Pembuatan</label>
                                <input type="text" name="tahun_pembuatan" value="<?= $row['tahun_pembuatan']; ?>" maxlength="4" class="form-control" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <a href="mobil.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>