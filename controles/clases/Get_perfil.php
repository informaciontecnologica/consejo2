<?php

session_start();
include './conexion.php';
//header("Content-Type: application/json");
//if (isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
//    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
////    $data = json_decode($json);
////    $tipo=$data->tipo;
//}
$json = file_get_contents("php://input");
$data = json_decode($json);
$tipo = $data->tipo;





switch ($tipo) {

    case 'pais':
        $pdo3 = new conexion();
        $cadena2 = "select * from pais ";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($re = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $re;
            }

            echo json_encode(array("pais" => $rows));
        } else {
            echo json_encode(array("pais" => "false"));
        }

        exit();
        break;
    case 'universidad':
        $pdo3 = new conexion();
        $cadena2 = "select * from universidades order by universidad asc";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($re = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $re;
            }

            echo json_encode(array("universidad" => $rows));
        } else {
            echo json_encode(array("universidad" => "false"));
        }

        exit();
        break;
    case 'persona':
               $idpersona=$data->idpersona;
        $pdo3 = new conexion();
        $cadena2 = "select * from personas where idpersona=:idpersona";
        
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindParam(":idpersona", $idpersona);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($re = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $re;
            }

            echo json_encode(array("persona" => $rows));
        } else {
            echo json_encode(array("persona" => "false"));
        }

        exit();
        break;
}
