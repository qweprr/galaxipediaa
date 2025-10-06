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
      { name: "Galaxy S22", year: 2022, display: "6.1 inch", camera: "50MP" },
      { name: "Galaxy S21", year: 2021, display: "6.2 inch", camera: "64MP" }
    ]
  },
  note: {
    title: "Seri Note / Ultra",
    description: "Seri produktivitas dengan fitur layar besar dan S Pen (varian).",
    models: [
      { name: "Galaxy S24 Ultra", year: 2024, display: "6.8 inch", camera: "200MP" },
      { name: "Galaxy S23 Ultra", year: 2023, display: "6.8 inch", camera: "200MP" },
      { name: "Galaxy S22 Ultra", year: 2022, display: "6.8 inch", camera: "108MP" },
      { name: "Galaxy Note 20", year: 2020, display: "6.7 inch", camera: "64MP" }
    ]
  },
  a: {
    title: "Seri A",
    description: "Perangkat kelas menengah dengan rasio harga/fitur menarik.",
    models: [
      { name: "Galaxy A54", year: 2023, display: "6.4 inch", camera: "50MP" },
      { name: "Galaxy A34", year: 2023, display: "6.6 inch", camera: "48MP" },
      { name: "Galaxy A14", year: 2023, display: "6.6 inch", camera: "50MP" },
      { name: "Galaxy A73", year: 2022, display: "6.7 inch", camera: "108MP" }
    ]
  },
  z: {
    title: "Seri Z",
    description: "Perangkat lipat dan flip dengan teknologi inovatif.",
    models: [
      { name: "Galaxy Z Fold5", year: 2023, display: "7.6 inch", camera: "50MP" },
      { name: "Galaxy Z Flip5", year: 2023, display: "6.7 inch", camera: "12MP" },
      { name: "Galaxy Z Fold4", year: 2022, display: "7.6 inch", camera: "50MP" },
      { name: "Galaxy Z Flip4", year: 2022, display: "6.7 inch", camera: "12MP" }
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
    battery: "4000mAh",
    price: "Rp 12.999.000"
  },
  s23: {
    name: "Galaxy S23",
    display: "6.1 inch Dynamic AMOLED 2X",
    processor: "Snapdragon 8 Gen 2",
    ram: "8GB",
    storage: "128GB/256GB",
    camera: "50MP + 12MP + 10MP",
    battery: "3900mAh",
    price: "Rp 10.999.000"
  },
  a54: {
    name: "Galaxy A54",
    display: "6.4 inch Super AMOLED",
    processor: "Exynos 1380",
    ram: "6GB/8GB",
    storage: "128GB/256GB",
    camera: "50MP + 12MP + 5MP",
    battery: "5000mAh",
    price: "Rp 5.499.000"
  },
  a34: {
    name: "Galaxy A34",
    display: "6.6 inch Super AMOLED",
    processor: "MediaTek Dimensity 1080",
    ram: "6GB/8GB",
    storage: "128GB/256GB",
    camera: "48MP + 8MP + 5MP",
    battery: "5000mAh",
    price: "Rp 4.299.000"
  },
  zfold5: {
    name: "Galaxy Z Fold5",
    display: "7.6 inch Dynamic AMOLED 2X",
    processor: "Snapdragon 8 Gen 2",
    ram: "12GB",
    storage: "256GB/512GB/1TB",
    camera: "50MP + 12MP + 10MP",
    battery: "4400mAh",
    price: "Rp 24.999.000"
  }
};

// Event Listener untuk dark mode
const darkModeToggle = document.getElementById('darkModeToggle');
if (darkModeToggle) {
  darkModeToggle.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
      darkModeToggle.textContent = '☀️ Mode Terang';
      localStorage.setItem('darkMode', 'enabled');
    } else {
      darkModeToggle.textContent = '🌙 Mode Gelap';
      localStorage.setItem('darkMode', 'disabled');
    }
  });

  // Cek dark mode sebelumnya
  if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    darkModeToggle.textContent = '☀️ Mode Terang';
  }
}

// Event Listener untuk form pencarian
const searchForm = document.getElementById('searchForm');
const searchResults = document.getElementById('searchResults');

if (searchForm && searchResults) {
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
}

// // Event Listener untuk tombol kategori perangkat
// const seriesButtons = document.querySelectorAll('.btn-series');
// const deviceDetails = document.getElementById('deviceDetails');

// if (seriesButtons.length > 0 && deviceDetails) {
//   seriesButtons.forEach(button => {
//     button.addEventListener('click', function() {
//       const series = this.closest('.card').getAttribute('data-series');
//       const data = deviceData[series];
      
//       let html = `<h4>${data.title}</h4>`;
//       html += `<p>${data.description}</p>`;
//       html += '<h5>Model Terbaru:</h5>';
//       html += '<div class="models-grid">';
      
//       data.models.forEach(model => {
//         html += `
//           <div class="model-card">
//             <h6>${model.name}</h6>
//             <p><strong>Tahun:</strong> ${model.year}</p>
//             <p><strong>Layar:</strong> ${model.display}</p>
//             <p><strong>Kamera:</strong> ${model.camera}</p>
//           </div>
//         `;
//       });
      
//       html += '</div>';
//       deviceDetails.innerHTML = html;
//     });
//   });
// }

// Event Listener untuk perbandingan perangkat
const compareBtn = document.getElementById('compareBtn');
const comparisonResult = document.getElementById('comparisonResult');

if (compareBtn && comparisonResult) {
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
      <div class="comparison-header">
        <h4>Perbandingan Spesifikasi</h4>
      </div>
      <div class="comparison-table">
        <table>
          <thead>
            <tr>
              <th>Spesifikasi</th>
              <th>${data1.name}</th>
              <th>${data2.name}</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Layar</td>
              <td>${data1.display}</td>
              <td>${data2.display}</td>
            </tr>
            <tr>
              <td>Prosesor</td>
              <td>${data1.processor}</td>
              <td>${data2.processor}</td>
            </tr>
            <tr>
              <td>RAM</td>
              <td>${data1.ram}</td>
              <td>${data2.ram}</td>
            </tr>
            <tr>
              <td>Penyimpanan</td>
              <td>${data1.storage}</td>
              <td>${data2.storage}</td>
            </tr>
            <tr>
              <td>Kamera</td>
              <td>${data1.camera}</td>
              <td>${data2.camera}</td>
            </tr>
            <tr>
              <td>Baterai</td>
              <td>${data1.battery}</td>
              <td>${data2.battery}</td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>${data1.price}</td>
              <td>${data2.price}</td>
            </tr>
          </tbody>
        </table>
      </div>
    `;
    
    comparisonResult.innerHTML = html;
  });
}

// Event Listener untuk form kontak
const contactForm = document.getElementById('contactForm');
const formStatus = document.getElementById('formStatus');

if (contactForm && formStatus) {
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
}

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

// Fungsi untuk menangani query string
function getQueryParam(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

// Contoh penggunaan query string
const searchQuery = getQueryParam('q');
if (searchQuery) {
  console.log('Query pencarian:', searchQuery);
  // Isi field pencarian dengan query dari URL
  const searchInput = document.getElementById('q');
  if (searchInput) {
    searchInput.value = searchQuery;
    
    // Trigger pencarian otomatis
    if (searchForm) {
      const submitEvent = new Event('submit');
      searchForm.dispatchEvent(submitEvent);
    }
  }
}

// Tambahan styling untuk model grid
const style = document.createElement('style');
style.textContent = `
  .models-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
  }
  
  .model-card {
    background: #f5f5f7;
    padding: 1rem;
    border-radius: 8px;
    border-left: 3px solid #1428a0;
  }
  
  .model-card h6 {
    margin: 0 0 0.5rem 0;
    color: #1428a0;
  }
  
  .model-card p {
    margin: 0.2rem 0;
    font-size: 0.9rem;
  }
  
  .comparison-table {
    overflow-x: auto;
    margin-top: 1rem;
  }
  
  .comparison-table table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .comparison-table th, .comparison-table td {
    padding: 0.8rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  .comparison-table th {
    background-color: #1428a0;
    color: white;
  }
  
  .comparison-table tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  body.dark-mode .comparison-table tr:nth-child(even) {
    background-color: #3d3d3d;
  }
  
  body.dark-mode .model-card {
    background-color: #3d3d3d;
  }
`;
document.head.appendChild(style);