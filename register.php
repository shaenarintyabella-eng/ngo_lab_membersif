<?php
// --- BAGIAN KONEKSI DATABASE (Gaya Dosen) ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membersif"; // Sudah disamakan jadi 'membership'

// Membangun koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek keberhasilan koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// --- AKHIR BAGIAN KONEKSI ---

if(isset($_POST['register'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Menambah user baru dengan poin awal 0
    // Jelasin ke dosen: Poin diset 0 karena ini member baru
    mysqli_query($conn, "INSERT INTO users(nama,email,password,poin) 
    VALUES('$nama','$email','$password',0)");

    echo "<script>
            alert('Register berhasil!');
            window.location='login.php';
        </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Membership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style_register.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h2 class="title">Register Membership</h2>

        <form method="POST">
            <input 
                type="text" 
                name="nama" 
                placeholder="Masukkan Nama" 
                required
            >

            <input 
                type="email" 
                name="email" 
                placeholder="Masukkan Email" 
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Masukkan Password" 
                required
            >

            <button class="btn" type="submit" name="register">
                Register
            </button>
        </form>

        <p class="footer-text">
            Sudah punya akun? <a href="login.php">Login</a>
        </p>
    </div>
</div>

</body>
</html>