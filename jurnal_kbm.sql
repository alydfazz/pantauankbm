CREATE DATABASE IF NOT EXISTS jurnal_kbm;
USE jurnal_kbm;
CREATE TABLE IF NOT EXISTS kehadiran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kelas VARCHAR(50) NOT NULL,
    tanggal DATE NOT NULL,
    jam_mulai INT NOT NULL,
    jam_selesai INT NOT NULL,
    nama_guru VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    piketStatus VARCHAR(50) DEFAULT 'belum_ditangani',
    piketHandler VARCHAR(100) DEFAULT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);