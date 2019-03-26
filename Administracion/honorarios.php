<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include'../cabezera.php';
        ?>
    </head>
    <body ng-app="App" ng-controller="arios">
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
                <h3 style="text-align: center" class="panel panel-heading">Actualizar Honorarios</h3>
                <div style="border-left: #cccccc 1px solid;" class="col-md-8" >

                    <h4 class="page-header">Documento del Historico Valores de Jus</h4>
                    <form class="navbar-form navbar-left" role="UltimaFecha" id="honorarios">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="tipo" id="tipo" value="Agregar"/>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="files" id="files" title="Ultima Fecha despacho"  />
                        </div>
                        <button type="submit" class="btn btn-default" >Modificar</button>
                    </form>



                    <iframe class="honorarios" id="frame" src="../Administracion/documentohonorarios.html" ></iframe>
                </div>
                <div class="col-md-4">
                    <h4 class="page-header">Valor de Jus en portada Principal</h4>
                    <div style="border-left: #cccccc 1px solid;" class="col-md-8" >
                        <form class="form-control-static" data-toggle="validator" role="form" id="valorhonorarios"  >
                            <label>Periodo</label>  
                            <div class="form-group"> 
                                <input id="periodo" ng-model="periodo" type="date"  name="periodo" ng-value="Vhonorarios.periodo" />
                            </div>
                            <label>Valor de Honorarios</label>
                            <div class="form-group"> 

                                <input id="valor_jus" ng-model="valor_jus" type="number" step = "any"  name="valor_jus" ng-value="Vhonorarios.importe" />
                                <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $_SESSION['idpersona']; ?>"/>
                            </div>
                            <div class="form-group"> 
                                <input class="btn btn-primary" type="submit" id="tipo" name="tipo" ng-value="estados" />  
                            </div>
                        </form>
                    </div>
                </div>


                <!--            <div id="dialog-confirm" ng-show="!mostrar" title="InformaciÃ³n">
                                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                                    <span id="mensaje"></span> </p>
                            </div>-->
            </div>
        </div>
        <script src="../js/honorarios.js" type="text/javascript"></script>
    </body>

<!--    <script>
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
            //Cuando el formulario con ID acceso se envÃ­e...
            $("#honorarios").on("submit", function (e) {
                //Evitamos que se envÃ­e por defecto
                e.preventDefault();
                //Creamos un FormData con los datos del mismo formulario
//                        $('#mensaje').html("Esta seguro de Cambiar su Clave?");
//                        x.dialog("open");

//                x.text('Se actualizo con exito');
                x.dialog('open');
            });




            function Modificar(formData) {
                var formData = new FormData(document.getElementById("honorarios"));
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
    </script>-->
</html>