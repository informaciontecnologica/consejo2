<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include 'caseprueba.php';

//if (is_ajax()){
//    echo json_encode($_POST['tipo']);
    $pd=new Eventos();
   $pd->GetEventos();
//}
//if ($_POST['tipo']=='set'){
//    $pd=new libros();
//    echo $pd->SetLibros();
//}
   
//    $return["json"] = json_encode("hola");
//  echo json_encode($_POST['tipo']);
//if (is_ajax()) {
//    echo("hola");
////  if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
////    $action = $_POST["action"];
////    switch($action) { //Switch case for value of action
////      case "test": print("hola"); break;
////    }
////  }
//}
//function is_ajax() {
//  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
//}
