<?php ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../cabezera.php';
        ?>   
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
    </head>



    <body ng-app="App" ng-controller="eventos">
        <header>
            <?php include '../barra.php'; ?> 
        </header> 


        <?php
        if (isset($_GET['id'])) {
            $uno = $_GET['id'];
        } else {
            $uno = false;
        }
        ?>
        <section class="container" ng-init="accion('<?php echo $uno; ?>');" style="margin-top:70px;" >
            <div class="barrasuperior col-xs-12">Consejo Profesional de la Abogacia Formosa</div>

            <div class="row">
                <!--       style="display: block;
                             width:  70%; height: 100%; margin: auto; background-color:  #000000;  margin-bottom: 10px; "-->
                <div class="col-xs-12" style="display: block;" > 
                    <div class="navbar navbar-default col-xs-12" role="navigation" >

                        <div class="navbar-header"><a class="navbar-brand" href="#">Eventos</a>
                            <ul class="nav navbar-nav">

                                <li><a ng-click="accion('todos')" >Todos</a></li>
                            </ul></div>
                        <ul class="nav navbar-nav">

                            <li><a><input class="form-control" type="text" value="filtro" placeholder="Filtro" ng-model="search"/> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="docuinformacion" ng-repeat="archi in doc">
                    {{archi.idevento}} asdasdasd
                    <!--                                            <a ng-href="../documentos/{{archi.path}}/{{archi}}" download=""></a> -->

                </div>
                <div class="row">

                    <div class='btn-group'>
                        <button type='button' class='btn btn-default btn-sm' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                        <button type='button' class='btn btn-default btn-sm' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                        <button type='button' class='btn btn-default btn-sm' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                    </div>

                </div>
                <div class="row col-xs-12 ">
                    <div class="col-xs-12 col-md-12 TarjertaEventos" ng-repeat="eve in evento| filter:search | startFromGrid: currentPage * pageSize | limitTo: pageSize">
                        <div class="col-xs-12 col-md-12">
                            <h3 >{{eve.titulo}} Fecha del evento: {{eve.fecha| date:'dd/MM/yyyy'}}
                                <a  class="pull-right" target="Bajas documentación" ng-href='../imagenes/eventos/{{eve.imagenevento}}' >{{eve.imagenevento != null ? "download" : "" }}</a></h3>
                            <h5></h5>
                        </div>

                        <div class="col-xs-12 col-md-8  " ng-bind-html="eve.texto"></div>

                        <div class="panel panel-default col-xs-12 col-md-4 "> 
                            <div class="panel-heading">Folletos </div>
                            <div class="panel-body">
                                <img class=" img-thumbnail " ng-src="../imagenes/eventos/{{eve.imagenevento}}" title=""/> 
                                <div class="panel panel-default col-xs-12 col-md-12 "> 
                                    <div class="panel-heading">Documentos Información </div>
                                    <div class="panel-body">
                                        <div class="col-xs-12">
                                            <div class="docuinformacion" ng-repeat="archi in doc ">
                                                {{archi.imagen}} 
                                                                                            <a ng-href="../documentos/{{archi.path}}/{{archi}}" download=""></a> 

                                            </div>
                                        </div>   
                                    </div>
                                </div>      

                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class='btn-group'>
                            <button type='button' class='btn btn-default btn-sm' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                            <button type='button' class='btn btn-default btn-sm' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                            <button type='button' class='btn btn-default btn-sm' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                        </div>
                    </div>
                </div>

        </section>


        <?php include '../pie.php'; ?> 



    </body>
    <script src="../js/eventos.js" type="text/javascript"></script>
</html>
