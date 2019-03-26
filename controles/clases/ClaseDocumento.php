<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasesDespachos
 *
 * @author daniel
 */
include 'conexion.php';

class ClaseDocumento {

    //put your code here

    function AgregarFederal($fecha,$juzgado,$nombreArchivo) {
        $fecha = $fecha . ".html";
//        echo $fecha;
        $pdo3 = new conexion();
        $cadena2 = "insert into federal (fecha,idlugar,nombrearchivo) values (:fecha,:idlugar,:nombrearchivo)";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':idlugar', $juzgado);
        $consulta->bindparam(':nombrearchivo', $nombreArchivo);
        $consulta->execute();
        if ($consulta) {
            return true;
        } else {
    
        return false;
        }
    }
    function AgregarProvincial($fecha,$juzgado,$nombreArchivo) {
        $fecha = $fecha . ".html";
//        echo $fecha;
        $pdo3 = new conexion();
        $cadena2 = "insert into provincial (fecha,idlugar,nombrearchivo) values (:fecha,:idlugar,:nombrearchivo)";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':idlugar', $juzgado);
        $consulta->bindparam(':nombrearchivo', $nombreArchivo);
        
        $consulta->execute();
        if ($consulta) {
            return true;
        } else {
       
        return false;
        }
    }
    
    function DocumentoxEvento($idevento) {
        $pdo3 = new conexion();
        $cadena2 = "select * from documentos where id_evento=:idevento ";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':idevento', $idevento);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($re = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $re;
            }

            return array("documento" => $rows);
        } else {
            return array("documento" => "false");
        }
    }
    
    function ListaFederal() {
        $pdo3 = new conexion();
        $cadena2 = "select * from federal order by fecha Desc ";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($re = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $re;
            }

            return json_encode(array("federales" => $rows));
        } else {
            return json_encode(array("federales" => "false"));
        }
    }
    function BorrarFederal($idfederal) {
        $pdo3 = new conexion();
        $cadena2 = "SELECT * FROM federal WHERE `idfederal`=:idfederal";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':idfederal', $idfederal);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $cadena1 = "delete FROM federal WHERE idfederal=:idfederal";
            $consulta = $pdo3->prepare($cadena1);
            $consulta->bindparam(':idfederal', $idfederal);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                if (isset($rows)) {
                    foreach ($rows as $clave => $valor) {
                     
                    unlink("../../despachos/federal/" . $valor['fecha'].".html");
                    }
                }
            }
        }

    }

       function BorrarProvincial($idprovincial) {
        $pdo3 = new conexion();
        $cadena2 = "SELECT * FROM provincial WHERE `idprovincial`=:idprovincial";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':idprovincial', $idprovincial);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $cadena1 = "delete FROM provincial WHERE idprovincial=:idprovincial";
            $consulta = $pdo3->prepare($cadena1);
            $consulta->bindparam(':idprovincial', $idprovincial);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                if (isset($rows)) {
                    foreach ($rows as $clave => $valor) {
                     
                    unlink("../../despachos/provincial/" . $valor['nombrearchivo']);
                    }
                }
            }
        }

    }
}
