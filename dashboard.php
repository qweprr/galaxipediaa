<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include 'koneksi.php';

$message = '';

// CREATE - Tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_device'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $series = $conn->real_escape_string($_POST['series']);
    $year = $conn->real_escape_string($_POST['year']);
    $display = $conn->real_escape_string($_POST['display']);
    $camera = $conn->real_escape_string($_POST['camera']);
    $processor = $conn->real_escape_string($_POST['processor']);
    $ram = $conn->real_escape_string($_POST['ram']);
    $storage = $conn->real_escape_string($_POST['storage']);
    $battery = $conn->real_escape_string($_POST['battery']);
    $price = $conn->real_escape_string($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);
    
    $sql = "INSERT INTO devices (name, series, year, display, camera, processor, ram, storage, battery, price, description) 
            VALUES ('$name', '$series', '$year', '$display', '$camera', '$processor', '$ram', '$storage', '$battery', '$price', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "✅ Perangkat berhasil ditambahkan!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}

// UPDATE - Edit data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_device'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $series = $conn->real_escape_string($_POST['series']);
    $year = $conn->real_escape_string($_POST['year']);
    $display = $conn->real_escape_string($_POST['display']);
    $camera = $conn->real_escape_string($_POST['camera']);
    $processor = $conn->real_escape_string($_POST['processor']);
    $ram = $conn->real_escape_string($_POST['ram']);
    $storage = $conn->real_escape_string($_POST['storage']);
    $battery = $conn->real_escape_string($_POST['battery']);
    $price = $conn->real_escape_string($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);
    
    $sql = "UPDATE devices SET 
            name='$name', series='$series', year='$year', display='$display', 
            camera='$camera', processor='$processor', ram='$ram', storage='$storage', 
            battery='$battery', price='$price', description='$description' 
            WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        $message = "✅ Perangkat berhasil diperbarui!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}

// DELETE - Hapus data
if (isset($_GET['delete'])) {
    $id = $conn->real_escape_string($_GET['delete']);
    $sql = "DELETE FROM devices WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        $message = "✅ Perangkat berhasil dihapus!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}

// READ - Ambil data
$devices = [];
$sql = "SELECT * FROM devices ORDER BY year DESC, name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $devices[] = $row;
    }
}

// Ambil data untuk edit
$edit_device = null;
if (isset($_GET['edit'])) {
    $id = $conn->real_escape_string($_GET['edit']);
    $sql = "SELECT * FROM devices WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $edit_device = $result->fetch_assoc();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Galaxipedia</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial; background: #f5f5f7; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { background: linear-gradient(135deg, #1428a0, #007aff); color: white; padding: 30px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
        .message { padding: 15px; margin: 15px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin: 20px 0; }
        .stat-card { background: white; padding: 20px; border-radius: 8px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .stat-number { font-size: 2em; font-weight: bold; color: #1428a0; }
        .crud-section { background: white; padding: 25px; border-radius: 10px; margin: 20px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input, select, textarea { width: 100%; padding: 10px; border: 2px solid #ddd; border-radius: 5px; font-size: 14px; }
        textarea { height: 80px; resize: vertical; }
        .btn { padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-block; }
        .btn-primary { background: #1428a0; color: white; }
        .btn-edit { background: #28a745; color: white; padding: 8px 15px; font-size: 12px; }
        .btn-delete { background: #dc3545; color: white; padding: 8px 15px; font-size: 12px; }
        .btn-cancel { background: #6c757d; color: white; }
        .actions { display: flex; gap: 10px; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #1428a0; color: white; }
        tr:hover { background: #f9f9f9; }
        .nav { text-align: center; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <h1>Selamat Datang, <?php echo $_SESSION['username']; ?>! 👋</h1>
            <p>Dashboard CRUD Galaxipedia - Kelola Data Perangkat Samsung</p>
        </div>

        <!-- PESAN -->
        <?php if ($message): ?>
            <div class="message <?php echo strpos($message, '✅') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- STATISTIK -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number"><?php echo count($devices); ?></div>
                <div>Total Perangkat</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php 
                    $series_count = array_count_values(array_column($devices, 'series'));
                    echo count($series_count);
                ?></div>
                <div>Jumlah Seri</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php 
                    echo count($devices) > 0 ? max(array_column($devices, 'year')) : '0';
                ?></div>
                <div>Tahun Terbaru</div>
            </div>
        </div>

        <!-- FORM CRUD -->
        <div class="crud-section">
            <h2>📝 <?php echo $edit_device ? 'EDIT PERANGKAT' : 'TAMBAH PERANGKAT BARU'; ?></h2>
            <form method="POST">
                <?php if ($edit_device): ?>
                    <input type="hidden" name="id" value="<?php echo $edit_device['id']; ?>">
                <?php endif; ?>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Perangkat:</label>
                        <input type="text" name="name" value="<?php echo $edit_device ? $edit_device['name'] : ''; ?>" placeholder="Contoh: Galaxy S24 Ultra" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Seri:</label>
                        <select name="series" required>
                            <option value="">Pilih Seri</option>
                            <option value="s" <?php echo ($edit_device && $edit_device['series'] == 's') ? 'selected' : ''; ?>>Seri S</option>
                            <option value="note" <?php echo ($edit_device && $edit_device['series'] == 'note') ? 'selected' : ''; ?>>Seri Note/Ultra</option>
                            <option value="a" <?php echo ($edit_device && $edit_device['series'] == 'a') ? 'selected' : ''; ?>>Seri A</option>
                            <option value="z" <?php echo ($edit_device && $edit_device['series'] == 'z') ? 'selected' : ''; ?>>Seri Z</option>
                            <option value="m" <?php echo ($edit_device && $edit_device['series'] == 'm') ? 'selected' : ''; ?>>Seri M</option>
                            <option value="fe" <?php echo ($edit_device && $edit_device['series'] == 'fe') ? 'selected' : ''; ?>>Seri FE</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tahun Rilis:</label>
                        <input type="number" name="year" value="<?php echo $edit_device ? $edit_device['year'] : date('Y'); ?>" min="2010" max="2030" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Harga:</label>
                        <input type="text" name="price" value="<?php echo $edit_device ? $edit_device['price'] : ''; ?>" placeholder="Contoh: Rp 15.999.000" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Layar:</label>
                        <input type="text" name="display" value="<?php echo $edit_device ? $edit_device['display'] : ''; ?>" placeholder="Contoh: 6.8 inch Dynamic AMOLED 2X" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Kamera:</label>
                        <input type="text" name="camera" value="<?php echo $edit_device ? $edit_device['camera'] : ''; ?>" placeholder="Contoh: 200MP + 50MP + 12MP + 10MP" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Prosesor:</label>
                        <input type="text" name="processor" value="<?php echo $edit_device ? $edit_device['processor'] : ''; ?>" placeholder="Contoh: Snapdragon 8 Gen 3" required>
                    </div>
                    
                    <div class="form-group">
                        <label>RAM:</label>
                        <input type="text" name="ram" value="<?php echo $edit_device ? $edit_device['ram'] : ''; ?>" placeholder="Contoh: 12GB" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Penyimpanan:</label>
                        <input type="text" name="storage" value="<?php echo $edit_device ? $edit_device['storage'] : ''; ?>" placeholder="Contoh: 256GB/512GB/1TB" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Baterai:</label>
                        <input type="text" name="battery" value="<?php echo $edit_device ? $edit_device['battery'] : ''; ?>" placeholder="Contoh: 5000mAh" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi:</label>
                    <textarea name="description" placeholder="Deskripsi lengkap perangkat..." required><?php echo $edit_device ? $edit_device['description'] : ''; ?></textarea>
                </div>
                
                <div class="actions">
                    <?php if ($edit_device): ?>
                        <button type="submit" name="update_device" class="btn btn-primary">💾 UPDATE PERANGKAT</button>
                        <a href="dashboard.php" class="btn btn-cancel">❌ BATAL</a>
                    <?php else: ?>
                        <button type="submit" name="add_device" class="btn btn-primary">➕ TAMBAH PERANGKAT</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- TABEL DATA -->
        <div class="crud-section">
            <h2>📋 DAFTAR PERANGKAT SAMSUNG GALAXY</h2>
            
            <?php if (count($devices) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Seri</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($devices as $device): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($device['name']); ?></strong></td>
                                <td>
                                    <?php 
                                    $series_names = [
                                        's' => 'Seri S',
                                        'note' => 'Seri Note/Ultra', 
                                        'a' => 'Seri A',
                                        'z' => 'Seri Z',
                                        'm' => 'Seri M',
                                        'fe' => 'Seri FE'
                                    ];
                                    echo $series_names[$device['series']] ?? $device['series'];
                                    ?>
                                </td>
                                <td><?php echo $device['year']; ?></td>
                                <td><?php echo htmlspecialchars($device['price']); ?></td>
                                <td>
                                    <a href="dashboard.php?edit=<?php echo $device['id']; ?>" class="btn btn-edit">✏️ EDIT</a>
                                    <a href="dashboard.php?delete=<?php echo $device['id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus <?php echo $device['name']; ?>?')">🗑️ HAPUS</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center; padding: 20px; color: #666;">
                    📭 Belum ada perangkat. Silakan tambah perangkat baru di atas.
                </p>
            <?php endif; ?>
        </div>

        <!-- NAVIGASI -->
        <div class="nav">
            <a href="index.php" class="btn btn-primary">🏠 Kunjungi Beranda</a>
            <a href="logout.php" class="btn" style="background-color: #dc3545;">🚪 Logout</a>
        </div>
    </div>
</body>
</html>