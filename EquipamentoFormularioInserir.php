<!DOCTYPE HTML>
<HTML>
<<<<<<< HEAD
<meta charset="utf-8"/>
<head>
<style>
        /* Estilo para o botão 'Voltar Home' */
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

=======
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
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d
    </style>
  </head>
<meta charset="utf-8"/>
<BODY>
   <b><font color="#">Cadastrar novo Equipamento</font></b>    
      </br> </br>   

    <form action="_insert.php" method="post">
    <fieldset>
<<<<<<< HEAD
=======
      <legend>Cadastro:</legend>
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d

        <input type=hidden name=tabela value="Equipamento">

        <b> Código:</b> <input type="text" name="input_id_equip" size="8">
          </br></br>


          <b> Tipo Equipamento:</b> 
        <select name="input_tipo_equip_id">
        <?php
include_once("_conexao.php");
$conn = conectaBD();
$sql = "SELECT 
    t.tipo_equip_id, 
    t.tipoEquipamento 
FROM 
    Tipo_Equipamento t";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["tipo_equip_id"] . "'>" . $row["tipoEquipamento"] . "</option>";
    }
} else {
    echo "<option value=''>Nenhum tipo de equipamento encontrado</option>";
}

$conn->close();
?>
        </select>
          </br></br>




        <b> Nome modelo:</b> <input type="text" name="input_nomeModelo" size="25">
          </br></br>

        <b> nSerie:</b> <input type="text" name="input_nSerie" size="10">
          </br></br>

        <b> data aquisicao:</b> <input type="date" name="input_data_aquisicao" placeholder="dd-mm-yyyy" value="" min="1900-01-01" max="2090-12-31"  size="20">
          </br></br>

          </br></br>
<<<<<<< HEAD
          <div class="form-group">
                    <a href="indexTI.html" class="btn-home">Cancelar</a>
                    <input type="reset" value="Resetar">
                    <input type="submit" value="Cadastrar">
                </div>
=======
        <input type="reset" value="Reset">   <input type="submit" value="Cadastrar">
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d
    </fieldset>
   </form>

</BODY>
</HTML>