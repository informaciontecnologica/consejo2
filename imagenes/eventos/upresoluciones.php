<?php
session_start();
require('../../controles/clases/conexion.php');
$pdo = new Conexion();
//header("Content-Type: application/json");

//get the data
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);
//$ideventos=$data->ideventos;
$idresolucion=$_POST['idresolucion'];

$carpetaAdjunta="../../documentos/";
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');
$consulta = "INSERT INTO  resolucion_documento (idresolucion,link) values (:idresolucion,:link)";
$res=$pdo->prepare($consulta);
$imagenes=count($_FILES['imagenes']['name']);
for($i=0;$i<$imagenes;$i++){
    $nombreArchivo=$_FILES['imagenes']['name'][$i];
    $nombreTemporales=$_FILES['imagenes']['tmp_name'][$i];
    $rutaAchivo=$carpetaAdjunta.$nombreArchivo;
 
    if ( move_uploaded_file($nombreTemporales, $rutaAchivo)){
       
       $res->bindParam(":idresolucion", $idresolucion);
       $res->bindParam(":link", $nombreArchivo);
       $res->execute();
    }
    $infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px","url"=>"borrar.php","key"=>$nombreArchivo);
    $imagenesSubidas[$i]="<img height='120px' src='$rutaAchivo' class='file-preview-image'>";
}
$arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,"initialPreview"=>$imagenesSubidas);





//Obtenemos los datos del formulario de registro

   
      

echo json_encode(array("as"=>"ss"));
exit;

