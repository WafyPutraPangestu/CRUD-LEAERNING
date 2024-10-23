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
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
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
</body>
</html>
