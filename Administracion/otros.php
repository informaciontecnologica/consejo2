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
        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Honorarios</a></div>
                    <ul class="nav navbar-nav">

                        <li><a href="ayuda.php?tag=consultas" class="glyphicon glyphicon-question-sign"></a></li>
                    </ul>

                </div>


                <div class="col-md-6">
                    <form class="form-horizontal " data-toggle="validator" role="form" id="honorarios"  >
                        <div class="form-group"> 
                            Salto de Linea:< /br>
                        </div>
                        <div class="form-group"> 

                            <label>Crónica de Honorarios</label>
                            <textarea id="honorarios" ng-model="honorarios" name="honorarios" rows="19" cols="150"><?php echo file_get_contents('documentohonorarios.php');?></textarea


                        </div>
                        <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $_SESSION['idpersona']; ?>"/>
                        <input class="btn btn-primary" type="submit" name="contacto" value="Modificar" />

                    </form>
                </div>
            </div>


            <div id="dialog-confirm" title="Información">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                    <span id="mensaje"></span> </p>
            </div>
        </div>


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
                    Aceptar: function () {
                        Modificar();
                        $(this).dialog("close");
                    },
                    close: function () {

                        $(this).dialog("close");
                    }
                }



            });
            //Cuando el formulario con ID acceso se envíe...
            $("#honorarios").on("submit", function (e) {
                //Evitamos que se envíe por defecto
                e.preventDefault();
                //Creamos un FormData con los datos del mismo formulario
//                        $('#mensaje').html("Esta seguro de Cambiar su Clave?");
//                        x.dialog("open");

//                x.text('Se actualizo con exito');
                x.dialog('open');
            });




            function Modificar(formData) {
                var formData = new FormData(document.getElementById("honorarios"));
                //Llamamos a la función AJAX de jQuery       
                $.ajax({
                    //Definimos la URL del archivo al cual vamos a enviar los datos
                    url: "../controles/controles/honorarios.php",
                    //Definimos el tipo de método de envío
                    type: "POST",
                    //Definimos el tipo de datos que vamos a enviar y recibir
                    dataType: "html",
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
                            $('#dialog-confirm').html("No se Pudo concretar el envio /n Intente de nuevo. ");
////                            exit();
                        } else
                        {

                            $('#dialog-confirm').html("!Gracias, por su consulta");
                        }


                    }
                });

            }

        });
    </script>
</html>