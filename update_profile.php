<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "membersif");

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Koneksi DB gagal']);
    exit;
}

if(isset($_SESSION['user'])){
    $id = $_SESSION['user']['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $foto_name = isset($_SESSION['user']['foto']) ? $_SESSION['user']['foto'] : 'bakso.jpeg';
    
    $base_path = __DIR__;
    $upload_dir = $base_path . '/assets/img/';
    
    // Buat folder jika tidak ada
    if(!is_dir($upload_dir)){
        mkdir($upload_dir, 0777, true);
    }

    // Cek dan perbaiki permission
    if(!is_writable($upload_dir)) {
        chmod($upload_dir, 0777);
    }

    // Handle file upload
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $file_error = $_FILES['foto']['error'];
        $file_size = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_name = $_FILES['foto']['name'];
        
        // Validasi
        if($file_size > 5242880) { // 5MB limit
            echo json_encode(['status' => 'error', 'message' => 'Ukuran file terlalu besar (max 5MB)']);
            exit;
        }
        
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        
        if(!in_array($ext, $allowed)) {
            echo json_encode(['status' => 'error', 'message' => 'Tipe file tidak didukung']);
            exit;
        }
        
        // Generate nama file unik
        $foto_name = "user_" . $id . "_" . time() . "." . $ext;
        $target_file = $upload_dir . $foto_name;
        
        // Upload file
        if(!move_uploaded_file($file_tmp, $target_file)) {
            echo json_encode(['status' => 'error', 'message' => 'Gagal upload file, cek permission folder']);
            exit;
        }
        
        // Set permission file
        chmod($target_file, 0644);
    }

    $sql = "UPDATE users SET nama='$nama', email='$email', foto='$foto_name'";
    if(!empty($password)){
        $sql .= ", password='$password'";
    }
    $sql .= " WHERE id=$id";
    
    if(mysqli_query($conn, $sql)){

        $_SESSION['user']['nama'] = $nama;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['foto'] = $foto_name;
        
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal update database: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Session tidak ditemukan']);
}
?>