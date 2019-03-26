<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include'../cabezera.php';
        ?>
    </head>
    <body>
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="container" style="margin-top: 70px;">
            <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>

            <div class="row">
                <div class="col-md-8 col-sm-offset-2">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header"><a class="navbar-brand" href="#">Consultas</a></div>
                        <ul class="nav navbar-nav">

                            <li><a href="ayuda.php?tag=consultas" class="glyphicon glyphicon-question-sign"></a></li>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <form class="form-horizontal " role="form" id="consultas"  >

                    <div class="form-group"> 

                        <label>Nombre</label>
                        <input class="form-control" id="nombre" type="text" autocomplete="off"  name="nombre" required size="50" autofocus />

                    </div>

                    <div class="form-group"> 

                        <label>Apellido </label>
                        <input class="form-control" id="apellido" type="text" autocomplete="off"  name="apellido" required size="50" autofocus />

                    </div>

                    <div class="form-group">  
                        <div>
                            <label>E-mail</label>
                        </div>
                        <input class="form-control" type="email" id="email" name="email" required size="50" autofocus  />
                    </div>
                    <div class="form-group  "> 
                        <div>
                            <label>Consulta </label>
                        </div>
                        <textarea  class="form-control" id="nota" type="text" autocomplete="off"  name="nota" required size="80"  rows="10" autofocus></textarea>
                    </div>
                    <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $_SESSION['idpersona']; ?>"/>
                    <input class="btn btn-primary pull-right" type="submit" name="contacto" value="Enviar" />

                </form>
            </div>
            <!--</div>-->


            <div id="dialog-confirm" title="Información">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                    <span id="mensaje"></span> </p>
            </div>
        </div>


        <?php include '../pie.php'; ?> 
    </body>

    <script>
        $(function () {
            x = $('#dialog-confirm').dialog({
                autoOpen: false,
                resizable: false,
                height: "auto",
                width: 400,
                modal: false,
                buttons: {
                    close: function () {
                        $("#contacto #nombre").val('');
                        $("#contacto #mail").val('');
                        $("#contacto #consulta").val('');

                        $(this).dialog("close");
                    }
                }



            });
            //Cuando el formulario con ID acceso se envíe...
            $("#consultas").on("submit", function (e) {
                //Evitamos que se envíe por defecto
                e.preventDefault();
                //Creamos un FormData con los datos del mismo formulario
//                        $('#mensaje').html("Esta seguro de Cambiar su Clave?");
//                        x.dialog("open");
                var formData = new FormData(document.getElementById("consultas"));
                Enviar(formData);
            });




            function Enviar(formData) {

                //Llamamos a la función AJAX de jQuery       
                $.ajax({
                    //Definimos la URL del archivo al cual vamos a enviar los datos
                    url: "../controles/controles/mail.php",
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
                    success: function (echo) {
                        console.log(echo);
                        if (!echo) {
                            $('#mensaje').html("No se Pudo concretar el envio /n Intente de nuevo. ");
////                            exit();
                        } else
                        {

                            $('#mensaje').html("!Gracias, por su consulta");
                        }
                        x.dialog("open");

                    }
                });

            }

        });
    </script>
</html>