<?php
$carpetaAdjunta="../../imagenes/eventos/";
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if ($_SERVER['RESQUEST_METHOD']=="DELETE"){
    parse_str(file_get_contents("php://input"),$datosDELETE);
    $key=$datosDELETE['key'];
    unlink($carpetaAdjunta.$key);
    echo 0;
}
exit;

