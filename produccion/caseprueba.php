<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../controles/clases/conexion.php';

class Eventos {

    function GetEventos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * from eventos');

        $consulta->execute();
        while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $row[] = $registro;
        }
        $da = array("response" => $row);
        echo json_encode($da);
    }

    function SetEventos($titulo, $fecha, $texto) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('insert into eventos (titulo,fecha,texto) values (:titulo,:fecha,:texto)');
        $consulta->bindParam(":titulo", $titulo);
        $consulta->bindParam(":fecha", $fecha);
        $consulta->bindParam(":texto", $texto);
        $consulta->execute();
        if ($consulta) {
        echo json_encode("echo");
        }
    }
} 