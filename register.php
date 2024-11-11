<?php
// Menghubungkan ke database
include 'koneksi.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $sandi = $_POST['sandi'];

    // Validasi sederhana untuk memastikan tidak ada data yang kosong
    if (empty($nama) || empty($no_hp) || empty($email) || empty($tanggal_lahir) || empty($sandi)) {
        echo "Harap isi semua data!";
        exit;
    }

    // Mengamankan data dari serangan SQL Injection
    $nama = $conn->real_escape_string($nama);
    $no_hp = $conn->real_escape_string($no_hp);
    $email = $conn->real_escape_string($email);
    $tanggal_lahir = $conn->real_escape_string($tanggal_lahir);
    $sandi = $conn->real_escape_string($sandi);

    // Mengenkripsi password sebelum disimpan ke database
    $hashed_password = password_hash($sandi, PASSWORD_DEFAULT);

    // Query untuk memasukkan data ke tabel pengguna
    $sql = "INSERT INTO pengguna (nama, no_hp, email, tanggal, sandi) VALUES ('$nama', '$no_hp', '$email', '$tanggal_lahir', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
      echo "
              <script>
                  alert('Registrasi Akun Berhasil');
                  document.location.href = 'Login.php';
              </script>
          ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/regis-login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <form action="register.php" method="POST" class="sign-in-form">
          <h2 class="title">Daftar</h2>
          <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nama" placeholder="Nama"  />
          </div>
          <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="tel" name="no_hp" placeholder="NO. HP"  />
          </div>
          <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email"  />
          </div>
          <div class="input-field">
              <i class="fas fa-calendar-alt"></i>
              <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir"  />
          </div>
          <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="sandi" placeholder="Sandi" />
              <small class="error-message" style="color: red; display: none;"></small>
          </div>

          <ul>
              <li>Sandi Tidak Kosong</li>
              <li>Sandi Minimal 6 Karakter</li>
              <li>Sandi Huruf Besar dan Huruf Kecil</li>
          </ul>
          <input type="submit" value="Daftar" class="btn solid" />
          <p class="social-text">Sudah Memiliki Akun? <a href="login.html">Masuk</a></p>
      </form>

        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel"></div>
        <div class="panel right-panel"></div>
      </div>
    </div>
    <script src="script/login-regis.js"></script>
    <script>
      document.querySelector('.sign-in-form').addEventListener('submit', function(event) {
    const sandi = document.querySelector('input[name="sandi"]').value;
    const errorMessages = [];

    // Validasi Sandi
    if (!sandi) {
        errorMessages.push("Sandi tidak boleh kosong.");
    }
    if (sandi.length < 6) {
        errorMessages.push("Sandi harus minimal 6 karakter.");
    }
    if (!/[A-Z]/.test(sandi)) {
        errorMessages.push("Sandi harus mengandung huruf besar.");
    }
    if (!/[a-z]/.test(sandi)) {
        errorMessages.push("Sandi harus mengandung huruf kecil.");
    }

    // Menampilkan pesan kesalahan dengan alert
    if (errorMessages.length > 0) {
        event.preventDefault(); // Mencegah form dikirim jika ada kesalahan
        alert(errorMessages.join("\n")); // Menampilkan semua pesan kesalahan
    }
});

    </script>
  </body>
</html>