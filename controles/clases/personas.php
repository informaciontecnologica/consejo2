<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'conexion.php';

class personas {

    private $id;
    private $nombre;
    private $apellido;
    private $documento;
    private $nacimiento;
    private $direccion;
    private $telefono;
    private $mail;

    public function Listar() {
        $pd = new Conexion();
        $string = "select 
             p.*,u.*,a.idavatar,a.avatar
             FROM personas p LEFT JOIN usuario u on p.idusuario=u.idusuario LEFT JOIN perfil pe on u.id_perfil=pe.id_perfil LEFT join avatar a on 
                p.idpersona=a.idpersona  ORDER BY apellido,nombre";
        $consulta = $pd->prepare($string);

        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("personas" => $rows);

            return $pa;
        }
    }

    public function InsertarPersona($data) {
        $pd = new Conexion();
        $mail = $data->mail;
        $clave = md5($data->clave);
        $fecha = date($data->nacimiento);
        $idperfil = 5;
        $nombre = $data->nombre;
        $apellido = $data->apellido;
        $direccion = $data->direccion;
        $telefono = $data->telefono;
        $nacimiento = $data->nacimiento;
        $documento = $data->documento;

//Filtro anti-XSS
        $mail = htmlspecialchars($mail);
        $nombre = htmlspecialchars($nombre);
        $apellido = htmlspecialchars($apellido);
        $telefono = htmlspecialchars($telefono);
        $direccion = htmlspecialchars($direccion);
        $documento = htmlspecialchars($documento);

//Escribimos la consulta necesaria
        $consultaUsuarios = "SELECT * FROM `personas` where documento=:documento'";

//Obtenemos los resultados
        $resultadoConsultaUsuarios = $pd - prepare($consultaUsuarios);
        $resultadoConsultaUsuarios->execute();
        $datosConsultaUsuarios = $resultadoConsultaUsuarios->fetch(PDO::FETCH_ASSOC);
        $documento1 = $datosConsultaUsuarios['documento'];



        if ($documento1 == null) {
            $pd = new Conexion();
            $sql = "insert into usuario (mail,clave,fecha,id_perfil) values (:mail,:clave,current_date,:idperfil)";
            $ra = $pd->prepare($sql);
            $rea->bindParam(":mail", $mail);
            $rea->bindParam(":clave", $clave);
            $rea->bindParam(":idperfil", $idperfil);
            $rea->execute();


            if ($rea) {
                $idusuario = $pd->lastInsertId();
                $consulta = "INSERT INTO `personas` (nombre,apellido,nacimiento,mail,telefono,direccion,documento,idusuario)
         	VALUES (:nombre,:apellido,:nacimiento,:mail,:telefono,:direccion,:documento,:idusuario)";
                $ree = $pd->prepare($consulta);
                $ree->bindParam(":nombre", $nombre);
                $ree->bindParam(":apellido", $apellido);
                $ree->bindParam(":nacimiento", $nacimiento);
                $ree->bindParam(":mail", $mail);
                $ree->bindParam(":telefono", $telefono);
                $ree->bindParam(":direccion", $direccion);
                $ree->bindParam(":documento", $documento);
                $ree->bindParam(":idusuario", $idusuario);
                $ree->execute();

                if ($ree) {
                    $idpersona = $pd->lastInsertId();
                    $consulta = "INSERT INTO `personas_matricula` (idpersona)
         	VALUES (:idpersona)";
                    
                    $reeq = $pd->prepare($consulta);
                    $reeq->bindParam(":idpersona", $idpersona);
                    $reeq->execute();
                    if ($reeq) {
                    $row = array("estado" => "completo");
                    
                    return $row;
                    }
                }
            }
        }
    }

    public function CambioMatricula($idpersona, $matricula) {
        echo $idpersona . "-" . $matricula;
        $pd = new Conexion();
        $string = "UPDATE personas_matricula set id_matricula=:matricula where idpersona=:idpersona";
        $consulta = $pd->prepare($string);
        $consulta->bindParam(":matricula", $matricula);
        $consulta->bindParam(":idpersona", $idpersona);
        $consulta->execute();
        if ($consulta) {
            $row = array("estado" => "ok");
            return $row;
        }
    }

    public function PersonaMatricula($matricula) {
        $pd = new Conexion();
        $string = "select * from abogados ab left join matriculas ma on ab.ID_ABOGADO=ma.id_abogado where ma.id_matricula=:matricula";
        $consulta = $pd->prepare($string);
        $consulta->bindParam(":matricula", $matricula);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("personamatricula" => $rows);

            return $pa;
        }
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getNacimiento() {
        return $this->nacimiento;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getMail() {
        return $this->mail;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setNacimiento($nacimiento) {
        $this->nacimiento = $nacimiento;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

}
