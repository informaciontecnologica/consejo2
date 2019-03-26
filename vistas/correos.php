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

    </head>
    <?php include '../barra.php'; ?> 
    <body>
        <div class="container" >
            <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
            <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px;  "> 

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item">
                            <img style="height: 400px; width:  100%;" src="../imagenes/carrusel/IMG_20170616_114203985.jpg" alt="...">
                            <div class="carousel-caption">
                                Capacitación 
                            </div>
                        </div>
                        <div class="item active">
                            <img style="height: 400px; width:  100%;" src="../imagenes/carrusel/IMG_20170616_114224339.jpg" alt="...">
                            <div class="carousel-caption">
                                Nuevo Consejo
                            </div>
                        </div>
                        <div class="item">
                            <img style="height: 400px; width:  100%;" src="../imagenes/carrusel/IMG_20170616_114354897.jpg" alt="...">
                            <div class="carousel-caption">
                                Capacitación 
                            </div>
                        </div>

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </section>
           
        </div>
        <?php include '../pie.php'; ?>   
    </body>



</html>


