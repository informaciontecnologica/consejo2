<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include '../cabezera.php'; ?>

    </head>
    <?php include '../barra.php'; ?> 
    <body ng-app="Appo" >
        <?php
                        include '../controles/clases/conexion.php';
                         $pdo = new conexion();
                        $consulta = $pdo->prepare("select * from personas where idpersona=:idpersona");
                        $consulta->bindparam(':idpersona', $_SESSION['idpersona']);
                        $consulta->execute();
                        if ($consulta->rowCount() > 0) {
                            
                            $registro = $consulta->fetch(PDO::FETCH_ASSOC);
                             $id_matricula =$registro['id_matricula'];
                        }
                        ?>
        <div class="container" ng-init="id_matricula =<?php echo $id_matricula ?>">
            <div  class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
            <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px;  "> 

             

            </section>
            <section ng-controller="Matri">
                
                <div class="panel panel-info"   style="margin-top: 5px">
                    <div class="panel-heading">
                        <h4>Estado de Matriculas Saldo Deudor</h4><?php
                     
                        print_r("Matricula: ".$id_matricula);


                            ?>
                        </div>
                        <div class="panel-body" >

                            <table border="1">
                                <thead>
                                    <tr>
                                        <th style="width: 150px;text-align: center;">Items</th>
                                        <th style="width: 150px;text-align: center;">Vencimientos</th>
                                        <th style="width: 150px;text-align: center;">Importe </th>

                                    </tr>
                                </thead>
                                <tbody ng-repeat="x in matriculas">
                                    <tr>
                                        <td style="text-align: center;">{{$index + 1}}</td>

                                        <td style="text-align: center;">{{x.vencim_cuota|date:'dd/MM/yyyy'}}</td>
                                        <td style="text-align:  right; padding-left: 5px;">{{x.monto_cuota| currency}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>   
                        <div class="panel-footer" >  Importe Total Matricula: {{ Total | currency}}</div>

                    </div>

                </section>
                <section ng-controller="Matri2" >

                    <div class="panel panel-info"   style="margin-top: 5px">
                        <div class="panel-heading">
                            <h4>Estado de Bonos Saldo Deudor</h4>
                        </div>
                        <div class="panel-body" >

                            <table border="1">
                                <thead>
                                    <tr>
                                        <th style="width: 60px; text-align: center;">Items</th>
                                        <th style="width: 80px;  text-align: center;">N° Exp.</th>
                                        <th style="width: 150px;text-align: center;">Caratural</th>
                                        <th style="width: 150px;text-align: center;">Folio</th>
                                        <th style="width: 150px;text-align: center;">Fecha Pago </th>
                                        <th style="width: 150px;text-align: center;">Fecha actuación </th>
                                        <th style="width: 150px;text-align: center;">Importe</th>
                                    </tr>
                                </thead>
                                <tbody ng-repeat="x in bonos">
                                    <tr>
                                        <td style="text-align: center;">{{$index + 1}}</td>
                                        <td style="text-align: center;">{{x.NUMERO_EXPTE}}</td>
                                        <td style="text-align: center;">{{x.CARATULAEXPTE}}</td>
                                        <td style="text-align: center;">{{x.FOLIO}}</td>
                                        <td style="text-align: center;">{{x.FECHA_PAGO|date:'dd/MM/yyyy'}}</td>
                                        <td style="text-align: center;">{{x.FECHA_ACTUACION|date:'dd/MM/yyyy'}}</td>
                                        <td style="text-align:  right; padding-left: 5px;">{{x.MONTOBONO| currency}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>   
                        <div class="panel-footer" >  Importe Total Matricula: {{ Totalbonos | currency}}</div>

                    </div>

                </section>
            </div>
    <?php include '../pie.php'; ?>   
    </body>

    <script src="../js/estadossaldos.js" type="text/javascript"></script>

</html>


