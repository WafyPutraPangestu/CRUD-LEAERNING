<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
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
    <div class="data-content">
        <h2 >DATA SISWA</h2>
    </div>
    <div class="data-container">
        <div class="data-name">
            <table>
            <tr>
                <th>NO.</th>
                <th>NIK</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Foto Siswa</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            while ($result = mysqli_fetch_assoc($sql)) {
                
            ?>
            <tr>
                <td>
                    <?php echo ++$no;?>
                </td>
                <td>
                    <?php echo $result ['NIK'];?>
                </td>
                <td>
                    <?php echo $result ['nama_siswa'];?>
                </td>
                <td>
                <?php echo $result ['jenis_kelamin'];?>
                </td>
                <td><img src="img/<?php echo $result ['foto_siswa'];?>"  alt="ppp"></td>
                <td>
                <?php echo $result ['alamat'];?>
                </td>
                <td><a href="proses.php?hapus=<?php echo $result ['id_siswa'];?>" class="button1" type="button"><i class="fa fa-trash"></i></a>
                <a href="edit.php?edit=<?php echo $result ['id_siswa'];?>" class="button2" type="button"><i class="fa fa-pencil"></i></a>
            </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
        </div>
    </div>
</body>
</html>