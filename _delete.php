<?php
include_once("_conexao.php");

$get1 = (string)filter_input(INPUT_GET, "tabela");
$get2 = filter_input(INPUT_GET, "var_cod");

$page = filter_input(INPUT_GET, "page"); 

if ($get1 == 'Chamado') {
    excluirChamado($get2);
    switch ($page) {
        case 'Aberto':
            header("Location: Aberto.php");
            break;
        case 'AbertoTI':
            header("Location: AbertoTI.php");
            break;
        case 'Fechado':
            header("Location: Fechado.php");
            break;
        case 'FechadoTI':
            header("Location: FechadoTI.php");
            break;
        default:
            header("Location: Aberto.php"); 
            break;
    }
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


 ?>