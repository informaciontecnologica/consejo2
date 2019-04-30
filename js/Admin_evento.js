/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module('App', ['ngRoute']);
app.controller('eventos', function ($scope, $http, $filter) {

    $scope.grilla = true;
    $scope.formData = {};
    var imagenes = {};
    $scope.ima = [];

    $scope.eliminarimagen = function (idimagenevento, imagenevento) {
        $http({
            url: '../controles/clases/intermedio.php',
            method: "POST",
            data: {tipo: 'Borrarimagen', idimagenevento: idimagenevento, imagenevento: imagenevento}
        }).then(function (response) {
            console.log(response.data);
            window.location.reload();

        });
    };


    $scope.ListaPaginas = function () {
        $http({
            url: '../controles/clases/Get_imagenes.php',
            method: "POST",
            data: {tipo: 'ListaPaginas'}
        }).then(function (response) {
            $scope.pag = response.data.paginas;
            console.log(response);
        });

    };

    $scope.ListaPaginas();



    $scope.Listaeventos = function () {
        $http({
            url: '../controles/clases/intermedio.php',
            method: "POST",
            data: {tipo: 'TodosEve'}
        }).then(function (response) {
            console.log(response)
            if (response.data != null) {

                $scope.evento = response.data.eventos;

            } else
            {
                $scope.grilla = false;
            }

        });
    };
    $scope.Listaeventos();

    if ($scope.grilla) {
        $scope.Listaeventos();
    }

    $scope.consulta = function (valor) {
        $scope.archivo = false;
        if (valor) {
            $scope.formData = {};
            $("#summernote").summernote("code", "");
            $scope.grilla = false;
            $scope.formulario = true;
            $scope.tipo = 'Agregar';
            $scope.accion = 'Agregar';

        } else {
            $scope.grilla = !false;
            $scope.formulario = !true;
            $scope.Listaeventos();
        }
    };

    $scope.caco = function (valor) {
        $scope.formulario = true;
        $scope.grilla = false;
        $scope.archivo = false;
        $scope.registro = $filter('filter')($scope.evento, {'ideventos': valor});
        $scope.formData.ideventos = $scope.registro[0].ideventos;
        $scope.formData.idimagenevento = $scope.registro[0].idimagenevento;
        $scope.formData.titulo = $scope.registro[0].titulo;

        $scope.formData.idpagina = {idpagina: $scope.registro[0].idpagina};

        $scope.pagin = $scope.registro[0].idpagina;

        $scope.formData.path = $scope.registro[0].path;

        $scope.formData.fecha = new Date($scope.registro[0].fecha);
        $scope.formData.texto = $scope.registro[0].texto;
        $("#summernote").summernote("code", $scope.registro[0].texto);
        if ($scope.registro[0].imagenevento != null) {
            $scope.formData.imagen = $scope.registro[0].imagenevento;
        } else {
            $scope.formData.imagen = 'noimage.png';
        }
        $scope.tipo = 'Modificar';
        $scope.accion = 'Modificar';
    };

    $scope.BorrarEventos = function (ideventos, path) {
        $http({
            url: '../controles/clases/intermedio.php',
            method: "POST",
            data: {tipo: 'BorrarEvento', idevento: ideventos, path: path}
        }).then(function (response) {
            console.log(response);
//            location.reload();
        });

    };


    $scope.Archivos = function (ideventos, tipo) {
        $http({
            url: '../controles/clases/intermedio.php',
            method: "POST",
            data: {tipo: tipo, idevento: ideventos}
        }).then(function (response) {
            console.log(response);
            if (response.data.imagenes == 'noimage.png') {

            } else {
                $scope.imagenes = response.data.imagenes;
                console.log(response);

            }
            ;


        });
    };
    var archivos;
    $scope.Aimagenes = function (ideventos, path, titulo) {
//       $scope.grilla = false;
//       Scope.formulario=false;
        $scope.grilla = false;
        $scope.id = ideventos;
        $scope.titulo = titulo;
        $scope.tipo = "imagenes";
        $scope.path = path;//"folletos_"+ $scope.formData.idpagina+"_"+ideventos;
        console.log("ideventos : " + ideventos);
        archivos = "upfile_imagenes.php";
    };



    $scope.SubirDoc = function (ideventos, path) {
//       $scope.grilla = false;
//       Scope.formulario=false;
//        $scope.Archivo(ideventos,"AgregarArchivo");
        $scope.archivo = true;
        $scope.id = ideventos;
        $scope.tipo = "documentos"
        $scope.path = path;
        archivos = "upfile_documentos.php";

    };
    $scope.Afolletos = function (ideventos, path) {
//       $scope.grilla = false;
//       Scope.formulario=false;
//        $scope.Archivo(ideventos,"AgregarArchivo");
        $scope.archivo = true;
        $scope.id = ideventos;
        $scope.tipo = "folletos";
        $scope.path = path;
        //"folletos_"+ $scope.formData.idpagina+"_"+ideventos;
        console.log("ideventos : " + ideventos);
        archivos = "upfile_folletos.php";
    };



    $("#input-id").fileinput({

        language: "es",
        uploadUrl: "../controles/controles/upfile.php",
        uploadAsync: true,
        minFilecount: 1,
        MaxFilecount: 5,
        showPreview: true,
        showRemove: true,
//        initialPreview:

//            "../imagenes/eventos/curso_1/DIPLO1.jpg",
//             "../imagenes/eventos/curso_1/DIPLO2.jpg"
//            "http://lorempixel.com/800/460/people/2"


//        ,
        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
        initialPreviewFileType: 'image',
//        initialPreviewConfig: [
//            {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
//            {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2},
//        ],
        elErrorContainer: "#dedos",
        uploadExtraData: function () {
            var data = {
                idevento: $scope.id,
                path: $scope.path,
                tipo: $scope.tipo,
                titulo: $scope.titulo
            };
            return data;
        }

    });


});

app.config(['$routeProvider', function ($routeProvider) {


        $routeProvider.when('/noticias/:idevento/:path/:titulo', {
            templateUrl: "noticias.php",
            controller: "ControlNoticias"
        });

        $routeProvider.when('/documentos/:idevento/:path/:titulo', {
            templateUrl: "documentos.php",
            controller: "Controldocumentos"
        });

        $routeProvider.when('/imagenes/:idevento/:path/:titulo', {
            templateUrl: "imagenes.php",
            controller: "Controlimagenes"
        });
        $routeProvider.when('/folletos/:idevento/:path/:titulo', {
            templateUrl: "folletos.php",
            controller: "Controlfolletos"
        });

//  $routeProvider.otherwise({
//        redirectTo: '/pagina1'
//  });   

    }]);


app.controller("ControlNoticias", ["$scope", "$http", "$routeParams", function ($scope, $http, $routeParams) {


        $scope.grilla = true;
        $scope.id = $routeParams.idevento;
        $scope.tipo = "noticias";
        $scope.path = $routeParams.path;
        $scope.titulo = $routeParams.titulo;
//        //"folletos_"+ $scope.formData.idpagina+"_"+ideventos;

        $scope.cargarnoticias = function (ideventos) {
            $http({
                url: '../controles/clases/intermedio.php',
                method: "POST",
                data: {tipo: 'ListaNoticias', idevento: ideventos}
            }).then(function (response) {
                $scope.noticias = response.data.noticias;
                console.log(response);



            })
        };
        $scope.cargarnoticias(40);

        $scope.ANoticias = function () {

            $scope.Formul = true;
            $scope.grilla = false;
            $scope.form = {};
            $scope.form.tipo = "Agregar";
        };
        $scope.ENoticias = function (ideventos, path, titulo, texto, fecha) {

            $scope.Formul = true;
            $scope.grilla = false;
            $scope.form = {};
            $scope.form.idevento = ideventos;
            $scope.form.titulo = titulo;
            $scope.form.texto = texto;
            $scope.form.fecha = new Date(fecha);
            $scope.form.fecha.setDate($scope.form.fecha.getDate() + 1);
            $scope.form.tipo = "Modificar";
        };
        $scope.formularios = function (tipo, valores) {
            $http({
                url: '../controles/clases/intermedio.php',
                method: "POST",
                data: {tipo: tipo, valores: valores}
            }).then(function (response) {

                console.log(response);



            })
        };
        $scope.Formularionoti = function () {
            $scope.form.idevento = $scope.id;

            $scope.formularios($scope.form.tipo + "_Noticia", $scope.form);


            console.log($scope.id);



        };

    }]);
app.controller("Controldocumentos", ["$scope", "$http", "$routeParams", function ($scope, $http, $routeParams) {
        $scope.mensaje = "variable1='" + $routeParams.idevento + "' y variable2='" + $routeParams.path + "'";

        $scope.valor = true;
        $scope.id = $routeParams.idevento;
        $scope.tipo = "documentos";
        $scope.path = $routeParams.path;
        $scope.titulo = $routeParams.titulo;
        //"folletos_"+ $scope.formData.idpagina+"_"+ideventos;

        $scope.cargarnoticias = function (ideventos) {
            $http({
                url: '../controles/clases/intermedio.php',
                method: "POST",
                data: {tipo: 'Listadocumentos', idevento: ideventos}
            }).then(function (response) {
                console.log("ASAS"+response);
                  if(response.data.documentos!="false"){
                $scope.documentos = response.data.documentos;
                console.log(response);
                console.log($scope.documentos[0].archivo);
                var length = $scope.documentos.length;
                console.log("Largo " + length);
                $scope.notic = [];
                for (i = 0; i < length; i++) {
//      console.log('http://localhost/consejoabogados/imagenes/portal_1_40/imagenes/'+$scope.noticias[i].imagen);
                  $scope.notic.push('../imagenes/'+$scope.path+'/documentos/' + $scope.documentos[i].archivo);

                };
            };


                $("#inputid").fileinput({
                    language: "es",
                    uploadUrl: "../controles/controles/upfile.php",
                    uploadAsync: true,
                    minFilecount: 1,
                    MaxFilecount: 5,
                    showPreview: true,
                    showRemove: true,
                    initialPreview: $scope.notic,
                    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                    initialPreviewFileType: 'image',
//        initialPreviewConfig: [
//            {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
//            {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2},
//        ],
                    elErrorContainer: "#dedos",
                    uploadExtraData: function () {
                        var data = {
                            idevento: $scope.id,
                            path: $scope.path,
                            tipo: $scope.tipo,
                            titulo: $scope.titulo
                        };
                        return data;
                    }

                });


            });

        };


        $scope.cargarnoticias($scope.id);
    }]);

app.controller("Controlimagenes", ["$scope", "$http", "$routeParams", function ($scope, $http, $routeParams) {
        $scope.mensaje = "variable1='" + $routeParams.idevento + "' y variable2='" + $routeParams.path + "'";
        $scope.grilla = false;
        $scope.valor = true;
        $scope.id = $routeParams.idevento;
        $scope.tipo = "imagenes";
        $scope.path = $routeParams.path;
        $scope.titulo = $routeParams.titulo;
        //"folletos_"+ $scope.formData.idpagina+"_"+ideventos;

        $scope.cargarnoticias = function (ideventos) {
            $http({
                url: '../controles/clases/intermedio.php',
                method: "POST",
                data: {tipo: 'ListaImagen', idevento: ideventos}
            }).then(function (response) {
                if(response.data.imagenes!="false"){
                $scope.noticias = response.data.imagenes;
                console.log(response);
                console.log($scope.noticias[0].imagen);
                var length = $scope.noticias.length;
                console.log("Largo " + length);
                $scope.notic = [];
                for (i = 0; i < length; i++) {
//      console.log('http://localhost/consejoabogados/imagenes/portal_1_40/imagenes/'+$scope.noticias[i].imagen);
                    $scope.notic.push('../imagenes/'+$scope.path+'/imagenes/' + $scope.noticias[i].imagen);
                    };
                };

                $("#inputid").fileinput({
                    language: "es",
                    uploadUrl: "../controles/controles/upfile.php",
                    uploadAsync: true,
                    minFilecount: 1,
                    MaxFilecount: 5,
                    showPreview: true,
                    showRemove: true,
                    initialPreview: $scope.notic,
                    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                    initialPreviewFileType: 'image',
//        initialPreviewConfig: [
//            {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
//            {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2},
//        ],
                    elErrorContainer: "#dedos",
                    uploadExtraData: function () {
                        var data = {
                            idevento: $scope.id,
                            path: $scope.path,
                            tipo: $scope.tipo,
                            titulo: $scope.titulo
                        };
                        return data;
                    }

                });


            });

        };


        $scope.cargarnoticias($scope.id);
    }]);

app.controller("Controlfolletos", ["$scope", "$http", "$routeParams", function ($scope, $http, $routeParams) {
        $scope.mensaje = "variable1='" + $routeParams.idevento + "' y variable2='" + $routeParams.path + "'";

        $scope.valor = true;
        $scope.id = $routeParams.idevento;
        $scope.tipo = "folletos";
        $scope.path = $routeParams.path;
        $scope.titulo = $routeParams.titulo;
        //"folletos_"+ $scope.formData.idpagina+"_"+ideventos;

        $scope.cargarnoticias = function (ideventos) {
            $http({
                url: '../controles/clases/intermedio.php',
                method: "POST",
                data: {tipo: 'Listafolletos', idevento: ideventos}
            }).then(function (response) {
                console.log(response);
                  if(response.data.folletos!="false"){
                $scope.folletos = response.data.folletos;
                
                console.log($scope.folletos[0].imagen);
                var length = $scope.folletos.length;
                console.log("Largo " + length);
                $scope.notic = [];
                for (i = 0; i < length; i++) {

                 $scope.notic.push('../imagenes/'+$scope.path+'/folletos/' + $scope.folletos[i].imagen);

                };
            }



                $("#inputid").fileinput({
                    language: "es",
                    uploadUrl: "../controles/controles/upfile.php",
                    uploadAsync: true,
                    minFilecount: 1,
                    MaxFilecount: 5,
                    showPreview: true,
                    showRemove: true,
                    initialPreview: $scope.notic,
                    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                    initialPreviewFileType: 'image',
//        initialPreviewConfig: [
//            {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
//            {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2},
//        ],
                    elErrorContainer: "#dedos",
                    uploadExtraData: function () {
                        var data = {
                            idevento: $scope.id,
                            path: $scope.path,
                            tipo: $scope.tipo,
                            titulo: $scope.titulo
                        };
                        return data;
                    }

                });


            });

        };


        $scope.cargarnoticias($scope.id);
    }]);


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

//                //Cuando el formulario con ID acceso se envíe...
    $("#eventos").on("submit", function (e) {
        //Evitamos que se envíe por defecto
        e.preventDefault();
        //Creamos un FormData con los datos del mismo formulario

        if ($('#tipo').val() == 'Agregar') {
            $('#mensaje').html("Agrega Evento ?");

        } else {
            $('#mensaje').html("Modifica un evento ?");
        }
        x.dialog("open");
    });


    function Agregar() {

//        if ($('input:checkbox[name=publicar]:checked').val()) {
//            formData.append("publicar", 1);
//        } else
//        {
//            formData.append("publicar", 0);
//        }
        console.log($("#idpagina").val());
        var data = {};
        data = {
            'idevento': $('#ideventos').val(),
            'fecha': $('#fecha').val(),
            'texto': $('#summernote').val(),
            'titulo': $('#titulo').val(),
            'tipo': $('#tipo').val(),
            'idpagina': $("#idpagina").val(),
            'idpathold': $("#idpathold").val(),
            'pathold': $("#pathold").val()


        };

        var content = encodeURIComponent($('#summernote').contents());


        data = JSON.stringify(data);
        //Llamamos a la función AJAX de jQuery       
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/clases/intermedio.php",
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
                if (response.Estado == "OK") {
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


