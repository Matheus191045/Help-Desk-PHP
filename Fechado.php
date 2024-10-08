<!DOCTYPE HTML>
<HTML>
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
body {
  margin: 0;
  font-family: Verdana, sans-serif;
}

.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #c7c7c7;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
  border: 2px solid #4CAF50;
}

header {
  margin: auto;
  padding: 10px 20px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: background-color 0.3s;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%; 
  table-layout: auto; 
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 150px; 
}

#customers tr:nth-child(even) {
  background-color: #f2f2f2;
}

#customers tr:hover {
  background-color: #ddd;
}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.content {
  padding: 20px;
  margin-top: 50px;
}


.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  max-width: 600px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal-comment {
  white-space: pre-wrap;
  word-wrap: break-word;
  overflow-wrap: break-word;
}


.action-btn {
  text-decoration: none;
  padding: 10px;
  border: 2px solid transparent;
  border-radius: 50%;
  transition: border 0.3s;
}

.action-btn:hover {
  border: 2px solid #ccc;
}


.action-btn i {
  font-size: 24px;
  transition: transform 0.3s, color 0.3s;
  display: inline-block;
}


.action-btn.edit i {
  color: #4CAF50;
}

.action-btn.edit:hover i {
  color: #388E3C;
  transform: scale(1.2);
}


.action-btn.delete i {
  color: #F44336;
}

.action-btn.delete:hover i {
  color: #D32F2F;
  transform: scale(1.2);
}



</style>



</head>
<meta charset="utf-8"/>
<BODY>
<ul>
  <li><a class="active" href="ChamadoFormularioInserir.php">Abrir Chamado</a></li>
  <li><a href="Aberto.php">Aberto</a></li>
  <li><a href="Fechado.php">Fechado</a></li>
  <li><a href="TipoEquipSelect.php">Tutorial</a></li>
  <li style="float:right;"><a href="login.html"><i class="fas fa-sign-out-alt"></i> Sair</a></li> <!-- "logout.php" -->
</ul>
  <br>
  <br>
  <br>
  <header>
   <b><font color="#">Lista chamado</font></b>
</header>
<br><br>


<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Detalhes do Chamado</h2>
    <p><strong>Usuário:</strong> <span id="modalUsuario"></span></p>
    <p><strong>Título:</strong> <span id="modalTitulo"></span></p>
    <p><strong>Descrição:</strong> <span id="modalDescricao"></span></p>
    <p><strong>Tipo de Equipamento:</strong> <span id="modalTipoEquipamento"></span></p>
    <p><strong>Equipamento:</strong> <span id="modalEquipamento"></span></p>
    <p><strong>Setor:</strong> <span id="modalSetor"></span></p>
    <p><strong>Data de Abertura:</strong> <span id="modalDataAbertura"></span></p>
    <p><strong>Data de Fechamento:</strong> <span id="modalDataFechamento"></span></p>
    <p><strong>Classificar:</strong> <span id="modalClassificar"></span></p>
    <p><strong>Status:</strong> <span id="modalStatus"></span></p>
    <p><strong>Comentário:</strong> <span id="modalComentario" class="modal-comment"></span></p>
  </div>
</div>



<table id="customers" border="1">
      <tr>
        <td><b>Código</b></td>
        <td><b>Usuario</b></td>
        <td><b>Tipo Chamado</b></td>
        <td><b>Titulo</b></td>
    <!--<td><b>Descricao</b></td> -->
    <!--<td><b>Tipo Equipamento</b></td>
        <td><b>Equipamento</b></td> -->
        <td><b>Setor</b></td>
        <td><b>Aberta</b></td>
        <td><b>Fechado</b></td>
        <td><b>Classificar</b></td>
        <td><b>Status</b></td>
        <td><b>Editar?</b></td>
        <td><b>Excluir?</b></td>
     </tr>
  </header>

       <?php
            include_once("_conexao.php");

            $conn = conectaBD();

            $select = "
SELECT 
    c.id_chamado,
    c.setor,
    c.titulo,
    c.descricao,
    c.data_abertura,
    c.data_fechamento,
    c.classificar,
    c.status,
    c.comentario, 
    u.username,
    e.nomeModelo,
    tc.tipoChamado,
    t.tipoEquipamento
FROM 
    Tipo_Chamado tc
JOIN
    Chamado c
ON
    tc.tipo_chamado_id = c.tipo_chamado_id
JOIN 
    Equipamento e
ON
    c.id_equip = e.id_equip              
JOIN 
    Tipo_Equipamento t 
ON 
    e.tipo_equip_id = t.tipo_equip_id
JOIN
    Usuarios u
ON
    c.usuario_id = u.usuario_id
WHERE
    c.status = 'fechado'
ORDER BY c.id_chamado DESC;
";


            $resultado = mysqli_query($conn,$select);


            while($i = mysqli_fetch_assoc($resultado)) {
              $data_abertura = date("d/m/Y", strtotime($i['data_abertura']));
              $data_fechamento = date("d/m/Y", strtotime($i['data_fechamento']));
          ?>
          <tr onclick="showDetails('<?php echo $i['username']; ?>', '<?php echo $i['titulo']; ?>', '<?php echo $i['descricao']; ?>', '<?php echo $i['tipoEquipamento']; ?>', '<?php echo $i['nomeModelo']; ?>', '<?php echo $i['setor']; ?>', '<?php echo $data_abertura; ?>', '<?php echo $data_fechamento; ?>', '<?php echo $i['classificar']; ?>','<?php echo $i['status']; ?>','<?php echo $i['comentario']; ?>')">
            <td><?php echo $i['id_chamado']; ?></td>
            <td><?php echo $i['username']; ?></td>
            <td><?php echo $i['tipoChamado']; ?></td>
            <td><?php echo $i['titulo']; ?></td>
            
            
            <td><?php echo $i['setor']; ?></td>
            <td><?php echo $data_abertura; ?></td>
            <td><?php echo $data_fechamento; ?></td>
            <td><?php echo $i['classificar']; ?></td>
            <td style="background-color: DarkGreen; color: white; padding: 10px; text-decoration: none; border-radius: 5px; text-align: center;"><b><?php echo $i['status']; ?></b></td>
            <td><a href="<?php echo"ChamadoFormularioResponder.php?var_id_chamado=". $i['id_chamado']."&var_tipoChamado=".$i['tipoChamado']."&var_titulo=".$i['titulo']."&var_descricao=".$i['descricao']."&var_tipoEquipamento=".$i['tipoEquipamento']."&var_nomeModelo=".$i['nomeModelo']."&var_setor=".$i['setor']."&var_classificar=".$i['classificar']?>"style="background-color: green; color: white; padding: 5px; text-decoration: none; border-radius: 5px;">Alterar</a></td>
            <td><a href="_delete.php?var_cod=<?php echo $i['id_chamado']; ?>&tabela=Chamado"style="background-color: red; color: white; padding: 5px; text-decoration: none; border-radius: 5px;">Excluir</a></td>
          </tr>
          <?php
            }
          ?>
        </table>

        <h3><a class="button button1" href="ChamadoFormularioInserir.php">Cadastrar novo Chamado</a></h3>

<script>

var modal = document.getElementById("myModal");


var span = document.getElementsByClassName("close")[0];


function showDetails(usuario, titulo, descricao, tipoEquipamento, equipamento, setor, dataAbertura, dataFechamento, Classificar, status, comentario) {
  document.getElementById("modalUsuario").textContent = usuario;
  document.getElementById("modalTitulo").textContent = titulo;
  document.getElementById("modalDescricao").textContent = descricao;
  document.getElementById("modalTipoEquipamento").textContent = tipoEquipamento;
  document.getElementById("modalEquipamento").textContent = equipamento;
  document.getElementById("modalSetor").textContent = setor;
  document.getElementById("modalDataAbertura").textContent = dataAbertura;
  document.getElementById("modalDataFechamento").textContent = dataFechamento;
  document.getElementById("modalClassificar").textContent = Classificar;
  document.getElementById("modalStatus").textContent = status;
  document.getElementById("modalComentario").textContent = comentario;

  modal.style.display = "block";
}


span.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</BODY>
</HTML>

