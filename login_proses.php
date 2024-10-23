<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];
            
            // Redirect to dashboard or another page
            header('Location: index.php');
            exit();
        } else {
            // Password incorrect
            $error_message = "Incorrect password!";
        }
    } else {
        // User not found
        $error_message = "User not found!";
    }

    // Redirect back to login with error message
    header("Location: login.php?error=" . urlencode($error_message));
    exit();
}
?>
