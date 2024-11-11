<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/dokterAdmin.css">
</head>

<body>
    <!-- Pastikan file 'headerAdmin.php' dan 'navbarAdmin.php' ada di direktori 'layout' -->
    <?php require 'layout/headerAdmin.php'; ?>
    <div class="body">
        <?php require 'layout/navbarAdmin.php'; ?>
        <section class="content-section">
    <div class="container">
        <!-- Kotak Pencarian dan Tombol Tambah -->
        <div class="header-tools">
            <div class="search-container">
                <input type="text" placeholder="Cari Dokter">
                <button class="search-button">Cari</button>
            </div>
            <button class="add-button">Tambah</button>
        </div>

        <!-- Tabel Data Dokter -->
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Foto</th>
                    <th>Poli</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>dr. Anggia Endah Satuti, SpJP</td>
                    <td>Subspesialis Kardiologi Intervensi</td>
                    <td><img src="path/to/image1.jpg" alt="Foto Dokter"></td>
                    <td>Kardiologi (Jantung)</td>
                    <td class="action-buttons">
                        <button class="edit-button">Edit</button>
                        <button class="delete-button">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>dr. Adinoto Zein</td>
                    <td>Subspesialis Kardiologi Intervensi</td>
                    <td><img src="path/to/image2.jpg" alt="Foto Dokter"></td>
                    <td>Kedokteran Umum</td>
                    <td class="action-buttons">
                        <button class="edit-button">Edit</button>
                        <button class="delete-button">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>dr. Ellen Sendrow, SpPD</td>
                    <td>Spesialis Penyakit Dalam</td>
                    <td><img src="path/to/image3.jpg" alt="Foto Dokter"></td>
                    <td>Penyakit Dalam</td>
                    <td class="action-buttons">
                        <button class="edit-button">Edit</button>
                        <button class="delete-button">Hapus</button>
                    </td>
                </tr>
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
</section>

    </div>
</body>
</html>
