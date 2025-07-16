<?php
header("Content-Type: application/json");
include "koneksi.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$piketStatus = $data['piketStatus'];
$piketHandler = $data['piketHandler'];

$stmt = $conn->prepare("UPDATE kehadiran SET piketStatus = ?, piketHandler = ? WHERE id = ?");
$stmt->bind_param("ssi", $piketStatus, $piketHandler, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}
?>