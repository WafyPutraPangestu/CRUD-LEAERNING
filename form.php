<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Utama</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="navbar">
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="form.php">FORMULIR</a></li>
                <li><a href="data.php">DATA</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
        <div class="form-container">
    <h2>Formulir Penambahan Data Siswa</h2>
    <form action="proses.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama Siswa:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto Siswa:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="aksi" value="add" >Submit</button>
            <a href="data.php" class="delete-content" type="submit">Batal</a>
        </div>
    </form>
</div>
</body>
</html>