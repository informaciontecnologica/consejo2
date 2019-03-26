<?php

//Conectamos a la base de datos
include '../clases/conexion.php';
$pdo=new conexion();
//Obtenemos los datos del formulario de registro
//$nombrePOST =$_POST["nombreRegistro"];
$mailPOST = $_POST["mailRegistro"];
$passPOST = $_POST["passRegistro"];

//"a";// "b";//"c";//
//Filtro anti-XSS
$mailPOST = htmlspecialchars($mailPOST);
$passPOST = htmlspecialchars($passPOST);
//$nombrePOST = htmlspecialchars(mysql_real_escape_string( $nombrePOST));
//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresmail = "60";
$maxCaracteresPassword = "16";
$maxCaracteresnombre = "40";


//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if (strlen($mailPOST) > $maxCaracteresmail) {
    die('El nombre de mail no puede superar los ' . $maxCaracteresmail . ' caracteres');
}

if (strlen($passPOST) > $maxCaracteresPassword) {
    die('La contraseña no puede superar los ' . $maxCaracteresPassword . ' caracteres');
}
//if(strlen($nombrePOST) > $maxCaracteresnombre) {
//	die('el nombre no puede superar los '.$maxCaracteresnombre.' caracteres');
//};
//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
$mailPOSTMinusculas = strtolower($mailPOST);

//Escribimos la consulta necesaria
$consultaUsuarios = "SELECT * FROM `usuario` where mail=:mail";

//Obtenemos los resultados
$stmt = $pdo->prepare($consultaUsuarios);

$stmt->execute(array('mail' => $mailPOSTMinusculas));
$editRow = $stmt->FETCH(PDO::FETCH_ASSOC);

$mail = $editRow['mail'];


//$resultadoConsultaUsuarios = mysql_query($consultaUsuarios) or die(mysql_error());
//$datosConsultaUsuarios = mysql_fetch_array($resultadoConsultaUsuarios);
//$mail = $datosConsultaUsuarios['mail'];
//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if (empty($mailPOST) || empty($passPOST)) {
    die('Debes introducir datos válidos');
} else if ($mailPOSTMinusculas == $mail) {
    die('Ya existe un mail con el nombre ' . $mailPOST . '<br/> volve a intentar');
} else {
    $passwordConSalt = md5($passPOST);
    //Armamos la consulta para introducir los datos
//$st=$pdo->prepare("insert aa (aa) values ('ssss')");
    $st=$pdo->prepare("INSERT INTO `usuario` (mail, usuario,clave,fecha,id_perfil) VALUES (:mailPOST,'nuevo', :passwordConSalt,current_date,4)");
    $st->bindparam(':mailPOST', $mailPOST);
    $st->bindparam(':passwordConSalt', $passwordConSalt);
    $st->execute();
   
 
    //Si los datos se introducen correctamente, mostramos los datos
    //Sino, mostramos un mensaje de error
    if ($st) {
        include '../../controles/clases/ClaseMail.php';
        $mensaje="Estimado Sr./ra.: $mailPOST \n"
                . "Se registro con Exito! en nuestro Sitio de Consejo Profesion de Abogados , verificaremos a la brevedad sus datos de matricula y estaremos en contacto con ud."
                . "\n atte. \n La Direccion";
        $mail = new Mail($mailPOST,"info@informaciontecn.com.ar","registro nuevo",$mensaje);
        if ($mail) {
            echo "ok Correo";
        }
        die('<strong>' . $mailPOST . '</strong><br>'
                . 'Se registro con éxito <br/>' .
                'Ya puede acceder a tu cuenta.<br/>');
    } else {
        die('Error');
    }
}

