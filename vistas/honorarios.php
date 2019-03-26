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
    <body >
        <header>
            <?php include '../barra.php'; ?>  <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
        </header>
        <div class="container" style="margin-top:70px;">
           
            <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px; "> 
                <?php
                include '../controles/clases/ClaseCarrucel.php';
                $carr = new Carrucel();
                $carr->VerCarrucel(6);
                ?>
            </section>

            <article class="col-sx-10 col-md-12">
                <h5> (Leyes 512 y 564)</h5>
                <iframe class="honorarios" src="../Administracion/documentohonorarios.html" ></iframe>
            </article>   

        </section>
    </div>




    <?php include '../pie.php'; ?> 
</body>

</html>