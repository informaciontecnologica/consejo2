<?php
session_start();
require_once '../../controles/clases/personas.php';
require_once '../../controles/clases/Clase_abogado.php';
//get the data
$json = file_get_contents("php://input");
$data = json_decode($json);
$tipo = $data->tipo;

switch ($tipo) {
    case 'lista':

        $li = new personas();
        $resultado = $li->Listar();

        echo json_encode($resultado);
        break;
    case 'nuevo':

        $li = new personas();
        $resultado = $li->InsertarPersona($data);
        echo json_encode($resultado);
        break;
    case 'cambiomatricula':
        $idpersona = $data->idpersona;
        $matricula = $data->matricula;
        $li = new personas();
        $resultado = $li->CambioMatricula($idpersona, $matricula);
        echo json_encode($resultado);
        break;
    case 'personamatricula':

        $matricula = $data->matricula;
        $li = new personas();
        $resultado = $li->PersonaMatricula($matricula);
        echo json_encode($resultado);
        break;
    case 'DetallePerfilPersonal' :
        $id_abogado = $data->idabogado;
        $li = new Abogado();
        $resultado = $li->DetallePerfilPersonal($id_abogado);
        echo json_encode($resultado);
        break;
        break;
    case 'AgregarPerfilPersonal' :

        $persona = $data->persona;
        $la = new Abogado();
        $resultado = $la->AgregarPerfilPersonal($persona);
        echo json_encode($resultado);
        break;
    
    case 'ModificarPerfilPersonal' :

        $persona = $data->persona;
        $la = new Abogado();
        $resultado = $la->ModificarPerfilPersonal($persona);
        echo json_encode($resultado);
        break;
}
