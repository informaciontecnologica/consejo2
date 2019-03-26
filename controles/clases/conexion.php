<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author daniel
 */

 class Conexion extends PDO { 
   private $tipo_de_base = 'mysql';
//   private $host = 'localhost';
//   private $base = '';
//   private $user = 'root';
//   private $clave = 'informac_consejo'; 
   
   public function __construct() {
         $url = $_SERVER['SERVER_NAME'];
        if ($url == 'localhost') {
            $host ="localhost"; 

            $user = "root";
            $clave = "";
            $base = "informac_consejo";
        } else {
            $host = "localhost";
            $user = "informac_consejo";
            $clave = "qwedcxz123";
            $base = "informac_consejo";
        }
        $opciones = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);
      //Sobreescribo el método constructor de la clase PDO.
      try{
          
         parent::__construct($this->tipo_de_base.':host='.$host.';dbname='.$base, $user, $clave, $opciones);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 
