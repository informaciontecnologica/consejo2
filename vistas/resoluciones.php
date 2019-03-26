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


    </head>
    <body ng-app="App" ng-controller="resol">
        <header>
            <?php include '../barra.php'; ?> 
        </header> 

        <div class="container" style="margin-top:70px;">
            <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
            <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px; margin-bottom: 10px; "> 

                <?php
                include '../controles/clases/ClaseCarrucel.php';
                $carr = new Carrucel();
                $carr->VerCarrucel(3);
                ?>
            </section>
            <div class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Declaraciones y resoluciones</a></div>
                    <ul class="nav navbar-nav">

                        <li ><div  class="input-group  col-md-4"> 
                                <span class="input-group-addon">Filter</span>
                                <input class="form-control" type="text" ng-model="search"/>

                            </div>
                        </li>
                    </ul>
                </div>


                <?php
                $titulo = "";
                $fecha = "";
                $texto = "";
                ?>
                <div id="dedos"></div>
            </div> 
            <div ng-show="grilla" class="row">
                <div >
                    <div class='btn-group'> 
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 200px">
                                Tag
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
                            <th>
                                Documentos
                            </th>

                        </tr>
                    </thead>
                    <tbody ng-repeat="x in resoluciones| filter:search | startFromGrid: currentPage * pageSize | limitTo: pageSize">
                        <tr>
                            <td>
                                {{x.tag}}
                            </td>
                            <td>
                                {{x.titulo}}
                            </td>
                            <td>
                                {{x.fecha}}
                            </td>
                            <td>
                                {{x.texto}}
                            </td>

                            <td>
                                <button  ng-click="ListasDocumentos(x.idresolucion);" class="btn btn-primary">Documentos</button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div ng-show="detalless" class="row">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="width: 200px">
                                Documentos y resoluciones
                            </th>


                        </tr>
                    </thead>
                    <tbody ng-repeat="x in resolucion_doc">
                        <tr>
                            <td>
                                <a  ng-href="../documentos/{{x.link}}"  download >{{x.link}}</a>
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
    <script src="../js/resoluciones.js" type="text/javascript"></script>

</html>