<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of listausuario
 *
 * @author xpc
 */
//header("Content-Type: application/json");
include '../clases/conexion.php';

$pdo=new Conexion();

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$idperfil = $request->idperfil;
$idusuario = $request->idusuario;

// ************* la vairable envidad del select es un objeto se caputa $idperfil->id   -------------

$sql = "update  usuario set id_perfil=:idperfil where idusuario=:idusuario";

$consula =$pdo->prepare($sql);
$consula->bindParam(":idperfil",$idperfil->id);
$consula->bindParam(":idusuario",$idusuario);
$consula->execute();


if ($consula) {
    print  json_encode(array("Estado"=>"true"));
} else {
   print  json_encode(array("Estado"=>"false"));
}
exit();
