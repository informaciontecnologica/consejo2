<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include'../cabezera.php';
        ?>
    </head>
    <body ng-app="App" ng-controller="imagenes">
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Imagenes</a></div>
                    <ul class="nav navbar-nav">
                        <ul class="nav navbar-nav">
                            <li><a ng-click="Pantalla('Nuevo');" class="">Nuevo</a></li>
                            <li><a ng-click="Pantalla('Lista');"  class="">Listas</a></li>
                            <!--<li><a ng-click="Pantalla('NuevoProvincial');" class="">Nuevo Provincial</a></li>-->
                            <li><a href="ayuda.php" target="top" class="glyphicon glyphicon-question-sign"></a></li>
                            <li><a>Paginas</a></li>
                            <li  style="padding-top: 5px;">
                                <select ng-model="paginas" id="paginas"  class="form-control" required ng-change="Cambiopagina(paginas)"
                                        ng-options="operator.pagina for operator  in pag track by operator.idpagina" >
                                </select></li>
                        </ul>
                    </ul>

                </div>

                <div class="col-md-6 col-sm-6">
                    <form id="forma"  method="post" class="form-inline" enctype="multipart/form-data" >
                        <input type="hidden" id="idpagina" name="idpagina" ng-value="paginas.idpagina" />
                        <div class="form-control">
                            <input id="file" name="file[]" multiple type="file" class="file-actions"  accept="image/jpg, image/jpeg"/> 
                        </div> 

                        <input class="form-control" type="submit" value="Subir"/>

                    </form>
                    <div id="vista-previa" title="Información">
                        <img  src="" />
                        <p><span id="mensaje"></span> </p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6" ng-show="nuevo" id="imagenescuadro" >
                    <!--                <button ng-click="pin(paginas.idpagina,'dddddd')"></button>-->

                    <div id="dedos"></div>

                    <h4 class="text-capitalize">Lista de Imagenes {{paginas.pagina}}</h4>

                    <div width="450px" ng-repeat="x in image">

                        <div class="imagen-imagen">
                            <img  ng-src="../imagenes/banners/{{x.imagen}}"width="150" height="150" style="float: left;" />
                        </div>

                    </div>
                </div>
            </div>


        </div>
       
        <div id="dialog-confirm" title="Información">
           
            <p><span id="mensaje"></span> </p>
        </div>
    </body>

    <script src="../js/imagenes.js" type="text/javascript"></script>
</html>