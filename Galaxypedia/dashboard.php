<?php
session_start();

// Redirect ke login jika belum login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Galaxipedia</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
        }
        
        .welcome-card {
            background: linear-gradient(135deg, #1428a0, #007aff);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #1428a0;
            margin-bottom: 0.5rem;
        }
        
        .actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="welcome-card">
            <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Anda berhasil login ke Dashboard Galaxipedia</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">42</div>
                <div>Model Samsung</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">156</div>
                <div>Spesifikasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">24</div>
                <div>Ulasan Terbaru</div>
            </div>
        </div>
        
        <div class="card">
            <h3>Manajemen Konten</h3>
            <p>Di sini Anda dapat mengelola konten website Galaxipedia:</p>
            <ul>
                <li>Tambah/Edit informasi perangkat</li>
                <li>Kelola berita dan ulasan</li>
                <li>Update spesifikasi produk</li>
                <li>Lihat statistik pengunjung</li>
            </ul>
        </div>
        
        <div class="actions">
            <a href="index.php" class="btn">Kunjungi Beranda</a>
            <a href="logout.php" class="btn" style="background-color: #dc3545;">Logout</a>
        </div>
    </div>
</body>
</html>