// script.js

// DOM Manipulation - Mengubah tahun di footer
document.getElementById('year').textContent = new Date().getFullYear();

// Data perangkat Samsung
const deviceData = {
  s: {
    title: "Seri S",
    description: "Flagship mainstream untuk performa dan kamera.",
    models: [
      { name: "Galaxy S24", year: 2024, display: "6.2 inch", camera: "50MP" },
      { name: "Galaxy S23", year: 2023, display: "6.1 inch", camera: "50MP" },
      { name: "Galaxy S22", year: 2022, display: "6.1 inch", camera: "50MP" }
    ]
  },
  note: {
    title: "Seri Note / Ultra",
    description: "Seri produktivitas dengan fitur layar besar dan S Pen (varian).",
    models: [
      { name: "Galaxy S24 Ultra", year: 2024, display: "6.8 inch", camera: "200MP" },
      { name: "Galaxy S23 Ultra", year: 2023, display: "6.8 inch", camera: "200MP" },
      { name: "Galaxy S22 Ultra", year: 2022, display: "6.8 inch", camera: "108MP" }
    ]
  },
  a: {
    title: "Seri A",
    description: "Perangkat kelas menengah dengan rasio harga/fitur menarik.",
    models: [
      { name: "Galaxy A54", year: 2023, display: "6.4 inch", camera: "50MP" },
      { name: "Galaxy A34", year: 2023, display: "6.6 inch", camera: "48MP" },
      { name: "Galaxy A14", year: 2023, display: "6.6 inch", camera: "50MP" }
    ]
  }
};

// Data perbandingan perangkat
const comparisonData = {
  s24: {
    name: "Galaxy S24",
    display: "6.2 inch Dynamic AMOLED 2X",
    processor: "Snapdragon 8 Gen 3",
    ram: "8GB",
    storage: "128GB/256GB",
    camera: "50MP + 12MP + 10MP",
    battery: "4000mAh"
  },
  s23: {
    name: "Galaxy S23",
    display: "6.1 inch Dynamic AMOLED 2X",
    processor: "Snapdragon 8 Gen 2",
    ram: "8GB",
    storage: "128GB/256GB",
    camera: "50MP + 12MP + 10MP",
    battery: "3900mAh"
  },
  a54: {
    name: "Galaxy A54",
    display: "6.4 inch Super AMOLED",
    processor: "Exynos 1380",
    ram: "6GB/8GB",
    storage: "128GB/256GB",
    camera: "50MP + 12MP + 5MP",
    battery: "5000mAh"
  },
  a34: {
    name: "Galaxy A34",
    display: "6.6 inch Super AMOLED",
    processor: "MediaTek Dimensity 1080",
    ram: "6GB/8GB",
    storage: "128GB/256GB",
    camera: "48MP + 8MP + 5MP",
    battery: "5000mAh"
  }
};

// Event Listener untuk dark mode
const darkModeToggle = document.getElementById('darkModeToggle');
darkModeToggle.addEventListener('click', function() {
  document.body.classList.toggle('dark-mode');
  if (document.body.classList.contains('dark-mode')) {
    darkModeToggle.textContent = 'Mode Terang';
  } else {
    darkModeToggle.textContent = 'Mode Gelap';
  }
});

// Event Listener untuk form pencarian
const searchForm = document.getElementById('searchForm');
const searchResults = document.getElementById('searchResults');

searchForm.addEventListener('submit', function(event) {
  event.preventDefault();
  const searchTerm = document.getElementById('q').value.toLowerCase();
  
  if (searchTerm.trim() === '') {
    searchResults.innerHTML = '<p>Masukkan kata kunci pencarian</p>';
    return;
  }
  
  // Simulasi pencarian
  const results = [];
  
  // Cari di semua data perangkat
  Object.keys(deviceData).forEach(series => {
    deviceData[series].models.forEach(model => {
      if (model.name.toLowerCase().includes(searchTerm)) {
        results.push(model);
      }
    });
  });
  
  // Tampilkan hasil
  if (results.length > 0) {
    let html = '<h4>Hasil Pencarian:</h4>';
    results.forEach(result => {
      html += `
        <div class="search-result-item">
          <h5>${result.name}</h5>
          <p>Tahun: ${result.year} | Layar: ${result.display} | Kamera: ${result.camera}</p>
        </div>
      `;
    });
    searchResults.innerHTML = html;
  } else {
    searchResults.innerHTML = '<p>Tidak ada hasil yang ditemukan</p>';
  }
});

// Event Listener untuk tombol kategori perangkat
const seriesButtons = document.querySelectorAll('.btn-series');
const deviceDetails = document.getElementById('deviceDetails');

seriesButtons.forEach(button => {
  button.addEventListener('click', function() {
    const series = this.closest('.card').getAttribute('data-series');
    const data = deviceData[series];
    
    let html = `<h4>${data.title}</h4>`;
    html += `<p>${data.description}</p>`;
    html += '<h5>Model Terbaru:</h5>';
    html += '<ul>';
    
    data.models.forEach(model => {
      html += `<li><strong>${model.name}</strong> (${model.year}) - Layar: ${model.display}, Kamera: ${model.camera}</li>`;
    });
    
    html += '</ul>';
    deviceDetails.innerHTML = html;
  });
});

// Event Listener untuk perbandingan perangkat
const compareBtn = document.getElementById('compareBtn');
const comparisonResult = document.getElementById('comparisonResult');

compareBtn.addEventListener('click', function() {
  const device1 = document.getElementById('device1').value;
  const device2 = document.getElementById('device2').value;
  
  if (!device1 || !device2) {
    comparisonResult.innerHTML = '<p>Pilih kedua perangkat untuk membandingkan</p>';
    return;
  }
  
  if (device1 === device2) {
    comparisonResult.innerHTML = '<p>Pilih dua perangkat yang berbeda</p>';
    return;
  }
  
  const data1 = comparisonData[device1];
  const data2 = comparisonData[device2];
  
  let html = `
    <div class="comparison-card">
      <h4>${data1.name}</h4>
      <ul>
        <li><strong>Layar:</strong> ${data1.display}</li>
        <li><strong>Prosesor:</strong> ${data1.processor}</li>
        <li><strong>RAM:</strong> ${data1.ram}</li>
        <li><strong>Penyimpanan:</strong> ${data1.storage}</li>
        <li><strong>Kamera:</strong> ${data1.camera}</li>
        <li><strong>Baterai:</strong> ${data1.battery}</li>
      </ul>
    </div>
    <div class="comparison-card">
      <h4>${data2.name}</h4>
      <ul>
        <li><strong>Layar:</strong> ${data2.display}</li>
        <li><strong>Prosesor:</strong> ${data2.processor}</li>
        <li><strong>RAM:</strong> ${data2.ram}</li>
        <li><strong>Penyimpanan:</strong> ${data2.storage}</li>
        <li><strong>Kamera:</strong> ${data2.camera}</li>
        <li><strong>Baterai:</strong> ${data2.battery}</li>
      </ul>
    </div>
  `;
  
  comparisonResult.innerHTML = html;
});

// Event Listener untuk form kontak
const contactForm = document.getElementById('contactForm');
const formStatus = document.getElementById('formStatus');

contactForm.addEventListener('submit', function(event) {
  event.preventDefault();
  
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;
  
  // Validasi sederhana
  if (name && email && message) {
    formStatus.textContent = 'Pesan berhasil dikirim!';
    formStatus.className = 'success';
    
    // Reset form
    contactForm.reset();
    
    // Hapus status setelah 3 detik
    setTimeout(() => {
      formStatus.textContent = '';
      formStatus.className = '';
    }, 3000);
  } else {
    formStatus.textContent = 'Harap isi semua field!';
    formStatus.className = 'error';
  }
});

// Fetch API (opsional)
const loadApiDataBtn = document.getElementById('loadApiData');
const apiData = document.getElementById('apiData');

loadApiDataBtn.addEventListener('click', async function() {
  try {
    apiData.innerHTML = '<p>Memuat data...</p>';
    
    // Menggunakan API publik untuk mendapatkan data (contoh: API anime untuk demonstrasi)
    const response = await fetch('https://api.jikan.moe/v4/anime?q=one piece&limit=3');
    
    if (!response.ok) {
      throw new Error('Gagal mengambil data');
    }
    
    const data = await response.json();
    
    let html = '<h4>Contoh Data dari API Publik (Anime):</h4>';
    data.data.forEach(anime => {
      html += `
        <div style="margin-bottom: 1rem; padding: 1rem; background: #e9e9e9; border-radius: 5px;">
          <h5>${anime.title}</h5>
          <p>${anime.synopsis ? anime.synopsis.substring(0, 100) + '...' : 'Tidak ada deskripsi'}</p>
        </div>
      `;
    });
    
    apiData.innerHTML = html;
  } catch (error) {
    apiData.innerHTML = `<p>Error: ${error.message}</p>`;
  }
});

// Smooth scroll untuk navigasi
document.querySelectorAll('nav a').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    
    const targetId = this.getAttribute('href');
    const targetElement = document.querySelector(targetId);
    
    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop - 20,
        behavior: 'smooth'
      });
    }
  });
});