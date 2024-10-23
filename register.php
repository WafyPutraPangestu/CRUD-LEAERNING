<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrasi</title>
    <script>
        function showAlert() {
            // Ambil parameter dari URL
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            const success = urlParams.get('success');
            
            
            if (error) {
                alert(decodeURIComponent(error));
            }

            // Tampilkan alert jika ada pesan success
            if (success) {
                alert(decodeURIComponent(success));
            }
        }
        window.onload = showAlert;
    </script>
</head>
<body>
    <div class="registrasi-container">
        <h2>Daftar Akun Baru</h2>
        <form action="register_proses.php" method="POST" class="form-register">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="konfirmasi">Konfirmasi Password</label>
                <input type="password" id="konfirmasi" name="konfirmasi" required>
            </div>
            <div class="form-group">
                <button type="submit" name="register">Daftar</button>
            </div>
            <div class="form-group">
                <p>Apakah Anda sudah mempunyai akun? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
