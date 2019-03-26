<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rubro
 *
 * @author daniel
 */
require_once 'Conexion.php';

class Rubro {

    //put your code here
    private $idrubro;
    private $rubro;
    private $nombreapellido;
    private $idpersona;

    const TABLA = 'rubro';

    function getIdrubro() {
        return $this->idrubro;
    }

    function getRubro() {
        return $this->rubro;
    }

    function __construct($idrubro, $rubro) {
        $this->idrubro = $idrubro;
        $this->rubro = $rubro;
    }

    public function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' order by idrubro ');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public static function RubroidPersona($idpersona) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT pr.* FROM personas_rubro pr where idpersona=:idpersona order by pr.idrubro');
        $consulta->bindParam(":idpersona", $idpersona);
        $consulta->execute();
        $conexion3 = new Conexion();
        $consulta2 = $conexion3->prepare('SELECT * FROM ' . self::TABLA . ' order by idrubro ');
        $consulta2->execute();
//       
        while ($registros = $consulta2->fetch()) {
            echo "<label>". $registros['rubro']."</label >";
            while ($re = $consulta->fetch()) {
               
                if ($re['idrubro'] == $registros['idrubro']) {
                    echo "<input class=\"form-control\" type=\"checkbox\" name=\"" . $registros['rubro'] . "\" value=\"ON\" checked=\"checked\" />";
                } else {
                    echo "<input class=\"form-control\" type=\"checkbox\" name=\"" . $registros['rubro'] . "\" value=\"ON\"  />";
                }
                echo "<br/>";
            }
        }

//    
    }

}
