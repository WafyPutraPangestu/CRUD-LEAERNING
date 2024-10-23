<?php
// CODE UNTUK KONEKSI
include 'koneksi.php';

// METODE POST
if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $nik = $_POST['nik'];
        $nama_siswa = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $foto_siswa = $_FILES['foto']['name'];
        $alamat = $_POST['alamat'];

        // CODE UPLOAD FOTO    
        $dir = "img/";
        $tempFile = $_FILES['foto']['tmp_name'];
        $targetFile = $dir . basename($foto_siswa);

        move_uploaded_file($tempFile, $targetFile);

        // CODE UNTUK INPUT DATA
        $query = "INSERT INTO tb_siswa VALUES(NULL, '$nik', '$nama_siswa', '$jenis_kelamin', '$foto_siswa', '$alamat')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: data.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

    } else if ($_POST['aksi'] == "edit") {
        $id_siswa = $_POST['id_siswa'];
        $nik = $_POST['nik'];
        $nama_siswa = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];

        // Memeriksa apakah ada file foto baru yang diunggah
        if ($_FILES['foto']['name']) {
            // CODE Hapus foto lama
            $queryShow = "SELECT foto_siswa FROM tb_siswa WHERE id_siswa = '$id_siswa';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);
            unlink("img/" . $result['foto_siswa']);

            // CODE Upload foto baru
            $foto_siswa = $_FILES['foto']['name'];
            $dir = "img/";
            $tempFile = $_FILES['foto']['tmp_name'];
            $targetFile = $dir . basename($foto_siswa);
            move_uploaded_file($tempFile, $targetFile);

            // CODE Update query dengan foto
            $query = "UPDATE tb_siswa SET nik = '$nik', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', foto_siswa = '$foto_siswa', alamat = '$alamat' WHERE id_siswa = '$id_siswa'";
        } else {
            //CODE Update query tanpa foto
            $query = "UPDATE tb_siswa SET nik = '$nik', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' WHERE id_siswa = '$id_siswa'";
        }

        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: data.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

// CODE UNTUK PROSES HAPUS DATA
if (isset($_GET['hapus'])) {
    $id_siswa = $_GET['hapus'];

    // HAPUS FOTO DARI FOLDER
    $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/" . $result['foto_siswa']);

    $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: data.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
