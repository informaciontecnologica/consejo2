<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-Type: application/json");
include '../clases/conexion.php';
//get the data
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);
$tipo = $data->tipo;
$pdo = new conexion();


switch ($tipo) {


    case'Agregar':
        $importe = $data->valor_jus;
        $periodo=$data->periodo;
        $string = "select * from honorarios  order by periodo desc limit 1 ";
        $consulta = $pdo->prepare($string);
        $consulta->execute();
        $registro = $consulta->fetch();
        if ($registro['periodo']=="$periodo"){
            $string = "update honorarios  set importe=:importe where periodo=:periodo";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':periodo', $registro['periodo']);
        $consulta->bindparam(':importe', $importe);
        $consulta->execute();
        $honorarios = array("estado" => $consulta);
        } else {      
        
        $string = "insert  into honorarios (periodo,importe) values (:periodo, :importe)";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':periodo', $periodo);
        $consulta->bindparam(':importe', $importe);
        $consulta->execute();
         if ($consulta->rowCount() > 0) {
           $honorarios = array("estado" => "true");
        } else {
           $honorarios = array("estado" => "false"); 
        }
        
        
        }
    echo json_encode($honorarios);
        break;
    case "Lista":
        $string = "select * from honorarios  order by id_honorarios desc limit 1 ";
        $consulta = $pdo->prepare($string);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetch();
            $honorarios = array("importe" => $registro['importe'], "periodo" => $registro['periodo'], "estado" => "ok");
        } else {
            $honorarios = array("estado" => "false");
        }
        echo json_encode(array("Estado" => $honorarios));

        break;
}