<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "membersif");

if (!$conn) {
    die("Koneksi DB gagal");
}

// Reset semua foto ke default
$sql = "UPDATE users SET foto = 'bakso.jpeg'";

if(mysqli_query($conn, $sql)) {
    echo "Semua foto sudah di-reset ke 'bakso.jpeg'<br>";
    echo "Sekarang coba upload foto lagi di dashboard!<br><br>";
    echo '<a href="dashboard.php">Kembali ke Dashboard</a>';
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
