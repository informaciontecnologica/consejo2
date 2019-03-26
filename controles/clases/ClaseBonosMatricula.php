<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-Type: application/json");
include 'conexion.php';
//get the data
$json = file_get_contents("php://input");
//////
////////convert the string of data to an array
$data = json_decode($json);
$tipo = $data->tipo;
switch ($tipo) {
   case 'SaldoMatricula':
        $id_matricula = $data->id_matricula;
        $pdo = new Conexion();
        $sql = "Select * from cuenta_matricula where id_matricula=:id_matricula order by vencim_cuota DESC";

        $rese = $pdo->prepare($sql);
        $rese->bindParam(":id_matricula",$id_matricula);
        $rese->execute();
        if ($rese->rowCount() > 0) {
             while ($registro = $rese->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
//            $reg[] = $rese->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(array("matriculas" => $rows));
        } else {
            echo json_encode(array("Estado" => "false"));
        }
        exit();
        break;
   case "totalmatricula":
        $id_matricula = $data->id_matricula;
        $pdo = new Conexion();
        $sql = "Select sum(monto_cuota) as Total from cuenta_matricula where id_matricula=:id_matricula order by vencim_cuota DESC";

        $rese = $pdo->prepare($sql);
        $rese->bindParam(":id_matricula",$id_matricula);
        $rese->execute();
        if ($rese->rowCount() > 0) {
             while ($registro = $rese->fetch(PDO::FETCH_ASSOC)) {
                $rows = $registro['Total'];
            }
//            $reg[] = $rese->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(array("Total" => $rows));
        } else {
            echo json_encode(array("Estado" => "false"));
        }
       exit();
       break;
        case 'SaldoBonos':
        $id_matricula = $data->id_matricula;
        $pdo = new Conexion();
        $sql = "Select * from bonos where id_matricula=:id_matricula order by FECHA_ACTUACION DESC";

        $rese = $pdo->prepare($sql);
        $rese->bindParam(":id_matricula",$id_matricula);
        $rese->execute();
        if ($rese->rowCount() > 0) {
             while ($registro = $rese->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
//            $reg[] = $rese->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(array("bonos" => $rows));
        } else {
            echo json_encode(array("Estado" => "false"));
        }
        exit();
        break;
   case "totalBonos":
        $id_matricula = $data->id_matricula;
        $pdo = new Conexion();
        $sql = "Select sum(MONTOBONO) as Total from bonos where id_matricula=:id_matricula order by FECHA_ACTUACION DESC";

        $rese = $pdo->prepare($sql);
        $rese->bindParam(":id_matricula",$id_matricula);
        $rese->execute();
        if ($rese->rowCount() > 0) {
             while ($registro = $rese->fetch(PDO::FETCH_ASSOC)) {
                $rows = $registro['Total'];
            }
//            $reg[] = $rese->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode(array("Totalbonos" => $rows));
        } else {
            echo json_encode(array("Estado" => "false"));
        }
       exit();
       break;
   
}    