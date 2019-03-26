<?php

session_start();
include '../clases/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['mail'])) and ( isset($_POST['password'])) and ( $_POST['password'] != '') and ( $_POST['mail'] != '')) {
        $password = $_POST['password'];
        $mail = $_POST['mail'];
        $pdo = new Conexion();
        $consulta = $pdo->prepare("Select * from usuario  where mail=:mail and clave=:clave");
        $consulta->bindparam(':mail', $mail);
        $consulta->bindparam(':clave', md5($password));
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            while ($resultados = $consulta->fetch()) {
                $_SESSION['usuario'] = $resultados['mail'];
                $_SESSION['idusuario'] = $resultados['idusuario'];
                $_SESSION['mail'] = $resultados['mail'];
                $_SESSION['perfil'] = $resultados['id_perfil'];
//              $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['SKey'] = uniqid(mt_rand(), true);
                $_SESSION['start'] = time(); // Taking now logged in time.
//////         // Ending a session in 30 minutes from the starting time.
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
//              $_SESSION['LastActivity'] = $_SERVER['REQUEST_TIME'];
//              $ip = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
//              $_SESSION['IPaddress'] = $ip;

                $Consultaper = $pdo->prepare("select p.*,pm.id_matriculas from personas p LEFT join personas_matricula pm on p.idpersona=pm.idpersona where idusuario=:idusuario");
                $Consultaper->bindparam(':idusuario', $_SESSION['idusuario']);
                $registro=$Consultaper->execute();

                $_SESSION['contando'] = $Consultaper->rowCount();
                if ($registro) {
                    $Regpersonas = $Consultaper->fetch();
                    $_SESSION['nombre'] = $Regpersonas;
                    if($Regpersonas['idpersona']==null){
                         $_SESSION['idpersona'] = "noidpersona";
                    } else {
                    $_SESSION['idpersona'] =$Regpersonas['idpersona'];
                    }
                    if ($Regpersonas['id_matricula'] != null) {
                        $_SESSION['id_matricula'] = $Regpersonas['id_matricula'];
                    } else {
                        $_SESSION['id_matricula'] = "nomatricula";
                        header("location: ../../vistas/perfil.php");
                        exit;
                    }
                    header("location: ../../vistas/index.php");
                    exit;
                } else {
                    $_SESSION['nombre'] = "nonombre";
                    $_SESSION['id_matricula'] = "nomatricula";
                    $_SESSION['idpersona'] = "noidpersona";
                    header("location: ../../vistas/perfil.php");
                    exit;
                }
            }
        } else {
            header("location: ../../vistas/errorsession.php");
            exit;
        }
        mysql_free_result($seleccion);
    }
} 
  