<?php 
include "koneksi.php";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    // validasi kalo misalnya konfirmasi password tidak sama dengan passwordnya itu bakalan gagal

    if ($password !== $konfirmasi){
        header("Location: register.php?error=Password dan konfirmasi password tidak sama. Silakan coba lagi.");
        exit(); 
    }


// KODE UNTUK MENGECEK APAKAH USERNAME SUDAH ADA DALAM DATABASE

$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)>0) {
    header("Location: register.php?error=Username sudah terdaftar.");
    exit();
}

// KODE HASH PASSWORD

$password_hash = password_hash($password, PASSWORD_DEFAULT);

// MEMASUKAN DATA KEDATABASE

    $query = "INSERT INTO  user ( username , password ,role) VALUE ('$username' , '$password_hash' , 'user')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: login.php");
    } else{
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>