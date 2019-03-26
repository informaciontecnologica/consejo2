<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Eventos.php';
//get the data
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);
$tipo=$data->tipo;

////output the array in the response of the curl request

  
if (($tipo== 'Modificar')) {
    $eve = new Eventos();
   $result = $eve->SetEventos($_POST['titulo'], $_POST['fecha'], $_POST['texto'],$_POST['ideventos'],$_POST['idimagenevento'],$_FILES);
}

if (($tipo== 'Agregar')) {
    $eve = new Eventos();
   $result = $eve->InsertarEventos($_POST['titulo'], $_POST['fecha'], $_POST['texto'],$_FILES);
}
if (($tipo== '')) {
 $eve = new Eventos();
 
  echo json_encode($eve->TodosEventos());
// 
    exit();
}