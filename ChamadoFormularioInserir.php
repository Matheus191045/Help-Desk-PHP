<!DOCTYPE HTML>
<HTML lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
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

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script>
        function updateEquipamentoList() {
            var tipoEquipId = document.querySelector('select[name="input_tipo_equip_id"]').value;
            var equipamentoSelect = document.querySelector('select[name="input_id_equip"]');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'get_equipamentos.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status == 200) {
                    equipamentoSelect.innerHTML = this.responseText;
                }
            };
            xhr.send('tipo_equip_id=' + tipoEquipId);
        }

        function validateForm() {
            var usuario = document.querySelector('input[name="input_usuario_id"]').value;
            if (!usuario) {
                document.getElementById('message').innerText = "Por favor, insira o nome do usuário.";
                document.getElementById('message').style.display = 'block';
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="form-container">
        <div id="message"></div>
        <form action="_insert.php" method="post" onsubmit="return validateForm()">
            <fieldset>
                <legend>Cadastro de Chamado</legend>
                <input type="hidden" name="tabela" value="Chamado">
                <input type="hidden" name="input_usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
                <div class="form-group">
                    <label for="input_tipo_chamado_id">Tipo de Chamado:</label>
                    <select name="input_tipo_chamado_id" id="input_tipo_chamado_id">
                        <?php
                        include_once("_conexao.php");
                        $conn = conectaBD();
                        $sql = "SELECT tc.tipo_chamado_id, tc.tipoChamado FROM Tipo_Chamado tc";
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
                </div>
                <div id="equipamentoField" class="form-group">
                    <label for="input_tipo_equip_id">Tipo de Equipamento:</label>
                    <select name="input_tipo_equip_id" id="input_tipo_equip_id" onchange="updateEquipamentoList()">
                        <?php
                        include_once("_conexao.php");
                        $conn = conectaBD();
                        $sql = "SELECT tipo_equip_id, tipoEquipamento FROM Tipo_Equipamento";
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
                </div>
                <div class="form-group">
                    <label for="input_id_equip">Selecionar Equipamento:</label>
                    <select name="input_id_equip" id="input_id_equip">
                        <option value=''>Selecione um tipo de equipamento primeiro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input_titulo">Título:</label>
                    <input type="text" name="input_titulo" id="input_titulo" size="50">
                </div>
                <div class="form-group">
                    <label for="input_descricao">Descrição:</label>
                    <textarea name="input_descricao" id="input_descricao" rows="3" cols="86"></textarea>
                </div>
                <div class="form-group">
                    <label for="input_setor">Selecionar Setor:</label>
                    <select name="input_setor" id="input_setor">
                        <option value="TI">TI</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Vendas">Vendas</option>
                        <option value="Logística">Logística</option>
                        <option value="Produção">Produção</option>
                        <option value="Compras">Compras</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input_classificar">Classificação do Chamado:</label>
                    <select name="input_classificar" id="input_classificar">
                        <option value="urgente">Urgente</option>
                        <option value="alta prioridade">Alta Prioridade</option>
                        <option value="média prioridade">Média Prioridade</option>
                        <option value="baixa prioridade">Baixa Prioridade</option>
                        <option value="suporte técnico">Suporte Técnico</option>
                        <option value="acesso">Solicitação de Acesso</option>
                        <option value="software">Problema de Software</option>
                        <option value="hardware">Problema de Hardware</option>
                        <option value="sugestão">Sugestão</option>
                        <option value="reclamação">Reclamação</option>
                    </select>
                </div>
                <div class="form-group">
                    <a href="index.html" class="btn-home">Cancelar</a>
                    <input type="reset" value="Resetar">
                    <input type="submit" value="Cadastrar">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
