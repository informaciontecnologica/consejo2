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
        <h4>Juzgado Civil</h4>
        <form name="familia" method="post" action="" >
            <p>Fecha de la Lista:<input type="date" name="fecha" id="fecha" required="" style="text-align:center;" ></p>
            Seleccione La SALA: 

            <select name="idlugar" id="idlugar" style="font-size:18px;">
                <option value="0" selected="">   </option>
                <option value="10">Juzgado Civil 1</option>
                <option value="11">Juzgado Civil 2 </option>
                <option value="12">JCC 2 - Ampliatoria</option>
                <option value="13">Juzgado Civil 3</option>
                <option value="14">JJC 3 - Registro público de comercio</option>
                <option value="15">Juzgado Civil  4</option>
                <option value="16">Juzgado Civil  5</option>
                <option value="17">Juzgado Civil  6</option>



            </select>
            <br>
            <input type="submit" value="Ver Lista" />
            <br>
        </form>
    </body>
</html>
<?php
include '../controles/clases/conexion.php';
if (isset($_POST['idlugar'])) {
    $pdo3 = new conexion();
    $fecha = $_POST['fecha'];
    $idlugar = $_POST['idlugar'];
    $cadena2 = "SELECT * FROM provincial WHERE fecha=:fecha and idlugar=:idlugar";
    $consulta = $pdo3->prepare($cadena2);
    $consulta->bindparam(':fecha', $fecha);
    $consulta->bindparam(':idlugar', $idlugar);
    $consulta->execute();
    if ($consulta->rowCount() > 0) {
        while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
            header("location:../despachos/provincial/" . $registro['nombrearchivo']);
        }
    } else {

        echo" 
                    <p>No se ha Publicado Lista ORDINARIA de Despacho para la Fecha y Sala Seleccionada</p>
<p>No se ha Publicado Lista de INHIBIDOS de Despacho para la Fecha y Sala Seleccionada</p>
<p>No se ha Publicado Lista Con Habilitación de Despacho para la Fecha y Sala Seleccionada</p>
<p>No se ha Publicado Lista Ampliatoria de Despacho para la Fecha y Sala Seleccionada</p>";
    }
}


