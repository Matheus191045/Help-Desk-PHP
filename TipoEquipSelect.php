<!DOCTYPE HTML>
<HTML>
<head>
<title>Help Desk ADM TI</title>
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
    <li><a class="active" href="indexTI.html">Home</a></li>
    <li><a href="TipoEquipFormularioInserir.html">Novo tipo equipamento</a></li>
  </ul>
  <br>
  <br>
  <br>
  <header>
   <b><font color="#">Lista tipo de equipamento</font></b>    
      </br> </br>   
     
     <table id="customers", border = "1">
      <tr>
        <td><b>Código</b></td>
        <td><b>nome</b></td>
        <td><b>Editar?</b></td>
        <td><b>Excluir?</b></td>
     </tr>
  </header> 
       <?php
            include_once("_conexao.php");

            $conn = conectaBD();

            $select = "SELECT * FROM Tipo_Equipamento";
            $resultado = mysqli_query($conn,$select);

            while($i = mysqli_fetch_assoc($resultado)){
        ?>
             <tr>
                 <td><?php echo $i['tipo_equip_id'];?></td>
                <td><?php echo $i['tipoEquipamento'];?></td>
                <td><a href="<?php echo"TipoEquipFormularioEditar.php?var_tipo_equip_id=". $i['tipo_equip_id']."&var_tipoEquipamento=".$i['tipoEquipamento']?>">Alterar</a></td> 
                <td><a href="<?php echo"_deleteTI.php?var_cod=". $i['tipo_equip_id']."&tabela=Tipo_Equipamento"?>">Excluir</a></td>
             </tr> 
            <?php
           }
            ?>
     </table>

    <h3><a class="button button1" href="TipoEquipFormularioInserir.html">Cadastrar novo</a></h3>
</BODY>
</HTML>