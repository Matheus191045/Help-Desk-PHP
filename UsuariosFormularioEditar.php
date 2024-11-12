<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      
      .btn-home {
          background-color: #4CAF50;
          color: white;
          padding: 8px 20px;
          border: none;
          border-radius: 4px;
          text-decoration: none;
          display: inline-block;
          cursor: pointer;
          text-align: center;
          font-size: 14px;
      }

      .btn-home:hover {
          background-color: #45a049;
      }

      body {
          background-color: #f4f4f4;
          font-family: Arial, sans-serif;
          padding: 20px;
      }

      .form-container {
          max-width: 700px;
          margin: auto;
          background-color: #fff;
          padding: 20px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          border-radius: 8px;
      }

      fieldset {
          border: 1px solid #ddd;
          padding: 20px;
          border-radius: 8px;
          margin-bottom: 20px;
      }

      legend {
          background-color: #4CAF50;
          color: white;
          padding: 5px 10px;
          border-radius: 4px;
          font-size: 1.2em;
      }

      .form-group {
          margin-bottom: 15px;
      }

      label {
          font-weight: bold;
          display: block;
          margin-bottom: 5px;
      }

      input[type="text"], select {
          width: 100%;
          padding: 8px;
          margin-top: 5px;
          border: 1px solid #ccc;
          border-radius: 4px;
      }

      input[type="submit"], input[type="reset"] {
          background-color: #4CAF50;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
      }

      input[type="submit"]:hover, input[type="reset"]:hover {
          background-color: #45a049;
      }

      #message {
          display: none;
          color: red;
          margin-bottom: 15px;
      }

      @media (max-width: 600px) {
          .form-container {
              padding: 15px;
          }

          input[type="submit"], input[type="reset"] {
              width: 100%;
              margin-top: 10px;
          }

          .btn-home {
              width: 100%;
              margin-top: 10px;
          }
      }

    </style>
  </head>
  <body>

  <?php
      $get1 = filter_input(INPUT_GET, "var_username");
      $get2 = filter_input(INPUT_GET, "var_matricula");
      $get3 = filter_input(INPUT_GET, "var_email");
      $get4 = filter_input(INPUT_GET, "var_senha");
      $get5 = filter_input(INPUT_GET, "var_usuario_id");
   ?>

    <div class="form-container">
      <h2>Tela de Edição de Usuario</h2>    
      <form action="_updateTI.php" method="post">
        <fieldset>
          <input type="hidden" name="tabela" value="Usuarios">
          <input type="hidden" name="input_usuario_id" value="<?php echo $get5 ?>">
           
          <b>Nome:</b> <input type="text" name="input_username" size="30" value="<?php echo $get1 ?>">
          </br></br> 

          <b>Matrícula:</b> <input type="text" name="input_matricula" size="30" value="<?php echo $get2 ?>">
          </br></br>

          <b>Email:</b> <input type="text" name="input_email" size="30" value="<?php echo $get3 ?>">
          </br></br>

          <b>Senha:</b> <input type="text" name="input_senha" size="30" value="<?php echo $get4 ?>">
          </br></br>
          
          <a href="UsuariosSelect.php" class="btn-home">Cancelar</a>
          <input type="submit" value="Salvar">
        </fieldset>
      </form>
    </div>
  </body>
</html>


