<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include '../cabezera.php'; ?>
        <script src="../js/despachos.js" type="text/javascript"></script>
    </head>
    <?php include '../barra.php'; ?> 
    <body>
        <div class="container" >
        <div class="barrasuperior">Despachos Judiciales</div>
           <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px;  "> 

                           <?php
//              include '../controles/clases/ClaseCarrucel.php';
//                $carr = new Carrucel();
//                $carr->VerCarrucel(1);
                ?>
        </section>
        </div>
        <div class="container-fluid">
         <!--<iframe ng-show="estado" id="blockrandom" name="iframe" src="http://www.jusformosa.gov.ar/despacho/historialista/index.php" width="100%" height="900" scrolling="auto" frameborder="0" class="wrapper">-->
            <iframe id="blockrandom" name="iframe"  width="60%" height="850px;" scrolling="auto" frameborder="0" class="marco_despachos"></iframe>


            <aside class="menu_despachos">
                <div class="affix-sidebar">
                    <div class="sidebar-nav">
                        <div class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <span class="visible-xs navbar-brand">Sidebar menu</span>
                            </div>
                            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                                <ul class="nav navbar-nav" id="sidenav01">
                                    <li class="active" style=" width: 100%">
                                        <a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
                                            <h4>Despachos</h4></a>
                                    </li>
                                    <li  style=" width: 100%">
                                        <a  target="iframe" href="federal.php" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
                                            <span class="glyphicon glyphicon-cloud"></span>Federal
                                            <!--<span class="caret pull-right"></span>-->
                                        </a>

                                    </li>
                                    <li class="active"  style=" width: 100%">
                                        <a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
                                            <span class="glyphicon glyphicon-inbox"></span>Provincial<span class="caret pull-right"></span>
                                        </a>
                                        <div class="collapse " id="toggleDemo2" style="height: 0px; width: 100%;">
                                            <ul class="nav nav-list">
                                                <li class="item-854"><a   target="iframe" href="secretariarecursos.php">  <span class="glyphicon glyphicon-inbox"></span>Secretaría de recursos</a></li>
                                                <li class="item-855"><a  target="iframe" href="Secretariadetramites.php">  <span class="glyphicon glyphicon-inbox"></span>Secretaria de tramites</a></li>
                                                <li class="item-856"><a  target="iframe" href="camaracivil.php">  <span class="glyphicon glyphicon-inbox"></span>Cámara civil</a></li>
                                                <li class="active"><a  target="iframe" href="familia.php">  <span class="glyphicon glyphicon-inbox"></span>Tribunal de familia<span class="caret pull-right"></span></a></li>
                                                <li class="active"><a  target="iframe" href="tribunaltrabajo.php">  <span class="glyphicon glyphicon-inbox"></span>Tribunal de trabajo<span class="caret pull-right"></span></a></li>
                                                <li class="active"><a  target="iframe" href="juzgadocivil.php">  <span class="glyphicon glyphicon-inbox"></span>Juzgado Civil<span class="caret pull-right"></span></a> </li>
                                                <li class="active"><a  target="iframe" href="juzgamultifuero.php">  <span class="glyphicon glyphicon-inbox"></span>Juzgado multifuero<span class="caret pull-right"></span></a> </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </aside>>




        </div>
        <!--</div>-->
        <?php include '../pie.php'; ?>   
    </body>



</html>