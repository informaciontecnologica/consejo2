/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module('App', ['ngSanitize']);
app.controller('index', function ($scope, $http, $filter) {
//    $scope.tipo = 'Agregar';
    $scope.formData = {};
    
    $scope.da = function () {
        $http({
            url: '../controles/clases/intermedio.php',
            method: "POST",
            data: {tipo: 'TodosEve'}
        }).then(function (response) {
            $scope.evento = response.data.eventos;
            console.log(response);
        });

    };
 $scope.da();
 
 
     $scope.banner = function () {
        $http({
            url: '../controles/clases/intermedio.php',
            method: "POST",
            data: {tipo: 'banner'}
        }).then(function (response) {
            $scope.banner = response.data.eventos;
            console.log(response);
        });

    };
 $scope.banner();
 
    
     $scope.Listaresolucion = function () {
        $http({
            url: '../controles/clases/resoluciones.php',
            method: "POST",
            data: {tipo: 'todos'}
        }).then(function (response) {

            if (response.data != null) {
                $scope.resoluciones = response.data.resoluciones;

            } else
            {
               
            }
            console.log(response);
        });
    };



    $scope.ValoresHonorarios = function () {
        $http({
            url: '../controles/controles/valores_jus.php',
            method: "POST",
            data: {tipo: 'Lista'}
        }).then(function (response) {
            $scope.Vhonorarios = response.data.Estado;
            console.log(response.data);
        });

    };
    
       $scope.ValoresHonorarios();

   
    
    $scope.currentPage = 0;
    $scope.pageSize = 2; // Esta la cantidad de registros que deseamos mostrar por página
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
app.filter('cortarTexto', function(){
  return function(input, limit){
    return (input.length > limit) ? input.substr(0, limit)+'...' : input;
  };
});

app.filter('eventostexto', function(){
  return function(text){
    return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
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
