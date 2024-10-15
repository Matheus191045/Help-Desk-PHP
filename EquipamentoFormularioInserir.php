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
   <b><font color="#">Cadastrar novo Equipamento</font></b>    
      </br> </br>   

    <form action="_insert.php" method="post">
    <fieldset>
      <legend>Cadastro:</legend>

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
        <input type="reset" value="Reset">   <input type="submit" value="Cadastrar">
    </fieldset>
   </form>

</BODY>
</HTML>