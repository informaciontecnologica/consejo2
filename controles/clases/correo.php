<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-Type: application/json");
require_once 'Get_Resoluciones.php';
//get the data
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);
$tipo = $data->tipo;

$eve = new Eventos();

switch ($tipo) {


    case'Agregar':
        $titulo = $data->titulo;
        $fecha = $data->fecha;
        $texto = $data->texto;
        $tag = $data->tag;

        $result = $eve->InsertarREsolu($titulo, $fecha, $texto, $tag);
        echo json_encode(array("Estado" => "ok"));
        exit();
        break;

    case 'todos':
        echo json_encode($eve->TodosResolucion());

        exit();
        break;
    case 'listaimagen':

        $idresolucion = $data->idresolucion;
        $eve = new Eventos();

        echo json_encode($eve->ListaImagenResolucion($idresolucion));

        break;
    case 'Modificar':
        $idresolucion = $data->idresolucion;
        $tag = $data->tag;
        $titulo = $data->titulo;
        $fecha = $data->fecha;
        $texto = $data->texto;
        $eve = new Eventos();
        $result = $eve->SetREsolu($idresolucion, $titulo, $fecha, $texto, $tag);
        echo json_encode($result);
        exit();
        break;

    case 'TodosEventosAgrupados':
        $eve = new Eventos();

        echo json_encode($eve->TodosEventosAgrupados());
// 
        exit();
        break;
    case 'Borrar_doc':

        $idresdocumento = $data->idresdocumento;
        echo json_encode($eve->BorrarDoc($idresdocumento));
// 
        exit();
        break;
}