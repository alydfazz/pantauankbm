<?php
header("Content-Type: application/json");
include "koneksi.php";

$result = $conn->query("SELECT id, kelas, tanggal, jam_mulai, jam_selesai, nama_guru, status, no_hp, piketStatus, piketHandler FROM kehadiran ORDER BY tanggal DESC");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
