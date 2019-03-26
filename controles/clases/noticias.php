<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
header("Content-Type: application/json");
require('conexion.php');
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);
$tipo = $data->tipo;
$pdo = new Conexion();
if (isset($tipo) && ($tipo=='noticias')){
    
    $sql = "Select * from noticias where idpersona=:idpersona";
    
    $rese = $pdo->prepare($sql);
    $rese->bindParam(":idpersona", $_SESSION['idpersona']);
    $rese->execute();
    if($rese->rowCount()>0){
       $reg[]=$rese->fetch(PDO::FETCH_ASSOC);
        echo json_encode(array("noticias"=>$reg));
    } else {
         echo json_encode(array("Estado"=>"false"));
    }
   
}
exit();