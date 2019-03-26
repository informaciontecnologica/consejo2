<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php' ?>



    </head>
    <body  >
        <header>
            <?php include '../barra.php'; ?> 



        </header> 

        <div class="container">
            <div class="row">

                <div class="navbar navbar-default" style="background: #5cb85c ; color:#ccffff  " role="navigation">
                    <div class="navbar-header"><a class="navbar-brand " href="#">Bolsa de Oferta y Demanda</a></div>
                    <ul class="nav navbar-nav">

                        <li><a href="ayuda.php?tag=password" class="glyphicon glyphicon-question-sign"></a></li>

                    </ul>
                </div>



                <!--                <form id="Cambiopassword" data-toggle="validator" class="form-horizontal" role="form" >
                                    <div class="form-group">
                                        <label for="siembra" class="control-label col-sm-2 ">Fecha Siembra</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control" id="fechasiembra" name="fechasiembra" placeholder="Fecha Siembra"  
                                                   data-minlength="1" required/>
                
                                        </div> </div>
                                    <div class="form-group">
                                        <label for="Cantidad" class="control-label col-sm-2 ">Cantidad</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="superfice" name="superficie" placeholder="Superficie Sembrada"  
                                                   data-minlength="1" required/>
                                            <span class="help-block">Mínimo un (1) digitos</span>
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="cosecha" class="control-label col-sm-2 ">Fecha Cosecha</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control" id="fechacosecha" name="fechacosecha" placeholder="Fecha Cosecha"  
                                                   data-minlength="1" required/>
                
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="CantidadEs" class="control-label col-sm-2 ">Cantidad Estimada</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="cantidadestimada" name="cantidadestimada" placeholder="cantidadestimada"  
                                                   data-minlength="1" required/>
                                            <span class="help-block">Mínimo un (1) digitos</span>
                                        </div>
                                    </div>
                
                
                                    <div class="form-group">
                                        <label for="Productos " class="control-label col-sm-2 ">Productos</label>
                                        <div class="col-md-4">
                                            <select name="Productos" title="Productos a comprar Ahora" multiple="multiple">
                                                <option></option>
                                                <option>Lechuga</option>
                                                <option>Zapallo</option>
                                                <option>Zanahoria</option>
                                                <option>Apio</option>
                                                <option>Tomate</option>
                                                <option>Morron</option>
                                                <option>Perejil</option>
                                                <option>Oregano</option>
                
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="Formapago " class="control-label col-sm-2 ">Forma de Pago</label>
                                        <div class="col-md-4">     
                                            <textarea class="form-control" id="formapago" placeholder="Descripcion Forma de pago" > Descripcion Forma de pago </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="FormaTrasnporte" class="control-label col-sm-2 ">Forma de Transporte</label>
                                        <div class="col-md-4">     
                                            <textarea class="form-control" id="formatransporte" placeholder="Descripcion Forma de transporte" >Descripcion Forma de transporte
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                </form>-->
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading " style="background:  #0066cc;  ">OFERTAS</div>
                        <div class="panel-body ">
                            <div class="panel-success panel-heading"><span class="badge ">Producto:Lechuga  </span>       
                                <a class="pull-right" title="Preguntar al Comprador"href="#"> Comerciante:Jose Gonzalez</a></div> 
                            <div class="panel-body"><p class="bg-success">Necesito 20 cajas de lechuga en zona de Herradura...</p></div>
                            <div class="panel-success panel-heading"><span class="badge ">Producto:Lechuga  </span>       
                                <a class="pull-right" title="Preguntar al Comprador"href="#"> Comerciante:Ruben Caballero</a></div> 
                            <div class="panel-body"><p class="bg-success">Necesito 15 cajas de tomate puesta en Formosa, Capital , no tengo transporte , Verduleria de jose , direccion :Santa Fe y Chaco</p></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background: #8a6d3b ">DEMANDAS</div>
                        <div class="panel-body ">
                            <div class="panel-success panel-heading"><span class="badge ">Producto:Lechuga  </span>       
                                <a class="pull-right" title="Preguntar al Comprador"href="#"> <strong>Comerciante:Jorge Castro</strong></a></div> 
                            <div class="panel-body"><p class="bg-success">Necesito 20 cajas de lechuga en zona de Herradura...</p></div>
                            <div class="panel-success panel-heading "><span class="badge ">Producto:Lechuga  </span>       
                                <a class="pull-right" title="Preguntar al Comprador"href="#"> <strong>Comerciante:Carlos Romero</strong></a></div> 
                            <div class="panel-body"><p class="bg-success">Necesito 15 cajas de tomate puesta en Formosa, Capital , no tengo transporte , Verduleria de jose , direccion :Santa Fe y Chaco</p></div>
                        </div>
                        
                    </div>
                </div>
                <div id="dialog-confirm" title="Información">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                        <span id="mensaje"></span> </p>
                </div>
                <span id="mensaje1"></span> 


            </div>
        </div>
        <script>
            var formData = new FormData(document.getElementById("Cambiopassword"));
            $(function () {
                x = $('#dialog-confirm').dialog({
                    autoOpen: false,
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: false,
                    buttons: {
                        "Aceptar": function () {
                            BuscarPassword();
                            $(this).dialog("close");
                        },
                        "Cancelar": function () {
                            $(this).dialog("close");
                        }
                    }
                });
                //Cuando el formulario con ID acceso se envíe...
                $("#Cambiopassword").on("submit", function (e) {
                    //Evitamos que se envíe por defecto
                    e.preventDefault();
                    //Creamos un FormData con los datos del mismo formulario
                    $('#mensaje').html("Esta seguro de Cambiar su Clave?");
                    x.dialog("open");


                });


                function BuscarPassword() {

                    //Llamamos a la función AJAX de jQuery       
                    $.ajax({
                        //Definimos la URL del archivo al cual vamos a enviar los datos
                        url: "../controles/buscarpassword.php",
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

                            if (echo) {
                                $('#mensaje1').html("La clave no corresponde");
                                exit();
                            } else
                            {

                                if (CambiarPassword()) {
                                    $('#mensaje1').html(echo);
                                }

                            }
                        }
                    });
                }
                ;

                ;

            });
        </script>  

    </body>
</html>