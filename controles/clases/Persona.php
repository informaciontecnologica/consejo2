<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author daniel
 */

 require_once 'Conexion.php';
 class Persona {
    private $id;
    private $rubro;
    private $descripcion;
    const TABLA = 'rubro';
    public function getId() {
       return $this->id;
    }
    public function getNombre() {
       return $this->nombre;
    }
    public function getDescripcion() {
       return $this->descripcion;
    }
    public function setNombre($nombre) {
       $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion) {
       $this->descripcion = $descripcion;
    }
    public function __construct($rubro, $descipcion, $id=null) {
       $this->rubro = $rubro;
       $this->descripcion = $descipcion;
       $this->id = $id;
    }
    public function guardar(){
       $conexion = new Conexion();
       if($this->id) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');
          $consulta->bindParam(':nombre', $this->nombre);
          $consulta->bindParam(':descripcion', $this->descripcion);
          $consulta->bindParam(':id', $this->id);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, descripcion) VALUES(:nombre, :descripcion)');
          $consulta->bindParam(':nombre', $this->nombre);
          $consulta->bindParam(':descripcion', $this->descripcion);
          $consulta->execute();
          $this->id = $conexion->lastInsertId();
       }
       $conexion = null;
    }
    public static function buscarPorId($id){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT nombre, descripcion FROM ' . self::TABLA . ' WHERE id = :id');
       $consulta->bindParam(':id', $id);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['nombre'], $registro['descripcion'], $id);
       }else{
          return false;
       }
    }
        public static function recuperarTodos(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT rubro FROM ' . self::TABLA . ' ');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
 }
