<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login_proses.php" method="POST" class="form-login">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
        <div class="form-group">
                <p>Apakah Anda sudah mempunyai akun? <a href="register.php">Daftar Akun</a></p>
            </div>
    </div>
    <?php if (isset($_GET['error'])): ?>
        <script>
            alert("<?php echo $_GET['error']; ?>");
        </script>
    <?php endif; ?>
    
</body>
</html>
