CREATE DATABASE IF NOT EXISTS jurnal_kbm;
USE jurnal_kbm;
CREATE TABLE IF NOT EXISTS kehadiran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kelas VARCHAR(50),
    tanggal DATE,
    jam_mulai INT,
    jam_selesai INT,
    nama_guru VARCHAR(100),
    status VARCHAR(50),
    no_hp VARCHAR(20),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
