<?php
 include_once("_conexao.php");

 if($_POST["tabela"] == 'Pedido'){
      editaPedido($_POST["input_id"], $_POST["input_codigo"], $_POST["input_nome"], $_POST["input_data"], $_POST["input_valorTotal"], $_POST["input_quantidade"], $_POST["input_cod_Produto"], $_POST["input_id_localEntregar"]);
      header("Location: PedidoSelect.php"); 
 }


 if($_POST["tabela"] == 'produto'){
      editaProduto($_POST["input_cod_Produto"], $_POST["input_nome"], $_POST["input_preco"], $_POST["input_qtdEstoque"], $_POST["input_cod_Servico"]);
      header("Location: ProdutoSelect.php");
 }


 if($_POST["tabela"] == 'Servico'){
      editaServico($_POST["input_cod"], $_POST["input_nome"], $_POST["input_descricao"],$_POST["input_preco"]);
      header("Location: ServicoSelect.php");
 }


// --------------------------------- 
 function editaPedido($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8){
   $conexao = conectaBD();  

   $dados= "UPDATE Pedido 
            SET    Codigo = '{$p2}',
                   nome = '{$p3}',
                   data = '{$p4}',
                   valorTotal = '{$p5}',
                   quantidade = '{$p6}',
                   cod_Produto = '{$p7}',
                   id_localEntregar = '{$p8}'
            WHERE  id = '{$p1}'";

   mysqli_query($conexao, $dados) or die(mysqli_error());

   echo "Editado com Sucesso!";

   desconectaBD($conexao);
 }

// ---------------------------------
 function editaCliente($p1, $p2, $p3, $p4, $p5){
   $conexao = conectaBD();  

   $dados= "UPDATE Cliente 
            SET    Nome = ('{$p2}')
            WHERE  codigo = '{$p1}'";

   echo $dados;

   $dados= "UPDATE Cliente
            SET    Nome = '{$p2}', Telefone = '{$p3}', Endereco = '{$p4}', Email = '{$p5}'
            WHERE  codigo = '{$p1}'";

   echo $dados;
   
   mysqli_query($conexao, $dados) or die(mysqli_error());

   echo "Editado com Sucesso!";

   desconectaBD($conexao);
 }

// ---------------------------------
function editaProduto($p1, $p2, $p3, $p4, $p5){
   $conexao = conectaBD();  

  $dados= "UPDATE  Produto 
            SET    nome = '{$p2}', preco = '{$p3}', 
                   qtdEstoque = '{$p4}', cod_Servico = '{$p5}'
            WHERE  cod_Produto = '{$p1}'";

   echo $dados;
   
   mysqli_query($conexao, $dados) or die(mysqli_error());
   

   echo "Editado com Sucesso!";

   desconectaBD($conexao);
 }

// --------------------------------- 
function editaLocalEntregar($p1, $p2){
     $conexao = conectaBD();  
   
     $dados= "UPDATE LocalEntregar
              SET    dataEntregar = '{$p2}'
              WHERE  id_LocalEntregar = '{$p1}'";
  
     echo $dados;
     
     mysqli_query($conexao, $dados) or die(mysqli_error());
  
     echo "Editado com Sucesso!";
  
     desconectaBD($conexao);
   }

// ---------------------------------
 function editaServico($p1, $p2, $p3, $p4){
   $conexao = conectaBD();  

  $dados= "UPDATE  Servico
            SET    nome = '{$p2}', descricao = '{$p3}', 
                   preco = '{$p4}'
            WHERE  cod_Servico = {$p1}";

   echo $dados;  
   
   mysqli_query($conexao, $dados) or die(mysqli_error());

   echo "Editado com Sucesso!";

   desconectaBD($conexao);
 }


 // ---------------------------------
 function editaItemCompra($p1, $p2, $p3, $p4){
   $conexao = conectaBD();  

  $dados= "UPDATE  Itens 
            SET    QtdVenda = {$p3}, 
                   PrecoVenda = '{$p4}'
            WHERE  numCompra = {$p1} and codProduto = {$p2}";


   echo $dados;
   
   mysqli_query($conexao, $dados) or die(mysqli_error());

   echo "Editado com Sucesso!";

   desconectaBD($conexao);
 }

?>