<!DOCTYPE HTML>
<HTML>
<head>
<style>

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
  margin:auto;
  padding:10px 20px;
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
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}

a {
  font-family: Arial, Helvetica, sans-serif;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%; 
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px; 
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
font, h3 {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<meta charset="utf-8"/>
<BODY>
  <ul>
    <li><a class="active" href="ChamadoSelect.php">Atualizar</a></li>
    
    <li><a href="index.html">Home</a></li>
  </ul>
  <br>
  <br>
  <br>
  <header>

   <b><font color="#">Lista chamado</font></b>    
      </br> </br>   
     
     <table id="customers", border = "1">
      <tr>
        <td><b>Código</b></td>
        <td><b>Usuario</b></td>
        <td><b>Tipo Chamado</b></td>
        <td><b>Titulo</b></td>
        <td><b>Descricao</b></td>
        <td><b>Tipo Equipamento</b></td>
        <td><b>Equipamento</b></td>
        <td><b>Setor</b></td>
        <td><b>Aberta</b></td>
        <td><b>Fechado</b></td>
        <td><b>Classificar</b></td>
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
                c.usuario_id = u.usuario_id;

            ";

            $resultado = mysqli_query($conn,$select);

            while($i = mysqli_fetch_assoc($resultado)){
              $data_abertura = date("d/m/Y", strtotime($i['data_abertura']));
              $data_fechamento = date("d/m/Y", strtotime($i['data_fechamento']));
        ?>
             <tr>
                <td><?php echo $i['id_chamado'];?></td>
                <td><?php echo $i['username'];?></td>        <!-- usuario_id -->
                <td><?php echo $i['tipoChamado'];?></td> <!-- tipo_chamado_id -->
                <td><?php echo $i['titulo'];?></td>
                <td><?php echo $i['descricao'];?></td>
                <td><?php echo $i['tipoEquipamento'];?></td>   <!-- tipo_equip_id -->
                <td><?php echo $i['nomeModelo'];?></td>        <!-- id_equip -->
                <td><?php echo $i['setor'];?></td>
                <td><?php echo $data_abertura;?></td>
                <td><?php echo $data_fechamento;?></td>
                <td><?php echo $i['classificar'];?></td>

                <td><a href="<?php echo"ChamadoFormularioEditar.php?var_id_chamado=". $i['id_chamado']."&var_tipoChamado=".$i['tipoChamado']."&var_titulo=".$i['titulo']."&var_descricao=".$i['descricao']."&var_tipoEquipamento=".$i['tipoEquipamento']."&var_nomeModelo=".$i['nomeModelo']."&var_setor=".$i['setor']."&var_classificar=".$i['classificar']?>">Alterar</a></td> 
                <td><a href="<?php echo"_delete.php?var_cod=". $i['id_chamado']."&tabela=Chamado"?>">Excluir</a></td>
             </tr> 
            <?php
           }
            ?>
     </table>

    <h3><a class="button button1" href="ChamadoFormularioInserir.php">Cadastrar novo Chamado</a></h3>
</BODY>
</HTML>