<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        session_start();

        /* Establecemos que las paginas no pueden ser cacheadas */
        header("Expires: Tue, 01 Jul 2019 06:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        function logOut() {
            session_unset();
            session_destroy();
            session_start();
            session_regenerate_id(true);
        }

        $titulo = "Consejo Profesional de la Abogacía de Formosa";
        $logo = "";
        echo "
 <meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
        <title>$titulo</title>";
        ?> 
        <script src="../jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <link href="../jquery/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <!--<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!--<link href="../bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- ideally at the bottom of the page -->
        <script src="../jquery/angular.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"/>
        <link href="../estilo.css" rel="stylesheet" type="text/css"/>
        <script src="../jquery/jquery-ui-1.12.1.custom/jquery-ui.js"></script>



        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../jquery/bootstrap-fileinput-master/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
        <!-- link href="path/to/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <!-- piexif.min.js is only needed for restoring exif data in resized images and when you 
              wish to resize images before upload. This must be loaded before fileinput.min.js -->
        <script src="../jquery/bootstrap-fileinput-master/js/plugins/piexif.min.js" type="text/javascript"></script>
        <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
             This must be loaded before fileinput.min.js -->
        <script src="../jquery/bootstrap-fileinput-master/js/plugins/sortable.min.js" type="text/javascript"></script>
        <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
             This must be loaded before fileinput.min.js -->
        <script src="../jquery/bootstrap-fileinput-master/js/plugins/purify.min.js" type="text/javascript"></script>
        <!-- the main fileinput plugin file -->
        <script src="../jquery/bootstrap-fileinput-master/js/fileinput.min.js"></script>
        <!-- bootstrap.js below is needed if you wish to zoom and view file content 
             in a larger detailed modal dialog -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- optionally if you need a theme like font awesome theme you can include 
            it as mentioned below -->
        <script src="../jquery/bootstrap-fileinput-master/js/locales/fa.js"></script>
        <!-- optionally if you need translation for your language then include 
            locale file as mentioned below -->
        <script src="../jquery/bootstrap-fileinput-master/js/locales/es.js"></script>

        <script src="../js/resoluciones.js" type="text/javascript"></script>


    </head>
    <body ng-app="App" ng-controller="resol">
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Resoluciones</a></div>
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
                <form class="form-horizontal"  method="post" role="form" id="resoluciones">


                 
                        <div class="form-group">  
                        <div class="col-md-3  col-xs-4">
                                <label >Tag</label>
                                <input class="form-control" type="text" ng-model="formData.tag" id="tag" name="tag" required  autofocus  />
                           
                        </div>

                    </div>                           
                    <div class="form-group">  
                        <div class="col-md-4 col-xs-4">

                            <label >Titulo</label>
                            <input class="form-control" type="text" ng-model="formData.titulo" id="titulo" name="titulo" required  autofocus value="<?php echo $titulo ?>" />
                            <input type="hidden" name="tipo" id="tipo" ng-model="tipo" value="{{tipo}}" />
                            <input type="hidden" name="idresolucion" id="idresolucion"   ng-model="formData.idresolucion" value="{{formData.idresolucion}}" />
                        </div>
                    </div>
                    <div class="form-group">  
                        <div class="col-md-2  col-xs-2">
                            <label >Fecha</label>
                            <input   class="form-control" type="date" ng-model="formData.fecha"  id="fecha" required  name="fecha" value="<?php echo $fecha ?>" />
                        </div>
                    </div>
                    <div class="form-group">  

                        <div class="col-md-10 col-lg-10 col-xs-5">
                            <label >Texto</label>
                            <textarea class="form-control" type="text" ng-model="formData.texto" required id="texto" rows="6" cols="45" name="texto"><?php echo $texto ?> </textarea>

                        </div>
                    </div>


                    <div class="form-group">  
                        <div class="col-md-10">
                            <input type="submit" class="btn btn-primary pull-right"  name="boton" ng-value="accion" />
                        </div>
                    </div>


                </form>  
            </div>

            <div class="row" >  
                <div class="imagenes" ng-show="archivo">
                    <input id="input-id" name="imagenes[]"  multiple=true type="file" class="file" data-preview-file-type="text"/>
                    <div class="listaimagen">
                        <div class="" ng-repeat="x in imagenes" >
                            <img class="img-thumbnail" ng-src="../imagenes/eventos/{{x.imagenevento}}" style="float: left;" width="150" height="150">

                        </div>    
                    </div>
                    <div class="row container">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th style="width: 200px">
                                        Documentos y resoluciones
                                    </th>


                                </tr>
                            </thead>
                            <tbody ng-repeat="x in resolucion_doc">
                                <tr  >
                                    <td>
                                        <a  ng-href="../documentos/{{x.link}}"  download >{{x.link}}</a> 
                                        
                                    </td>
                                    <td > 
                                        <button ng-click="Borrar(x.idresdocumento,x.link)" class="glyphicon glyphicon-remove" title="Borrar" > </button>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        {{mensaje}}
                    </div>
                </div>
            </div>
 

            <div ng-show="grilla" class="row">

                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="width: 200px">
                                Tag
                            </th>
                            <TH style="width: 110px">
                                Fecha
                            </TH>
                            <th style=" width: 80px">
                               Titulo
                            </th>
                             <th >
                               Texto
                            </th>
                            <th style=" width: 80px">
                                Documentos
                            </th>
                            <th style="width: 80px">
                                Editar
                            </th>
                             <th style="width: 80px">
                                Baja
                            </th>
                             <th style="width: 80px">
                                Borrar
                            </th>
                        </tr>
                    </thead>
                    <tbody ng-repeat="x in resoluciones">
                        <tr>
                            <td>
                                {{x.tag}}
                            </td>
                            <td>
                                {{x.fecha}}
                            </td>
                            <td>
                                {{x.titulo}}
                            </td>
<td>
                                {{x.texto}}
                            </td>
                            <td style=" width: 80 px">
                                <button id="upload1" data-titulo="{{x.titulo}}" data-ideventos="{{x.idresolucion}}" ng-click="EditarImagen(x.idresolucion);" class="btn btn-primary">Documentos</button>
                            </td>
                            <td>
                                <button ng-click="caco(x.idresolucion)" class="btn btn-primary">Editar texto</button>
                            </td>
                              <td>
                                <button ng-click="BajaResolucion(x.idresolucion)" class="btn btn-primary">Baja</button>
                            </td>
                            <td>
                                <button ng-click="BorrarResolucion(x.idresolucion)" class="btn btn-primary">Borrar</button>
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
    </body>
    

</html>