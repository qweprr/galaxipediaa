-- galaxipedia.sql
CREATE DATABASE IF NOT EXISTS galaxipedia;
USE galaxipedia;

CREATE TABLE IF NOT EXISTS devices (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    series VARCHAR(50) NOT NULL,
    year INT(4) NOT NULL,
    display TEXT,
    camera TEXT,
    processor TEXT,
    ram VARCHAR(50),
    storage VARCHAR(100),
    battery VARCHAR(100),
    price VARCHAR(100),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Data contoh
INSERT INTO devices (name, series, year, display, camera, processor, ram, storage, battery, price, description) VALUES
('Galaxy S24 Ultra', 's', 2024, '6.8 inch Dynamic AMOLED 2X', '200MP + 50MP + 12MP + 10MP', 'Snapdragon 8 Gen 3', '12GB', '256GB/512GB/1TB', '5000mAh', 'Rp 17.999.000', 'Flagship terbaru dengan S Pen dan kamera 200MP'),
('Galaxy A54', 'a', 2023, '6.4 inch Super AMOLED', '50MP + 12MP + 5MP', 'Exynos 1380', '6GB/8GB', '128GB/256GB', '5000mAh', 'Rp 4.999.000', 'Mid-range terbaik dengan kamera utama 50MP'),
('Galaxy Z Fold5', 'z', 2023, '7.6 inch Dynamic AMOLED 2X (dalam) / 6.2 inch (luar)', '50MP + 12MP + 10MP', 'Snapdragon 8 Gen 2', '12GB', '256GB/512GB/1TB', '4400mAh', 'Rp 22.999.000', 'Smartphone lipat flagship dengan produktivitas maksimal');