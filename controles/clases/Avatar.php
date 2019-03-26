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
class Avatar {

    //put your code here
    private $foto;
    private $idpersona;

    function GetFoto($idpersona) {
        if ($idpersona != "") {
            $pdo = new conexion();
            $string = "select * from avatar where idpersona=:idpersona";
            $consulta = $pdo->prepare($string);
            $consulta->bindparam(':idpersona', $idpersona);
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetch();
                return $registro['avatar'];
            } else {

                return "noimage.png";
            }
        }
    }
    function SetFoto($idpersona,$avatar){
        
    }

}
