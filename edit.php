<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
        $id_siswa = 'id_siswa';
        $nik = 'NIK';
        $nama_siswa = 'nama';
        $jenis_kelamin = 'jenis_kelamin';
        $alamat = 'alamat';
    if (isset($_GET['edit'])) {
        $id_siswa = $_GET['edit'];

        $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nik = $result ['NIK'];
        $nama_siswa = $result ['nama_siswa'];
        $jenis_kelamin = $result ['jenis_kelamin'];
        $alamat = $result ['alamat'];
    }
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
$msg_type = isset($_SESSION['msg_type']) ? $_SESSION['msg_type'] : '';

unset($_SESSION['message']);
unset($_SESSION['msg_type']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
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
    <h2>Edit Data Siswa</h2>
    <form action="proses.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="aksi" value="edit">
    <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
    <div class="form-group">
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" value="<?php echo $nik; ?>" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama Siswa:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama_siswa; ?>" required>
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="laki-laki" <?php if ($jenis_kelamin == 'laki-laki') echo 'selected'; ?>>Laki-Laki</option>
            <option value="perempuan" <?php if ($jenis_kelamin == 'perempuan') echo 'selected'; ?>>Perempuan</option>
            <option value="lainnya" <?php if ($jenis_kelamin == 'lainnya') echo 'selected'; ?>>Lainnya</option>
        </select>
    </div>
    <div class="form-group">
        <label for="foto">Foto Siswa:</label>
        <input type="file" id="foto" name="foto" accept="image/*">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" rows="4" required><?php echo $alamat; ?></textarea>
    </div>
    <div class="form-group">
        <button type="submit">Simpan Perubahan</button>
        <a href="data.php" class="delete-content">Batal</a>
    </div>
</form>

</div>
</body>
</html>