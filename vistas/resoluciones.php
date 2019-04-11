<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
            <title></title>
            <?php include '../cabezera.php'; ?>

    </head>
    <body>
        <header>
            <?php include '../barra.php'; ?> 
        </header> 

        <div class="container" style="margin-top:70px;">
            <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
          
<!--            <section  class="col-md-offset-2 col-xs-12  col-md-8" style=" height: 100%;  background-color:  #000000; margin-top: 5px;"  > 
                <?php
                $idevento = '40';
                include '../controles/clases/conexion.php';
                $rea = new Conexion();
                $sql = "select * from imagenes i left join eventos e on e.ideventos=i.idevento where e.ideventos=:idevento";
                $consultas = $rea->prepare($sql);
                $consultas->bindParam(":idevento", $idevento);
                $consultas->execute();
                if ($consultas) {
                    while ($registro = $consultas->fetch(PDO::FETCH_ASSOC)) {
                        $rows[] = $registro;
                    }
                    $fila = count($rows);
                }
                ?>
                <div id="carousel-example-generic" class="carousel slide  " style=" text-align: center;  height:500px; margin-top: 25px; margin: auto;" data-ride="carousel" >
                    Indicators 
                    <ol class="carousel-indicators">
                        <?php
                        for ($index = 0; $index < $fila; $index++) {

                            $re = ($index == 0) ? $clas = 'class="active"' : "";
                            ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $index ?>" <?php echo $clas ?>></li>


                        </ol>

                        Wrapper for slides 
                        <div class="carousel-inner" role="listbox">
                            <?php
                            for ($index = 0; $index < $fila; $index++) {

                                $re = ($index == $fila - 1) ? $clas = 'active' : "";
                                ?>
                                <div class="item <?php echo $clas ?>">

                                    <img style="height: 500px; " src="<?php echo"../imagenes/" . $rows[$index]['path'] . "/imagenes/" . $rows[$index]['imagen']; ?>" alt="..."/>
                                    <div class="carousel-caption"  >
                                        <p style="background-color:  #555;">
                                            <?php
                                            echo $rows[$index]['titulo'];
                                            ?>
                                         
                                    </div>
                                </div>
    <?php } } ?>

                    </div>
                </div>
            </section>-->
            <div style="margin-top: 15px;" class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Declaraciones y resoluciones</a></div>
                    <ul class="nav navbar-nav">

                        <li>
                            <div  class="input-group  col-md-4"> 
                                <span class="input-group-addon">Filter</span>
                                <input class="form-control" type="text" ng-model="search"/>

                            </div>
                        </li>
                    </ul>
                </div>


                <?php
                $titulo = "";
                $fecha = "";
                $texto = "";
                ?>
                <div id="dedos"></div>
            </div> 
            <section  style="margin-top: 15px;" ng-app="App" ng-controller="resol"  >
                <div  class="row">
                    <div >
                        <div class='btn-group'> 
                            <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                            <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                            <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 200px">
                                    Tag
                                </th>
                                <th style="width: 200px">
                                    Titulo
                                </th>
                                <TH style="width: 110px">
                                    Fecha
                                </TH>
                                <th >
                                    Texto
                                </th>
                                <th>
                                    Documentos
                                </th>

                            </tr>
                        </thead>
                        <tbody ng-repeat="x in resoluciones| filter:search | startFromGrid: currentPage * pageSize | limitTo: pageSize">
                            <tr>
                                <td>
                                    {{x.tag}}
                                </td>
                                <td>
                                    {{x.titulo}}
                                </td>
                                <td>
                                    {{x.fecha}}
                                </td>
                                <td>
                                    {{x.texto}}
                                </td>

                                <td>
                                    <button  ng-click="ListasDocumentos(x.idresolucion);" class="btn btn-primary">Documentos</button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div ng-show="detalless" class="row">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th style="width: 200px">
                                    Documentos y resoluciones
                                </th>


                            </tr>
                        </thead>
                        <tbody ng-repeat="x in resolucion_doc">
                            <tr>
                                <td>
                                    <a  ng-href="../documentos/{{x.link}}"  download >{{x.link}}</a>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="message"></div>

                <div id="dialog-confirm" title="Información">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                        <span id="mensaje"></span> </p>
                </div>
            </section>   </div>

    </body>
    <script src="../js/resoluciones.js" type="text/javascript"></script>

</html>