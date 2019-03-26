/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

   
    // *************** cuadro de dialogo *************
    //Cuando el formulario con ID acceso se envíe...
    $("#perfil").on("submit", function (e) {
        //Evitamos que se envíe por defecto
        e.preventDefault();
        envio();

    });

    function envio() {

        //Creamos un FormData con los datos del mismo formulario
        var formData = new FormData(document.getElementById("perfil"));
    
        //Llamamos a la función AJAX de jQuery
        $.ajax({
            //Definimos la URL del archivo al cual vamos a enviar los datos
            url: "b.php",
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
                console.log("paso por aqui");

            },
            // modificar el valor de xhr a nuestro gusto
    xhr: function() {
      // obtener el objeto XmlHttpRequest nativo
      var xhr = $.ajaxSettings.xhr();
      // añadirle un controlador para el evento onprogress
      xhr.onprogress = function(evt) {
        // calculamos el porcentaje y nos quedamos sólo con la parte entera
        var porcentaje = Math.floor((evt.loaded / evt.total * 100));
        // actualizamos el texto con el porcentaje mostrado
        $("#progress_id").text(porcentaje + "/100");
        // actualizamos la cantidad avanzada en la barra de progreso
        $("#progress_id").attr("aria-valuenow", porcentaje);
        $("#progress_id").css("width", porcentaje + "%");
      };
      // devolvemos el objeto xhr modificado
      return xhr;
    }

        }).done(function () {
            //Cuando recibamos respuesta, la mostramos
//            window.location.href = '../index.php';
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