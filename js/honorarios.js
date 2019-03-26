/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('App', []);
app.controller('arios', function ($scope, $http, $filter) {

   $scope.estados="Agregar";
  

    $scope.ValoresHonorarios = function () {
        $http({
            url: '../controles/controles/valores_jus.php',
            method: "POST",
            data: {tipo: 'Lista'}
        }).then(function (response) {
            $scope.Vhonorarios = response.data.Estado;
            console.log(response);
        });

    };
    
       $scope.ValoresHonorarios();
});
//        $scope.ListaProv = function () {
//            $http({
//            url: '../controles/clases/Get_despachos.php',
//            method: "POST",
//            data: {tipo: 'ListaProvincial'}
//        }).then(function (response) {
//            $scope.provincial = response.data.provincial;
//            console.log(response);
//        });
//
//    };
//    $scope.ListaFede();
//    $scope.Pantalla = function (valor) {
//        switch (valor) {
//            case 'NuevoFederal':
//                $scope.Federal = true;
//                $scope.ListaFederal = false;
//                 $scope.ListaProvincial=false;
//                 $scope.Provincial=false;
//                break;
//            case 'ListaFederal':
//                $scope.Federal = false;
//                $scope.ListaFederal = true;
//                $scope.ListaProvincial=true;
//                $scope.Provincial=false;
//                 $scope.ListaFede();
//                break;
//                
//                 case 'NuevoProvincial':
//                $scope.Federal = false;
//                $scope.ListaFederal =false;
//                 $scope.ListaProvincial=false;
//                $scope.Provincial=true;
//                 $scope.ListaFede();
//                break;
//        }
//    };
//
////
////    $scope.mediciones = [{
////            id: '1',
////            medicion: 'Indice verde'
////        },
////        {id:'2', medicion:'Fotosintesis'}
////    ];
////
//
////    $scope.provinciall();
////
////    $scope.Editar = function (idin, idp) {
////        $scope.a = true;
////        $scope.filtro = $filter('filter')($scope.noti, {'idnoticia': idin});
////        $scope.imagen = '../controles/imagenes/mapas/' + idp + '/' + $scope.filtro[0].imagen;
////
////        $scope.formData.persona = $scope.filtro[0].apellido + ' ' + $scope.filtro[0].nombre;
////        $scope.formData.titulo = $scope.filtro[0].titulo;
////        $scope.medicion = {id:$scope.filtro[0].idmedicion};
////        $scope.formData.encabezado = $scope.filtro[0].encabezado;
////        $scope.formData.observacion =$scope.filtro[0].observacion;
////        $scope.formData.fecha = new Date($scope.filtro[0].fecha);
////        $scope.provincia = {idprovincia: $scope.filtro[0].idprovincia};
////        $scope.formData.file ='asasas.jpg';//$scope.filtro[0].file;
////
////        $scope.formData.idnoticia = idin;
////        $scope.formData.estado = $scope.filtro[0].estado;
////        $scope.formData.idpersona = idp;
////
////        $('#previewing').attr('width', '550px');
////        $('#previewing').attr('height', '350px');
////
////
////    };
////    $scope.clickimagen = function (x, y) {
////
////        $('#icon').html('<img style="height: 100%; width: 100%;" src="../controles/imagenes/mapas/' + x + '/' + y + '"/>');
////        $('#do').html('<a title="Download mapa" href="../controles/imagenes/mapas/' + x + '/' + y + '" download><span class="\n\
////           pull-right btn btn-primary  glyphicon glyphicon-download-alt"></span> </a>');
////        
////        ima.dialog("open");
////    };
////
////    $scope.vista = function (valor) {
//////        REgistro NUevo 
////
////        $scope.a = valor;
////        $scope.file="";
////        $scope.formData = {};
////        $scope.formData.fecha = new Date();
////        $scope.medicion = {id: '1'};
////        $scope.provincia = {idprovincia: '1'};
////        $scope.imagen = '../controles/imagenes/noimage.png';
//////        $scope.previewing =
////        $scope.formData.idnoticia = "Alta";
////        console.log($scope.formData.provincia);
////        if (valor){
////            
////        } else {
////            $scope.noticia();
////        }
////            
////
////    };
////        
////   
////    $scope.noticia = function () {
////     $http({
////            url: '../controles/noticias.php',
////            method: "POST"
////        }).then(function (response) {
////            $scope.noti = response.data.noticias;
////            console.log(response);
////        },
////                function (response) { // optional
////                    console.log(response);
////                });
////
////    };
////    $scope.noticia();
////    
////    // paginacion de tablas 
////
////    $scope.currentPage = 0;
////    $scope.pageSize = 10; // Esta la cantidad de registros que deseamos mostrar por pÃ¡gina
////    $scope.pages = [];
////// 
////    $scope.configPages = function () {
////        $scope.pages.length = 0;
////        var ini = $scope.currentPage - 4;
////        var fin = $scope.currentPage + 5;
////        if (ini < 1) {
////            ini = 1;
////            if (Math.ceil($scope.noti.length / $scope.pageSize) > 10)
////                fin = 10;
////            else
////                fin = Math.ceil($scope.noti.length / $scope.pageSize);
////        } else {
////            if (ini >= Math.ceil($scope.noti.length / $scope.pageSize) - 10) {
////                ini = Math.ceil($scope.noti.length / $scope.pageSize) - 10;
////                fin = Math.ceil($scope.noti.length / $scope.pageSize);
////            }
////        }
////        if (ini < 1)
////            ini = 1;
////        for (var i = ini; i <= fin; i++) {
////            $scope.pages.push({no: i});
////        }
////        if ($scope.currentPage >= $scope.pages.length)
////            $scope.currentPage = $scope.pages.length - 1;
////    };
//// 
////    $scope.setPage = function (index) {
////        $scope.currentPage = index - 1;
////    };
//////    $scope.configPages();
////    
//// 
////
////    
////
////});
////        app.filter('startFromGrid', function () {
////        return function (input, start) {
////            if (!input || !input.length) { return; }
////            start = +start;
////            return input.slice(start);
////        };
//});

$(document).ready(function () {
    x = $('#dialog-confirm').dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: false,
        buttons: {
            Cerrar: function () {
                document.getElementById("frame").contentDocument.location.reload(true);
                $(this).dialog("close");
            }
        }
    });


    $("#valorhonorarios").on("submit", function (e) {
        //Evitamos que se envÃ­e por defecto
        e.preventDefault();
        //Creamos un FormData con los datos del mismo formulario
//                        $('#mensaje').html("Esta seguro de Cambiar su Clave?");
//                        x.dialog("open");
     
    data = {
            'periodo': $('#periodo').val(),
            'valor_jus': $('#valor_jus').val(),
            'idpersona': $('#idpersona').val(),
            'tipo': $('#tipo').val(),
           
        };
         data = JSON.stringify(data);
        console.log(data);
        Valores(data);

    });
    function Valores(details) {
        //Llamamos a la funciÃ³n AJAX de jQuery       
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/controles/valores_jus.php",
            //Definimos el tipo de mÃ©todo de envÃ­o
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "json",
            //Definimos la informaciÃ³n que vamos a enviar
            data: details,
            //Deshabilitamos el cachÃ©
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (echo) {
                console.log(echo);
                if (echo == "false") {
                    $('#mensaje').html("No se Pudo concretar modifiación de Valor");
////                            exit();
                } else
                {

                    $('#mensaje').html("!Se actualizo el Valor");
                }
                x.dialog("open");
            }
        });
    }

    $("#honorarios").on("submit", function (e) {
        //Evitamos que se envÃ­e por defecto
        e.preventDefault();
        //Creamos un FormData con los datos del mismo formulario
//                        $('#mensaje').html("Esta seguro de Cambiar su Clave?");
//                        x.dialog("open");
        var formData = new FormData(document.getElementById("honorarios"));

        Hono(formData);
    });

    function Hono(formData) {
        //Llamamos a la funciÃ³n AJAX de jQuery       
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/controles/honorarios.php",
            //Definimos el tipo de mÃ©todo de envÃ­o
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "html",
            //Definimos la informaciÃ³n que vamos a enviar
            data: formData,
            //Deshabilitamos el cachÃ©
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (echo) {
                console.log(echo);
                if (echo == "false") {
                    $('#mensaje').html("No se Pudo concretar el envio /n Intente de nuevo. ");
////                            exit();
                } else
                {

                    $('#mensaje').html("!Se actualizo la fecha de despacho");
                }
                x.dialog("open");
            }
        });
    }


});