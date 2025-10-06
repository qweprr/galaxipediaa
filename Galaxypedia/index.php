<?php
session_start();

// Redirect ke dashboard jika sudah login
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galaxipedia — Ensiklopedia Samsung Galaxy</title>
  <meta name="description" content="Galaxipedia: ensiklopedia lengkap tentang lini Samsung Galaxy — spesifikasi, sejarah, perbandingan, dan ulasan.">
  <link rel="stylesheet" href="style.css">
  <style>
    /* Tambahan styling untuk GSMArena-like layout */
    .hero-section {
      background: linear-gradient(rgba(20, 40, 160, 0.8), rgba(20, 40, 160, 0.9)), url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="400" viewBox="0 0 1200 400"><rect width="1200" height="400" fill="%231428a0"/><text x="600" y="200" font-family="Arial" font-size="40" fill="%23ffffff" text-anchor="middle">Galaxipedia</text></svg>');
      background-size: cover;
      color: white;
      padding: 4rem 2rem;
      text-align: center;
      margin-bottom: 2rem;
      border-radius: 0 0 12px 12px;
    }
    
    .news-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
      margin: 2rem 0;
    }
    
    .news-card {
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    
    .news-card:hover {
      transform: translateY(-5px);
    }
    
    .news-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    
    .news-card-content {
      padding: 1rem;
    }
    
    .news-card h4 {
      margin: 0 0 0.5rem 0;
      color: #1428a0;
    }
    
    .news-card p {
      color: #666;
      font-size: 0.9rem;
    }
    
    .news-card .date {
      color: #999;
      font-size: 0.8rem;
      margin-top: 0.5rem;
    }

    /* Styling untuk tombol series */
    .btn-series {
      display: inline-block;
      padding: 0.8rem 1.5rem;
      background-color: var(--samsung-light-blue);
      color: var(--samsung-white);
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
      text-align: center;
      margin-top: 1rem;
    }

    .btn-series:hover {
      background-color: var(--samsung-blue);
      transform: translateY(-2px);
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
        <a href="login.php" class="btn btn-primary">Login</a>
      </div>
    </div>

    <nav aria-label="Utama">
      <ul>
        <li><a href="#home">HOME</a></li>
        <li><a href="#news">BERITA</a></li>
        <li><a href="#reviews">ULASAN</a></li>
        <li><a href="#videos">VIDEO</a></li>
        <li><a href="#compare">PERBANDINGAN</a></li>
        <li><a href="#finder">PENCARI HP</a></li>
        <li><a href="#deals">PENAWARAN</a></li>
        <li><a href="#contact">KONTAK</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main content -->
  <main>
    <!-- Hero / Landing section -->
    <section class="hero-section" id="home" aria-labelledby="hero-title">
      <h2 id="hero-title">Semua yang Perlu Anda Ketahui tentang Samsung Galaxy</h2>
      <p>Spesifikasi, riwayat rilis, perbandingan model, dan panduan singkat — dikurasi untuk penggemar Galaxy.</p>

      <form id="searchForm" method="get" role="search">
        <label for="q">Cari model atau topik:</label><br>
        <input type="search" id="q" name="q" placeholder="Mis. Galaxy S24" value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
      </form>
      <div id="searchResults"></div>
    </section>

    <!-- Berita Terbaru Section -->
    <section id="news" aria-labelledby="news-title">
      <h3 id="news-title">Berita Terbaru</h3>
      <div class="news-grid">
        <article class="news-card">
          <div class="news-card-content">
            <h4>Galaxy S25 Ultra Bocoran Spesifikasi</h4>
            <p>Spesifikasi terbaru Galaxy S25 Ultra telah bocor dengan kamera 200MP dan chipset Snapdragon 8 Gen 4.</p>
            <div class="date">12 Maret 2025</div>
          </div>
        </article>
        <article class="news-card">
          <div class="news-card-content">
            <h4>Samsung Rilis Pembaruan One UI 6.1</h4>
            <p>Samsung mulai merilis pembaruan One UI 6.1 untuk seri Galaxy S23 dengan fitur AI baru.</p>
            <div class="date">10 Maret 2025</div>
          </div>
        </article>
        <article class="news-card">
          <div class="news-card-content">
            <h4>Galaxy Z Fold6 Akan Lebih Tipis</h4>
            <p>Bocoran terbaru mengungkap Galaxy Z Fold6 akan memiliki desain yang lebih tipis dan ringan.</p>
            <div class="date">8 Maret 2025</div>
          </div>
        </article>
      </div>
    </section>

    <!-- Devices Section (Flexbox Layout) -->
    <section id="devices" aria-labelledby="devices-title">
      <h3 id="devices-title">Kategori Perangkat</h3>
      <p>Klik kategori untuk melihat semua model dalam seri tersebut</p>
      
      <div class="devices-container">
        <!-- Daftar kategori -->
        <div class="devices-list">
          <article class="card" data-series="s">
            <h4>Seri S</h4>
            <p>Flagship mainstream untuk performa dan kamera.</p>
            <a href="series.php?series=s" class="btn-series">Lihat Semua Model</a>
          </article>
          <article class="card" data-series="note">
            <h4>Seri Note / Ultra</h4>
            <p>Seri produktivitas dengan fitur layar besar dan S Pen.</p>
            <a href="series.php?series=note" class="btn-series">Lihat Semua Model</a>
          </article>
          <article class="card" data-series="a">
            <h4>Seri A</h4>
            <p>Perangkat kelas menengah dengan rasio harga/fitur menarik.</p>
            <a href="series.php?series=a" class="btn-series">Lihat Semua Model</a>
          </article>
          <article class="card" data-series="z">
            <h4>Seri Z</h4>
            <p>Perangkat lipat dan flip dengan teknologi inovatif.</p>
            <a href="series.php?series=z" class="btn-series">Lihat Semua Model</a>
          </article>
          <article class="card" data-series="m">
            <h4>Seri M</h4>
            <p>Perangkat entry-level dengan baterai besar dan harga terjangkau.</p>
            <a href="series.php?series=m" class="btn-series">Lihat Semua Model</a>
          </article>
          <article class="card" data-series="fe">
            <h4>Seri FE</h4>
            <p>Fan Edition - varian lebih terjangkau dengan fitur flagship.</p>
            <a href="series.php?series=fe" class="btn-series">Lihat Semua Model</a>
          </article>
        </div>

        <!-- Box Detail Perangkat -->
        <div class="devices-box">
          <div id="deviceDetails">
            <p>Pilih kategori perangkat untuk melihat semua model dalam seri tersebut</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Comparison Section -->
    <section id="compare" aria-labelledby="compare-title">
      <h3 id="compare-title">Perbandingan Perangkat</h3>
      <p>Bandingkan spesifikasi dua perangkat Samsung Galaxy.</p>
      
      <div class="comparison-form">
        <div class="form-group">
          <label for="device1">Perangkat 1:</label>
          <select id="device1">
            <option value="">Pilih Perangkat</option>
            <option value="s24">Galaxy S24</option>
            <option value="s23">Galaxy S23</option>
            <option value="a54">Galaxy A54</option>
            <option value="a34">Galaxy A34</option>
            <option value="zfold5">Galaxy Z Fold5</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="device2">Perangkat 2:</label>
          <select id="device2">
            <option value="">Pilih Perangkat</option>
            <option value="s24">Galaxy S24</option>
            <option value="s23">Galaxy S23</option>
            <option value="a54">Galaxy A54</option>
            <option value="a34">Galaxy A34</option>
            <option value="zfold5">Galaxy Z Fold5</option>
          </select>
        </div>
        
        <button id="compareBtn" class="btn btn-primary">Bandingkan</button>
      </div>
      
      <div id="comparisonResult" class="comparison-result"></div>
    </section>

    <!-- Contact Section -->
    <section id="contact" aria-labelledby="contact-title">
      <h3 id="contact-title">Kontak Kami</h3>
      <form id="contactForm">
        <div class="form-group">
          <label for="name">Nama:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Pesan:</label>
          <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
      </form>
      <div id="formStatus"></div>
    </section>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; <span id="year">2025</span> Galaxipedia</p>
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