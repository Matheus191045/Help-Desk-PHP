<?php
 include_once("_conexao.php");

 $get1 = (string)filter_input(INPUT_GET, "tabela");
 $get2 = filter_input(INPUT_GET, "var_cod");
 
if($get1 == 'Chamado'){
   excluirChamado($get2);
<<<<<<< HEAD
   header("Location: Aberto.php");
=======
   header("Location: ChamadoSelect.php");
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d
}  

if($get1 == 'Tipo_Chamado'){
   excluirTipoChamado($get2);
   header("Location: TipoChamadoSelect.php");
}  

 if($get1 == 'Equipamento'){
    excluirEquipamento($get2);
    header("Location: EquipamentoSelect.php");
 }    


if($get1 == 'Tipo_Equipamento'){
    excluirTipoEquipamento($get2);
    header("Location: TipoEquipSelect.php");
 }   


 

 function excluirCliente($p){
   $conexao = conectaBD();  

<<<<<<< HEAD
   $dados= "DELETE FROM Usuarios
            WHERE  usuario_id = '{$p}'";
=======
   $dados= "DELETE FROM Cliente
            WHERE  codigo = '{$p}'";
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d

   mysqli_query($conexao,$dados) or die(mysqli_error());

   echo "Excluído com Sucesso!";

   desconectaBD($conexao);
}

// ---------------------------------
 function excluirChamado($p){
   $conexao = conectaBD();  

   $dados= "DELETE FROM Chamado 
            WHERE  id_chamado = '{$p}'";

   mysqli_query($conexao,$dados) or die(mysqli_error());

   echo "Excluído com Sucesso!";

   desconectaBD($conexao);
}

// ---------------------------------


 function excluirTipoChamado($p){
   $conexao = conectaBD();  

   $dados= "DELETE FROM Tipo_Chamado 
            WHERE  tipo_chamado_id = {$p}";

   mysqli_query($conexao,$dados) or die(mysqli_error());


   echo "Excluído com Sucesso!";

   desconectaBD($conexao);
}

// ---------------------------------

function excluirEquipamento($p){
   $conexao = conectaBD();  

   $dados= "DELETE FROM Equipamento 
            WHERE  id_equip = '{$p}'";

   mysqli_query($conexao,$dados) or die(mysqli_error());

   echo "Excluído com Sucesso!";

   desconectaBD($conexao);
}

// ---------------------------------

function excluirTipoEquipamento($p){
   $conexao = conectaBD();  

   $dados= "DELETE FROM Tipo_Equipamento 
            WHERE  tipo_equip_id = '{$p}'";

   mysqli_query($conexao,$dados) or die(mysqli_error());

   echo "Excluído com Sucesso!";

   desconectaBD($conexao);
}

<<<<<<< HEAD
?>


=======
?>
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d
