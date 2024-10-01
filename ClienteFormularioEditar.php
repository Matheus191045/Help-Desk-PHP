<!DOCTYPE HTML>
<HTML>
<head>
    <style>
    fieldset {
      background-color: #eeeeee;
    }
    
    legend {
      background-color: gray;
      color: white;
      padding: 5px 10px;
    }
    
    input {
      margin: 5px;
    }
    font {
      font-family: Arial, Helvetica, sans-serif;

    }
    </style>
  </head>
<meta charset="utf-8"/>
<BODY>
   <?php
      $get1 = filter_input(INPUT_GET, "var_cod");
      $get2 = filter_input(INPUT_GET, "var_nome");
      $get3 = filter_input(INPUT_GET, "var_telefone");
      $get4 = filter_input(INPUT_GET, "var_endereco");
      $get5 = filter_input(INPUT_GET, "var_email");
   ?>


   <b><font color="#">Tela de edição de dados do cliente</font></b>    
      </br> </br>   

    <form action="_update.php" method="post">
    <fieldset>
        <legend>Cadastro:</legend>

      <input type=hidden name=tabela value="cliente">

      <b> Código:</b> <input type="text" name="input_cod" size="8" value="<?php echo $get1?>" readonly>
         </br></br>

      <b> Nome:</b> <input type="text" name="input_nome" size="30" value="<?php echo $get2?>">
         </br></br>  

      <b> Telefone:</b> <input type="text" name="input_telefone" size="20" value="<?php echo $get3?>">
         </br></br>  

      <b> Endereço:</b> <input type="text" name="input_endereco" size="30" value="<?php echo $get4?>">
         </br></br>  
      
      <b> Email:</b> <input type="text" name="input_email" size="30" value="<?php echo $get5?>">
         </br></br>  
         
      <input type="submit" value="Salvar">
   </fieldset>
   </form>

</BODY>
</HTML>   
