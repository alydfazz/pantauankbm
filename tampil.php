<?php
header("Content-Type: application/json");
include "koneksi.php";
$result = $conn->query("SELECT * FROM kehadiran ORDER BY tanggal DESC");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
