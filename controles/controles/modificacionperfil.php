<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require('../clases/conexion.php');
$pdo = new Conexion();
//Obtenemos los datos del formulario de registro
//$json = file_get_contents("php://input");
////////
//////////convert the string of data to an array
//$data = json_decode($json);
//$tipo = $data->tipo;

$mail = $_POST['mail'];

if (empty($_POST['idpersona'])) {
    $idpersona = "";
} else {
    $idpersona = $_POST['idpersona'];
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$documento = $_POST['documento'];
$idusuario = $_POST['idusuario'];
$nacimiento = $_POST['nacimiento'];

if (isset($_POST['id_matricula'])) {
    $id_matricula = $_POST['id_matricula'];
} else {
    $id_matricula = "0";
}


if (isset($_POST['noticias'])) {
    $noticias = $_POST['noticias'];
} else {
    $noticias = 0;
}
if (isset($_POST['matriculas'])) {
    $matriculas = 1;
} else {
    $matriculas = 0;
}

if (isset($_POST['bonos'])) {
    $bonos = 1;
} else {
    $bonos = 0;
}
if (isset($_POST['resoluciones'])) {
    $resoluciones = 1;
} else {
    $resoluciones = 0;
}
if (isset($_POST['eventos'])) {
    $eventos = 1;
} else {
    $eventos = 0;
}
print_r($_POST);
echo $matriculas . "-" . $bonos;

//Filtro anti-XSS
$mail = htmlspecialchars($mail);
$nombre = htmlspecialchars($nombre);
$apellido = htmlspecialchars($apellido);
$telefono = htmlspecialchars($telefono);
$direccion = htmlspecialchars($direccion);
$documento = htmlspecialchars($documento);

//Escribimos la consulta necesaria
$consultaUsuarios = "SELECT * FROM `personas` where documento=:documento";
//Obtenemos los resultados
$resultadoConsultaUsuarios = $pdo->prepare($consultaUsuarios);
$resultadoConsultaUsuarios->bindParam("documento", $documento);
$resultadoConsultaUsuarios->execute();
$datosConsultaUsuarios = $resultadoConsultaUsuarios->fetch();
$documento1 = $datosConsultaUsuarios['documento'];


$consultaUsuarios = "SELECT * FROM `usuario` where idusuario=:idusuario";
//Obtenemos los resultados
$resultadoConsultaUsuarios = $pdo->prepare($consultaUsuarios);
$resultadoConsultaUsuarios->bindParam(":idusuario", $_SESSION['idusuario']);
$resultadoConsultaUsuarios->execute();
$datosConsultaUsuarios = $resultadoConsultaUsuarios->fetch();
$estado = $datosConsultaUsuarios['usuario'];

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if ($estado == 'nuevo') {

    echo "insert";
    $consulta = "INSERT INTO `personas` (nombre,apellido,nacimiento,mail,telefono,direccion,documento,idusuario,id_matricula)
	VALUES (:nombre,:apellido,:nacimiento,:mail,:telefono,:direccion,:documento,:idusuario,:id_matricula)";
    $res = $pdo->prepare($consulta);
    $res->bindParam(":nombre", $nombre);
    $res->bindParam(":apellido", $apellido);
    $res->bindParam(":nacimiento", $nacimiento);
    $res->bindParam(":mail", $mail);
    $res->bindParam(":telefono", $telefono);
    $res->bindParam(":direccion", $direccion);
    $res->bindParam(":documento", $documento);
    $res->bindParam(":id_matricula", $id_matricula);
    $res->bindParam(":idusuario", $idusuario);
    $res->execute();
    $last = $pdo->lastInsertId();


    $consultaUsuarios = "update `usuario` set usuario='listo' where idusuario=:idusuario";
//Obtenemos los resultados
    $resultadoConsultaUsuarios = $pdo->prepare($consultaUsuarios);
    $resultadoConsultaUsuarios->bindParam(":idusuario", $_SESSION['idusuario']);
    $resultadoConsultaUsuarios->execute();
    
    echo $last;
    $res = null;

    $sql = "insert into noticias (idpersona,matriculas,bonos,eventos,resoluciones,noticias) "
            . "values (:idpersona,:matriculas,:bonos,:eventos,:resoluciones,:noticias)";
    $rese = $pdo->prepare($sql);
    $rese->bindParam(":idpersona", $last);
    $rese->bindParam(":matriculas", $matriculas);
    $rese->bindParam(":bonos", $bonos);
    $rese->bindParam(":eventos", $eventos);
    $rese->bindParam(":resoluciones", $resoluciones);
    $rese->bindParam(":noticias", $noticias);
    $rese->execute();

//	echo $consulta;
    //Si los datos se introducen correctamente, mostramos los datos
    //Sino, mostramos un mensaje de error, GeomFromText($area)
    if ($res) {
        $ok = TRUE;
        die('Registrado con éxito <br>' .
                'Se  insertado el Perfil<br>');
    } else {
        $ok = FALSE;
        die($consulta);
    }
    $res = null;
} else {

    $consulta = "update `personas` 
            set nombre =:nombre ,
            apellido=:apellido ,
            nacimiento=:nacimiento,
            mail=:mail ,
            telefono= :telefono,
            direccion= :direccion,
            documento=:documento,
            id_matricula=:id_matricula 
            where idpersona=:idpersona";
    $res = $pdo->prepare($consulta);
    $res->bindParam(":nombre", $nombre);
    $res->bindParam(":apellido", $apellido);
    $res->bindParam(":nacimiento", $nacimiento);
    $res->bindParam(":mail", $mail);
    $res->bindParam(":telefono", $telefono);
    $res->bindParam(":direccion", $direccion);
    $res->bindParam(":documento", $documento);
    $res->bindParam(":id_matricula", $id_matricula);
    $res->bindParam(":idpersona", $idpersona);
    $res->execute();
    //Si los datos se introducen correctamente, mostramos los datos
    //Sino, mostramos un mensaje de error, GeomFromText($area)
    if ($res) {
        $ok = TRUE;
        $reg = "select * from noticias where idpersona=:idpersona";
        $rese = $pdo->prepare($reg);
        $rese->bindParam(":idpersona", $idpersona);
        $rese->execute();
        echo "total: " . $rese->rowCount();
        if ($rese->rowCount() <= 0) {
            $sql = "insert into noticias (idpersona,matriculas,bonos,eventos,resoluciones,noticias) "
                    . "values (:idpersona,:matriculas,:bonos,:eventos,:resoluciones,:noticias)";
            $rese = $pdo->prepare($sql);
            $rese->bindParam(":idpersona", $idpersona);
            $rese->bindParam(":matriculas", $matriculas);
            $rese->bindParam(":bonos", $bonos);
            $rese->bindParam(":eventos", $eventos);
            $rese->bindParam(":resoluciones", $resoluciones);
            $rese->bindParam(":noticias", $noticias);
            $rese->execute();
        } else {
            //************************* 
            $reg = "update noticias set matriculas=:matriculas,bonos=:bonos,eventos=:eventos,resoluciones=:resoluciones,noticias=:noticias "
                    . "where idpersona=:idpersona";

            $rese = $pdo->prepare($reg);

            $rese->bindParam(":matriculas", $matriculas);
            $rese->bindParam(":bonos", $bonos);
            $rese->bindParam(":eventos", $eventos);
            $rese->bindParam(":resoluciones", $resoluciones);
            $rese->bindParam(":noticias", $noticias);
            $rese->bindParam(":idpersona", $idpersona);
            $rese->execute();
        }
        //******************************************************//
        if (($_FILES['file']['name'] != 'noimage.png') or ( $_FILES['file']['name'] != null)) {
            if (Upfile($_FILES, "../../imagenes/perfil/avatar/", 'Actualizar')) {
                $sql = "select * from avatar where idpersona=:idpersona";
                $res = $pdo->prepare($sql);
                $res->bindParam(":idpersona", $idpersona);
                $res->execute();

                if ($res->rowCount() == 1) {
                    $registro = $res->fetch(PDO::FETCH_ASSOC);
                    unlink("../../imagenes/perfil/avatar/" . $registro['avatar']);
                    $sql = "update  avatar set avatar=:avatar where idpersona=:idpersona";
                    $res = $pdo->prepare($sql);
                    $res->bindParam(":avatar", $_FILES["file"]["name"]);
                    $res->bindParam(":idpersona", $idpersona);
                    $res->execute();
                    echo "udpdate";
                } else {
                    $sql = "insert into avatar (idpersona,avatar) values (:idpersona,:avatar)";
                    $res = $pdo->prepare($sql);
                    $res->bindParam(":avatar", $_FILES["file"]["name"]);
                    $res->bindParam(":idpersona", $idpersona);
                    $res->execute();
                    echo "inserto";
                }
            }
        }

        die('Modificado con éxito <br>' .
                'Se a modificado el Perfil<br>');
    } else {
        $ok = FALSE;
        die($consulta);
    }
}
if ($ok) {
    $_SESSION['nombre'] = $nombre;
}

function Upfile($file, $directorio, $tipo) {

    $filenombre = $file['file']['name'];
    $uploadOk = 1;

    if (!is_dir($directorio)) {
        mkdir($directorio, 0777);
    }

// extraer extension del archivo
    $imageFileType = pathinfo(basename($file["file"]["name"]), PATHINFO_EXTENSION);
    $imagen = $imageFileType;
    $target_file = $directorio . $filenombre;
//    echo $target_file;


    $imagen = $filenombre . "." . $imageFileType;
    echo "tarjet:" . $target_file . "\n";
//basename($_FILES["file"]["name"]);
// Check if image file is a actual image or fake image
// Check file size
    if ($_FILES["file"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
//    if ($imageFileType != "htm" && $imageFileType != "html") {
//        echo "Sorry, only htm or html files are allowed.-" . $imageFileType;
//        $uploadOk = 0;
//    }
    echo $file["file"]["tmp_name"] . "*****" . $file["file"]["name"];
//
//// Check if $uploadOk is set to 0 by an error

    if ($uploadOk > 0) {

        if (move_uploaded_file($file["file"]["tmp_name"], $target_file)) {
            echo "El archivo " . basename($nombre_carpeta . $file["file"]["name"]) . "Se subio .\n $target_file ";
            return true;
        } else {
            echo "Lo siento, el archivo no subio.";
            return false;
        }
    }
}
