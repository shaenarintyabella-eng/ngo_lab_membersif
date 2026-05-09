<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>QR Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="navbar">

    <h2>Ngo+Lab Membership</h2>

    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="reward.php">Reward</a>
        <a href="qr_member.php">QR Member</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

<div class="container">

    <div class="card">

        <h2 class="title">QR Membership</h2>

        <p>Scan QR ini saat transaksi 👇</p>

        <br>

        <img 
            src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo $user['email']; ?>" 
            alt="QR Code"
        >

        <br><br>

        <h3>
            <?php echo $user['nama']; ?>
        </h3>

        <p>
            <?php echo $user['email']; ?>
        </p>

    </div>

</div>

</body>
</html>