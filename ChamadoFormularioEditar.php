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
      width: 60%;
      margin: auto;
    }

    </style>
</head>
<body>

   <?php
      $get1 = filter_input(INPUT_GET, "var_titulo");
      $get2 = filter_input(INPUT_GET, "var_descricao");
      $get3 = filter_input(INPUT_GET, "var_setor");
      $get4 = filter_input(INPUT_GET, "var_classificar");
      $get5 = filter_input(INPUT_GET, "var_id_chamado");
   ?>

   <div class="container">
      <h2>Tela de Edição de Chamado</h2>

      <form action="_update.php" method="post">
        <fieldset>
          <legend>Cadastro:</legend>

          <input type="hidden" name="tabela" value="Chamado">
          <input type="hidden" name="input_id_chamado" value="<?php echo $get5 ?>">
          <input type="hidden" name="input_status" value="fechado">

          
          <label for="input_titulo">Título:</label>
          <input type="text" name="input_titulo" value="<?php echo $get1?>">

          <label for="input_descricao">Descrição:</label>
          <textarea name="input_descricao" rows="3"><?php echo $get2?></textarea>

          <label for="input_setor">Selecionar Setor:</label>
          <select name="input_setor">
            <option value="TI" <?php if($get3 == "TI") echo 'selected'; ?>>TI</option>
            <option value="Recursos Humanos" <?php if($get3 == "Recursos Humanos") echo 'selected'; ?>>Recursos Humanos</option>
            <option value="Financeiro" <?php if($get3 == "Financeiro") echo 'selected'; ?>>Financeiro</option>
            <option value="Marketing" <?php if($get3 == "Marketing") echo 'selected'; ?>>Marketing</option>
            <option value="Vendas" <?php if($get3 == "Vendas") echo 'selected'; ?>>Vendas</option>
            <option value="Logística" <?php if($get3 == "Logística") echo 'selected'; ?>>Logística</option>
            <option value="Produção" <?php if($get3 == "Produção") echo 'selected'; ?>>Produção</option>
            <option value="Compras" <?php if($get3 == "Compras") echo 'selected'; ?>>Compras</option>
          </select>

          <label for="input_classificar">Classificação do Chamado:</label>
          <select name="input_classificar">
            <option value="urgente" <?php if($get4 == "urgente") echo 'selected'; ?>>Urgente</option>
            <option value="alta prioridade" <?php if($get4 == "alta prioridade") echo 'selected'; ?>>Alta Prioridade</option>
            <option value="média prioridade" <?php if($get4 == "média prioridade") echo 'selected'; ?>>Média Prioridade</option>
            <option value="baixa prioridade" <?php if($get4 == "baixa prioridade") echo 'selected'; ?>>Baixa Prioridade</option>
            <option value="suporte técnico" <?php if($get4 == "suporte técnico") echo 'selected'; ?>>Suporte Técnico</option>
            <option value="acesso" <?php if($get4 == "acesso") echo 'selected'; ?>>Solicitação de Acesso</option>
            <option value="software" <?php if($get4 == "software") echo 'selected'; ?>>Problema de Software</option>
            <option value="hardware" <?php if($get4 == "hardware") echo 'selected'; ?>>Problema de Hardware</option>
            <option value="sugestão" <?php if($get4 == "sugestão") echo 'selected'; ?>>Sugestão</option>
            <option value="reclamação" <?php if($get4 == "reclamação") echo 'selected'; ?>>Reclamação</option>
          </select>

          <input type="submit" value="Salvar">
        </fieldset>
      </form>
   </div>

</body>
</HTML>

