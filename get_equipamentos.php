<?php
include_once("_conexao.php");
$conn = conectaBD();

$tipo_equip_id = $_GET['tipo_equip_id'];

$sql = "SELECT id_equip, nomeModelo FROM Equipamento WHERE tipo_equip_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tipo_equip_id);
$stmt->execute();
$result = $stmt->get_result();

$equipamentos = array();
while ($row = $result->fetch_assoc()) {
    $equipamentos[] = $row;
}

echo json_encode($equipamentos);

$conn->close();
?>
