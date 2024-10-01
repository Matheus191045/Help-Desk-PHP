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
      $get1 = filter_input(INPUT_GET, "var_tipoChamado");
   ?>


   <b><font color="#">Tela de edição tipo chamado</font></b>    
      </br> </br>   

    <form action="_update.php" method="post">
    <fieldset>
      <legend>Cadastro:</legend>

         <input type=hidden name=tabela value="Tipo_Chamado">

         <b> tipo chamado:</b> <input type="text" name="input_tipoChamado" size="8" value="<?php echo $get1?>">
            </br></br>
 
            
         <input type="submit" value="Salvar">
    </fieldset>
   </form>

</BODY>
</HTML>   
