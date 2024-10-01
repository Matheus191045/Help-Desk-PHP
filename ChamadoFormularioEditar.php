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
      $get2 = filter_input(INPUT_GET, "var_titulo");
      $get3 = filter_input(INPUT_GET, "var_descricao");
      $get4 = filter_input(INPUT_GET, "var_tipoEquipamento");
      $get5 = filter_input(INPUT_GET, "var_nomeModelo");
      $get6 = filter_input(INPUT_GET, "var_setor");
      $get7 = filter_input(INPUT_GET, "var_classificar");
   ?>


   <b><font color="#">Tela de edição</font></b>    
      </br> </br>   

    <form action="_update.php" method="post">
    <fieldset>
      <legend>Cadastro:</legend>

      <input type=hidden name=tabela value="Chamado">

      <b> Tipo Chamado:</b> <input type="text" name="input_tipoChamado" size="30" value="<?php echo $get1?>">
          </br></br>

        <b> Título:</b> <input type="text" name="input_titulo" size="50" value="<?php echo $get2?>">
          </br></br>

        <b> Descrição:</b> <input type="text" name="input_descricao" size="30" value="<?php echo $get3?>">
          </br></br>

        <b> Selecionar Tipo Equipamento:</b> <input type="text" name="input_tipoEquipamento" size="10" value="<?php echo $get4?>">
          </br></br>

        <b> Selecionar Equipamento:</b> <input type="text" name="input_nomeModelo" size="10" value="<?php echo $get5?>">
          </br></br>

        <b> Selecionar Setor:</b> <input type="text" name="input_setor" size="10" value="<?php echo $get6?>">
          </br></br>

        <b> Classificação do Chamado:</b> <input type="text" name="input_classificar" size="10" value="<?php echo $get7?>">
          </br></br>

               
         <input type="submit" value="Salvar">
    </fieldset>
   </form>

</BODY>
</HTML>  