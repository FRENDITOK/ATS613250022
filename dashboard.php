<?php
session_start();
if (!isset($_SESSION['id'])) { 
    header("Location: index.php"); 
    exit; 
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Rental Mobil</title>
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
        .hero-card {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);
        }
        .btn-light-custom {
            background: white;
            color: #1e40af;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 24px;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-light-custom:hover {
            background: #f1f5f9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.3);
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
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="mobil.php">Data Mobil</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light btn-sm px-3 rounded-pill" href="logout.php">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout (<?= $_SESSION['nama']; ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card hero-card p-4 p-md-5">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill fw-bold">Selamat Datang Kembali</span>
                    <h1 class="display-5 fw-bold mb-3"><?= $_SESSION['nama']; ?>!</h1>
                    <p class="fs-5 opacity-90 mb-4">Sistem Pengelolaan Data Kendaraan Rental Mobil berbasis web yang modern, aman, dan efisien.</p>
                    <a href="mobil.php" class="btn btn-light-custom">
                        <i class="bi bi-speedometer2 me-2"></i>Kelola Data Mobil
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>