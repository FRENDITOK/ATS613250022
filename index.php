<?php
session_start();
include "koneksi.php";

$error = "";
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = md5($_POST['password']); 

    $query = mysqli_query($koneksi, "SELECT * FROM member_022 WHERE email='$email' AND password='$password' AND aktive='1'");
    
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nama'] = $row['nama'];
        
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email atau Password salah / Akun tidak aktif!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-login {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .brand-icon {
            width: 60px;
            height: 60px;
            background: #2563eb;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 15px;
        }
        .btn-blue {
            background-color: #2563eb;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-blue:hover {
            background-color: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 14px;
        }
        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card card-login p-4">
                    <div class="card-body">
                        <div class="brand-icon">
                            <i class="bi bi-car-front-fill"></i>
                        </div>
                        <h4 class="text-center fw-bold mb-1" style="color: #1e293b;">Rental Mobil</h4>
                        <p class="text-center text-muted small mb-4">Silakan masuk ke akun Anda</p>
                        
                        <?php if($error): ?>
                            <div class="alert alert-danger py-2 small rounded-3"><?= $error; ?></div>
                        <?php endif; ?>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-semibold text-secondary">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-blue text-white w-100">Masuk Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>