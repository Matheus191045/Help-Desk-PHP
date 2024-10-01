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
    <script>
    function toggleEquipamentoField() {
        var tipoChamado = document.querySelector('select[name="input_tipo_chamado_id"]').value;
        var equipamentoField = document.getElementById('equipamentoField');
        if (tipoChamado === '55') {
            equipamentoField.style.display = 'block';
        } else {
            equipamentoField.style.display = 'none';
        }
    }
    </script>
</head>
<meta charset="utf-8"/>
<BODY>
   <b><font color="#">Cadastrar Chamado</font></b>    
      </br> </br>   

    <form action="_insert.php" method="post">
    <fieldset>
      <legend>Cadastro:</legend>

        <input type="hidden" name="tabela" value="Chamado">

        <b> Codigo:</b> <input type="text" name="input_id_chamado" size="30" readonly>
          </br></br>

        <b> Usuario:</b> <input type="text" name="input_usuario_id" size="30">
          </br></br>

        <b> Tipo Chamado:</b> 
        <select name="input_tipo_chamado_id" onchange="toggleEquipamentoField()">
        <?php
include_once("_conexao.php");
$conn = conectaBD();
$sql = "SELECT 
    tc.tipo_chamado_id, 
    tc.tipoChamado 
FROM 
    Tipo_Chamado tc";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["tipo_chamado_id"] . "'>" . $row["tipoChamado"] . "</option>";
    }
} else {
    echo "<option value=''>Nenhum tipo Chamado encontrado</option>";
}

$conn->close();
?>
        </select>
          </br></br>


          <div id="equipamentoField" style="display:none;">
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

          <b> Selecionar Equipamento:</b> 
          <select name="input_id_equip">
          <?php
include_once("_conexao.php");
$conn = conectaBD();
$sql = "SELECT 
    e.id_equip, 
    e.nomeModelo 
FROM 
    Equipamento e";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id_equip"] . "'>" . $row["nomeModelo"] . "</option>";
    }
} else {
    echo "<option value=''>Nenhum equipamento encontrado</option>";
}

$conn->close();
?>
          </select>
          </br></br>
          </div>


        <b> Título:</b> <input type="text" name="input_titulo" size="50">
          </br></br>

        <b> Descrição:</b> <input type="text" name="input_descricao" size="30">
          </br></br>

        <b> Selecionar Setor:</b> <input type="text" name="input_setor" size="10">
          </br></br>

        <b> Classificação do Chamado:</b> <input type="text" name="input_classificar" size="10">
          </br></br>

          <b> Abertura:</b> <input type="hidden" name="input_data_abertura" size="10">


        <b> Fechamento:</b> <input type="date" name="input_data_fechamento" size="10">
          </br></br>

        <input type="reset" value="Reset">   <input type="submit" value="Cadastrar">
    </fieldset>
   </form>
   <a href="index.html">Voltar Home</a>
</BODY>
</HTML>



