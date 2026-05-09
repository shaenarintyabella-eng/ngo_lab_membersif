<?php
session_start();
include 'koneksi.php';

$id_reward = $_GET['id'];

$reward = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM rewards WHERE id='$id_reward'"));

$user = $_SESSION['user'];
?>

<h2>Redeem Reward</h2>

<p>Nama Reward : <?= $reward['nama_reward']; ?></p>

<p>Poin Dibutuhkan : <?= $reward['poin_dibutuhkan']; ?></p>

<form action="proses_redeem.php" method="POST">

<input type="hidden" name="user_id"
value="<?= $user['id']; ?>">

<input type="hidden" name="reward_id"
value="<?= $reward['id']; ?>">

<button type="submit">
Redeem Sekarang
</button>

</form>