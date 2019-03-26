/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('App', ['ngRoute']);
app.controller('despachos', function ($scope, $http, $filter) {
    $scope.tribunalesFederales = [
        {id: 1, nombre: 'Civil 1'},
        {id: 2, nombre: 'Civil 2'},
        {id: 3, nombre: 'Tribunal 1'},
        {id: 4, nombre: 'Tribunal 2'}
    ];
    $scope.tribunales = [
        {id: 1, nombre: 'Secretaría de recursos'},
        {id: 2, nombre: 'Secretaria de tramites'},
        {id: 3, nombre: ' Cámara civil'},

        {id: 4, nombre: 'Tribunal de Familia'},
        {id: 5, nombre: 'T'},
        {id: 6, nombre: 'T'},
        {id: 7, nombre: 'Tribunal de trabajo Sala I'},

        {id: 8, nombre: 'Tribunal de trabajo Sala II'},

        {id: 9, nombre: 'Tribunal de trabajo Sala III'},

        {id: 10, nombre: 'Juzgado Civil 1'},

        {id: 11, nombre: 'Juzgado Civil 2'},
        {id: 12, nombre: 'Juzgado Civil 2 JCC 2 - Ampliatoria'},
        {id: 13, nombre: 'Juzgado Civil  3'},
        {id: 14, nombre: 'JCC 3 -Registro público de comercio'},
        {id: 15, nombre: 'Juzgado Civil  4'},

        {id: 16, nombre: 'Juzgado Civil  5'},

        {id: 17, nombre: 'Juzgado Civil  6'},
        {id: 18, nombre: 'Juzgado Civil Las Lomitas'},

        {id: 19, nombre: 'JCCTM  El Colorado'},
        {id: 20, nombre: 'JCCTM  El Clorinda'}
    ];



//    $scope.ListaFederal = true;
//    $scope.ListaProvincial = true;


 
    $scope.BorrarFederal = function (idfederal) {
        $http({
            url: '../controles/clases/Get_despachos.php',
            method: "POST",
            data: {tipo: 'BorrarFederal', idfederal: idfederal}
        }).then(function (response) {

            console.log(response);
            window.location.reload();
        });
    };

    $scope.BorrarProvincial = function (idprovincial) {
        $http({
            url: '../controles/clases/Get_despachos.php',
            method: "POST",
            data: {tipo: 'BorrarProvincial', idprovincial: idprovincial}
        }).then(function (response) {

            console.log(response);
            window.location.reload();
        });
    };



//    $scope.ListaFede();
    $scope.Pantalla = function (valor) {
        switch (valor) {
            case 'NuevoFederal':
                $scope.Federal = true;
                $scope.ListaFederal = false;
                $scope.ListaProvincial = false;
                $scope.Provincial = false;
                break;
            case 'ListaFederal':
                $scope.Federal = false;
                $scope.ListaFederal = true;
                $scope.ListaProvincial = false;
                $scope.Provincial = false;
//                $scope.ListaFede();

                break;
            case 'ListaProvincial':
                $scope.Federal = false;
                $scope.ListaFederal = false;
                $scope.ListaProvincial = true;
                $scope.Provincial = false;

                $scope.ListaProv();
                break;
            case 'NuevoProvincial':
                $scope.Federal = false;
                $scope.ListaFederal = false;
                $scope.ListaProvincial = false;
                $scope.Provincial = true;
//                $scope.ListaFede();
                break;
        }
    };


//  

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
app.config(['$routeProvider', function ($routeProvider) {


        $routeProvider.when('/provincial/:variable1', {
            templateUrl: "listaprovincial.php",
            controller: "Pagina1Controller"
        });

        $routeProvider.when('/federal/:variable1', {
            templateUrl: "listafederal.php",
            controller: "Pagina2Controller"
        });
            $routeProvider.when('/nuevofederal/:variable1', {
            templateUrl: "nuevofederal.php",
            controller: "Pagina3Controller"
        });
            $routeProvider.when('/nuevoprovincial/:variable1', {
            templateUrl: "nuevoprovincial.php",
            controller: "Pagina4Controller"
        });
        $routeProvider.otherwise({
            redirectTo: '/pagina1/nada'
        });

    }]);
app.controller("Pagina1Controller", ["$scope", "$http", "$routeParams", function ($scope, $http, $routeParams) {
        $scope.mensaje = "variable1='" + $routeParams.variable1 + "'";
        
        
        
   $scope.ListaProv = function () {
        $http({
            url: '../controles/clases/Get_despachos.php',
            method: "POST",
            data: {tipo: 'ListaProvincial'}
        }).then(function (response) {
            if (response.data.provincial != 'false') {
                $scope.provincial = response.data.provincial;
            }
            console.log(response);

        });

    };
    $scope.ListaProv();

        $scope.currentPage = 0;
        $scope.pageSize = 50; // Esta la cantidad de registros que deseamos mostrar por página
        $scope.pages = [];
// 
        $scope.configPages = function () {
            $scope.pages.length = 0;
            var ini = $scope.currentPage - 4;
            var fin = $scope.currentPage + 5;
            if (ini < 1) {
                ini = 1;
                if (Math.ceil($scope.noti.length / $scope.pageSize) > 10)
                    fin = 10;
                else
                    fin = Math.ceil($scope.noti.length / $scope.pageSize);
            } else {
                if (ini >= Math.ceil($scope.noti.length / $scope.pageSize) - 10) {
                    ini = Math.ceil($scope.noti.length / $scope.pageSize) - 10;
                    fin = Math.ceil($scope.noti.length / $scope.pageSize);
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


    }]);
app.controller("Pagina2Controller", ["$scope","$http", "$routeParams", function ($scope, $http, $routeParams) {
        $scope.mensaje = "variable1='" + $routeParams.variable1 + "' , variable2='" + $routeParams.variable2 + "' , idCuenta='" + $routeParams.idCuenta + "' y importe='" + $routeParams.importe + "'";
        $scope.ListaFede = function () {
            $http({
                url: '../controles/clases/Get_despachos.php',
                method: "POST",
                data: {tipo: 'ListaFederal'}
            }).then(function (response) {
                if (response.data.federales != 'false') {
                    $scope.federales = response.data.federales;
                }
                console.log(response);
            });

        };
        $scope.tribunalesFederales = [
            {id: 1, nombre: 'Civil 1'},
            {id: 2, nombre: 'Civil 2'},
            {id: 3, nombre: 'Tribunal 1'},
            {id: 4, nombre: 'Tribunal 2'}
        ];
        $scope.ListaFede();
       $scope.currentPage = 0;
        $scope.pageSize = 50; // Esta la cantidad de registros que deseamos mostrar por página
        $scope.pages = [];
// 
        $scope.configPages = function () {
            $scope.pages.length = 0;
            var ini = $scope.currentPage - 4;
            var fin = $scope.currentPage + 5;
            if (ini < 1) {
                ini = 1;
                if (Math.ceil($scope.noti.length / $scope.pageSize) > 10)
                    fin = 10;
                else
                    fin = Math.ceil($scope.noti.length / $scope.pageSize);
            } else {
                if (ini >= Math.ceil($scope.noti.length / $scope.pageSize) - 10) {
                    ini = Math.ceil($scope.noti.length / $scope.pageSize) - 10;
                    fin = Math.ceil($scope.noti.length / $scope.pageSize);
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


    }]);
app.controller("Pagina3Controller", ["$scope","$http", "$routeParams", function ($scope, $http, $routeParams) {
        $scope.mensaje = "variable1='" + $routeParams.variable1 + "' , variable2='" + $routeParams.variable2 + "' , idCuenta='" + $routeParams.idCuenta + "' y importe='" + $routeParams.importe + "'";
 // nuevo federal
 
  $("#federal").on("submit", function (e) {
        //Evitamos que se envíe por defecto
        e.preventDefault();
        //Creamos un FormData con los datos del mismo formulario
//                        $('#mensaje').html("Esta seguro de Cambiar su Clave?");
//                        x.dialog("open");
        var data = new FormData(document.getElementById("federal"));
        console.log(data);
        UPFederal(data);
    });
    function UPFederal(data) {
        console.log(data);
        //Llamamos a la función AJAX de jQuery       
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/clases/Get_despachos.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "json",
            //Definimos la información que vamos a enviar
            data: data,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (response) {
                var arr = JSON.stringify(response);
                console.log(response);
                if (response.Estado == "true") {
//                    location.reload();
                }

            },
            error: (function (error) {
                var arr = JSON.stringify(error);
                console.log("error :" + arr);
            })
        });

    }


    }]);
app.controller("Pagina4Controller", ["$scope","$http", "$routeParams", function ($scope, $http, $routeParams) {
  // nuevo provincial
     $('input[name="inlineRadioOptions"]').change(function () {

        var manageradiorel = $('input[name="inlineRadioOptions"]:checked').val();


    });
    x = $('#dialog-confirm').dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: false,
        buttons: {
            close: function () {
                $(this).dialog("close");
            }
        }
    });



    $("#DespachoProvincial").on("submit", function (e) {
        //Evitamos que se envíe por defecto
        e.preventDefault();
        //Creamos un FormData con los datos del mismo formulario
//                        $('#mensaje').html("Esta seguro de Cambiar su Clave?");

        var data = new FormData(document.getElementById("DespachoProvincial"));
        UPprovincial(data);
    });
    function UPprovincial(data) {
        console.log(data);
        //Llamamos a la función AJAX de jQuery       
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/clases/Get_despachos.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "json",
            //Definimos la información que vamos a enviar
            data: data,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (response) {
                var arr = JSON.stringify(response);
                console.log(response);
                if (response.Estado == "true") {
                    location.reload();
                }

            },
            error: (function (error) {
                var arr = JSON.stringify(error);
                console.log("error :" + arr);
            })
        });

    }
  }]); 

$(document).ready(function () {

 

  

});