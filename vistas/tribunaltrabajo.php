<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h4>Tribunal de Trabajo</h4>
        <form name="familia" method="post" action="" >
      <p>Fecha de la Lista:<input type="date" name="fecha" id="fecha" required="" style="text-align:center;" ></p>
		Seleccione La SALA: 
	
	<select name="idlugar" id="idlugar" style="font-size:18px;">
		<option value="0" selected="">   </option>
		<option value="7"> SALA 1</option>
		<option value="8"> SALA 2</option>
		<option value="9"> SALA 3</option>
	</select>
	<br>
        <input type="submit" value="Ver Lista" />
		<br>
	</form>
    </body>
</html>
<?php 
include '../controles/clases/conexion.php';
if (isset($_POST['idlugar'])){
 $pdo3 = new conexion();
    $fecha=$_POST['fecha'];
    $idlugar=$_POST['idlugar'];
        $cadena2 = "SELECT * FROM provincial WHERE fecha=:fecha and idlugar=:idlugar";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':idlugar', $idlugar);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                header("location:../despachos/provincial/".$registro['nombrearchivo']);
               
            }
            } else {
            
                echo" 
                    <p>No se ha Publicado Lista ORDINARIA de Despacho para la Fecha y Sala Seleccionada</p>
<p>No se ha Publicado Lista de INHIBIDOS de Despacho para la Fecha y Sala Seleccionada</p>
<p>No se ha Publicado Lista Con Habilitación de Despacho para la Fecha y Sala Seleccionada</p>
<p>No se ha Publicado Lista Ampliatoria de Despacho para la Fecha y Sala Seleccionada</p>";
            }    
            
}


