<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'conexion.php';

/**
 * Jorge Daniel Castro
 *
 * Clase de Abogados 
 *
 * permite agregar , modificar , borrar , verificar la matricula y el id abogado
 *
 * @author Jorge Daniel Castro [Epsilon Eridani]
 * @author http://www.informaciontecn.com.ar
 *
 * 
 *
 *
 * @package JDC
 */
class Abogado {

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

    public function DetallePerfilPersonal($idabogado) {

        $pd = new Conexion();
        $string = "select * from abogado where ID_ABOGADO=:id_abogado";

        $consulta = $pd->prepare($string);
        $consulta->bindParam(":id_abogado", $idabogado);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows = $registro;
            }
            $pa = array("abogado" => $rows);

            return $pa;
        }
    }
    public   function Formatofechas($fecha) {
            $date = new DateTime($fecha);
            return $date->format('Y-m-d');
        }
    
        public function AgregarPerfilPersonal($abogado) {

      

        $pd = new Conexion();

        $string = "INSERT INTO personas( idusuario, documento, nombre, apellido, nacimiento, direccion, telefono,"
                . "sexo, pais, estadocivil, provincia,ciudad,barrio) "
                . "VALUES (:idusuario, :documento, :nombre, :apellido, :nacimiento, :direccion, :telefono,"
                . ":sexo, ,:pais, :estadocivil, :provincia,:ciudad,:barrio)";

//        $fmatricula = Formatofechas($abogado->MATRICULACION);
//        $fegre = Formatofechas($abogado->FECHAEGRESO);
//        $ftitulo = Formatofechas($abogado->FECHATITULO);
        $fnac = Formatofechas($abogado->nacimiento);
        $consulta = $pd->prepare($string);

        $consulta->bindParam(":idusuario", $abogado->idusuario);
        $consulta->bindParam(":documento", $abogado->documento);
        $consulta->bindParam(":nombre", $abogado->nombre);
        $consulta->bindParam(":apellido", $abogado->apellido);
        $consulta->bindParam(":nacimiento", $fnac);
        $consulta->bindParam(":direccion", $abogado->dirparticular);
        $consulta->bindParam(":telefono", $abogado->teleparticular);
        $consulta->bindParam(":sexo", $abogado->sexo);
//        $consulta->bindParam(":mail", $abogado->email);
$consulta->bindParam(":pais", $abogado->nacionalidad->idpais);

        $consulta->bindParam(":estadocivil", $abogado->estadocivil);

        $consulta->bindParam(":provincia", $abogado->provincia);
//        $consulta->bindParam(":municipio", $abogado->municipio);
        $consulta->bindParam(":ciudad", $abogado->ciudad);
        $consulta->bindParam(":barrio", $abogado->barrio);
//        $consulta->bindParam(":codigopostal", $abogado->codigopostal);
        $consulta->execute();

        if ($consulta) {
            $ultimo = $pd->lastInsertId();

//            $sql = "insert into personas_matricula (idpersona) values (:idpersona) ";
//            $consulta = $pd->prepare($sql);
//            $consulta->bindParam(":idpersona", $ultimo);
//
//            $consulta->execute();
            $_SESSION['idpersona'] = $ultimo;
            $pa = array("personas" => "ok", "idpersona" => $ultimo);
            return $pa;
        }
    }

    public function ModificarPerfilPersonal($abogado) {

     

        $pd = new Conexion();
        $string = "update personas set idusuario=:idusuario , documento=:documento, nombre=:nombre, apellido=:apellido ,nacimiento=:nacimiento, direccion=:direccion, telefono=:telefono,"
                . "sexo=:sexo, pais=:pais, estadocivil=:estadocivil, provincia=:provincia,ciudad=:ciudad,barrio=:barrio where idpersona=:idpersona";
        $fe= $this->Formatofechas($abogado->nacimiento);
        
         $fnac = $fe;
        $consulta = $pd->prepare($string);

        $consulta->bindParam(":idusuario", $abogado->idusuario);
        $consulta->bindParam(":documento", $abogado->documento);
        $consulta->bindParam(":nombre", $abogado->nombre);
        $consulta->bindParam(":apellido", $abogado->apellido);
        
        $consulta->bindParam(":nacimiento", $fnac);
        $consulta->bindParam(":direccion", $abogado->dirparticular);
        $consulta->bindParam(":telefono", $abogado->teleparticular);
        $consulta->bindParam(":sexo", $abogado->sexo);
        //        $consulta->bindParam(":mail", $abogado->email);
        $consulta->bindParam(":pais", $abogado->nacionalidad->idpais);
        $consulta->bindParam(":estadocivil", $abogado->estadocivil);
        $consulta->bindParam(":provincia", $abogado->provincia);
//        $consulta->bindParam(":municipio", $abogado->municipio);
        $consulta->bindParam(":ciudad", $abogado->ciudad);
        $consulta->bindParam(":barrio", $abogado->barrio);
        $consulta->bindParam(":idpersona", $abogado->idpersona);
        $consulta->execute();
        if ($consulta) {
          $pa = array("personas" => "ok");

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
        $consultaUsuarios = "SELECT * FROM personas where documento=:documento'";

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
                $consulta = "INSERT INTO personas (nombre,apellido,nacimiento,mail,telefono,direccion,documento,idusuario)
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
                    $row = array("estado" => "completo");
                    return $row;
                }
            }
        }
    }

    public function CambioMatricula($idpersona, $matricula) {
        echo $idpersona . "-" . $matricula;
        $pd = new Conexion();
        $string = "UPDATE personas set id_matricula=:matricula where idpersona=:idpersona";
        $consulta = $pd->prepare($string);
        $consulta->bindParam(":matricula", $matricula);
        $consulta->bindParam(":idpersona", $idpersona);
        $consulta->execute();
        if ($consulta) {
            $row = array("estado" => "ok");
            return $row;
        }
    }

    /**
     * Verifica la existencia de la matricula en la tabla Matriculas 
     *
     * @return integer el id_abogado que pertenece a esa matricula
     * @param string $matricula id de matricula asignada
     */
    public function ExisteMatricula($matricula) {

        $pd = new Conexion();
        $string = "select * from matriculas where id_matricula=:idmatricula";
        $consulta = $pd->prepare($string);
        $consulta->bindParam(":idmatricula", $matricula);
        $consulta->execute();

        if ($consulta) {
            if ($consulta->rowCount() > 0) {
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $rows = $registro['id_matricula'];
                }
            } else {
                $rows = $this->UltimoIdAbogado();
            }
        }return $rows;
    }

    public function UltimoIdAbogado() {
        $pd = new Conexion();
        $string = "select max(id_abogado) as id_abogado from abogado ";
        $consulta = $pd->prepare($string);
        $consulta->execute();
        if ($consulta) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows = $registro['id_abogado'] + 1;
            }
        }
        return $rows;
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
