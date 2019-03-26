<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include './ClaseArchivos.php';
include './Claseimagenes.php';
//header("Content-Type: application/json");
if (isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
//    $data = json_decode($json);
//    $tipo=$data->tipo;
}


$tipo = $_POST['tipo'];

$archi = new Archivos();
$CarpetaDestino = "../../imagenes/banners/";

switch ($tipo) {
    case'Agregar':
$imag = new imagenes();
        
        
        
        $idpagina = $_POST['idpagina'];
        $nombreArchivo = $_POST['imagen'];
        
//        $ima = new imagenes();
        
        
//    if(ListaImagenesidpagina($idpagina)!='false'){
//        $ver = json_decode($ima->ListaImagenesidpagina($idpagina), true);
//        if (isset($ver)) {
//            foreach ($ver['imagenes'] as $clave => $valor) {
//                 unlink("$CarpetaDestino/" . $valor['imagen']);
//            }
//        }
       
//    }
//        if ( ){
        if (count($_FILES['files']['name']) <= 3) {
             $imag->BorrarImagen($idpagina);
            $imagenes = count($_FILES['files']['name']);
            for ($i = 0; $i < $imagenes; $i++) {
                $nombreArchivo = $idpagina . "_" . $_FILES['files']['name'][$i];
                $nombreTemporales = $_FILES['files']['tmp_name'][$i];
                $rutaAchivo = $CarpetaDestino . $nombreArchivo;
                move_uploaded_file($nombreTemporales, $rutaAchivo);
                $imag->AgregarImagen($idpagina, $nombreArchivo);
//
//
//                $infoImagenesSubidas[$i] = array("caption" => "$nombreArchivo", "height" => "120px", "url" => "borrar.php", "key" => $nombreArchivo);
//                $imagenesSubidas[$i] = "<img height='120px' src='$rutaAchivo' class='file-preview-image'>";
            }
//            $arr = array("file_id" => 0, "overwriteInitial" => true, "initialPreviewConfig" => $infoImagenesSubidas, "initialPreview" => $imagenesSubidas);
//
            echo json_encode(array("as" => "arr"));
//        }
        }

        exit();
        break;

    case 'ListaPaginas':
        $fed = new imagenes();
        echo $fed->ListaPaginas();

        exit();
        break;
    case 'ListaImagenesidpagina':
        $idpagina = $_POST['idpagina']['idpagina'];
        $fed = new imagenes();
        echo $fed->ListaImagenesidpagina($idpagina);
//            
        exit();
        break;
}