<?php
// Tambahkan di bagian atas series.php setelah session_start()
include 'koneksi.php';

// Ambil parameter series dari URL
$series = $_GET['series'] ?? 's';

// Query untuk mengambil data perangkat berdasarkan seri
$sql = "SELECT * FROM devices WHERE series = ? ORDER BY year DESC, name ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $series);
$stmt->execute();
$result = $stmt->get_result();

$currentSeries = [
    's' => ['title' => 'Seri S - Flagship Samsung', 'description' => 'Seri flagship Samsung dengan performa terbaik, kamera canggih, dan desain premium.'],
    'note' => ['title' => 'Seri Note / Ultra', 'description' => 'Seri produktivitas dengan S Pen, layar besar, dan spesifikasi maksimal untuk power users.'],
    'a' => ['title' => 'Seri A - Mid-range Terbaik', 'description' => 'Seri mid-range dengan keseimbangan harga dan fitur yang optimal.'],
    'z' => ['title' => 'Seri Z - Inovasi Lipat', 'description' => 'Perangkat foldable dengan teknologi terdepan untuk pengalaman baru.'],
    'm' => ['title' => 'Seri M - Entry Level', 'description' => 'Perangkat entry-level dengan baterai besar dan harga terjangkau.'],
    'fe' => ['title' => 'Seri FE (Fan Edition)', 'description' => 'Varian lebih terjangkau dengan fitur flagship terpilih berdasarkan feedback pengguna.']
];

$seriesData = $currentSeries;
$models = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $models[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!-- Ganti bagian Models Grid dengan kode berikut -->
<div class="models-grid">
    <?php if (count($models) > 0): ?>
        <?php foreach ($models as $model): ?>
            <article class="model-card">
                <div class="model-image">
                    <span>Gambar <?php echo htmlspecialchars($model['name']); ?></span>
                </div>
                
                <div class="model-content">
                    <h3><?php echo htmlspecialchars($model['name']); ?></h3>
                    <div class="model-year">Tahun: <?php echo $model['year']; ?></div>
                    
                    <ul class="specs-list">
                        <li><strong>Layar:</strong> <?php echo htmlspecialchars($model['display']); ?></li>
                        <li><strong>Kamera:</strong> <?php echo htmlspecialchars($model['camera']); ?></li>
                        <li><strong>Prosesor:</strong> <?php echo htmlspecialchars($model['processor']); ?></li>
                        <li><strong>RAM:</strong> <?php echo htmlspecialchars($model['ram']); ?></li>
                        <li><strong>Penyimpanan:</strong> <?php echo htmlspecialchars($model['storage']); ?></li>
                        <li><strong>Baterai:</strong> <?php echo htmlspecialchars($model['battery']); ?></li>
                    </ul>
                    
                    <div class="price"><?php echo htmlspecialchars($model['price']); ?></div>
                    <p><?php echo htmlspecialchars($model['description']); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="grid-column: 1 / -1; text-align: center; padding: 2rem;">
            Belum ada perangkat dalam seri ini. 
            <?php if (isset($_SESSION['username'])): ?>
                <a href="dashboard.php">Tambah perangkat di Dashboard</a>
            <?php endif; ?>
        </p>
    <?php endif; ?>
</div>