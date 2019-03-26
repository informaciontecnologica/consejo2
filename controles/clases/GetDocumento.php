<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
header("Content-Type: application/json");
require('ClaseDocumento.php');
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);
$tipo = $data->tipo;
$pdo = new ClaseDocumento();
switch ($tipo){
    case "doc":
    $idevento=$data->idevento;
  
    echo json_encode($pdo->DocumentoxEvento($idevento));
  
   exit();
    break;
   
}
