<?php
include_once("_conexao.php");
$conn = conectaBD();

$tipo_equip_id = $_POST['tipo_equip_id'];

$sql = "SELECT id_equip, nomeModelo FROM Equipamento WHERE tipo_equip_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tipo_equip_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id_equip"] . "'>" . $row["nomeModelo"] . "</option>";
    }
} else {
    echo "<option value=''>Nenhum equipamento encontrado</option>";
}

$conn->close();
?>

