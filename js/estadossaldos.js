/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module('Appo', []);
app.controller('Matri', function ($scope, $http) {

    $scope.SaldoMatricula = function (id) {
        $http({
            url: '../controles/clases/ClaseBonosMatricula.php',
            method: "POST",
            data: {tipo: 'SaldoMatricula', 'id_matricula': id}
        }).then(function (response) {
          
                $scope.matriculas = response.data.matriculas;

            console.log($scope.matriculas );
        });
    };
    $scope.totalMatricula = function (id) {
        $http({
            url: '../controles/clases/ClaseBonosMatricula.php',
            method: "POST",
            data: {tipo: 'totalmatricula', 'id_matricula': id}
        }).then(function (response) {
          
                $scope.Total = response.data.Total;

            console.log( response.data.Total );
        });
    };
     
    
    
    
    
$scope.SaldoMatricula($scope.id_matricula);
$scope.totalMatricula($scope.id_matricula);



});
app.controller('Matri2', function ($scope, $http) {
       $scope.SaldoBonos = function (id) {
        $http({
            url: '../controles/clases/ClaseBonosMatricula.php',
            method: "POST",
            data: {tipo: 'SaldoBonos', 'id_matricula': id}
        }).then(function (response) {
          
                $scope.bonos = response.data.bonos;

            console.log($scope.bonos);
        });
    };
    $scope.totalBonos = function (id) {
        $http({
            url: '../controles/clases/ClaseBonosMatricula.php',
            method: "POST",
            data: {tipo: 'totalBonos', 'id_matricula': id}
        }).then(function (response) {
          
                $scope.Totalbonos = response.data.Totalbonos;

            console.log( response.data.Totalbonos );
        });
    };
    $scope.SaldoBonos($scope.id_matricula);
$scope.totalBonos($scope.id_matricula);
    });
//
//$(function () {
//
//    var x = $('#dialog-confirm').dialog({
//        autoOpen: false,
//        resizable: false,
//        height: "auto",
//        width: 400,
//        modal: false,
//        buttons: {
//            Aceptar: function () {
//                Agregar();
//                $(this).dialog("close");
//                return true;
//            },
//            Close: function () {
//                $(this).dialog("close");
//            }
//        }
//    });
//
////                //Cuando el formulario con ID acceso se envíe...
//    $("#eventos").on("submit", function (e) {
//        //Evitamos que se envíe por defecto
//        e.preventDefault();
//        //Creamos un FormData con los datos del mismo formulario
//
//        if ($('#tipo').val() == 'Agregar') {
//            $('#mensaje').html("Agrega Evento ?");
//
//        } else {
//            $('#mensaje').html("Modifica un evento ?");
//        }
//        x.dialog("open");
//    });
//
//
//    function Agregar() {
//
////        if ($('input:checkbox[name=publicar]:checked').val()) {
////            formData.append("publicar", 1);
////        } else
////        {
////            formData.append("publicar", 0);
////        }
//
//        var data = {};
//        data = {
//            'ideventos': $('#ideventos').val(),
//            'fecha': $('#fecha').val(),
//            'texto': $('#texto').val(),
//            'titulo': $('#titulo').val(),
//            'tipo': $('#tipo').val()
//        };
//        data = JSON.stringify(data);
//        //Llamamos a la función AJAX de jQuery       
//        $.ajax({
//            //Definimos la URL del archivo al cual vamos a enviar los datos
//            url: "../controles/clases/intermedio.php",
//            //Definimos el tipo de método de envío
//            type: "POST",
//            //Definimos el tipo de datos que vamos a enviar y recibir
//            dataType: "json",
//            //Definimos la información que vamos a enviar
//            data: data,
//            //Deshabilitamos el caché
//            cache: false,
//            //No especificamos el contentType
//            contentType: 'text/html',
//            //No permitimos que los datos pasen como un objeto
//            processData: false,
//            success: function (response) {
//                var arr = JSON.stringify(response);
//                console.log("Estado:" + response.Estado);
//                if (response.Estado == "ok") {
//                    location.reload();
//                }
//
//            },
//            error: (function (error) {
//                var arr = JSON.stringify(error);
//                console.log("error :" + arr);
//            })
////                        .done(function (response) {
////                var arr = JSON.stringify(response);
////                        ;
////                        console.log("echo:" + arr);
//////            var content = $(data).find("#content");
//////            $("#result").empty().append(content);
//        });
//    }
//    ;
//
//
//
//
//
//
//});


