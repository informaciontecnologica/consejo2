/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module('App', []);
app.controller('resol', function ($scope, $http, $filter) {

    $scope.grilla = true;
    $scope.formData = {};
    
    $scope.Borrar = function (idresdocumento,archivo) {
        $http({
            url: '../controles/clases/resoluciones.php',
            method: "POST",
            data: {tipo: 'Borrar_doc',idresdocumento:idresdocumento,'link':archivo}
        }).then(function (response) {
                   
            console.log(response.data);
            window.location.reload();
        });
    };
    
    $scope.BorrarResolucion = function (idresolucion){
         $http({
            url: '../controles/clases/resoluciones.php',
            method: "POST",
            data: {tipo: 'Borrar_Resolucion',idresolucion:idresolucion}
        }).then(function (response) {
                 console.log(response);
           window.location.reload();
        });
        
    };
    
    
    $scope.Listaresolucion = function () {
        $http({
            url: '../controles/clases/resoluciones.php',
            method: "POST",
            data: {tipo: 'todos'}
        }).then(function (response) {
            if (response.data.resoluciones == 'false') {


            } else
            {
                $scope.resoluciones = {};
                $scope.resoluciones = response.data.resoluciones;
            }
//            $scope.resoluciones = response.data.resoluciones;
            console.log(response.data.resoluciones);
        });
    };

    $scope.Listaresolucion();

    $scope.consulta = function (valor) {
        $scope.archivo = false;
        if (valor) {
            $scope.grilla = false;
            $scope.formulario = true;
            $scope.tipo = 'Agregar';
            $scope.accion = 'Agregar';

        } else {
            $scope.grilla = !false;
            $scope.formulario = !true;

        }
    };

    $scope.caco = function (valor) {
        $scope.formulario = true;
        $scope.grilla = false;
        $scope.archivo = false;
        $scope.registro = $filter('filter')($scope.resoluciones, {'idresolucion': valor});
        $scope.formData.idresolucion = $scope.registro[0].idresolucion;
        $scope.formData.titulo = $scope.registro[0].titulo;
        $scope.formData.tag = $scope.registro[0].tag;
        $scope.formData.fecha = new Date($scope.registro[0].fecha);
        $scope.formData.texto = $scope.registro[0].texto;

        $scope.tipo = 'Modificar';
        $scope.accion = 'Modificar';



    };

    registros = {'ideventos': 1};
// initialize with defaults
    $("#input-id").fileinput({
        language: "es",
        uploadUrl: '../imagenes/eventos/upresoluciones.php',
        uploadAsync: true,
        minFilecount: 1,
        MaxFilecount: 5,
        showPreview: false,
        showRemove: true,
//        initialPreview: [
//            "../imagenes/eventos/"+id,
//            "http://lorempixel.com/800/460/people/2"
//        ],
//        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
//        initialPreviewFileType: 'image',
//        initialPreviewConfig: [
//            {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
//            {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2},
//        ],
        elErrorContainer: "#dedos",
        uploadExtraData: function () {
            var data = {
                idresolucion: $scope.id,
                detalle: $scope.detalle,

            };
            return data;
        }
    });

    $scope.ListaImagenes = function (id) {
        $http({
            url: '../controles/clases/resoluciones.php',
            method: "POST",
            data: {tipo: 'listaimagen', idresolucion: id}
        }).then(function (response) {
            console.log(response.data);
            if (response.data.Estado == 'false') {
                $scope.mensaje='Sin Documentos';
            } else {
                $scope.resolucion_doc = response.data.resolucion_documento;
            }
            ;
//            
        });
    };

    $scope.ListasDocumentos = function (idresolucion) {

        $scope.detalless = true;
        $scope.ListaImagenes(idresolucion);
    };

    $scope.EditarImagen = function (idresolucion) {
        $scope.ListaImagenes(idresolucion);
        $scope.archivo = !$scope.archivo;
        $scope.id = idresolucion;
        $scope.detalle = 'documento';
    };

    // paginacion de tablas 

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

$(function () {

    var x = $('#dialog-confirm').dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: false,
        buttons: {
            Aceptar: function () {
                Agregar();
                $(this).dialog("close");
                return true;
            },
            Close: function () {
                $(this).dialog("close");
            }
        }
    });

 $("#resoluciones").on("submit", function (e) {
        //Evitamos que se envíe por defecto
        e.preventDefault();
 if ($('#tipo').val() == 'Agregar') {
            $('#mensaje').html("Agrega Evento ?");
            
        } else {
            $('#mensaje').html("Modifica un evento ?");
        }
        x.dialog("open");
 });



    function Agregar() {
        var data = {};
        data = {
            'idresolucion': $('#idresolucion').val(),
            'tag': $('#tag').val(),
            'fecha': $('#fecha').val(),
            'texto': $('#texto').val(),
            'titulo': $('#titulo').val(),
            'tipo': $('#tipo').val()
        };
        data = JSON.stringify(data);
        console.log(data);
        //Llamamos a la función AJAX de jQuery       
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/clases/resoluciones.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "json",
            //Definimos la información que vamos a enviar
            data: data,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: 'text/html',
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (response) {
                var arr = JSON.stringify(response);
                console.log("Estado:" + response.Estado);
                if (response.Estado == "ok") {
                    location.reload();
                }

            },
            error: (function (error) {
                var arr = JSON.stringify(error);
                console.log("error :" + arr);
            })
//                        .done(function (response) {
//                var arr = JSON.stringify(response);
//                        ;
//                        console.log("echo:" + arr);
////            var content = $(data).find("#content");
////            $("#result").empty().append(content);
        });
    }
    ;

    function borrar() {
        var data = {};
        data = {
            'idresdocumento': $('#borrar').data('id'),
            'tipo': 'borrar_doc'
        };
        data = JSON.stringify(data);
        console.log(data);
        //Llamamos a la función AJAX de jQuery       
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/clases/resoluciones.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "json",
            //Definimos la información que vamos a enviar
            data: data,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: 'text/html',
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (response) {
                var arr = JSON.stringify(response);
                console.log("Estado:" + response.Estado);
                if (response.Estado == "ok") {
                    location.reload();
                }

            },
            error: (function (error) {
                var arr = JSON.stringify(error);
                console.log("error :" + arr);
            })
//                        .done(function (response) {
//                var arr = JSON.stringify(response);
//                        ;
//                        console.log("echo:" + arr);
////            var content = $(data).find("#content");
////            $("#result").empty().append(content);
        });
    }
    ;




});


