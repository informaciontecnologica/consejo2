<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include 'ClaseArchivos.php';

include './ClaseDespachos.php';
//header("Content-Type: application/json");
if (isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
//    $data = json_decode($json);
//    $tipo=$data->tipo;
}


$tipo = $_POST['tipo'];

$archi = new Archivos();

switch ($tipo) {
    case'Agregar':
        $fecha = $_POST['fecha'];
        $Archivos = $_FILES;
        $CarpetaDestino = "../../despachos/federal/";
        $TipoArchivo = "html";

        if ($archi->Subir($CarpetaDestino, $_FILES, $TipoArchivo, $fecha)) {
            $despachos = new ClaseDespachos();
            if ($despachos->AgregarFederal($fecha)) {
                echo json_encode(array("Estado" => "true"));
            }
        } else {
            echo json_encode(array("Estado" => "false"));
        }

        exit();
        break;

    case'AgregarDespachoProvincial':
        $fecha = $_POST['fecha'];
        $Archivos = $_FILES;
        $CarpetaDestino = "../../despachos/provincial/";

        $juzgado = $_POST['inlineRadioOptions'];
        $TipoArchivo = "provincial/$juzgado/html";
        $Nombre = explode("/", $TipoArchivo);
        $nombreArchivo = "Juzgado_$Nombre[0]_$Nombre[1]_$fecha.$Nombre[2]";
        if ($archi->Subir($CarpetaDestino, $_FILES, $TipoArchivo, $fecha)) {
            $despachos = new ClaseDespachos();
            if ($despachos->AgregarProvincial($fecha, $juzgado, $nombreArchivo)) {
                echo json_encode(array("Estado" => "true"));
            }
        } else {
            echo json_encode(array("Estado" => "false"));
        }

        exit();
        break;
    case 'ListaFederal':

//  json_encode(array("Estado" => "true"));
        $fed = new ClaseDespachos();
        echo $fed->ListaFederal();

        exit();
        break;
     case 'ListaProvincial':

        $fed = new ClaseDespachos();
        echo $fed->ListaProvincial();

        exit();
        break;
    case 'BorrarFederal':
        $idfederal = $_POST['idfederal'];
        
        $des = new ClaseDespachos();
        echo $des->BorrarFederal($idfederal);
// 
        exit();
        break;
        case 'BorrarProvincial':
        $idprovincial = $_POST['idprovincial'];
        
        $des = new ClaseDespachos();
        echo $des->BorrarProvincial($idprovincial);
// 
        exit();
        break;
}