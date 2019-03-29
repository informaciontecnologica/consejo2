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
    private $foto;
    private $idevento;
    public $nombre_carpeta = "../../imagenes/eventos";

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

    function ListaImagen() {
       
            $pdo = new conexion();
            $string = "SELECT * FROM imagenes";
            $consulta = $pdo->prepare($string);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $rows[] = $registro;
                }
                $pa = array("imagenes" => $rows);
                return $pa;
            } else {
            
                $pa = array('imagenes' => $rows);
                return $pa;
            }
       
    }
    function ListaImagenEventos($ideventos) {
        if ($ideventos != "") {
            $pdo = new conexion();
            $string = "SELECT * FROM `imageneventos` where ideventos=:ideventos";
            $consulta = $pdo->prepare($string);
            $consulta->bindparam(':ideventos', $ideventos);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $rows[] = $registro;
                }
                $pa = array("imagenes" => $rows);

                return $pa;
            } else {
                $rows[] = array('Estado' => 'noimage.png');
                $pa = array('imagenes' => 'noimage.png');
                return $pa;
            }
        }
    }

    function InsertarEventos($titulo, $fecha, $texto) {
//
//        $pdo1 = new conexion();
//        $cadena1 = "insert into imageneventos (imagenevento) values (:imagenevento)";
//        $consulta1 = $pdo1->prepare($cadena1);
//        $consulta1->bindparam(':imagenevento', $_FILES["file"]["name"]);
//        $consulta1->execute();
//        $id= $pdo1->lastInsertId(); 

        $pdo3 = new conexion();
        $cadena2 = "insert into eventos (fecha, titulo, texto) values (:fecha, :titulo, :texto)";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':titulo', $titulo);
        $consulta->bindparam(':texto', $texto);
        $consulta->bindparam(':fecha', $fecha);
//        $consulta->bindparam(':idimagenevento',$id);
        $consulta->execute();
    }

    function TodosEventos() {
        $pdo = new conexion();
        $string = "select * from eventos ";
        $consulta = $pdo->prepare($string);

        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("eventos" => $rows);

            return $pa;
        } else {

            return array("eventos" => "no");
        }
    }

    function TodosEventosAgrupados() { // e left join imageneventos ie on e.ideventos=ie.ideventos  group by e.ideventos
        $pdo = new conexion();
        $string = "select * from eventos order by fecha desc";
        $consulta = $pdo->prepare($string);
        $consulta->execute();
      if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("eventos" => $rows);

            return $pa;
        } else {
            $pa = array("eventos" => "OK");
            return $pa;
        }
        
    }

    function Eventosid($ideventos) {
        $pdo = new conexion();
        $string = "select e.*,ie.imagenevento from eventos e left join imageneventos ie on e.ideventos=ie.ideventos  where e.ideventos=:ideventos";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':ideventos', $ideventos);
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

    function SetEventos($ideventos, $titulo, $fecha, $texto) {

        $pdo3 = new conexion();
        $cadena2 = "update eventos set fecha = :fecha, titulo = :titulo, texto = :texto where ideventos = :ideventos";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':titulo', $titulo);
        $consulta->bindparam(':texto', $texto);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':ideventos', $ideventos);

        $consulta->execute();
        if ($consulta) {
            $pa = array("Estado" => 'ok');
            return $pa;
        } else {
            $pa = array("Estado" => 'false');
        }
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

    function BorrarEventos($ideventos) {
        $pdo3 = new conexion();
//
        $cadena2 = "SELECT * FROM imageneventos WHERE `ideventos`=:ideventos";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':ideventos', $ideventos);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }

            $cadena1 = "delete FROM `imageneventos` WHERE `ideventos`=:ideventos";
            $consulta = $pdo3->prepare($cadena1);
            $consulta->bindparam(':ideventos', $ideventos);
            $consulta->execute();
            if (isset($rows)) {
                foreach ($rows as $clave => $valor) {
                    echo $valor['link'];
                    unlink("../../imagenes/eventos/" . $valor['imagenevento']);
                }
            }
        }

        $cadena2 = "delete from eventos  where ideventos= :ideventos";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':ideventos', $ideventos);
        $consulta->execute();

        $pa = array("Estado" => "ok");
        return $pa;
    }

    function BorrarImagen($idimagenevento, $imagenevento) {
        $pdo3 = new conexion();
        $cadena1 = "DELETE FROM `imageneventos` WHERE`idimagenevento`=:idimagenevento";
        $consulta = $pdo3->prepare($cadena1);
        $consulta->bindparam(':idimagenevento', $idimagenevento);
        $consulta->execute();
        if ($consulta) {
            unlink("../../imagenes/eventos/" . $imagenevento);
            return true;
        } else {
            return false;
        }
    }

}
