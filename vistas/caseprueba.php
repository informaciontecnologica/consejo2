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
        $consulta = $conexion->prepare('SELECT * from personas');

        $consulta->execute();
        while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $row[] = $registro;
        }
        $da = array("eventos" => $row);
        echo json_encode($da);
    }

    function SetEventos($deventos) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * from eventos ideventos=:ideventos');
        $consulta->bindParam(":ideventos", $ideventos);
        $consulta->execute();
        while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $row[] = $registro;
        }
        $da = array("eventos" => $row);
        echo json_encode($da);
    }

}
