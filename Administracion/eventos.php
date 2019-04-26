<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include '../cabezera.php'; ?>
        <link href="../summernote-master/dist/summernote-lite.css" rel="stylesheet" type="text/css"/>
        <script src="../summernote-master/dist/summernote-bs4.js" type="text/javascript"></script>
        <link href="../summernote-master/dist/summernote-bs4.css" rel="stylesheet" type="text/css"/>
        <script src='//ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular-route.min.js'></script>
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


            </div>
            <div ng-show="formulario" class="row">
                <form class="form-horizontal"  method="post" role="form" id="eventos"  >

                    <div class="row">        
                        <div class="col-md-12">
                            <div class="form-group">  
                                <div class="col-md-4 col-xs-4">
                                    <label >Titulo</label>
                                    <input class="form-control" type="text" ng-model="formData.titulo" id="titulo" name="titulo" required  autofocus value="<?php echo $titulo ?>" />
                                    <input type="hidden" name="tipo" id="tipo" ng-model="formData.tipo" value="{{tipo}}" />
                                    <input type="hidden" name="ideventos" id="ideventos"   ng-model="formData.ideventos" value="{{formData.ideventos}}" />
                                    <input type="hidden" name="pathold" id="pathold"   ng-model="formData.pathold" value="{{formData.path}}" />
                                    <input type="hidden" name="idpathold" id="idpathold"   ng-model="formData.idpathold" value="{{pagin}}" />

                                </div>
                            </div>
                            <div class="form-group">  
                                <div class="col-md-2  col-xs-2">
                                    <label >Tipo de Eventos</label>
                                    <select ng-model="formData.idpagina" id="idpagina" name="idpagina"  class="form-control" required 
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

                                    <textarea class="form-control" type="text" ng-model="formData.texto" name="content"  required id="summernote" rows="180" cols="80" name="texto"> </textarea>

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




        <div ng-show="grilla" class="row">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 25px">
                            id
                        </th>
                        <th style="width: 200px">
                            Titulo
                        </th>
                        <TH style="width: 110px">
                            Fecha
                        </TH>
                        <th >
                            Texto
                        </th>
                        <th style="width: 80px">
                            Editar
                        </th>
                        <th style="width: 80px">
                            Folletos
                        </th>
                        <th style="width: 110px">
                            Imagenes
                        </th> 

                        <th style="width: 80px">
                            Documentos
                        </th>
                        <th style="width: 80px">
                            Noticias
                        </th>
                        <th style="width: 80px">
                            Borrar
                        </th>
                        <th style="width: 80px">
                            Baja
                        </th>
                    </tr>
                </thead>
                <tbody ng-repeat="x in evento">
                    <tr>
                        <th >
                            {{x.ideventos}}
                        </th>
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
                            <button ng-click="caco(x.ideventos)" class="btn btn-primary">Editar texto</button>
                        </td>
                        <td>
                            <a ng-href="#noticias/{{x.ideventos}}/{{x.path}}/{{x.titulo}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-info" role="button">Folletos</a>
                            <!--<button data-titulo="{{x.titulo}}" data-path="{{x.path}}" data-ideventos="{{x.ideventos}}" ng-click="Afolletos(x.ideventos,x.path)" class="btn btn-primary">Folletos</button>-->
                        </td>
                        <td>
                            <a ng-href="#imagenes/{{x.ideventos}}/{{x.path}}/{{x.titulo}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-info" role="button">Imagenes</a>
                            <!--<button  data-titulo="{{x.titulo}}" data-path="{{x.path}}" data-idevento="{{x.ideventos}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-primary">Imagenes</button>-->
                        </td>
                       
                       <!--                            <td>
                                            <button id="upload1" data-titulo="{{x.titulo}}" data-ideventos="{{x.ideventos}}" ng-click="docu(x.ideventos);" class="btn btn-primary">Documentos</button>
                                        </td>-->


                        <td>
                             <a ng-href="#noticias/{{x.ideventos}}/{{x.path}}/{{x.titulo}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-info" role="button">Documentos</a>
                            <!--<button data-titulo="{{x.titulo}}" data-ideventos="{{x.ideventos}}" ng-click="SubirDoc(x.ideventos, x.path)" class="btn btn-primary">Documentos</button>-->
                        </td>
                        <td>
                            <a ng-href="#noticias/{{x.ideventos}}/{{x.path}}/{{x.titulo}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-info" role="button">Noticias</a>
                            <!--<button data-titulo="{{x.titulo}}" data-ideventos="{{x.ideventos}}" ng-src="#noticias/{{x.ideventos}}/{{x.path}}" class="btn btn-file">Noticias</button>-->
                        </td>


                        <td>
                            <button ng-click="BorrarEventos(x.ideventos,x.path)" class="btn btn-primary">Borrar</button>

                        </td>
                        <td>
                            <button ng-click="BajaEventos(x.ideventos)" class="btn btn-primary">Baja</button>
                        </td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
        <div ng-view></div>


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
                                $(document).ready(function () {
                                $('#summernote').summernote({
                                height: "300px"
                                });
                                });
    </script>
</html>