<?php
 include_once("_conexao.php");


 if($_POST["tabela"] == 'Usuarios'){
     CadastraUsuarios($_POST["input_usuario_id"], $_POST["input_username"],  $_POST["input_matricula"], $_POST["input_email"], $_POST["input_senha"], );
     header("Location: UsuariosSelect.php");  
}


if ($_POST["tabela"] == 'Chamado') {
     
     $codigo = getNextCodigo();
     $data_abertura = date('Y-m-d'); 
     $data_fechamento = '0001-01-01';
     $status = 'Aberto'; 
     CadastraChamado($codigo, $_POST["input_usuario_id"], $_POST["input_tipo_chamado_id"], $_POST["input_titulo"], $_POST["input_descricao"], $_POST["input_tipo_equip_id"], $_POST["input_id_equip"], $_POST["input_setor"], $_POST["input_classificar"], $status, $data_abertura, $data_fechamento );
     header("Location: Aberto.php");
 }

if($_POST["tabela"] == 'Tipo_Chamado'){
     CadastraTipoChamado($_POST["input_tipo_chamado_id"], $_POST["input_tipoChamado"], );
     header("Location: TipoChamadoSelect.php"); 
}

if($_POST["tabela"] == 'Equipamento'){
     CadastraEquipamento($_POST["input_id_equip"], $_POST["input_tipo_equip_id"], $_POST["input_nomeModelo"], $_POST["input_nSerie"], $_POST["input_data_aquisicao"],);
     header("Location: EquipamentoSelect.php"); 
}

if($_POST["tabela"] == 'Tipo_Equipamento'){
      CadastraTipoEquipamento($_POST["input_tipo_equip_id"], $_POST["input_tipoEquipamento"],);
      header("Location: TipoEquipSelect.php"); 
 }



function getNextCodigo() {
     $conexao = conectaBD();
     $sql = "SELECT MAX(id_chamado) AS max_codigo FROM Chamado";
     $result = mysqli_query($conexao, $sql);
     $row = mysqli_fetch_assoc($result);
     $max_codigo = $row['max_codigo'];
     desconectaBD($conexao);
     return $max_codigo + 1;
 }


// ---------------------------------
function CadastraUsuarios($usuario_id, $username, $matricula, $email, $senha ){
     $conexao = conectaBD();  
  
     $dados= "INSERT INTO Usuarios (usuario_id, username, matricula, email, senha) VALUES ({$usuario_id}, '{$username}','{$matricula}','{$email}', '{$senha}')";
     mysqli_query($conexao,$dados) or die(mysqli_error());
  
     echo "Cadastro com Sucesso!";
  
     desconectaBD($conexao);
  }


// ---------------------------------
function CadastraChamado($id_chamado, $usuario_id, $tipo_chamado_id, $titulo, $descricao, $tipo_equip_id, $id_equip, $setor, $classificar, $status, $data_abertura, $data_fechamento) {
     $conexao = conectaBD();
     $dados = "INSERT INTO Chamado (id_chamado, usuario_id, tipo_chamado_id, titulo, descricao, tipo_equip_id, id_equip, setor, classificar, status, data_abertura, data_fechamento) 
               VALUES ({$id_chamado}, {$usuario_id}, {$tipo_chamado_id}, '{$titulo}', '{$descricao}', {$tipo_equip_id}, {$id_equip}, '{$setor}', '{$classificar}', '{$status}', '{$data_abertura}','{$data_fechamento}')";
     mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
     echo "Cadastro com Sucesso!";
     desconectaBD($conexao);
 }
 

// ---------------------------------
function CadastraTipoChamado($tipo_chamado_id, $tipoChamado){
      $conexao = conectaBD();  
   
      $dados= "INSERT INTO Tipo_Chamado(tipo_chamado_id, tipoChamado) VALUES ({$tipo_chamado_id},'{$tipoChamado}')";
      mysqli_query($conexao,$dados) or die(mysqli_error());
   
      echo "Cadastro com Sucesso!";
   
      desconectaBD($conexao);
}

// ---------------------------------
function CadastraEquipamento($id_equip, $tipo_equip_id, $nomeModelo, $nSerie, $data_aquisicao) {
     $conexao = conectaBD();  
 
     // Verifica se a data está no formato correto
     if (DateTime::createFromFormat('Y-m-d', $data_aquisicao) !== FALSE) {
         $dados = "INSERT INTO Equipamento (id_equip, tipo_equip_id, nomeModelo, nSerie, data_aquisicao) 
                   VALUES ({$id_equip}, {$tipo_equip_id}, '{$nomeModelo}', '{$nSerie}', '{$data_aquisicao}')";
         mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
 
         echo "Cadastro com Sucesso!";
     } else {
         echo "Data inválida!";
     }
 
     desconectaBD($conexao);
 }
 

// ---------------------------------
 function CadastraTipoEquipamento($tipo_equip_id, $tipoEquipamento){
          $conexao = conectaBD();  
       
          $dados= "INSERT INTO Tipo_Equipamento(tipo_equip_id, tipoEquipamento) VALUES ({$tipo_equip_id},'{$tipoEquipamento}')";
          mysqli_query($conexao,$dados) or die(mysqli_error());
       
          echo "Cadastro com Sucesso!";
          header("Location: TipoEquipSelect.php");
       
          desconectaBD($conexao);
}


?>

