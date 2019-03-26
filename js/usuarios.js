/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('myApp', []);

app.controller('Administracionusuarios', function ($scope, $http, $filter) {
    $scope.detalle = false;
    $scope.estado = true;
    

   
   $scope.CambiarMatricula=function (idpersona,matricula){
    console.log(idpersona,matricula);
     $http({
            url: "../controles/controles/usuariosintermedios.php",
            method: "POST",
            data: {'tipo': 'cambiomatricula','idpersona':idpersona,'matricula':matricula}
        }).then(function (response) {
            
            console.log(response.data);
        });
    
};

   $scope.PersonaMatricula=function (matricula){
    
     $http({
            url: "../controles/controles/usuariosintermedios.php",
            method: "POST",
            data: {'tipo': 'personamatricula','matricula':matricula}
        }).then(function (response) {
            $scope.personamatricula=response.data.personamatricula;
             $scope.personamatricula=response.data.personamatricula;
            console.log(response.data);
        });
    
};
    $scope.perfiles = [
        {'id': 1, 'label': 'Administrador'},
        {'id': 2, 'label': 'Editor'},
        {'id': 3, 'label': 'Profesional'},
        {'id': 4, 'label': 'Usuario'}
    ];
    $scope.usuarios = function () {
        $http({
            url: "../controles/controles/usuariosintermedios.php",
            method: "POST",
            data: {'tipo': 'lista'}
        }).then(function (response) {
            $scope.usuario = response.data.personas;
            console.log(response.data);
        });


    };

    $scope.usuarios();
    $scope.Estado = function (id) {

        $http("../controles/bajapersona.php",
                {'idpersona': id}
        ).success(function (response) {
            $scope.personas = response.personas;
        });
    };

    $scope.update = function (idperfil, idusuario) {

        $http({
            method: "POST",
            url: '../controles/controles/cambioperfil.php',

            data: {idusuario: idusuario, idperfil: idperfil}

        }).then(function (response) {

            console.log(response.data.Estado);

        });


    };


    $scope.vistausuario = function (id) {
        $scope.detalle = true;
        $scope.perfil = $filter('filter')($scope.usuario, {'idpersona': id});
        $scope.persona = $scope.perfil[0].apellido + ' ' + $scope.perfil[0].nombre;
        $scope.mail = $scope.perfil[0].mail;
        $scope.direccion = $scope.perfil[0].direccion;
        $scope.telefono = $scope.perfil[0].telefono;
        $scope.documento = $scope.perfil[0].documento;
        $scope.nacimiento = $scope.perfil[0].nacimiento;
        if ($scope.perfil[0].avatar != null) {
            $scope.avatares = $scope.perfil[0].avatar;
        } else {
            $scope.avatares = 'noimage.png';

        }

    };

    $scope.vista = function (valor) {
        switch (valor) {
            case  'nuevo':
                $scope.estado = false;
                $scope.lista = false;
                $scope.detalle = false;
                break;
            case 'lista' :
                $scope.estado = true;
                $scope.nuevo = false;
                $scope.detalle = false;
                break;

        }
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
    $scope.email = "";

    $scope.agregarmail = function (email) {
        $scope.email += email + " ; ";
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


//********************************************
$(document).ready(function () {


    var mensaje = $('#dialogo').dialog({
        autoOpen: false,
        resizable: true,
        height: 150,
        width: 350,
        modal: false,
        buttons: {
            "Cerrar": function () {
                $('#email').val("");
                $('#sujeto').val("");
                $('#nota').val("");
                $(this).dialog("close");
            }
        }
    });

    $("#mailinterno").on("submit", function (e) {
        e.preventDefault();
        var formDatav = new FormData(document.getElementById("mailinterno"));
        
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/controles/mail.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "HTML",
            //Definimos la información que vamos a enviar
            data: formDatav,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (data) {
                console.log(data);
                  if (data=='1'){
                       $('#mensaje').html(" Su Correo salio satifactoriamente?");
                  mensaje.dialog('open');
                  
              }
              
//                location.reload();
    }
        }).fail(function (data) {
            
                    console.log(data);
                    
                });

    });

// 
    //Cuando el formulario con ID acceso se envíe...
    $("#usuario").on("submit", function (e) {
        //Evitamos que se envíe por defecto
        e.preventDefault();
        //Creamos un FormData con los datos del mismo formulario
//        var formData = new FormData($("usuario").serializeArray());
//        var formData = new FormData(document.getElementById("#usuario"));
////        var name = $("#id-manuf-name").val();
////        var address = $("#id-manuf-address").val();
//        var direccion = $("#direccion").val();

        var obj = {};
        obj.tipo = 'nuevo';
        console.log(obj);
        obj.mail = $('#mail').val();
        obj.clave = $('#clave').val();
        obj.fecha = $('#nacimiento').val();
        obj.idperfil = 5;
        obj.nombre = $('#nombre').val();
        obj.apellido = $('#apellido').val();
        obj.direccion = $('#direccion').val();
        obj.telefono = $('#telefono').val();
        obj.nacimiento = $('#nacimiento').val();
        obj.documento = $('#documento').val();




        //Llamamos a la función AJAX de jQuery
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/controles/usuariosintermedios.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "json",
            //Definimos la información que vamos a enviar
            data: JSON.stringify(obj),
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: "application/json",
            //No permitimos que los datos pasen como un objeto
//            processData: false,
            success: function (data) {
                console.log(data);
       }

        }).done(function (data) {
            location.reload();
//            //Cuando recibamos respuesta, la mostramos
//            if (echo === 'Existedocu') {
//                mensaje.dialog('option', 'title', 'Información');
//
//                mensaje.dialog({width: 300, height: 200});
//                mensaje.html('Documento ya existente<br>');
////                mensaje.on("dialogbeforeclose", function (event, ui) {
////                    location.reload();
////                });
//                mensaje.dialog('open');
//            }
//            ;
//            if (echo === 'completo') {
//                mensaje.dialog('option', 'title', 'Alta Usuario');
//
//                mensaje.dialog({width: 300, height: 200});
//                mensaje.html('Se realizo con existo el Alta de <br>' + $('#nombre').val() + +$('#apellido').val());
//                mensaje.on("dialogbeforeclose", function (event, ui) {
//                    location.reload();
//                });
//                mensaje.dialog('open');
//            }

        })
                .fail(function (data) {
                    alert(JSON.stringify(data));
                })
                .always(function () {
                    alert("complete");
                });
    });

    $("#mail").keyup(function () {
        var ma = new FormData(document.getElementById("mail"));
        $.ajax({
            type: "POST",
            url: '../controles/controles/buscarmail.php',
            data: {mail: $('#mail').val()},

            success: function (data) {
                console.log(data);
                if (data == 'ok') {
                    mensaje.dialog('option', 'title', 'Información');
                    mensaje.dialog({width: 300, height: 200});
                    mensaje.html('mail ya existente<br>');
                    mensaje.dialog('open');
                }

            }

        });
    });


});