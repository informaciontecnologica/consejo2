/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('subdespachos', []);
app.controller('despa', function ($scope, $http) {


    $scope.ListaFederal = true;

    $scope.ListaFede = function () {
        $http({
            url: '../controles/clases/Get_despachos.php',
            method: "POST",
            data: {tipo: 'ListaFederal'}
        }).then(function (response) {
            $scope.federales = response.data.federales;
            console.log(response);
        });

    }; 
    $scope.ListaFede();
 
});

$(document).ready(function () {
   

});