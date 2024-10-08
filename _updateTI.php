<?php
include_once("_conexao.php");




if ($_POST["tabela"] == 'Chamado') {
  $data_fechamento = date('Y-m-d'); 
  editaChamado($_POST["input_id_chamado"], $_POST["input_comentario"], $_POST["input_status"], $data_fechamento);
  header("Location: AbertoTI.php");
}


if($_POST["tabela"] == 'Tipo_Chamado'){
  editaTipoChamado($_POST["input_tipo_chamado_id"], $_POST["input_tipoChamado"], );
  header("Location: TipoChamadoSelect.php"); 
}

if($_POST["tabela"] == 'Equipamento'){
  editaEquipamento($_POST["input_id_equip"], $_POST["input_tipo_equip_id"], $_POST["input_nomeModelo"], $_POST["input_nSerie"], $_POST["input_data_aquisicao"],);
  header("Location: EquipamentoSelect.php"); 
}

if($_POST["tabela"] == 'Tipo_Equipamento'){
  editaTipoEquipamento($_POST["input_tipo_equip_id"], $_POST["input_tipoEquipamento"],);
  header("Location: TipoEquipSelect.php"); 
}


// --------------------------------- 
function editaChamado($p1, $p2, $p3, $p4) {
  $conexao = conectaBD();

  $dados = "UPDATE Chamado
            SET  comentario = '{$p2}', status = '{$p3}', data_fechamento = '{$p4}'
            WHERE id_chamado = '{$p1}'";

mysqli_query($conexao, $dados) or die(mysqli_error($conexao));

echo "Editado com Sucesso!";

desconectaBD($conexao);
}


// ---------------------------------
function editaTipoChamado($p1, $p2) {
  $conexao = conectaBD();  

  $dados = "UPDATE Tipo_Chamado
            SET tipoChamado = '{$p2}'
            WHERE id_tipo_chamado = '{$p1}'";

  mysqli_query($conexao, $dados) or die(mysqli_error($conexao));

  echo "Editado com Sucesso!";

  desconectaBD($conexao);
}

// ---------------------------------
function editaEquipamento($p1, $p2, $p3, $p4, $p5) {
  $conexao = conectaBD();  

  $dados = "UPDATE Equipamento
            SET tipo_equip_id = '{$p2}', nomeModelo = '{$p3}', nSerie = '{$p4}', data_aquisicao = '{$p5}'
            WHERE id_equip = '{$p1}'";

  mysqli_query($conexao, $dados) or die(mysqli_error($conexao));

  echo "Editado com Sucesso!";

  desconectaBD($conexao);
}

// ---------------------------------
function editaTipoEquipamento($p1, $p2) {
  $conexao = conectaBD();  

  $dados = "UPDATE Tipo_Equipamento
            SET tipoEquipamento = '{$p2}'
            WHERE id_tipo_equip = '{$p1}'";

  mysqli_query($conexao, $dados) or die(mysqli_error($conexao));

  echo "Editado com Sucesso!";

  desconectaBD($conexao);
}
?>

