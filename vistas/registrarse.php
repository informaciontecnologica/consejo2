<!DOCTYPE html>
<html>
    <head>
        <?php include '../cabezera.php'; ?>
    </head>
    <body>
        <header>

        </header>
        <?php include '../barra.php'; ?> 
        <div class="container " style="margin-top: 60px;">
            
<div class="col-xs-12 col-sm-6 col-md-5 col-md-push-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center ">Registrarse</div>
                <div class="panel-body">
                <form  method="POST" id="registro" action="" accept-charset="utf-8" class="form-horizontal">
                   <div class="col-xs-12 col-sm-6 col-md-9 col-md-push-2">
                    <div class="form-group">
                        <label class="control-label">Mail</label>

                        <input type="email" class="form-control " required name="mailRegistro" class="registro" id="mailRegistro" placeholder="Mail" autocomplete="off" maxlength="60">

                    </div>
                   </div>
                     <div class="col-xs-12 col-sm-6 col-md-9 col-md-push-2">
                    <div class="form-group ">
                        <label class="control-labe">Clave</label>

                        <input type="password" class="form-control" required name="passRegistro" class="registro" id="passRegistro" placeholder="Contraseña" autocomplete="off" maxlength="16">
                        
                    </div></div>
                          <div class="col-xs-12 col-sm-6 col-md-4 col-md-push-4">
                    <div class="form-group ">  
                        
                            <input type="submit" class="btn btn-primary" name="registro" class="boton-principal" value="Registrarse">
                        
                    </div></div>
              
            
                </form>
                </div>
                <div id="mensaje"></div>
            </div>
        </div>
        </div>
        <script>

            //Guardamos el controlador del div con ID mensaje en una variable
            var mensaje = $("#mensaje");
            //Ocultamos el contenedor
            mensaje.hide();

            //Cuando el formulario con ID acceso se envíe...
            $("#registro").on("submit", function (e) {
                //Evitamos que se envíe por defecto

                e.preventDefault();
                //Creamos un FormData con los datos del mismo formulario
                var formData = new FormData(document.getElementById("registro"));
                //Llamamos a la función AJAX de jQuery
                $.ajax({
                    //Definimos la URL del archivo al cual vamos a enviar los datos
                    url: "../controles/controles/registro.php",
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
                    success: function (data) {

                        console.log(data);
                        $('#registro').hide();
                        $("#message").html(data);
                    }

                }).done(function (data) {
                    //Cuando recibamos respuesta, la mostramos
                    mensaje.html(data);
                    mensaje.slideDown(500);
                });
            });



        </script>
    </body>
</html>