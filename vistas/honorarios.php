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
            <?php include '../barra.php'; ?>  
            
        </header>
        <div class="container" style="margin-top:70px;">
           <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
           
           <section  class="col-md-offset-2 col-xs-12  col-md-8" style=" height: 100%;  background-color:  #000000; margin-top: 5px;"  > 
                <?php
              $idevento = '26';
              include '../controles/clases/conexion.php';
                $rea = new Conexion();
                $sql = "select * from imagenes i left join eventos e on e.ideventos=i.idevento where e.ideventos=:idevento";
                $consultas = $rea->prepare($sql);
                $consultas->bindParam(":idevento", $idevento);
                $consultas->execute();
                if ($consultas) {
                    while ($registro = $consultas->fetch(PDO::FETCH_ASSOC)) {
                        $rows[] = $registro;
                    }
                    $fila = count($rows);
                }

                ?>
                <div id="carousel-example-generic" class="carousel slide  " style=" text-align: center;  height:500px; margin-top: 25px; margin: auto;" data-ride="carousel" >
                    <!--Indicators--> 
                    <ol class="carousel-indicators">
                        <?php
                        for ($index = 0; $index < $fila; $index++) {

                            $re = ($index == 0) ? $clas = 'class="active"' : "";
                            ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $index ?>" <?php echo $clas ?>></li>


                        </ol>

                        <!--Wrapper for slides--> 
                        <div class="carousel-inner" role="listbox">
                            <?php
                            for ($index = 0; $index < $fila; $index++) {

                                $re = ($index == $fila - 1) ? $clas = 'active' : "";
                                ?>
                                <div class="item <?php echo $clas ?>">
       
                                    <img style="height: 500px; " src="<?php echo"../imagenes/" . $rows[$index]['path'] . "/imagenes/" . $rows[$index]['imagen']; ?>" alt="..."/>
                                    <div class="carousel-caption"  >
                                        <p style="background-color:  #555;">
                                       <?php 
                                       echo $rows[$index]['titulo'];  
                                       
                                       ?>
                                       
                                    </div>
                                </div>
                        <?php }}
                ?>
                        </div></div>
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