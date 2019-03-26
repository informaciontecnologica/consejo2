<?php

session_start();

include '../clases/conexion.php';

function EMail($to, $nombre, $apellido, $texto) {

    $cc = "consejoabogadosformosa@consejoabogadosformosa";
    $nombreorigen = "Sistema de Monitoreo de la Vegetación"; //Miranda, Federico";

    $subject = "SMV -  Imagenes nuevas del Sr./a: $apellido, $nombre";
    $mensaje = $texto;
    $headers = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/plain; charset=utf-8";
    $headers[] = "From: Miranda Federico <{$cc}>";
    $headers[] = "Cc: Miranda Federico <{$cc}>";
    $headers[] = "Bcc: Administrador <infotec@informaciontecn.com.ar>";
    $headers[] = "Reply-To: consejoabogadosformosa@consejoabogadosformosa<{$cc}>";
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/" . phpversion();

    $result = mail($to, $subject, $mensaje, implode("\r\n", $headers));
    if ($result) {
        echo $result;
    } else {
//    return false;
    }
    echo $result;
}

$target_dir = "despachos/";

//$idregistrador = $_SESSION['idpersona'];

$fecha = $_POST['fecha'];
$ciudad = $_POST['ciudad'];
$tipo = $_POST['tipo'];
//print_r($_POST);
$uploadOk =1;
//echo getcwd()."/despachos/".$tipo."/".$ciudad."/" ;
//
//if (isset($_POST['idnoticia'])) {
//    if (Editar($_POST['idnoticia'])) {
//        echo $_POST['idnoticia'];
//
//        $uploadOk = 2;
//    } elseif ($_POST['idnoticia'] == 'Alta') {
//        $uploadOk = 1;
//        $Sql = "SELECT max(n.idnoticia)as idnoticias,p.nombre,p.apellido,p.mail  FROM `noticias` n left join personas2 p on 
//         n.idpersona=p.idpersonas
//        where `idpersona`=$idpersona ";
//        echo $Sql;
//        $reg = mysql_query($Sql);
//        if (mysql_num_rows($reg) == 0) {
//            echo "no fue";
//            $idnoticia = '1';
//        } else {
//            while ($maximo = mysql_fetch_assoc($reg)) {
//                $idnoticia = $maximo['idnoticias'];
//                $nombre=$maximo['nombre'];
//                $apellido=$maximo['apellido'];
//                $mail=$maximo['mail'];
//                echo $idnoticia;
//            }
//        }
//    }
////}


$filenombre = "despacho_" . $fecha;
$nombre_carpeta = "../../despachos/".$tipo."/".$ciudad."/";
//echo $nombre_carpeta;
if (!is_dir($nombre_carpeta)) {
    mkdir($nombre_carpeta, 0777);
}
    
// extraer extension del archivo
    $imageFileType = pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION);
    $imagen = $imageFileType;
    $target_file = $nombre_carpeta.$filenombre.".".$imageFileType;
//    echo $target_file;


$imagen = $filenombre . "." . $imageFileType;
echo "tarjet:".$target_file."\n";
//basename($_FILES["file"]["name"]);
// Check if image file is a actual image or fake image



// Check file size
if ($_FILES["file"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
} 
// Allow certain file formats

if ($imageFileType != "htm" && $imageFileType != "html" ) {
    echo "Sorry, only htm or html files are allowed.-".$imageFileType;
    $uploadOk = 0;
}
echo $_FILES["file"]["tmp_name"]."*****".$_FILES["file"]["name"];
//
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





//if ($ok == 1) {
//
//    if ($uploadOk == 2) {
//        $idnoticia = $_POST['idnoticia'];
//        $consulta = "update `noticias` 
//            set 
//            titulo ='$titulo' ,
//            encabezado='$encabezado' ,
//            imagen='$imagen' ,
//            fecha= '$fecha',
//            idprovincia= '$provincia',
//            idmedicion=$idmedicion,    
//            estado=$estado    
//            where idnoticia=$idnoticia ";
//
//
//        //Si los datos se introducen correctamente, mostramos los datos
//        //Sino, mostramos un mensaje de error, GeomFromText($area)
//        if (mysql_query($consulta)) {
//            die('Registrado con éxito <br>' .
//                    'Se a modificado <br>');
//        } else {
//            die($consulta);
//        }
//    }
//    if ($uploadOk == 1) {
//
//
//        $consulta = "INSERT INTO `noticias` (`idnoticia`, `titulo`, `encabezado`, `imagen`, `fecha`, `idprovincia`, `idpersona`,`estado`,`idmedicion`) "
//                . "VALUES (null,'$titulo','$encabezado','$imagen','$fecha','$provincia',$idpersona,1,$idmedicion)";
//        echo $_SESSION['mail'] . $_SESSION['nombre'] . "-" . $_SESSION['apellido'];
//
//        EMail($mail,$nombre, $apellido , "Se han actualizado las imagenes.Le recordamos http://informaciontecn.com.ar/noticias");
//
//        //Si los datos se introducen correctamente, mostramos los datos
//        //Sino, mostramos un mensaje de error, GeomFromText($area)
//        if (mysql_query($consulta)) {
//
//            die('Registrado con éxito <br>' .
//                    'la noticia alta existosa , <br>');
//        } else {
//            die($consulta);
//        }
//    }
//}
//
//function Editar($idnoticia) {
//    if (isset($idnoticia)) {
//        $consulta = "select * from noticias where idnoticia=$idnoticia";
//        $ver = mysql_query($consulta);
//        if ($ver) {
//            $resultados = mysql_fetch_assoc($ver);
//            if ($resultados['idnoticia'] > 0) {
//                return true;
//            } else {
//                return false;
//            }
//        }
//    }
//}
