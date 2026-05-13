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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Member - Ngolab</title>
    <link rel="stylesheet" href="assets/css/styles.css?v=3">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        
        * { font-style: normal !important; }
    </style>
</head>
<body>

<div class="mobile-app">
    <div style="padding: 60px 50px 20px 50px;">
        <h1 style="color: #001F3F; font-size: 32px;">My Membership</h1>
        <p style="color: #888; font-size: 14px;">Scan QR ini saat bertransaksi di kasir ✨</p>
    </div>

    <div style="display: flex; justify-content: center; padding: 40px 0;">
        <div style="background: white; padding: 40px; border-radius: 30px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); border: 2px dashed #001F3F; text-align: center; width: 400px;">
            <div style="margin-bottom: 20px; font-weight: 800; color: #001F3F; letter-spacing: 1px;">NGO+LAB PREMIUM</div>
            
            <img
                src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo $user['email']; ?>&color=001F3F" 
                alt="QR Code"
                style="width: 250px; height: 250px; border-radius: 10px;"
            >
            
            <div style="margin-top: 30px;">
                <h2 style="color: #001F3F; text-transform: capitalize;"><?php echo htmlspecialchars($user['nama']); ?></h2>
                <p style="color: #001F3F; font-weight: 600; font-size: 14px;"><?php echo htmlspecialchars($user['email']); ?></p>
            </div>

            <div style="margin-top: 25px; display: flex; justify-content: space-around; border-top: 1px solid #eee; padding-top: 20px;">
                <div style="text-align: center;">
                    <small style="color: #bbb; display: block; font-size: 10px;">STATUS</small>
                    <strong style="color: #27ae60; font-size: 12px;">AKTIF</strong>
                </div>
                <div style="text-align: center;">
                    <small style="color: #bbb; display: block; font-size: 10px;">SINCE</small>
                    <strong style="color: #001F3F; font-size: 12px;">MEI 2026</strong>
                </div>
            </div>
        </div>
    </div>

    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item"><span>🏠</span> Home</a>
        <a href="member_qr.php" class="nav-item active"><span>📱</span> QR</a>
        <a href="reward.php" class="nav-item"><span>🎁</span> Reward</a>
        <a href="logout.php" class="nav-item"><span>🚪</span> Keluar</a>
    </nav>
</div>

</body>
</html>