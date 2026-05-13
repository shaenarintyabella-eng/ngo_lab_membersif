<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membersif";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// --. AMBIL DATA REWARD DARI DATABASE ---

$dataReward = mysqli_query($conn, "SELECT * FROM rewards");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Reward - Ngolab</title>
    <link rel="stylesheet" href="assets/css/style_reward.css?v=101">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        
        .reward-info h4, .reward-info p, h3 {
            font-style: normal !important;
        }
    </style>
</head>
<body>

<div class="mobile-app">
    <div class="reward-header">
        <div class="header-content">
            <h3>Katalog Reward 🎁</h3>
            <div class="user-points">
                <span>Poin Kamu:</span>
                <strong>🟢 <?php echo $user['poin']; ?></strong>
            </div>
        </div>
    </div>

    <div class="reward-list">
        <?php 
        // Melakukan perulangan (looping) untuk setiap data reward yang ada di database
        while($reward = mysqli_fetch_assoc($dataReward)) { 
            
            $nama_item = strtolower($reward['nama_reward']);
            
            // buat nentuin gambar berdasarkan nama item
            $gambar = "assets/img/default.jpg";
            if(strpos($nama_item, 'teh') !== false) {
                $gambar = "assets/img/es teh.png";
            } else if(strpos($nama_item, 'bakso') !== false) {
                $gambar = "assets/img/bakso.jpeg";
            }
        ?>

        <div class="reward-card">
            <img src="<?php echo $gambar; ?>" alt="<?php echo $reward['nama_reward']; ?>">
            
            <div class="reward-info">
                <h4><?php echo $reward['nama_reward']; ?></h4>
                <p>Klaim dengan <span><?php echo $reward['poin_dibutuhkan']; ?> Poin</span></p>
                
                <form action="proses_redeem.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <input type="hidden" name="reward_id" value="<?php echo $reward['id']; ?>">
                    <button class="redeem-btn" type="submit">Tukarkan</button>
                </form>
            </div>
        </div>

        <?php } ?>
    </div>

    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item"><span>🏠</span> Home</a>
        <a href="member_qr.php" class="nav-item"><span>📱</span> QR</a>
        <a href="reward.php" class="nav-item active"><span>🎁</span> Reward</a>
        <a href="logout.php" class="nav-item"><span>🚪</span> Keluar</a>
    </nav>
</div>

</body>
</html>