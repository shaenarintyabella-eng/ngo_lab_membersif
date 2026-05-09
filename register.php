<?php
include 'koneksi.php';

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn, "INSERT INTO users(nama,email,password,poin)
    VALUES('$nama','$email','$password',0)");

    echo "<script>
            alert('Register berhasil!');
            window.location='login.php';
        </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <div class="card">

        <h2 class="title">Register Membership</h2>

        <form method="POST">

            <input 
                type="text"
                name="nama"
                placeholder="Masukkan Nama"
                required
            >

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
                name="register"
            >
                Register
            </button>

        </form>

        <br>

        <p>
            Sudah punya akun?
            <a href="login.php">Login</a>
        </p>

    </div>

</div>

</body>
</html>