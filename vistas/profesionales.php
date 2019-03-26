<?php ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../cabezera.php';
        ?>   
    </head>
    <body ng-app="App" ng-controller="profesionales" >
        <header>
            <?php include '../barra.php'; ?> 
        </header>
        <div class="container" style="margin-top:70px;">

            <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px; "> 
                <?php
                include '../controles/clases/ClaseCarrucel.php';
                $carr = new Carrucel();
                $carr->VerCarrucel(6);
                ?>
            </section>
            <h5 class="text-uppercase text-center">Profesionales del derecho</h5>
            <article class="col-md-12 col-xs-12 " ng-repeat="x in abogados">

                <div class="etiqueta-profesional" >
                    <p>
                        <span class="nombre">jorge daniel castro</span>
                        <span class="direccion">Av. napoleon uriburu 455</span>
                    <span class="lugar">3600 Formosa</span>
                    </p>

                </div>

            </article>   

        </section>
    </div>
    <?php include '../pie.php'; ?> 
</body>

</html>