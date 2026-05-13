<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membersif";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {

    die("Koneksi gagal: " . mysqli_connect_error());
}


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngolab Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css?v=100">
    <script src="assets/js/app.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .food-info h4, .food-info .price, .section-title, .greeting p, .hello, h2, h3 {
            font-style: normal !important;
        }

        #editModal input {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<div class="mobile-app">

    <div class="header">
        <div style="padding: 20px 50px 10px 50px;">
            <p class="hello">Welcome Back 👋</p>
            <h2 style="font-size: 22px; color: #F97316; margin-bottom: 15px;">
                <?php echo htmlspecialchars($user['nama']); ?>
            </h2>

            <div style="background: white; padding: 15px; border-radius: 15px; display: flex; align-items: center; gap: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <img src="assets/img/<?php echo !empty($user['foto']) ? $user['foto'] . '?v=' . time() : 'bakso.jpeg'; ?>"
                    style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 2px solid #F97316;">
                <div style="flex-grow: 1;">
                    <p style="margin: 0; font-weight: bold; font-size: 14px; color: #333;"><?php echo htmlspecialchars($user['nama']); ?></p>
                    <p style="margin: 0; font-size: 12px; color: #888;"><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
                <button onclick="openModal()" style="background: #F97316; color: white; border: none; padding: 6px 12px; border-radius: 8px; font-size: 11px; cursor: pointer;">Edit</button>
            </div>
        </div>
    </div>

    <div class="header-promo"> <div class="notif-btn">🔔</div>
        <p class="date-text">4 - 14 Mei 2026</p>
        <h1>Bigger Deals<br>NGOLABeveryone</h1>
        <p class="sub-promo">Diskon hingga 100.000 Koin</p>
    </div>

    <div class="point-box"> 
        <div class="badge-point">
            🟢 <?php echo $user['poin']; ?> Poin
        </div>
    </div>

    <div class="greeting" style="padding: 0 50px;">
        <p>Hi <?php echo htmlspecialchars($user['nama']); ?>, Pesan Sekarang?</p>
    </div>

    <div class="section-title" style="padding: 0 50px; font-weight: 800; font-size: 24px; color: #4a3228;">Katalog Menu Ngolab</div>
    
    <div class="menu-grid">
        <div class="food-item"> <img src="https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400" alt="Mie Yamin">
            <div class="food-info">
                <h4>Mie Yamin Biasa</h4>
                <div class="price">18.000 Koin</div>
            </div>
        </div>
        <div class="food-item">
            <img src="https://images.unsplash.com/photo-1541529086526-db283c563270?w=400" alt="Bakso Special">
            <div class="food-info">
                <h4>Bakso Malang Special</h4>
                <div class="price">28.000 Koin</div>
            </div>
        </div>
        <div class="food-item">
            <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=400" alt="Yamin Bakso">
            <div class="food-info">
                <h4>Yamin Bakso</h4>
                <div class="price">25.000 Koin</div>
            </div>
        </div>
        <div class="food-item">
            <img src="assets/img/bakso.jpeg" alt="Bakso">
            <div class="food-info">
                <h4>Bakso Ekstra</h4>
                <div class="price">15.000 Koin</div>
            </div>
        </div>
    </div>

    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item active"><span>🏠</span>Home</a>
        <a href="member_qr.php" class="nav-item"><span>📱</span>QR</a>
        <a href="reward.php" class="nav-item"><span>🎁</span>Reward</a>
        <a href="logout.php" class="nav-item"><span>🚪</span>Keluar</a>
    </nav>

</div>

<div id="editModal" style="display:none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); font-family: 'Inter', sans-serif;">
    <div style="background: white; margin: 15% auto; padding: 25px; width: 85%; max-width: 350px; border-radius: 20px;">
        <h3 style="margin-top: 0; color: #F97316;">Edit Profil Member</h3>
        <form id="profileForm" enctype="multipart/form-data">
            <label style="font-size: 12px; font-weight: bold;">Nama Lengkap</label>
            <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required>
            
            <label style="font-size: 12px; font-weight: bold;">Email</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            
            <label style="font-size: 12px; font-weight: bold;">Password Baru (Opsional)</label>
            <input type="password" name="password" placeholder="Kosongkan jika tetap">
            
            <label style="font-size: 12px; font-weight: bold;">Foto Profil</label>
            <input type="file" name="foto" accept="image/*" id="fotoInput" onchange="previewFoto(event)">
            <img id="fotoPreview" src="" alt="Preview" style="margin-top: 10px; max-width: 100%; max-height: 150px; border-radius: 10px; display: none;">
            
            <div style="display: flex; gap: 10px; margin-top: 15px;">
                <button type="button" onclick="updateProfile()" style="flex: 1; background: #F97316; color: white; border: none; padding: 12px; border-radius: 10px; cursor: pointer; font-weight: bold;">Simpan</button>
                <button type="button" onclick="closeModal()" style="flex: 1; background: #eee; color: #333; border: none; padding: 12px; border-radius: 10px; cursor: pointer;">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal() { document.getElementById('editModal').style.display = 'block'; }
function closeModal() { document.getElementById('editModal').style.display = 'none'; }

function previewFoto(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('fotoPreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
}

async function updateProfile() {
    const form = document.getElementById('profileForm');
    const formData = new FormData(form);

    try {
        const response = await fetch('update_profile.php',{
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        console.log('Response dari server:', result);
        
        if(result.status === 'success') {
            alert('Profil Berhasil Diupdate! ✨');
            setTimeout(() => {
                location.reload();
            }, 500);
        } else {
            alert('Gagal update: ' + result.message);
        }
    } catch (error) {
        console.error('Error detail:', error);
        alert('Terjadi kesalahan: ' + error.message);
    }
}
</script>

</body>
</html>