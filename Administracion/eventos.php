<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include '../cabezera.php'; ?>
        <link href="../summernote-master/dist/summernote-lite.css" rel="stylesheet" type="text/css"/>
        <script src="../summernote-master/dist/summernote-bs4.js" type="text/javascript"></script>
        <link href="../summernote-master/dist/summernote-bs4.css" rel="stylesheet" type="text/css"/>
    </head>
    <body ng-app="App" ng-controller="eventos">
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="container" style="margin-top: 80px;" >
            <div class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Eventos</a></div>
                    <ul class="nav navbar-nav">
                        <li><a ng-click="consulta(true)" class="">Nuevo</a></li>
                        <li><a ng-click="consulta(false)" class="">Lista</a></li>
                    </ul>
                </div>


                <?php
                $titulo = "";
                $fecha = "";
                $texto = "";
                ?>
                <div id="dedos"></div>

            </div>
            <div ng-show="formulario" class="row">
                <form class="form-horizontal"  method="post" role="form" id="eventos"  >

                    <div class="row">        
                        <div class="col-md-12">
                            <div class="form-group">  
                                <div class="col-md-4 col-xs-4">
                                    <label >Titulo</label>
                                    <input class="form-control" type="text" ng-model="formData.titulo" id="titulo" name="titulo" required  autofocus value="<?php echo $titulo ?>" />
                                    <input type="hidden" name="tipo" id="tipo" ng-model="tipo" value="{{tipo}}" />
                                    <input type="hidden" name="ideventos" id="ideventos"   ng-model="formData.ideventos" value="{{formData.ideventos}}" />


                                </div>
                            </div>
                              <div class="form-group">  
                                <div class="col-md-2  col-xs-2">
                                    <label >Tipo de Eventos</label>
                                    <select ng-model="paginas" id="paginas"  class="form-control" required 
                                        ng-options="operator.pagina for operator  in pag track by operator.idpagina" >
                                </select>
                                </div>
                            </div>
                            <div class="form-group">  
                                <div class="col-md-2  col-xs-2">
                                    <label >Fecha</label>
                                    <input   class="form-control" type="date" ng-model="formData.fecha"  id="fecha" required  name="fecha"  />
                                </div>
                            </div>
                            <div class="form-group">  

                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <label >Texto</label>
                                    
                                    <!--<div ng-model="formData.texto" id="summernote">Hello Summernote</div>-->
                                    
                                    <textarea class="form-control" type="text" ng-model="formData.texto" name="content"  required id="summernote" rows="280" cols="80" name="texto"> </textarea>

                                </div>
                            </div>


                            <div class="form-group">  
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary pull-right"  name="boton" ng-value="accion" />
                                </div>
                            </div>
                        </div> 
                </form>  
            </div>
        </div>
        <div class="row" >  
            <div class="imagenes" ng-show="archivo">
                <input id="input-id" name="imagenes[]"  multiple=true type="file" class="file" data-preview-file-type="text"/>
                <div class="listaimagen">
                    <div class="" ng-repeat="x in imagenes" >
                        <div style="float: left;position: relative;">
                            <img src="../icons/if_Cancel_1063907.png" title="Eliminar" class="borrarimagen" id="eliminarimagen" ng-click="eliminarimagen(x.idimagenevento, x.imagenevento)"  />

                            <img class="img-thumbnail" ng-src="../imagenes/eventos/{{x.imagenevento}}" style="float: left;position: relative;
                                 z-index:0; " width="250" height="150">
                        </div>   
                    </div>
                </div>

            </div>
        </div>



        <div ng-show="grilla" class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 200px">
                            Titulo
                        </th>
                        <TH style="width: 110px">
                            Fecha
                        </TH>
                        <th >
                            Texto
                        </th>
                        <th style="width: 110px">
                            Imagenes
                        </th> 
<!--                            <th>
                           Documentos
                        </th>-->
                        <th style="width: 80px">
                            Editar
                        </th>
                        <th style="width: 80px">
                            Baja
                        </th>
                        <th style="width: 80px">
                           Documentos
                        </th>
                        <th style="width: 80px">
                            Borrar
                        </th>
                    </tr>
                </thead>
                <tbody ng-repeat="x in evento">
                    <tr>
                        <td>
                            {{x.titulo}}
                        </td>
                        <td>
                            {{x.fecha}}
                        </td>
                        <td>
                            {{x.titulo}}
                        </td>
                        <td>
                            <button  data-titulo="{{x.titulo}}" data-ideventos="{{x.ideventos}}" ng-click="EditarImagen(x.ideventos);" class="btn btn-primary">Imagenes</button>
                        </td>
<!--                            <td>
                            <button id="upload1" data-titulo="{{x.titulo}}" data-ideventos="{{x.ideventos}}" ng-click="docu(x.ideventos);" class="btn btn-primary">Documentos</button>
                        </td>-->
                        <td>
                            <button ng-click="caco(x.ideventos)" class="btn btn-primary">Editar texto</button>
                        </td>
                        <td>
                            <button ng-click="BajaEventos(x.ideventos)" class="btn btn-primary">Baja</button>
                        </td>
                        <td>
                            <button data-titulo="{{x.titulo}}" data-ideventos="{{x.ideventos}}" ng-click="SubirDoc(x.ideventos)" class="btn btn-primary">Documentos</button>
                        </td>
                        <td>
                            <button ng-click="BorrarEventos(x.ideventos)" class="btn btn-primary">Borrar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="message"></div>
        </div>
        <div id="dialog-confirm" title="Información">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                <span id="mensaje"></span> </p>
        </div>
        </div>
    </body>
    <script src="../js/Admin_evento.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote({
     height: "500px" 
  });
  
});

</script>
</html>