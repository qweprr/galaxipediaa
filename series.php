<?php
session_start();

// Data lengkap semua seri Samsung Galaxy
$seriesData = [
    's' => [
        'title' => 'Seri S - Flagship Samsung',
        'description' => 'Seri flagship Samsung dengan performa terbaik, kamera canggih, dan desain premium.',
        'models' => [
            [
                'name' => 'Galaxy S25 Ultra',
                'year' => 2025,
                'image' => 'images/series/s/s25-ultra.jpg',
                'display' => '6.8 inch Dynamic AMOLED 2X',
                'camera' => '200MP + 50MP + 12MP + 10MP',
                'processor' => 'Snapdragon 8 Gen 4',
                'ram' => '12GB/16GB',
                'storage' => '256GB/512GB/1TB',
                'battery' => '5000mAh',
                'price' => 'Rp 18.999.000'
            ],
            [
                'name' => 'Galaxy S24+',
                'year' => 2024,
                'image' => 'images/series/s/s24-plus.jpg',
                'display' => '6.7 inch Dynamic AMOLED 2X',
                'camera' => '50MP + 12MP + 10MP',
                'processor' => 'Exynos 2400/Snapdragon 8 Gen 3',
                'ram' => '12GB',
                'storage' => '256GB/512GB',
                'battery' => '4900mAh',
                'price' => 'Rp 14.999.000'
            ],
            [
                'name' => 'Galaxy S23',
                'year' => 2023,
                'image' => 'images/series/s/s23.jpg',
                'display' => '6.1 inch Dynamic AMOLED 2X',
                'camera' => '50MP + 12MP + 10MP',
                'processor' => 'Snapdragon 8 Gen 2',
                'ram' => '8GB',
                'storage' => '128GB/256GB',
                'battery' => '3900mAh',
                'price' => 'Rp 10.999.000'
            ],
            [
                'name' => 'Galaxy S22',
                'year' => 2022,
                'image' => 'images/series/s/s22.jpg',
                'display' => '6.1 inch Dynamic AMOLED 2X',
                'camera' => '50MP + 12MP + 10MP',
                'processor' => 'Exynos 2200/Snapdragon 8 Gen 1',
                'ram' => '8GB',
                'storage' => '128GB/256GB',
                'battery' => '3700mAh',
                'price' => 'Rp 8.999.000'
            ],
            [
                'name' => 'Galaxy S21 FE',
                'year' => 2022,
                'image' => 'images/series/s/s21-fe.jpg',
                'display' => '6.4 inch Dynamic AMOLED 2X',
                'camera' => '12MP + 12MP + 8MP',
                'processor' => 'Exynos 2100/Snapdragon 888',
                'ram' => '6GB/8GB',
                'storage' => '128GB/256GB',
                'battery' => '4500mAh',
                'price' => 'Rp 6.999.000'
            ]
        ]
    ],
    'note' => [
        'title' => 'Seri Note / Ultra',
        'description' => 'Seri produktivitas dengan S Pen, layar besar, dan spesifikasi maksimal untuk power users.',
        'models' => [
            [
                'name' => 'Galaxy S24 Ultra',
                'year' => 2024,
                'image' => 'images/series/note/s24-ultra.jpg',
                'display' => '6.8 inch Dynamic AMOLED 2X',
                'camera' => '200MP + 50MP + 12MP + 10MP',
                'processor' => 'Snapdragon 8 Gen 3',
                'ram' => '12GB',
                'storage' => '256GB/512GB/1TB',
                'battery' => '5000mAh',
                'price' => 'Rp 17.999.000'
            ],
            [
                'name' => 'Galaxy S23 Ultra',
                'year' => 2023,
                'image' => 'images/series/note/s23-ultra.jpg',
                'display' => '6.8 inch Dynamic AMOLED 2X',
                'camera' => '200MP + 10MP + 10MP + 12MP',
                'processor' => 'Snapdragon 8 Gen 2',
                'ram' => '8GB/12GB',
                'storage' => '256GB/512GB/1TB',
                'battery' => '5000mAh',
                'price' => 'Rp 14.999.000'
            ],
            [
                'name' => 'Galaxy Note 20 Ultra',
                'year' => 2020,
                'image' => 'images/series/note/note20-ultra.jpg',
                'display' => '6.9 inch Dynamic AMOLED 2X',
                'camera' => '108MP + 12MP + 12MP',
                'processor' => 'Exynos 990/Snapdragon 865+',
                'ram' => '12GB',
                'storage' => '256GB/512GB',
                'battery' => '4500mAh',
                'price' => 'Rp 12.999.000'
            ]
        ]
    ],
    'a' => [
        'title' => 'Seri A - Mid-range Terbaik',
        'description' => 'Seri mid-range dengan keseimbangan harga dan fitur yang optimal.',
        'models' => [
            [
                'name' => 'Galaxy A55',
                'year' => 2024,
                'image' => 'images/series/a/a55.jpg',
                'display' => '6.6 inch Super AMOLED',
                'camera' => '50MP + 12MP + 5MP',
                'processor' => 'Exynos 1480',
                'ram' => '8GB',
                'storage' => '128GB/256GB',
                'battery' => '5000mAh',
                'price' => 'Rp 5.999.000'
            ],
            [
                'name' => 'Galaxy A54',
                'year' => 2023,
                'image' => 'images/series/a/a54.jpg',
                'display' => '6.4 inch Super AMOLED',
                'camera' => '50MP + 12MP + 5MP',
                'processor' => 'Exynos 1380',
                'ram' => '6GB/8GB',
                'storage' => '128GB/256GB',
                'battery' => '5000mAh',
                'price' => 'Rp 4.999.000'
            ],
            [
                'name' => 'Galaxy A34',
                'year' => 2023,
                'image' => 'images/series/a/a34.jpg',
                'display' => '6.6 inch Super AMOLED',
                'camera' => '48MP + 8MP + 5MP',
                'processor' => 'MediaTek Dimensity 1080',
                'ram' => '6GB/8GB',
                'storage' => '128GB/256GB',
                'battery' => '5000mAh',
                'price' => 'Rp 3.999.000'
            ],
            [
                'name' => 'Galaxy A15',
                'year' => 2024,
                'image' => 'images/series/a/a15.jpg',
                'display' => '6.5 inch Super AMOLED',
                'camera' => '50MP + 5MP + 2MP',
                'processor' => 'MediaTek Helio G99',
                'ram' => '4GB/6GB/8GB',
                'storage' => '128GB/256GB',
                'battery' => '5000mAh',
                'price' => 'Rp 2.499.000'
            ]
        ]
    ],
    'z' => [
        'title' => 'Seri Z - Inovasi Lipat',
        'description' => 'Perangkat foldable dengan teknologi terdepan untuk pengalaman baru.',
        'models' => [
            [
                'name' => 'Galaxy Z Fold5',
                'year' => 2023,
                'image' => 'images/series/z/z-fold5.jpg',
                'display' => '7.6 inch Dynamic AMOLED 2X (dalam) / 6.2 inch (luar)',
                'camera' => '50MP + 12MP + 10MP',
                'processor' => 'Snapdragon 8 Gen 2',
                'ram' => '12GB',
                'storage' => '256GB/512GB/1TB',
                'battery' => '4400mAh',
                'price' => 'Rp 22.999.000'
            ],
            [
                'name' => 'Galaxy Z Flip5',
                'year' => 2023,
                'image' => 'images/series/z/z-flip5.jpg',
                'display' => '6.7 inch Dynamic AMOLED 2X (dalam) / 3.4 inch (luar)',
                'camera' => '12MP + 12MP',
                'processor' => 'Snapdragon 8 Gen 2',
                'ram' => '8GB',
                'storage' => '256GB/512GB',
                'battery' => '3700mAh',
                'price' => 'Rp 14.999.000'
            ]
        ]
    ],
    'm' => [
        'title' => 'Seri M - Entry Level',
        'description' => 'Perangkat entry-level dengan baterai besar dan harga terjangkau.',
        'models' => [
            [
                'name' => 'Galaxy M55',
                'year' => 2024,
                'image' => 'images/series/m/m55.jpg',
                'display' => '6.7 inch Super AMOLED Plus',
                'camera' => '50MP + 8MP + 2MP',
                'processor' => 'Snapdragon 7 Gen 1',
                'ram' => '8GB',
                'storage' => '128GB/256GB',
                'battery' => '5000mAh',
                'price' => 'Rp 4.499.000'
            ],
            [
                'name' => 'Galaxy M34',
                'year' => 2023,
                'image' => 'images/series/m/m34.jpg',
                'display' => '6.5 inch Super AMOLED',
                'camera' => '50MP + 8MP + 2MP',
                'processor' => 'Exynos 1280',
                'ram' => '6GB/8GB',
                'storage' => '128GB',
                'battery' => '6000mAh',
                'price' => 'Rp 3.299.000'
            ]
        ]
    ],
    'fe' => [
        'title' => 'Seri FE (Fan Edition)',
        'description' => 'Varian lebih terjangkau dengan fitur flagship terpilih berdasarkan feedback pengguna.',
        'models' => [
            [
                'name' => 'Galaxy S23 FE',
                'year' => 2023,
                'image' => 'images/series/fe/s23-fe.jpg',
                'display' => '6.4 inch Dynamic AMOLED 2X',
                'camera' => '50MP + 8MP + 12MP',
                'processor' => 'Exynos 2200/Snapdragon 8 Gen 1',
                'ram' => '8GB',
                'storage' => '128GB/256GB',
                'battery' => '4500mAh',
                'price' => 'Rp 7.999.000'
            ],
            [
                'name' => 'Galaxy Tab S9 FE',
                'year' => 2023,
                'image' => 'images/series/fe/tab-s9-fe.jpg',
                'display' => '10.9 inch LCD',
                'camera' => '8MP (belakang) / 12MP (depan)',
                'processor' => 'Exynos 1380',
                'ram' => '6GB/8GB',
                'storage' => '128GB/256GB',
                'battery' => '8000mAh',
                'price' => 'Rp 6.499.000'
            ]
        ]
    ]
];

// Ambil parameter series dari URL
$series = $_GET['series'] ?? 's';

// Jika series tidak valid, redirect ke series default
if (!array_key_exists($series, $seriesData)) {
    $series = 's';
}

$currentSeries = $seriesData[$series];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($currentSeries['title']); ?> - Galaxipedia</title>
  <meta name="description" content="<?php echo htmlspecialchars($currentSeries['description']); ?>">
  <link rel="stylesheet" href="style.css">
  <style>
    .series-header {
      background: linear-gradient(135deg, var(--samsung-blue) 0%, var(--samsung-light-blue) 100%);
      color: white;
      padding: 3rem 2rem;
      text-align: center;
      margin-bottom: 2rem;
      border-radius: 0 0 12px 12px;
    }
    
    .models-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 2rem;
      margin: 2rem 0;
    }
    
    .model-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    
    .model-card:hover {
      transform: translateY(-5px);
    }
    
    .model-image {
      width: 100%;
      height: 250px;
      background: var(--samsung-gray);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--samsung-dark-gray);
      font-style: italic;
    }
    
    .model-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .model-content {
      padding: 1.5rem;
    }
    
    .model-content h3 {
      color: var(--samsung-blue);
      margin-bottom: 0.5rem;
    }
    
    .model-year {
      color: var(--samsung-dark-gray);
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }
    
    .specs-list {
      list-style: none;
      margin: 1rem 0;
    }
    
    .specs-list li {
      margin-bottom: 0.5rem;
      padding: 0.3rem 0;
      border-bottom: 1px solid #f0f0f0;
    }
    
    .price {
      font-size: 1.2rem;
      font-weight: bold;
      color: var(--samsung-blue);
      margin-top: 1rem;
    }
    
    .series-navigation {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin: 2rem 0;
      flex-wrap: wrap;
    }
    
    .series-nav-btn {
      padding: 0.5rem 1rem;
      background: var(--samsung-gray);
      border: 2px solid var(--samsung-light-blue);
      border-radius: 6px;
      color: var(--samsung-blue);
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .series-nav-btn:hover {
      background: var(--samsung-light-blue);
      color: white;
    }
    
    .series-nav-btn.active {
      background: var(--samsung-blue);
      color: white;
      border-color: var(--samsung-blue);
    }
    
    .back-button {
      display: inline-block;
      margin-bottom: 1rem;
      color: var(--samsung-blue);
      text-decoration: none;
      font-weight: 600;
      padding: 0.5rem 1rem;
      border: 2px solid var(--samsung-blue);
      border-radius: 6px;
      transition: all 0.3s ease;
    }
    
    .back-button:hover {
      background: var(--samsung-blue);
      color: white;
      text-decoration: none;
    }

    /* Dark mode support */
    body.dark-mode .model-card {
      background: #2d2d2d;
      color: #e0e0e0;
    }
    
    body.dark-mode .model-content h3 {
      color: #007aff;
    }
    
    body.dark-mode .specs-list li {
      border-bottom-color: #444;
    }
    
    body.dark-mode .series-nav-btn {
      background: #3d3d3d;
      color: #e0e0e0;
    }
    
    body.dark-mode .series-nav-btn.active {
      background: var(--samsung-blue);
      color: white;
    }
  </style>
</head>
<body>
  <!-- Header / Navigation -->
  <header>
    <div class="header-top">
      <div class="header-left">
        <h1>Galaxipedia</h1>
        <p>Ensiklopedia khusus Samsung Galaxy</p>
      </div>
      <div class="header-right">
        <a href="#" class="rss-icon" title="RSS Feed">📡</a>
        <button id="darkModeToggle">🌙 Dark Mode</button>
        <?php if (isset($_SESSION['username'])): ?>
          <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
        <?php else: ?>
          <a href="login.php" class="btn btn-primary">Login</a>
        <?php endif; ?>
      </div>
    </div>

    <nav aria-label="Utama">
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="index.php#news">BERITA</a></li>
        <li><a href="index.php#reviews">ULASAN</a></li>
        <li><a href="index.php#compare">PERBANDINGAN</a></li>
        <li><a href="index.php#contact">KONTAK</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main content -->
  <main>
    <a href="index.php#devices" class="back-button">← Kembali ke Kategori Perangkat</a>
    
    <section class="series-header">
      <h1><?php echo htmlspecialchars($currentSeries['title']); ?></h1>
      <p><?php echo htmlspecialchars($currentSeries['description']); ?></p>
    </section>

    <!-- Series Navigation -->
    <div class="series-navigation">
      <?php foreach ($seriesData as $key => $seriesItem): ?>
        <a href="series.php?series=<?php echo $key; ?>" 
           class="series-nav-btn <?php echo $key === $series ? 'active' : ''; ?>">
          <?php 
            // Short title untuk navigasi
            $shortTitle = str_replace(' - ', ': ', $seriesItem['title']);
            $shortTitle = explode(':', $shortTitle)[0];
            echo htmlspecialchars($shortTitle); 
          ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Models Grid -->
    <section aria-labelledby="models-title">
      <h2 id="models-title" style="text-align: center; margin-bottom: 2rem;">Model <?php echo htmlspecialchars($currentSeries['title']); ?></h2>
      
      <div class="models-grid">
        <?php foreach ($currentSeries['models'] as $model): ?>
          <article class="model-card">
            <div class="model-image">
              <?php if (file_exists($model['image']) && is_file($model['image'])): ?>
                <img src="<?php echo $model['image']; ?>" alt="<?php echo htmlspecialchars($model['name']); ?>" onerror="this.style.display='none'; this.parentNode.innerHTML='Gambar <?php echo htmlspecialchars($model['name']); ?>'">
              <?php else: ?>
                <span>Gambar <?php echo htmlspecialchars($model['name']); ?></span>
              <?php endif; ?>
            </div>
            
            <div class="model-content">
              <h3><?php echo htmlspecialchars($model['name']); ?></h3>
              <div class="model-year">Tahun: <?php echo $model['year']; ?></div>
              
              <ul class="specs-list">
                <li><strong>Layar:</strong> <?php echo $model['display']; ?></li>
                <li><strong>Kamera:</strong> <?php echo $model['camera']; ?></li>
                <li><strong>Prosesor:</strong> <?php echo $model['processor']; ?></li>
                <li><strong>RAM:</strong> <?php echo $model['ram']; ?></li>
                <li><strong>Penyimpanan:</strong> <?php echo $model['storage']; ?></li>
                <li><strong>Baterai:</strong> <?php echo $model['battery']; ?></li>
              </ul>
              
              <div class="price"><?php echo $model['price']; ?></div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; <?php echo date('Y'); ?> Galaxipedia</p>
    <p>Referensi desain dan sumber yang direkomendasikan:</p>
    <ul>
      <li><a href="https://developer.samsung.com/" target="_blank" rel="noopener">Samsung Developers</a></li>
      <li><a href="https://www.samsung.com/" target="_blank" rel="noopener">Samsung Official</a></li>
      <li><a href="https://www.gsmarena.com/" target="_blank" rel="noopener">GSMArena</a></li>
    </ul>
  </footer>

  <!-- JavaScript -->
  <script src="script.js"></script>
</body>
</html>