<?php
header("Content-Type: application/json");
include "koneksi.php";

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $conn->prepare("INSERT INTO kehadiran (kelas, tanggal, jam_mulai, jam_selesai, nama_guru, status, no_hp) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissss",
  $data['kelas'],
  $data['tanggal'],
  $data['jam_mulai'],
  $data['jam_selesai'],
  $data['nama_guru'],
  $data['status'],
  $data['no_hp']
);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}
?>