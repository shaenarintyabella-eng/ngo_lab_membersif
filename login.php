<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users 
    WHERE email='$email' AND password='$password'");

    $data = mysqli_fetch_assoc($query);

    if($data){

        $_SESSION['user'] = $data;

        header("Location: dashboard.php");
        exit;

    } else {
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