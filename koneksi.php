<?php
// CODE KONEKSI UNTUK KE DATABASE 
$host ='localhost';
$username ='root';
$pass = '';
$db = 'db_sekolah';

$conn = mysqli_connect($host , $username , $pass , $db);

mysqli_select_db( $conn , $db);
?>