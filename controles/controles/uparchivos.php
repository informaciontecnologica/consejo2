<?php

class Archivos {

    function Subir($CarpetaDestino,$Archivos,$TipoArchivo) {
        $carpetaAdjunta = "../../despachos/federal/";
//        $allowed = array('html');
//        $imagenes = count($_FILES['files']['name']);
        $nombreArchivo = $_FILES['files']['name'];
        $nombreTemporales = $_FILES['files']['tmp_name'];
        $rutaAchivo = $carpetaAdjunta . $nombreArchivo;
       if (move_uploaded_file($nombreTemporales, $rutaAchivo)) {
            echo json_encode(array("Estado" => "true"));
        } else {
            echo json_encode(array("Estado" => "false"));
        }
       exit;
    }

}
