<?php
include 'koneksi.php';

$user_id = $_POST['user_id'];
$reward_id = $_POST['reward_id'];

$user = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM users WHERE id='$user_id'"));

$reward = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM rewards WHERE id='$reward_id'"));

if($user['poin'] >= $reward['poin_dibutuhkan']){

    $sisa = $user['poin'] - $reward['poin_dibutuhkan'];

    mysqli_query($conn,
    "UPDATE users SET poin='$sisa' WHERE id='$user_id'");

    mysqli_query($conn,
    "INSERT INTO redeem(user_id,reward_id,status)
    VALUES('$user_id','$reward_id','Berhasil')");

    echo "Redeem berhasil";

}else{

    echo "Poin tidak cukup";

}
?>