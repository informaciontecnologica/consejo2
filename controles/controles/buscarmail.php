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
include '../clases/conexion.php';


//
//$postdata = file_get_contents("php://input");
//$request = json_decode($postdata);
//$idperfil = $request->idperfil;
//$idusuario = $request->idusuario;
$mail=$_POST['mail'];


//Escribimos la consulta necesaria
$consultaUsuarios = "SELECT * FROM `personas` where mail=:mail";

//Obtenemos los resultados
$pd= new Conexion();
$pda=$pd->prepare($consultaUsuarios);
$pda->bindParam(':mail', $mail);
$pda->execute();

$Registro=$pda->fetch(PDO::FETCH_ASSOC);


$mail = $Registro['mail'];

echo $mail."--".$pda->rowCount();

//if($pda->rowCount()>0) {
//          
//
//
//        
//
//} else {
//    echo "ok";
//}
    
                


