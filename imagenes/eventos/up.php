<?php
session_start();
require('../../controles/clases/conexion.php');
$pdo = new Conexion();
header("Content-Type: application/json");

//get the data
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);

$ideventos=$_POST['idevento'];
$path=$_POST['path'];
$tipo=$_POST['tipo'];
switch ($tipo){
    case "documento":
        $carpetaAdjunta="../documentos/".$path;
        break;
    case "imagenes":
        $carpetaAdjunta="./".$path;
        break;
}
        

if (!file_exists($carpetaAdjunta)) {
    mkdir($carpetaAdjunta, 0777, true);
}


// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');
$consulta = "INSERT INTO  imagenes (idevento,imagen) values (:idevento,:imagen)";
$res=$pdo->prepare($consulta);
$imagenes=count($_FILES['imagenes']['name']);
for($i=0;$i<$imagenes;$i++){
    $nombreArchivo=$_FILES['imagenes']['name'][$i];
    $nombreTemporales=$_FILES['imagenes']['tmp_name'][$i];
    $rutaAchivo=$carpetaAdjunta."/".$nombreArchivo;
 
    if ( move_uploaded_file($nombreTemporales, $rutaAchivo)){
       
       $res->bindParam(":idevento", $ideventos);
       $res->bindParam(":imagen", $nombreArchivo);
       $res->execute();
    }
    $infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px","url"=>"borrar.php","key"=>$nombreArchivo);
    $imagenesSubidas[$i]="<img height='120px' src='$rutaAchivo' class='file-preview-image'>";
}
$arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,"initialPreview"=>$imagenesSubidas);

echo json_encode(array("as"=>$arr));
exit;

