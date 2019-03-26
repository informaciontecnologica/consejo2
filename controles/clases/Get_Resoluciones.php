<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Foto
 *
 * @author daniel
 */
//include 'conexion.php';
session_start();
include '../clases/conexion.php';

class Eventos {

//put your code here


    function GetFotoEvento($ideventos) {
        if ($ideventos != "") {
            $pdo = new conexion();
            $string = "select * from eventos e left join imageneventos ie on e.idimagenevento=ie.idimagenevento where ideventos=:ideventos";
            $consulta = $pdo->prepare($string);
            $consulta->bindparam(':ideventos', $ideventos);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetch();
                return $registro['imagenevento'];
            } else {

                return "noimage.png";
            }
        }
    }

    function ListaImagenResolucion($idresolucion) {

        $pdo = new conexion();
        $string = "SELECT * FROM resolucion_documento where idresolucion=:idresolucion";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idresolucion', $idresolucion);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("resolucion_documento" => $rows);

            return $pa;
        } else {

            return array('Estado' => 'false');
        }
    }

    function InsertarREsolu($titulo, $fecha, $texto, $tag) {
        $pdo3 = new conexion();
        $cadena2 = "insert into resolucion (fecha, titulo, texto,tag) values (:fecha, :titulo, :texto,:tag)";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':titulo', $titulo);
        $consulta->bindparam(':texto', $texto);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':tag', $tag);

        $consulta->execute();
        if ($consulta) {
            return array('Estado' => 'ok');
        }
    }

    function TodosResolucion() {
        $pdo = new conexion();
        $string = "select * from resolucion";
        $consulta = $pdo->prepare($string);

        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("resoluciones" => $rows);

            return $pa;
        } else {

            return array("resoluciones" => "false");
        }
    }

    function TodosEventosAgrupados() {
        $pdo = new conexion();
        $string = "select * from eventos e left join imageneventos ie on e.ideventos=ie.ideventos group by e.ideventos";
        $consulta = $pdo->prepare($string);

        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("eventos" => $rows);

            return $pa;
        } else {

            return "noimage.png";
        }
    }

    function SetREsolu($idresolucion, $titulo, $fecha, $texto, $tag) {

        $pdo3 = new conexion();
        $cadena2 = "update resolucion set fecha = :fecha, titulo = :titulo, texto = :texto, tag=:tag where idresolucion = :idresolucion";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':titulo', $titulo);
        $consulta->bindparam(':texto', $texto);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':tag', $tag);
        $consulta->bindparam(':idresolucion', $idresolucion);

        $consulta->execute();
        if ($consulta) {
            $pa = array("Estado" => 'ok');
            return $pa;
        } else {
            $pa = array("Estado" => 'false');
        }
    }

    function BorrarDoc($idresdocumento, $link) {
        $pdo3 = new conexion();
        $cadena2 = "delete from resolucion_documento  where idresdocumento = :idresdocumento";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':idresdocumento', $idresdocumento);
        $consulta->execute();
        if ($consulta) {
            unlink("../../documentos/" . $link);
            $pa = array("Estado" => 'ok');
            return $pa;
        } else {
            $pa = array("Estado" => 'false');
            return $pa;
        }
    }

    function BorrarResolucion($idresolucion) {
        $pdo3 = new conexion();
//
        $cadena2 = "SELECT * FROM `resolucion_documento` WHERE `idresolucion`=:idresolucion";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':idresolucion', $idresolucion);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $cadena1 = "delete FROM `resolucion_documento` WHERE `idresolucion`= :idresolucion";
            $consulta = $pdo3->prepare($cadena1);
            $consulta->bindparam(':idresolucion', $idresolucion);
            $consulta->execute();
            if (isset($rows)) {
                foreach ($rows as $clave => $valor) {
                    unlink("../../documentos/" . $valor['link']);
                }
            }
        }

        $cadena2 = "delete from resolucion  where idresolucion = :idresolucion";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':idresolucion', $idresolucion);
        $consulta->execute();

        $pa = array("Estado" => 'ok');
        return $pa;


    }

    function SetImagenes() {
        $nombre_carpeta = "../../imagenes/eventos";
        $uploadOk = 1;
        if (!is_dir($nombre_carpeta)) {
            mkdir($nombre_carpeta, 0777);
        } else {
//            return "Ya existe ese directorio\n";
//        // extraer extension del archivo
            $imageFileType = pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION);

            $target_file = $nombre_carpeta . "/" . $_FILES["file"]["name"];
//            return $target_file;
        }


//        if (isset($_POST["submit"])) {
//            $check = getimagesize($_FILES["file"]["tmp_name"]);
//            if ($check !== false) {
//                return "File is an image - " . $check["mime"] . ".";
//                $uploadOk = 1;
//            } else {
//                return "File is not an image.";
//                $uploadOk = 0;
//            }
//        }
        // Check file size
        if ($_FILES["file"]["size"] > 350000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
//        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//            $uploadOk = 0;
//        }
        //// Check if $uploadOk is set to 0 by an error

        if ($uploadOk > 0) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file " . basename($nombre_carpeta . $_FILES["file"]["name"]) . " has been uploaded./n $target_file ";
                $ok = 1;
            } else {
                echo "Sorry, there was an error uploading your file.";
                $ok = 2;
            }
        }
    }

}
