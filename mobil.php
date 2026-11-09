<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit; }
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil - Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #334155;
        }
        .navbar-custom {
            background: linear-gradient(90deg, #0f172a 0%, #1e3a8a 100%);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .card-table {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        .table-custom thead {
            background: #1e3a8a;
            color: white;
        }
        .btn-add {
            background-color: #2563eb;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            padding: 8px 18px;
            border: none;
        }
        .btn-add:hover {
            background-color: #1d4ed8;
            color: white;
        }
        .badge-jenis {
            background-color: #e0e7ff;
            color: #3730a3;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dashboard.php">
                <i class="bi bi-car-front-fill me-2"></i>Rental Mobil ULBI
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link fw-semibold" href="dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="mobil.php">Data Mobil</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light btn-sm px-3 rounded-pill" href="logout.php">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1" style="color: #0f172a;">Data Kendaraan Mobil</h3>
                <p class="text-muted small mb-0">Kelola informasi armada kendaraan secara akurat</p>
            </div>
            <a href="tambah_mobil.php" class="btn btn-add">
                <i class="bi bi-plus-lg me-1"></i> Tambah Mobil
            </a>
        </div>
        
        <div class="card card-table">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-custom table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="py-3 px-4">No</th>
                                <th class="py-3">Nomor Kendaraan</th>
                                <th class="py-3">Jenis Kendaraan</th>
                                <th class="py-3">Pemilik</th>
                                <th class="py-3">Tahun Pembuatan</th>
                                <th class="py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $result = mysqli_query($koneksi, "SELECT * FROM mobil_022");
                            while($row = mysqli_fetch_assoc($result)):
                            ?>
                            <tr>
                                <td class="px-4 fw-semibold"><?= $no++; ?></td>
                                <td class="fw-bold text-dark"><?= $row['nomor_kendaraan']; ?></td>
                                <td><span class="badge-jenis"><?= $row['jenis_kendaraan']; ?></span></td>
                                <td><?= $row['pemilik']; ?></td>
                                <td><?= $row['tahun_pembuatan']; ?></td>
                                <td class="text-center">
                                    <a href="edit_mobil.php?id=<?= $row['no_id']; ?>" class="btn btn-sm btn-warning text-white me-1 rounded-2">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="hapus_mobil.php?id=<?= $row['no_id']; ?>" class="btn btn-sm btn-danger rounded-2" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>