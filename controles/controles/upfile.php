<?php

session_start();

//**************************************************  subir folletos al directorio dentro de imagenes al evento o curso 

require('../../controles/clases/conexion.php');
$pdo = new Conexion();
header("Content-Type: application/json");

//get the data
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);

$ideventos = $_POST['idevento'];
$path = $_POST['path'];
$tipo = $_POST['tipo'];

switch ($tipo) {
    case "folletos":
        $carpetaAdjunta = "../../imagenes/" . $path . "/folletos/";
        $allowed = array('png', 'jpg', 'gif', 'pdf');
        $consulta = "INSERT INTO  folletos (idevento,imagen) values (:idevento,:imagen)";
        $res = $pdo->prepare($consulta);

        break;
    case "imagenes":
        $carpetaAdjunta = "../../imagenes/" . $path . "/imagenes/";
        $allowed = array('png', 'jpg', 'gif', 'pdf');
        $consulta = "INSERT INTO  imagenes (idevento,imagen) values (:idevento,:imagen)";
        $res = $pdo->prepare($consulta);

        break;
    case "documentos":
        $carpetaAdjunta = "../../imagenes/" . $path . "/documentos/";
        $allowed = array('png', 'jpg', 'gif', 'pdf');
        $consulta = "INSERT INTO  documentos (idevento,archivo) values (:idevento,:imagen)";
        $res = $pdo->prepare($consulta);

        break;
}



//   echo   "eventos :".$ideventos."\n";  

if (!file_exists($carpetaAdjunta)) {
    if (!mkdir($carpetaAdjunta, 0777, true))
        die('Fallo al crear las carpetas...');
}
$infoImagenesSubidas = array();
//echo $carpetaAdjunta;
// A list of permitted file extensions
$imagenes = count($_FILES['imagenes']['name']);
for ($i = 0; $i < $imagenes; $i++) {

    $nombreTemporales = $_FILES['imagenes']['tmp_name'][$i];
    $nombreArchivo = $_FILES['imagenes']['name'][$i];
    $rutaAchivo = $carpetaAdjunta . $nombreArchivo;

    if (move_uploaded_file($nombreTemporales, $rutaAchivo)) {

        $res->bindParam(":idevento", $ideventos);
        $res->bindParam(":imagen", $nombreArchivo);
        $res->execute();
    }
    $infoImagenesSubidas[$i] = array("caption" => "$nombreArchivo", "height" => "120px", "url" => "borrar.php", "key" => $nombreArchivo);
    $imagenesSubidas[$i] = "<img height='120px' src='$rutaAchivo' class='file-preview-image'>";
}
$arr = array("file_id" => 0, "overwriteInitial" => true, "initialPreviewConfig" => $infoImagenesSubidas, "initialPreview" => $imagenesSubidas);
//echo $rutaAchivo;
echo json_encode($arr);
exit;

