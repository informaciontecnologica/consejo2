/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('App', []);
app.controller('imagenes', function ($scope, $http, $filter) {
   $scope.nuevo = true;
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

    $scope.Pantalla = function (valor) {
        switch (valor) {
            case 'Nuevo':
                $scope.nuevo = true;
                $scope.grilla = false;

                break;
            case 'Lista':
                $scope.nuevo = false;
                $scope.grilla = true;

                $scope.ListaImagenes();
                break;

        }
    };
    $scope.pin = function (id, imagen) {
        $http({
            url: '../controles/clases/Get_imagenes.php',
            method: "POST",
            data: {tipo: 'Agregar', idpagina: id, imagen: imagen}
        }).then(function (response) {

            console.log(response);
        });
    };
    $scope.Cambiopagina = function (idpaginas) {
        $http({
            url: '../controles/clases/Get_imagenes.php',
            method: "POST",
            data: {tipo: 'ListaImagenesidpagina', idpagina: idpaginas}
        }).then(function (response) {
            if (response.data.imagenes != 'false') {
                $scope.image = response.data.imagenes;
//            console.log(idpaginas);
            } else {
                $scope.image = {};
            }
            console.log(response);
        });

    };


//    $("#input-id").fileinput({
//        language: "es",
//        uploadUrl: '../controles/clases/Get_imagenes.php',
//        uploadAsync: true,
//        minFilecount: 1,
//        MaxFilecount: 3,
//        showPreview: true,
//        allowedFileExtensions: ['jpg', 'png'],
//        showRemove: true,
////        initialPreview: [
////            "../imagenes/eventos/"+id,
////            "http://lorempixel.com/800/460/people/2"
////        ],
////        initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
////        initialPreviewFileType: 'image',
////        initialPreviewConfig: [
////            {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
////            {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2},
////        ],
//        elErrorContainer: "#dedos",
//        uploadExtraData: function () {
//            var data = {
//                idpagina: $scope.paginas.idpagina,
//                tipo: 'Agregar'
//
//            };
//            return data;
//        }
//    });
//
//    $scope.mediciones = [{
//            id: '1',
//            medicion: 'Indice verde'
//        },
//        {id:'2', medicion:'Fotosintesis'}
//    ];
//

//    $scope.provinciall();
//
//    $scope.Editar = function (idin, idp) {
//        $scope.a = true;
//        $scope.filtro = $filter('filter')($scope.noti, {'idnoticia': idin});
//        $scope.imagen = '../controles/imagenes/mapas/' + idp + '/' + $scope.filtro[0].imagen;
//
//        $scope.formData.persona = $scope.filtro[0].apellido + ' ' + $scope.filtro[0].nombre;
//        $scope.formData.titulo = $scope.filtro[0].titulo;
//        $scope.medicion = {id:$scope.filtro[0].idmedicion};
//        $scope.formData.encabezado = $scope.filtro[0].encabezado;
//        $scope.formData.observacion =$scope.filtro[0].observacion;
//        $scope.formData.fecha = new Date($scope.filtro[0].fecha);
//        $scope.provincia = {idprovincia: $scope.filtro[0].idprovincia};
//        $scope.formData.file ='asasas.jpg';//$scope.filtro[0].file;
//
//        $scope.formData.idnoticia = idin;
//        $scope.formData.estado = $scope.filtro[0].estado;
//        $scope.formData.idpersona = idp;
//
//        $('#previewing').attr('width', '550px');
//        $('#previewing').attr('height', '350px');
//
//
//    };
//    $scope.clickimagen = function (x, y) {
//
//        $('#icon').html('<img style="height: 100%; width: 100%;" src="../controles/imagenes/mapas/' + x + '/' + y + '"/>');
//        $('#do').html('<a title="Download mapa" href="../controles/imagenes/mapas/' + x + '/' + y + '" download><span class="\n\
//           pull-right btn btn-primary  glyphicon glyphicon-download-alt"></span> </a>');
//        
//        ima.dialog("open");
//    };
//
//    $scope.vista = function (valor) {
////        REgistro NUevo 
//
//        $scope.a = valor;
//        $scope.file="";
//        $scope.formData = {};
//        $scope.formData.fecha = new Date();
//        $scope.medicion = {id: '1'};
//        $scope.provincia = {idprovincia: '1'};
//        $scope.imagen = '../controles/imagenes/noimage.png';
////        $scope.previewing =
//        $scope.formData.idnoticia = "Alta";
//        console.log($scope.formData.provincia);
//        if (valor){
//            
//        } else {
//            $scope.noticia();
//        }
//            
//
//    };
//        
//   
//    $scope.noticia = function () {
//     $http({
//            url: '../controles/noticias.php',
//            method: "POST"
//        }).then(function (response) {
//            $scope.noti = response.data.noticias;
//            console.log(response);
//        },
//                function (response) { // optional
//                    console.log(response);
//                });
//
//    };
//    $scope.noticia();
//    
//    // paginacion de tablas 
//
//    $scope.currentPage = 0;
//    $scope.pageSize = 10; // Esta la cantidad de registros que deseamos mostrar por página
//    $scope.pages = [];
//// 
//    $scope.configPages = function () {
//        $scope.pages.length = 0;
//        var ini = $scope.currentPage - 4;
//        var fin = $scope.currentPage + 5;
//        if (ini < 1) {
//            ini = 1;
//            if (Math.ceil($scope.noti.length / $scope.pageSize) > 10)
//                fin = 10;
//            else
//                fin = Math.ceil($scope.noti.length / $scope.pageSize);
//        } else {
//            if (ini >= Math.ceil($scope.noti.length / $scope.pageSize) - 10) {
//                ini = Math.ceil($scope.noti.length / $scope.pageSize) - 10;
//                fin = Math.ceil($scope.noti.length / $scope.pageSize);
//            }
//        }
//        if (ini < 1)
//            ini = 1;
//        for (var i = ini; i <= fin; i++) {
//            $scope.pages.push({no: i});
//        }
//        if ($scope.currentPage >= $scope.pages.length)
//            $scope.currentPage = $scope.pages.length - 1;
//    };
// 
//    $scope.setPage = function (index) {
//        $scope.currentPage = index - 1;
//    };
////    $scope.configPages();
//    
// 
//
//    
//
//});
//        app.filter('startFromGrid', function () {
//        return function (input, start) {
//            if (!input || !input.length) { return; }
//            start = +start;
//            return input.slice(start);
//        };
});

$(document).ready(function () {
    
    $('#forma').on('submit', function(e){
        e.preventDefault();
          $.ajax({
            url : "../controles/clases/a.php",
             method : "POST",
             data: new FormData(this),
             contentType:false,
             processData:false,
             success: function(data){
             console.log(data);
                }
        });
    });
    
    
    
 var   x = $('#dialog-confirm').dialog({
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

    // Variable to store your files
var files;

//$('#file').click( function (){
//    x.dialog("open");
//});
// Add events
$('input[type=file]').on('change', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  
  files = event.target.files;
}

//    $('#forma').on('submit', function (e) {
      var $fileUpload = $("#file");
//        if (parseInt($fileUpload.get(0).files.length) > 3) {
//            alert("Solo puede subir  3 files");
//        } else {
//            uploadFiles(e);
//        }
//        ;
//    });
// Catch the form submit and upload the files
    function uploadFiles(event)
    {
         var   x = $('#dialog-confirm').dialog({
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
//        event.stopPropagation(); // Stop stuff happening
//        event.preventDefault(); // Totally stop stuff happening
//  
//        // START A LOADING SPINNER HERE
//
//        // Create a formdata object and add the files
//        var data = new FormData();
//        $.each(files, function (key, value)
//        {
//            data.append(key, value);
//        });
//        data.append("tipo", "Agregar");
//        data.append("idpagina", $("#idpagina").val());
//        console.log(data);
//        $.ajax({
//            url: '../controles/clases/a.php',
//            type: 'POST',
//            data: data,
//            cache: false,
//            dataType: 'json',
//            processData: false, // Don't process the files
//            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
//            success: function (data)
//            {
//
//                if ( data.Estado== 'true')
//                {
//                     console.log(data);
////                   x.dialog("open");
//    //                   window.location.reload();               
//                    // Success so call function to process the form
////                submitForm(event, data);
//                } 
//            },
//            error: function (error)
//            {
//                var arr = JSON.stringify(error);
//                console.log("error :" + arr);
//                // STOP LOADING SPINNER
//            }
//        });
//    };
    
    $("#files").change(function () {
        $("#vista-previa").empty(); // To remove the previous error message
        var archivos = this.files;
        var navegador = window.URL || window.webkitURL;
        for (x = 0; x < archivos.length; x++)
        {
//            var size = archivos[x].size;
//            var type = archivos[x].type;
//            var name = archivos[x].name;
            var objeto_url = navegador.createObjectURL(archivos[x]);
            $("#vista-previa").append("<img class='imagen-imagen' src=" + objeto_url + " width='150' height='150'>");

        }
       

    });


    function imageIsLoaded(e) {
//$("#file").css("color","green");
        $('#image_preview').css("display", "block");
//        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '150px');
        $('#previewing').attr('height', '150px');
    }
    ;

    function imagenborrar(e) {
        $('#previewing').attr('src', '../controles/imagenes/noimage.png');
        $('#previewing').attr('width', '250px');
        $('#previewing').attr('height', '230px');
        $('#file').val('');


    }
}
});