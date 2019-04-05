<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//header("Content-Type: application/json");
require_once 'Eventos.php';
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
        $idpagina = $data->idpagina;
        
       
        $result = $eve->InsertarEventos($titulo, $fecha, $texto,$idpagina);
        echo json_encode(array("Estado" => "ok"));
        exit();
        break;
    
     case'eventosid':
        $ideventos = $data->ideventos;
        $result = $eve-> Eventosid($ideventos);
        echo json_encode($result);
        exit();
        break;
    
    case 'todos':
        $eve = new Eventos();

        echo json_encode($eve->TodosEventos());
// 
        exit();
        break;
    case 'listaimagenes':
        $idevento = $data->idevento;
        $eve = new Eventos();

        echo json_encode($eve->ListaImagen($idevento));

        break;
    
    case 'Modificar':
        $ideventos = $data->ideventos;
        $titulo = $data->titulo;
        $fecha = $data->fecha;
        $texto = $data->texto;
        $eve = new Eventos();
        $result = $eve->SetEventos($ideventos, $titulo, $fecha, $texto);
        echo json_encode($result);
        break;

    case 'TodosEventosAgrupados':
        $eve = new Eventos();
        
        echo json_encode($eve->TodosEventosAgrupados());
// 
        exit();
        break;
    
       case 'TodosEve':
        $eve = new Eventos();
        
        echo json_encode($eve->TodosEve());
// 
        exit();
        break;
    
    case 'Borrar_eventos':
        $eve = new Eventos();
        $ideventos = $data->ideventos;
        echo json_encode($eve->BorrarEventos($ideventos));
// 
        exit();
        break;
    
    case 'Borrarimagen':
        $eve = new Eventos();
        $idimagenevento = $data->idimagenevento;
        $imagenevento = $data->imagenevento;
      
        if ($eve->Borrarimagen($idimagenevento, $imagenevento))
                {
           echo json_encode(array("Estado"=>"true"));
        } else {
        echo json_encode(array("Estado"=>"false"));    
        }
 
        exit();
        break;
         case 'prueba':
        $eve = new Eventos();
//        $idimagenevento = $data->idimagenevento;
//        $imagenevento = $data->imagenevento;
      
       echo json_encode($eve->prueba());
             
       
 
        exit();
        break;
}