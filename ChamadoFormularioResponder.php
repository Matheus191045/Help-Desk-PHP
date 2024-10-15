<!DOCTYPE HTML>
<HTML>
<head>
    <style>
    fieldset {
      background-color: #f4f4f4;
      border-radius: 8px;
      padding: 20px;
      width: 50%;
      margin: auto;
    }

    legend {
      background-color: #4CAF50;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
    }

    label {
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
    }

    input, select, textarea {
      margin: 10px 0;
      padding: 8px;
      width: 100%;
      box-sizing: border-box;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 20px;
    }

    .container {
      width: 100%;
      margin: auto;
    }

    </style>
</head>
<body>

   <?php
      $get1 = filter_input(INPUT_GET, "var_comentario");
      $get2 = filter_input(INPUT_GET, "var_status");
      $get3 = filter_input(INPUT_GET, "var_titulo");
      $get4 = filter_input(INPUT_GET, "var_descricao");
      $get5 = filter_input(INPUT_GET, "var_setor");
      $get6 = filter_input(INPUT_GET, "var_classificar");
      $get7 = filter_input(INPUT_GET, "var_id_chamado");
   ?>

   <div class="container">
      <h2>Responder ao Chamado do Usuário</h2>

      <form action="_updateTI.php" method="post">
        <fieldset>
          <legend>Responder:</legend>

          <input type="hidden" name="tabela" value="Chamado">
          <input type="hidden" name="input_id_chamado" value="<?php echo $get7 ?>">
          

          <label for="input_comentario">Comentário:</label>
          <textarea name="input_comentario" rows="4" cols="50"><?php echo $get1?></textarea>

    
          <label for="input_status">Situação:</label>
          <select name="input_status">
            <option value="Andamento" <?php if($get2 == "Andamento") echo 'selected'; ?>>Em andamento</option>
            <option value="Fechado" <?php if($get2 == "Fechado") echo 'selected'; ?>>Fechado</option>
          </select>

          <!-- <label for="input_username">Usuário:</label>
          <input type="text" name="input_username" value=" readonly> -->

          <label for="input_titulo">Título:</label>
          <input type="text" name="input_titulo" value="<?php echo $get3?>" readonly>

          <label for="input_descricao">Descrição:</label>
          <textarea name="input_descricao" rows="3" readonly><?php echo $get4?></textarea>


          <label for="input_setor">Setor:</label>
          <input type="text" name="input_setor" value="<?php echo $get5?>" readonly>

          <label for="input_classificar">Classificação:</label>
          <input type="text" name="input_classificar" value="<?php echo $get6?>" readonly>
        
          <input type="submit" value="Salvar">
        </fieldset>
      </form>
   </div>

</body>
</HTML>
