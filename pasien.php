<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Biodata Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/pasien.css">
    <style>
        /* Tambahan CSS untuk tabel dan elemen lain */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }
        .container {
            max-width: 2000px;
            width: 1700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .text-primary {
            color: #007bff;
            margin-bottom: 20px;
            text-align: left;
            font-size: 24px;
            font-weight: bold;
        }
        .search-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .search-container input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
        }
        .search-container button {
            padding: 8px 16px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        .search-container button:hover {
            background-color: #0056b3;
        }
        .table {
            width: 100%; 
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
        }
        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 50%;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .pagination a.active {
            background-color: #007bff;
            color: #fff;
        }
        .pagination a:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php require 'layout/headerAdmin.php'; ?>
    <div class="body">
        <?php require 'layout/navbarAdmin.php'; ?>

        <div class="container">
            <h1 class="text-primary">Nama Pasien</h1>

            <!-- Kotak Pencarian -->
            <div class="search-container">
                <input type="text" placeholder="Cari Nama">
                <button>Cari</button>
            </div>

            <!-- Tabel Data Pasien -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menghubungkan ke database
                    require 'koneksi.php'; // Pastikan Anda memiliki file koneksi.php untuk menghubungkan ke database

                    // Query untuk mengambil data
                    $sql = "SELECT * FROM pengguna";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        // Menampilkan data dari database
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                    }

                    // Menutup koneksi
                    $conn->close();
                    ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#">&lt;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">&gt;</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>
</html>
