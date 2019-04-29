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

    function Agregar_Noticia($valores) {
        $idevento = $valores->idevento;
        $fecha = $valores->fecha;
        $titulo = $valores->titulo;
        $texto = $valores->texto;
        print_r($valores);
        $pdo = new conexion();
        $string = "insert into noticias set (fecha,titulo,texto) value (:fecha,:titulo,:texto)";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idevento', $idevento);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':titulo', $titulo);
        $consulta->bindparam(':texto', $texto);
        $consulta->execute();
        if ($consulta) {
            return array("noticias" => "true");
        } else {
            return array("noticias" => "false");
        }
    }

    function ListaPagina($idpagina) {

        $pdo = new conexion();
        $string = "select * from paginas where idpagina=:idpagina";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idpagina', $idpagina);
        $consulta->execute();
        if ($consulta) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            return $rows;
        }
    }

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

    function ListaImagen($idevento) {

        $pdo = new conexion();
        $string = "SELECT * FROM imagenes where  idevento=:idevento";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idevento', $idevento);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("imagenes" => $rows);
        } else {

            $pa = array('imagenes' => null);
        }
        return $pa;
    }

    function ListaFolletos($idevento) {

        $pdo = new conexion();
        $string = "SELECT * FROM folletos where  idevento=:idevento";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idevento', $idevento);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("folletos" => $rows);
        } else {

            $pa = array('folletos' => null);
        }
        return $pa;
    }

    function ListaDocumentos($idevento) {

        $pdo = new conexion();
        $string = "SELECT * FROM documentos where  idevento=:idevento";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idevento', $idevento);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("documentos" => $rows);
        } else {

            $pa = array('documentos' => null);
        }
        return $pa;
    }

    function ListaNoticias($idevento) {

        $pdo = new conexion();
        $string = "SELECT * FROM noticias where  idevento=:idevento";
        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idevento', $idevento);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("noticias" => $rows);
        } else {

            $pa = array('noticias' => "mal");
        }
        return $pa;
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

    function InsertarEventos($titulo, $fecha, $texto, $idpagina) {


        $pdo3 = new conexion();
        $rs = $pdo3->prepare("SELECT MAX(ideventos) AS id FROM eventos");
        $rs->execute();
        if ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
            $id[] = $row;
        }
//        print_r($id);
        $path = "evento_" . $idpagina . "_" . ($id[0]['id'] + 1);


        $cadena2 = "insert into eventos (fecha, titulo, texto,path,idpagina) values (:fecha, :titulo, :texto,:path,:idpagina)";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':titulo', $titulo);
        $consulta->bindparam(':texto', $texto);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':path', $path);
        $consulta->bindparam(':idpagina', $idpagina);
//        $consulta->bindparam(':idimagenevento',$id);
        $consulta->execute();
        if ($consulta) {
            return array("Estado" => "OK");
        }
    }

    function TodosEventos() {
        $pdo = new conexion();
        $string = "select * from eventos order by fecha desc ";
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

    function TodosEve() {
        $pdo = new conexion();
        $string = "select e.*,p.pagina from eventos e left join paginas p on e.idpagina=p.idpagina order by fecha desc ";
        $consulta = $pdo->prepare($string);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $eventos[] = $registro;
            }
            // consulta de documentos 

            $string = "SELECT  p.idevento, GROUP_CONCAT(r.archivo SEPARATOR ',') as archivo FROM
                        documentos r
                        LEFT JOIN documentos p ON r.iddocumento=p.iddocumento
                        
                        GROUP BY p.idevento ";
            $consulta = $pdo->prepare($string);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                while ($registro2 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $documentos[] = $registro2;
                }

                //  consulta  de imagenes

                $string = "SELECT  p.idevento, GROUP_CONCAT(r.imagen SEPARATOR ',') as imagen FROM
                        folletos r
                        LEFT JOIN folletos p ON r.idimagenes=p.idimagenes
                        
                        GROUP BY p.idevento ";
                $consulta = $pdo->prepare($string);
                $consulta->execute();
                if ($consulta->rowCount() > 0) {
                    while ($registro2 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $imagenes[] = $registro2;
                    }


                    //------------------------------------

                    ;
                    foreach ($eventos as $eventoid => $valoreve) {

                        foreach ($imagenes as $imagenid => $valorimag) {

                            if ($valoreve['ideventos'] == $valorimag['idevento']) {

//                            if (!array_key_exists(valorimag['idevento'],$eve))
                                $eventos[$eventoid]['folletos'] = explode(',', $valorimag['imagen']);

//                            $eventos[$eventoid]['idpagina']= $valorimag['idpagina'];
                            }
                        }
                        if (!isset($documentos)) {

                            foreach ($documentos as $documid => $valordocumento) {

                                if ($valoreve['ideventos'] == $valordocumento['idevento']) {

//                            if (!array_key_exists(valorimag['idevento'],$eve))
                                    $eventos[$eventoid]['documentos'] = explode(',', $valordocumento['archivo']);

//                            $eventos[$eventoid]['idpagina']= $valorimag['idpagina'];
                                }
                            }
                        }
                    }
                }
                $pa = array("eventos" => $eventos);

                return $pa;
            } else {

                return array("eventos" => "no");
            }
        }
    }

    function prueba() {
//            $requisito[] = array("nombre" => "Pedro", "apellido" => "Herrera", "fec_nac" =>
//                "28/06/2000");
//            $requisito[] = array("nombre" => "Maria", "apellido" => "Sucre", "fec_nac" =>
//                "08/01/1998");
//            $requisito[0]['documentos'] = [
//                array("id" => "imagen1"),
//                array("id" => "imagen1"),
//                array("id" => "imagen1")]
//            ;
        $requisito[] = array("../imagenes/eventos/curso_1/DIPLO1.jpg", "../imagenes/eventos/curso_1/DIPLO2.jpg");


        return array("eventos" => $requisito);
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

    function Eventosid($idevento) {
        $pdo = new conexion();

        $string = "select * from eventos where ideventos=:idevento order by fecha desc ";

        $consulta = $pdo->prepare($string);
        $consulta->bindparam(':idevento', $idevento);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $eventos[] = $registro;
            }
            // consulta de documentos 

            $string = "SELECT  p.idevento, GROUP_CONCAT(r.archivo SEPARATOR ',') as archivo FROM
                        documentos r
                        LEFT JOIN documentos p ON r.iddocumento=p.iddocumento
                        
                        GROUP BY p.idevento ";
            $consulta = $pdo->prepare($string);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                while ($registro2 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $documentos[] = $registro2;
                }

                //  consulta  de imagenes

                $string = "SELECT  p.idevento, GROUP_CONCAT(r.imagen SEPARATOR ',') as imagen FROM
                        folletos r
                        LEFT JOIN folletos p ON r.idimagenes=p.idimagenes
                        
                        GROUP BY p.idevento ";
                $consulta = $pdo->prepare($string);
                $consulta->execute();
                if ($consulta->rowCount() > 0) {
                    while ($registro2 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $imagenes[] = $registro2;
                    }


                    //------------------------------------

                    ;
                    foreach ($eventos as $eventoid => $valoreve) {

                        foreach ($imagenes as $imagenid => $valorimag) {

                            if ($valoreve['ideventos'] == $valorimag['idevento']) {

//                            if (!array_key_exists(valorimag['idevento'],$eve))
                                $eventos[$eventoid]['folletos'] = explode(',', $valorimag['imagen']);

//                            $eventos[$eventoid]['idpagina']= $valorimag['idpagina'];
                            }
                        }
                        if (!isset($documentos)) {

                            foreach ($documentos as $documid => $valordocumento) {

                                if ($valoreve['ideventos'] == $valordocumento['idevento']) {

                                    $eventos[$eventoid]['documentos'] = explode(',', $valordocumento['archivo']);
                                }
                            }
                        }
                    }
                }
                $pa = array("eventos" => $eventos);

                return $pa;
            } else {

                return array("eventos" => "no");
            }
        }
    }

    function SetEventos($idevento, $titulo, $fecha, $texto, $idpagina, $path) {
        //  echo "$idevento, $titulo, $fecha, $texto, $idpagina,$path";
        $pdo3 = new conexion();
        $cadena2 = "update eventos set fecha = :fecha, titulo = :titulo, texto =:texto, idpagina=:idpagina, path=:path where ideventos = :ideventos";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':titulo', $titulo);
        $consulta->bindparam(':texto', $texto);
        $consulta->bindparam(':fecha', $fecha);
        $consulta->bindparam(':ideventos', $idevento);
        $consulta->bindparam(':idpagina', $idpagina);
        $consulta->bindparam(':path', $path);
        $consulta->execute();
        if ($consulta) {
            $pa = array("Estado" => 'ok');
        } else {
            $pa = array("Estado" => 'false');
        }
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

/**
 * Remove a non empty directory
 * @author Cristián Pérez
 * @param string $path Folder Path
 * @return bool
 */
function removeDirectory($path)
{
    $path = rtrim( strval( $path ), '/' ) ;
    
    $d = dir( $path );
    
    if( ! $d )
        return false;
    
    while ( false !== ($current = $d->read()) )
    {
        if( $current === '.' || $current === '..')
            continue;
        
        $file = $d->path . '/' . $current;
        
        if( is_dir($file) )
            $this-> removeDirectory($file);
        
        if( is_file($file) )
            unlink($file);
    }
    
    rmdir( $d->path );
    $d->close();
    return true;
}
    function BorrarEvento($idevento, $path) {
        $ruta = "../../imagenes/" . $path;
        if (is_dir($ruta))
           $this-> removeDirectory($ruta);



        $pdo3 = new conexion();
        $cadena2 = "delete from eventos  where ideventos= :ideventos";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':ideventos', $idevento);
        $consulta->execute();

        $cadena2 = "delete from imagenes  where ideventos= :ideventos";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':ideventos', $ideventos);
        $consulta->execute();
        $cadena2 = "delete from folletos  where ideventos= :ideventos";
        $consulta = $pdo3->prepare($cadena2);
        $consulta->bindparam(':ideventos', $ideventos);
        $consulta->execute();
        $cadena2 = "delete from documentos  where ideventos= :ideventos";
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
