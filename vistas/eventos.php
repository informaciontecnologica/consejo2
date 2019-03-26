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
                                        <div class="docuinformacion" ng-repeat="archi in doc">

                                            <a ng-href="../documentos/{{archi.path}}/{{archi.documento}}" download="">{{archi.documento}}</a> 

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
    <script>
        var app = angular.module('App', ['ngSanitize']);
        app.controller('eventos', function ($scope, $http, $filter) {
            $scope.tipo = 'Agregar';
            $scope.formData = {};
            id = {};
            console.log($scope.ideventos);


            $scope.listauno = function (valor) {

                $http({
                    url: '../controles/clases/intermedio.php',
                    method: "POST",
                    data: {tipo: 'eventosid', ideventos: valor}
                }).then(function (response) {
                    $scope.evento = response.data.eventos;
                    //   $scope.documentos(valor, "doc");
                    console.log(response.data);


                });
            };

            $scope.listacc = function (ideventos, tipo) {
                $http({
                    url: '../controles/clases/GetDocumento.php',
                    method: "POST",
                    data: {'idevento': ideventos, 'tipo': tipo}
                }).then(function (response) {
                    $scope.doc = response.data.documento;
                    console.log(response.data.documento);
                });
            };


            $scope.lista = function (valor,tipo) {
                $http({
                    url: '../controles/clases/intermedio.php',
                    method: "POST",
                    data: {tipo: tipo,ideventos:valor}
                }).then(function (response) {
                    $scope.listacc(valor, 'doc');
    //                    console.log("Llego!!");
                    $scope.evento = response.data.eventos;
                    console.log(response.data.eventos);
                });
            };


            $scope.accion = function (valor) {
                if (!valor)
                    console.log("uno '' ");
                if (valor > 0) {
                    console.log('valor :' + valor);
//                    $scope.listacc(valor, 'doc');
                    $scope.lista(valor,'eventosid');
                    //$scope.search ={ideventos:valor};

                } else {
                     $scope.lista(valor,'TodosEventosAgrupados');
                 }
   

            };


            $scope.currentPage = 0;
            $scope.pageSize = 10; // Esta la cantidad de registros que deseamos mostrar por página
            $scope.pages = [];
            // 
            $scope.configPages = function () {
                $scope.pages.length = 0;
                var ini = $scope.currentPage - 4;
                var fin = $scope.currentPage + 5;
                if (ini < 1) {
                    ini = 1;
                    if (Math.ceil($scope.evento.length / $scope.pageSize) > 10)
                        fin = 10;
                    else
                        fin = Math.ceil($scope.evento.length / $scope.pageSize);
                } else {
                    if (ini >= Math.ceil($scope.evento.length / $scope.pageSize) - 10) {
                        ini = Math.ceil($scope.evento.length / $scope.pageSize) - 10;
                        fin = Math.ceil($scope.evento.length / $scope.pageSize);
                    }
                }
                if (ini < 1)
                    ini = 1;
                for (var i = ini; i <= fin; i++) {
                    $scope.pages.push({no: i});
                }
                if ($scope.currentPage >= $scope.pages.length)
                    $scope.currentPage = $scope.pages.length - 1;
            };
            $scope.setPage = function (index) {
                $scope.currentPage = index - 1;
            };
        });
        app.filter('startFromGrid', function () {
            return function (input, start) {
                if (!input || !input.length) {
                    return;
                }
                start = +start;
                return input.slice(start);
            };
        });
    </script>
</html>
