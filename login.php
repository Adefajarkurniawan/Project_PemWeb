<?php
// Memulai sesi
session_start();

// Menghubungkan ke database
include 'koneksi.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sandi = $_POST['sandi'];

    // Amankan data dari serangan SQL Injection
    $email = $conn->real_escape_string($email);
    $sandi = $conn->real_escape_string($sandi);

    // Query untuk mencari pengguna berdasarkan email
    $sql = "SELECT * FROM pengguna WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Memeriksa apakah password cocok
        $row = $result->fetch_assoc();
        if (password_verify($sandi, $row['sandi'])) {
            // Menyimpan id_pengguna dan nama ke dalam sesi
            $_SESSION['pengguna_id'] = $row['id_pengguna'];
            $_SESSION['nama_pengguna'] = $row['nama'];

            // Mengarahkan pengguna ke halaman home dengan alert
            echo "<script>
                    alert('Login Berhasil');
                    window.location.href = 'beranda.html';
                  </script>";
        } else {
            // Password tidak cocok
            echo "<script>alert('Sandi salah!');</script>";
        }
    } else {
        // Pengguna tidak ditemukan
        echo "<script>alert('Email tidak terdaftar!');</script>";
    }

    // Menutup koneksi
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/regis-login.css" />
    <title>Login Form</title>
  </head>
  <body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Form login -->
                <form action="login.php" method="POST" class="sign-in-form">
                    <h2 class="title">Masuk</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="sandi" placeholder="Sandi" required />
                    </div>
                    <input type="submit" class="btn" value="Masuk" />
                    <p class="social-text">Belum Memiliki Akun?
                        <a href="register.html">Daftar</a>
                    </p>
                </form>

            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel"></div>
            <div class="panel right-panel"></div>
        </div>
    </div>
    <script src="script/login-regis.js"></script>
  </body>
</html>
