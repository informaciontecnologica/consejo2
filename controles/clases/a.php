<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include 'conexion.php';
include 'Claseimagenes.php';
//header("Content-Type: application/json");
//if (isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
//    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
////    $data = json_decode($json);
////    $tipo=$data->tipo;
//}
//$idpagina = $_POST['idpagina'];
//$imag = new imagenes();
//include '../../class.upload.php-master/src/class.upload.php';
$CarpetaDestino = "../../imagenes/bannersprueba";
//$ver1 = json_decode($imag->ListaImagenesidpagina($idpagina), true);
//if (($ver['imagenes'] != 'false')) {
//    foreach ($ver['imagenes'] as $clave => $valor) {
//        unlink("$CarpetaDestino/" . $valor['imagen']);
//    }
//}
//$imag->BorrarImagen($idpagina);
try{
if (
        !isset($_FILES['file']['error']) ||
        is_array($_FILES['file']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }
    } catch (RuntimeException $e) {

    echo $e->getMessage();

}
    
print_r($_FILES);
 $output = '';  
 if(is_array($_FILES))  
 {  
      foreach($_FILES['file']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['file']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["file"]["tmp_name"][$name];  
                $targetPath = $CarpetaDestino."/".$new_name;  
                move_uploaded_file($sourcePath, $targetPath);  
           }  
      }  
      $images = glob("uploads/*.*");  
      foreach($images as $image)  
      {  
           $output .= '<div class="col-md-2" align="center" ><img src="' . $image .'" width="180px" height="180px" style="border:1px solid #ccc;margin-top:10px;" /></div>';  
      }  
      echo $output;  
 }  
 





//foreach ($_FILES as $key => $tmp_name) {
//    $handle = new upload($_FILES[$key]['name'], 'es_ES'); 
//    
////    $ver.=$_FILES[$key]['name'];
//    if (TRUE) {
//       $handle->uploaded;
//        $handle->file_new_name_body = $_FILES[$key]['name'];
//        $handle->file_name_body_pre = $idpagina . "_";
//
//        $handle->jpeg_size = 520000;
////            $handle->jpeg_quality = 85;
//        $handle->process($CarpetaDestino);
//        if ($handle->processed) {
//            $ver = 'image resized';
//            $handle->clean();
//        } else {
//            $ver = 'error : ' . $handle->error;
//        }
//        $ver = $handle->log;
//    }

//    $nombreArchivo = $idpagina . "_" . $_FILES[$key]['name'];
////                $nombreTemporales = $_FILES[$key]['tmp_name'];
////                $rutaAchivo = $CarpetaDestino . $nombreArchivo;
////                move_uploaded_file($nombreTemporales, $rutaAchivo);
//    $imag->AgregarImagen($idpagina, $nombreArchivo);
//}
echo json_encode(array("Estado" => $_FILES));
