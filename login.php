<?php
session_start();

// --- BAGIAN KONEKSI DATABASE (Gaya Dosen) ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membersif"; // Sudah diganti jadi 'membership'

// Membangun koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek keberhasilan koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// --- AKHIR BAGIAN KONEKSI ---

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan email dan password
    $query = mysqli_query($conn, "SELECT * FROM users 
    WHERE email='$email' AND password='$password'");

    $data = mysqli_fetch_assoc($query);

    if($data){
        // Kalau data ketemu, simpan data user ke dalam session
        $_SESSION['user'] = $data;

        // Pindah ke halaman dashboard
        header("Location: dashboard.php");
        exit;

    } else {
        // Kalau salah, munculkan peringatan
        echo "<script>alert('Email atau Password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Membership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style_login.css">
    <script src="assets/js/app.js"></script>
</head>
<body>

<div class="container">

    <div class="card">

        <h2 class="title">Login Membership</h2>

        <form method="POST">

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

            <button 
                class="btn" 
                type="submit" 
                name="login"
            >
                Login
            </button>

        </form>

        <br>

        <p>
            Belum punya akun?
            <a href="register.php">Register</a>
        </p>

    </div>

</div>

</body>
</html>