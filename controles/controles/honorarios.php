<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../clases/ClaseArchivos.php';

$reg= new Archivos();
$CarpetaDestino="../../Administracion/documentohonorarios.html";
$Archivos=$_FILES;
$TipoArchivo="html";
if($reg->Subir($CarpetaDestino, $Archivos, $TipoArchivo,null)){
    return  "false";
}else {
    return  "true";
}