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
      $get1 = filter_input(INPUT_GET, "var_tipoEquipamento");
      $get2 = filter_input(INPUT_GET, "var_nomeModelo");
      $get3 = filter_input(INPUT_GET, "var_nSerie");
      $get4 = filter_input(INPUT_GET, "var_data_aquisicao");
    ?>


   <b><font color="#">Tela de Edição de Equipamento</font></b>    
      </br> </br>   

    <form action="_update.php" method="post">
   <fieldset>
      <legend>Cadastro:</legend>

      <input type=hidden name=tabela value="Equipamento">

      <b> Tipo Equipamento:</b> <input type="text" name="input_tipoEquipamento" size="8" value="<?php echo $get1?>">
       </br></br>

      <b> Nome Modelo:</b> <input type="text" name="input_nomeModelo" size="30" value="<?php echo $get2?>">
       </br></br>  

      <b> nSerie:</b> <input type="text" name="input_nSerie" size="20" value="<?php echo $get3?>">
       </br></br>  

      <b> data aquisicao:</b> <input type="date" name="input_data_aquisicao" size="30" value="<?php echo $get4?>">
       </br></br>  

      <input type="submit" value="Salvar">
   </fieldset>
   </form>

</BODY>
</HTML>  