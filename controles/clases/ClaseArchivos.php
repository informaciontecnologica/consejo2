<?php

class Archivos {

    function Subir($CarpetaDestino, $Archivos, $TipoArchivo, $fecha) {

        $re = ($fecha == null) ? $Archivos['name']['tmp_name'] : $fecha . ".html";
        
        
        if ($TipoArchivo != 'html') {
        $Nombre= explode("/", $TipoArchivo); 
        $re="Juzgado_$Nombre[0]_$Nombre[1]_$fecha.$Nombre[2]";
        
            }
        
        if (count($_FILES['files']['name']) == 1) {
            $nombreArchivo = $re; // $Archivos['files']['name'];
            $nombreTemporales = $Archivos['files']['tmp_name'];
            $rutaAchivo = $CarpetaDestino . $nombreArchivo;
            if (move_uploaded_file($nombreTemporales, $rutaAchivo)) {
                return true;
            } else {
                return false;
            }
        } else if (count($_FILES['files']['name']) > 1) {
            $imagenes = count($_FILES['files']['name']);
            for ($i = 0; $i < $imagenes; $i++) {
                $nombreArchivo = $_FILES['files']['name'][$i];
                $nombreTemporales = $_FILES['files']['tmp_name'][$i];
                $rutaAchivo = $carpetaAdjunta . $nombreArchivo;
                move_uploaded_file($nombreTemporales, $rutaAchivo);
                $infoImagenesSubidas[$i] = array("caption" => "$nombreArchivo", "height" => "120px", "url" => "borrar.php", "key" => $nombreArchivo);
                $imagenesSubidas[$i] = "<img height='120px' src='$rutaAchivo' class='file-preview-image'>";
            }
            $arr = array("file_id" => 0, "overwriteInitial" => true, "initialPreviewConfig" => $infoImagenesSubidas, "initialPreview" => $imagenesSubidas);

            echo json_encode(array("as" => $arr));
            
            return true;
        }

        exit();
    }

}
