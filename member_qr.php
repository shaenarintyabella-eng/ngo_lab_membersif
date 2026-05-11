<?php
session_start();
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
    <link rel="stylesheet" href="assets/css/styles.css?v=2">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="mobile-app">
    <div style="padding: 60px 50px 20px 50px;">
        <h1 style="color: #4B2E2E; font-size: 32px;">My Membership</h1>
        <p style="color: #888; font-size: 14px;">Scan QR ini saat bertransaksi di kasir ✨</p>
    </div>

    <div style="display: flex; justify-content: center; padding: 40px 0;">
        <div style="background: white; padding: 40px; border-radius: 30px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); border: 2px dashed #C58C5B; text-align: center; width: 400px;">
            <div style="margin-bottom: 20px; font-weight: 800; color: #4B2E2E; letter-spacing: 1px;">NGO+LAB PREMIUM</div>
            
            <img
                src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo $user['email']; ?>&color=4B2E2E" 
                alt="QR Code"
                style="width: 250px; height: 250px; border-radius: 10px;"
            >
            
            <div style="margin-top: 30px;">
                <h2 style="color: #4B2E2E; text-transform: capitalize;"><?php echo htmlspecialchars($user['nama']); ?></h2>
                <p style="color: #C58C5B; font-weight: 600; font-size: 14px;"><?php echo htmlspecialchars($user['email']); ?></p>
            </div>

            <div style="margin-top: 25px; display: flex; justify-content: space-around; border-top: 1px solid #eee; padding-top: 20px;">
                <div style="text-align: center;">
                    <small style="color: #bbb; display: block; font-size: 10px;">STATUS</small>
                    <strong style="color: #27ae60; font-size: 12px;">AKTIF</strong>
                </div>
                <div style="text-align: center;">
                    <small style="color: #bbb; display: block; font-size: 10px;">SINCE</small>
                    <strong style="color: #4B2E2E; font-size: 12px;">MEI 2026</strong>
                </div>
            </div>
        </div>
    </div>

    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item" style="text-decoration:none; color:#bbb; text-align:center;">
            <span style="display:block; font-size:20px;">🏠</span>
            <small>Home</small>
        </a>
        <a href="member_qr.php" class="nav-item active" style="text-decoration:none; color:#4B2E2E; text-align:center; font-weight:bold;">
            <span style="display:block; font-size:20px;">📱</span>
            <small>QR Member</small>
        </a>
        <a href="logout.php" class="nav-item" style="text-decoration:none; color:#bbb; text-align:center;">
            <span style="display:block; font-size:20px;">🚪</span>
            <small>Logout</small>
        </a>
    </nav>
</div>

</body>
</html>