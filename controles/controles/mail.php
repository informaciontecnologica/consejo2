<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if (isset($_POST["email"]))
{
if (isset($_POST['nombre'])){
    $nombre=$_POST['nombre'];
    
} else {
    $nombre="Consejo Abogados";
}
 
    if (isset($_POST['sujeto'])){
        $sujeto=$_POST['sujeto'];
    } else {
        $sujeto="Consulta de".$apellido." , ".$nombre;
    }
    $to = @trim(stripslashes($_POST['email'])); 
$de = $_SESSION['mail'];// "dtformosa@gmail.com";
//$to = $_POST['email'];
//$nombre = $apellido." , ".$nombre;
$subject = $sujeto;
$mensaje = $_POST["nota"];
$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset='utf-8'";
$headers[] = "From: {$nombre} <{$de}>";
$headers[] = "Bcc: Administrador <info@informaciontecn.com.ar>;$to";
$headers[] = "Reply-To: {$nombre} <{$de}>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/" . phpversion();

$result = mail($to, $subject, $mensaje, implode("\r\n", $headers));

 echo $result;
}
