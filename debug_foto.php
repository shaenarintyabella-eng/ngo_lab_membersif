<?php
session_start();

echo "=== DEBUG FOTO ===\n\n";

// Cek user session
if(isset($_SESSION['user'])) {
    echo "User ID: " . $_SESSION['user']['id'] . "\n";
    echo "Foto di session: " . $_SESSION['user']['foto'] . "\n";
} else {
    echo "No session user\n";
}

// Cek folder
$img_dir = dirname(__FILE__) . '/assets/img/';
echo "\nFolder path: " . $img_dir . "\n";
echo "Folder exists: " . (is_dir($img_dir) ? "YES" : "NO") . "\n";
echo "Folder writable: " . (is_writable($img_dir) ? "YES" : "NO") . "\n";

// List file di folder
echo "\nFiles in folder:\n";
if(is_dir($img_dir)) {
    $files = scandir($img_dir);
    foreach($files as $file) {
        if($file != '.' && $file != '..') {
            echo "  - " . $file . "\n";
        }
    }
} else {
    echo "  Folder tidak ada!\n";
}

// Cek database
$conn = mysqli_connect("localhost", "root", "", "membersif");
if($conn && isset($_SESSION['user'])) {
    $id = $_SESSION['user']['id'];
    $result = mysqli_query($conn, "SELECT foto FROM users WHERE id=$id");
    if($result) {
        $row = mysqli_fetch_assoc($result);
        echo "\nFoto di database: " . $row['foto'] . "\n";
    }
}
?>
