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
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="navbar">

    <h2>Ngo+Lab Membership</h2>

    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="reward.php">Reward</a>
        <a href="member_qr.php">QR Member</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

<div class="container">

    <div class="card">

        <h2 class="title">
            Selamat Datang,
            <?php echo $user['nama']; ?> 👋
        </h2>

        <p>Email : <?php echo $user['email']; ?></p>

        <p>Total Poin :</p>

        <h1>
            <?php echo $user['poin']; ?> Poin
        </h1>

        <br>

        <a href="reward.php">
            <button class="btn">
                Tukar Reward
            </button>
        </a>

    </div>

</div>

</body>
</html>