<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imagenes
 *
 * @author daniel
 */
include './conexion.php';

class imagenes {

    //put your code here
    function ListaImagenesidpagina($idpagina) {

        $re = new Conexion();
        $sql = "select * from imagenes where idpagina=:idpagina";
        $consulta = $re->prepare($sql);
        $consulta->bindParam(":idpagina", $idpagina);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            return json_encode(array("imagenes" => $rows));
        } else {
            return json_encode(array("imagenes" => "false"));
        }
    }

     function BorrarImagen($idpagina) {

        $re = new Conexion();
        $sql = "delete from imagenes where idpagina=:idpagina";
        $consulta = $re->prepare($sql);
        $consulta->bindParam(":idpagina", $idpagina);
        $consulta->execute();
        if ($consulta) {
           
            return true;
        } else {
            return false;
        }
    }
    function ListaImagenes() {

        $re = new Conexion();
        $sql = "select * from imagenes left join paginas on idpagina=idpagina";
        $consulta = $re->prepare($sql);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            return json_encode(array("imagenes" => $rows));
        } else {
            return json_encode(array("imagenes" => "false"));
        }
    }

    function ListaPaginas() {

        $re = new Conexion();
        $sql = "select * from paginas";
        $consulta = $re->prepare($sql);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }

            return json_encode(array("paginas" => $rows));
        } else {
            return json_encode(array("paginas" => "false"));
        }
    }
    
     function AgregarImagen($idpagina,$nombrearchivo) {
//echo "asdasdasdasd";
        $re = new Conexion();
        $sql = "insert into imagenes (idpagina,imagen) values (:idpagina,:imagen)";
        $consulta = $re->prepare($sql);
        $consulta->bindParam(':idpagina', $idpagina);
        $consulta->bindParam(':imagen', $nombrearchivo);
        $consulta->execute();
        if ($consulta) {
           
            return json_encode(array("paginas" => "true"));
        } else {
            return json_encode(array("paginas" => "false"));
        }
    }

}
