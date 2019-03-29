/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



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
 

            $scope.lista = function (tipo) {
                $http({
                    url: '../controles/clases/intermedio.php',
                    method: "POST",
                    data: {tipo: tipo}
                }).then(function (response) {
                  //  $scope.listacc(valor, 'doc');
                      console.log("Llego!!");
                   $scope.evento = response.data.eventos;
                    console.log(response);
                });
            };
               $scope.listaImagenes = function () {

                $http({
                    url: '../controles/clases/intermedio.php',
                    method: "POST",
                    data: {tipo: 'listaimagenes'}
                }).then(function (response) {
                    $scope.doc = response.data.imagenes;
                    console.log($scope.doc);
            


                });
            };

            $scope.accion = function (valor) {
                if (!valor){
                     console.log("uno =Todos ");
                     $scope.lista('TodosEventosAgrupados');
                     $scope.listaImagenes();
                }
                if (valor > 0) {
//                    console.log('valor :' + valor);
////                    $scope.listacc(valor, 'doc');
//                    $scope.lista(valor,'eventosid');
//                    //$scope.search ={ideventos:valor};

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
   