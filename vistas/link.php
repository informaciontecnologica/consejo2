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

            <article class="col-md-12 col-xs-12 ">
                <h5 class="text-uppercase text-center"> Sitios de interes </h5>
           
                <table class="col-md-12 col-xs-8 table table-bordered">
                                        
                    <tr class="sectiontableentry1">
                       
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.ij-ilg.com" target="top" class="category"> Soluciones jurídicas online para toda latinoamerica </a>
                            <span class="description">www.ij-ilg.com</span>
                        </td>
                        <td align="center">
                           	</td>
                    </tr>
                    <tr class="sectiontableentry1">
                       
                        <td height="20">
                           <span class="glyphicon glyphicon-link"></span>
                            <a href="https://vlex.com/" target="top" class="category"> https://vlex.com/</a>
                            <span class="description">https://vlex.com/</span>
                        </td>
                        <td align="center">
                           	</td>
                    </tr>
                    <tr class="sectiontableentry2">
                     
                        <td height="20">
                           <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.infoleg.gob.ar/" target="top" class="category">infoleg.gob.ar/</a>
                            <span class="description">http://www.infoleg.gob.ar/</span>
                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                    <tr class="sectiontableentry1">
                      
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.diariojudicial.com/" target="top" class="category">http://www.diariojudicial.com/</a>
                            <span class="description">http://www.diariojudicial.com/</span>
                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                    <tr class="sectiontableentry2">
                        
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a  href="http://www.derechos.org/nizkor/arg/ley/" target="top" class="category">http://www.derechos.org/nizkor/arg/ley/</a>
                            <span class="description">http://www.derechos.org/nizkor/arg/ley/</span>
                        </td>
                        <td align="center">
                           	</td>
                    </tr>
                    <tr class="sectiontableentry1">
                       
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.aabadigital.org/" target="top" class="category"> 	http://www.aabadigital.org/</a>
                            <span class="description">Aabadigital</span>
                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                   <tr class="sectiontableentry1">
                       
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a   target="_new" href="http://faca.org.ar/" title="Federacion Argentina de Colegios de Abogados">Federacion Argentina de Colegios de Abogados</a>

                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                </table>
            </article>   

        </section>
    </div>
    <?php include '../pie.php'; ?> 
</body>

</html>