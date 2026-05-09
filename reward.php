<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

$dataReward = mysqli_query($conn, "SELECT * FROM rewards");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reward</title>
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

    <h2 class="title">Katalog Reward 🎁</h2>

    <?php while($reward = mysqli_fetch_assoc($dataReward)) { ?>

        <div class="card">

            <h3>
                <?php echo $reward['nama_reward']; ?>
            </h3>

            <p>
                Poin Dibutuhkan :
                <b><?php echo $reward['poin_dibutuhkan']; ?></b>
            </p>

            <form action="proses_redeem.php" method="POST">

                <input 
                    type="hidden" 
                    name="user_id"
                    value="<?php echo $user['id']; ?>"
                >

                <input 
                    type="hidden" 
                    name="reward_id"
                    value="<?php echo $reward['id']; ?>"
                >

                <button class="btn" type="submit">
                    Redeem Reward
                </button>

            </form>

        </div>

        <br>

    <?php } ?>

</div>

</body>
</html>