/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('per', []);
app.controller('perfil', function ($scope, $http,$filter ) {
        $scope.notici = function () {
        $http({
            url: '../controles/clases/noticias.php',
            method: "POST",
            data:{"tipo":"noticias"}
            
        }).then(function (response) {
            $scope.matriculas = response.data.noticias[0].matriculas;
            $scope.bonos = response.data.noticias[0].bonos;
            $scope.eventos = response.data.noticias[0].eventos;
            $scope.resoluciones = response.data.noticias[0].resoluciones;
            $scope.noticias = response.data.noticias[0].noticias;
            console.log(response.data.noticias);
        });

    };
    $scope.notici();

     $scope.perfiles = [
        {'id': 1, 'label': 'Administrador'},
        {'id': 2, 'label': 'Editor'},
        {'id': 3, 'label': 'Profesional'},
        {'id': 4, 'label': 'Usuario'}
    ];
     
});

$(function () {
    var avatar= false;
    var ima = $('#message').dialog({
        autoOpen: false,
        resizable: true,
        height: 600,
        width: 800,
        modal: false,
        buttons: {
            "Cerrar": function () {
                $(this).dialog("close");
            }
        }

    });
    // *************** cuadro de dialogo *************
    //Cuando el formulario con ID acceso se envíe...
    $("#perfil").on("submit", function (e) {
        //Evitamos que se envíe por defecto
        e.preventDefault();
        envio();
//        ima.dialog('option', 'title', 'Observaciones del usuario');
//
//        ima.dialog({width: 300, height: 200});
//        ima.text('Se actualizo con exito');
////        ima.on("dialogbeforeclose", function (event, ui) {
////            location.reload();
////        });
//        ima.dialog('open');

    });

    function envio() {

        //Creamos un FormData con los datos del mismo formulario
        var formData = new FormData(document.getElementById("perfil"));
        
//        if (document.getElementById("perfil")) {
        
//        if (dd=="noimage.png"){
//            formData.delete("file");
//        }var dd=$('#file').val();
//        console.log(dd );
//        } else
//        {
//            formData.append("avatar", 0);
//        }
//        Llamamos a la función AJAX de jQuery
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/controles/modificacionperfil.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "HTML",
            //Definimos la información que vamos a enviar
            data: formData,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (response) {
                console.log(response);
               

            }

        }).done(function () {
//            location.reload();
            //Cuando recibamos respuesta, la mostramos
            window.location.href = '../index.php';
        });
    }

    function foto() {

        //Creamos un FormData con los datos del mismo formulario
        var formData = new FormData(document.getElementById("foto"));

        //Llamamos a la función AJAX de jQuery
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "../controles/perfil.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "HTML",
            //Definimos la información que vamos a enviar
            data: formData,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (response) {
                console.log(response);
                console.log("foto");

            }

        }).done(function () {
            //Cuando recibamos respuesta, la mostramos
//                    window.location.href = '../index.php';
        });
    }


    // Function to preview image after validation

    $("#file").change(function () {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
        {
            avatar=false;
            $('#previewing').attr('src', 'noimage.png');
            $("#message").html("<p id='error'>Please Select A valid Image File</p>"
                    + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        } else
        {
            avatar=true;
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {

    $('#image_preview').css("display", "block");
    $('#previewing').attr('src', e.target.result);
//        $('#previewing').attr('width', '250px');
//        $('#previewing').attr('height', '200px');
}
;

function imagenborrar(e) {
    $('#previewing').attr('src', '../imagenes/noimage.png');
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
    $('#file').val('');


}
$('#cancelar').click(function () {
    imagenborrar(e);
});


$(document).ready(function () {
    $('#previewing').on('click', function (evt) {
        evt.preventDefault();
        $('#file').trigger('click');
    });
});