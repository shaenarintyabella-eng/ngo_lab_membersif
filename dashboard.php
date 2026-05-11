<?php
session_start();

// --- BAGIAN KONEKSI DATABASE (Gaya Dosen) ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membersif"; // Sudah diganti sesuai permintaan kamu

// Membangun koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek keberhasilan koneksi
if (!$conn) {
    // Mematikan skrip jika error dan menampilkan pesan
    die("Koneksi gagal: " . mysqli_connect_error());
}
// --- AKHIR BAGIAN KONEKSI ---

// Mengecek apakah session user sudah ada atau belum
if(!isset($_SESSION['user'])){   
    header("Location: login.php");
    exit();
}

// Menyimpan data user dari session ke variabel $user
$user = $_SESSION['user']; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngolab Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css?v=100">
    <script src="assets/js/app.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style> 
        .food-info h4, .food-info .price, .section-title, .greeting p {
            font-style: normal !important;
        }
    </style>
</head>
<body>

<div class="mobile-app">

    <div class="header"> <div style="padding: 20px 50px 10px 50px;">
            <p class="hello">Welcome Back 👋</p>
            <h2 style="font-size: 22px; color: #006241;">
                <?php echo htmlspecialchars($user['nama']); ?>
            </h2>
        </div>
    </div>

    <div class="header-promo"> <div class="notif-btn">🔔</div>
        <p class="date-text">4 - 14 Mei 2026</p>
        <h1>Bigger Deals<br>NGOLABeveryone</h1>
        <p class="sub-promo">Diskon hingga 100.000 Koin</p>
    </div>

    <div class="point-box"> <div class="badge-point">
            🟢 <?php echo $user['poin']; ?> Poin
        </div>
        <a href="reward.php" class="redeem-link">Tukarkan poin &gt;</a>
    </div>

    <div class="greeting" style="padding: 0 50px;">
        <p>Hi <?php echo htmlspecialchars($user['nama']); ?>, Pesan Sekarang?</p>
    </div>

    <div class="section-title" style="padding: 0 50px; font-weight: 800; font-size: 24px; color: #4a3228;">Katalog Menu Ngolab</div>
    
    <div class="menu-grid">
        <div class="food-item"> <img src="https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400" alt="Mie Yamin">
            <div class="food-info">
                <h4>Mie Yamin Biasa</h4>
                <div class="price">18.000 Koin</div>
            </div>
        </div>

        <div class="food-item">
            <img src="https://images.unsplash.com/photo-1541529086526-db283c563270?w=400" alt="Bakso Special">
            <div class="food-info">
                <h4>Bakso Malang Special</h4>
                <div class="price">28.000 Koin</div>
            </div>
        </div>

        <div class="food-item">
            <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=400" alt="Yamin Bakso">
            <div class="food-info">
                <h4>Yamin Bakso</h4>
                <div class="price">25.000 Koin</div>
            </div>
        </div>

        <div class="food-item">
            <img src="assets/img/bakso.jpeg" alt="Bakso">
            <div class="food-info">
                <h4>Bakso Ekstra</h4>
                <div class="price">15.000 Koin</div>
            </div>
        </div>

        <div class="food-item">
            <img src="https://images.unsplash.com/photo-1501443762994-82bd5dace89a?w=400" alt="Es Krim Vanila">
            <div class="food-info">
                <h4>Es Krim Vanila</h4>
                <div class="price">12.000 Koin</div>
            </div>
        </div>

        <div class="food-item">
            <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=400" alt="Es Krim Coklat">
            <div class="food-info">
                <h4>Es Krim Coklat</h4>
                <div class="price">15.000 Koin</div>
            </div>
        </div>

        <div class="food-item">
            <img src="https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400" alt="Teh Manis">
            <div class="food-info">
                <h4>Teh Manis Fresh</h4>
                <div class="price">5.000 Koin</div>
            </div>
        </div>

        <div class="food-item">
            <img src="assets/img/minuman.jpg" alt="Minuman Leci">
            <div class="food-info">
                <h4>Minuman Leci</h4>
                <div class="price">12.000 Koin</div>
            </div>
        </div>
    </div>

    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item active">
            <span>🏠</span>Home
        </a>
        <a href="member_qr.php" class="nav-item">
            <span>📱</span>QR
        </a>
        <a href="logout.php" class="nav-item">
            <span>🚪</span>Keluar
        </a>
    </nav>

</div>

</body>
</html>