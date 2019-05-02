
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
    <body ng-app="App" ng-controller="index">
        <header>
            <?php include '../barra.php'; ?> 
            <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
        </header> 

        <div  style="margin-top:70px; display: block;">

            <div class=" col-xs-12 col-md-offset-3 col-md-6 barrasuperior ">Consejo Profesional de la Abogacia Formosa</div>

            <section  class=" col-xs-12  col-md-6 col-md-offset-3" > 
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
                <div id="carousel-example-generic" class="carousel slide  " style=" text-align: center;  height:400px; margin-top: 25px; margin: auto;" data-ride="carousel" >
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

                                    <img style="height: 400px; width:  800px;" src="<?php echo"../imagenes/" . $rows[$index]['path'] . "/imagenes/" . $rows[$index]['imagen']; ?>" alt="..."/>
                                    <div class="carousel-caption"  >
                                        <p style="background-color:  #555;">
                                            <?php
                                            echo $rows[$index]['titulo'];
                                            ?>

                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div></div>
            </section>

            <div class="col-md-12 col-xs-12 Precios_jus" >
                <h4>Valor JUS {{Vhonorarios.importe}}  Desde : {{Vhonorarios.periodo| date:"dd/MM/yyyy" }} Resolución n°  29/19 </h4>
            </div>
            <div class="col-md-12 col-xs-12 alert alert-success" role="alert" >
                <h4 style=" color: #761c19;  ">DIPLOMATURA EN DERECHO PRIVADO PATRIMONIAL</h4>
                <h4 style=" color: #761c19;  ">DICTADO</h4>
                <p >El viernes 26 de Abril del cte año se dio inicio al dictado de la Diplomatura en Derecho Privado Patrimonial en el marco del Convenio firmado entre el Consejo Profesional de la Abogacía y la Universidad del Chaco Austral, con el auspicio de la Fiscalía de Estado de la Provincia de Formosa, el Colegio de Magistrados y Funcionarios de la Provincia de Formosa y la Comisión de Jóvenes Abogados.	
        Esta actualización que se lleva a cabo en la sede del Consejo está destinada a profesionales del derecho y profesiones afines. Durará ocho meses y se centra en las obligaciones, la responsabilidad civil y los derechos reales, en el marco del nuevo Código Civil y Comercial de la Nación, que entró en vigencia en el año 2015. La clase inaugural se dictó de 14 a 21 horas ante una numerosa concurrencia.
Este primer módulo estuvo a cargo de Marcelo López Mesa, director de la Diplomatura, doctor en Ciencias Jurídicas y Sociales (1998) y Especialista en Derecho Civil (1990), ambos por la Facultad de Ciencias Jurídicas y Sociales de la Universidad Nacional de La Plata (UNLP).
Está previsto que la segunda clase se lleve a cabo el próximo viernes 10 de Mayo de 2019 en la misma sede.</p>
            </div>

 

            <aside class="col-xs-12 col-md-4 pull-right aaside"  >
                <div class="col-xs-12 col-md-12 noticias" >
                    <h3 style="text-align: center">Noticias</h3>

                    <article>
                        <h4 style=" color: #761c19;  ">DIPLOMATURA EN DERECHO PENAL</h4>
                        <h5 style=" color: #761c19;  ">RECORDATORIO</h5>
                        <p><strong>VIERNES 03 de Mayo continúan las clases de la DIPLOMATURA EN DERECHO PENAL</strong></p>
        
                    </article>

                    <!--                    <article>
                                            <h4 style="text-align: center">DIPLOMATURA EN DERECHO PENAL</h4>
                                            <h5>TERCERA CLASE: 12 de Abril de 2019 de 14 a 20 hs Disertante: Dr. Marcelo SANCINETTI</h5>
                                            <p >El Consejo Profesional de la Abogacía recuerda a los profesionales que cursan la “DIPLOMATURA EN DERECHO PENAL” que las clases continúan en su sede el día Viernes 12 de Abril de 2019 desde las 14.00 horas.
                                                <strong>Formosa, 11 de Abril de 2019</strong>.</p>
                    
                                        </article>-->
                    <article class="bg-info" style="padding-left: 5px; padding-right: 5px;" >
                        <H3  style="padding-left: 5px;">ATENCIÓN</H3>
                        <h5><strong>CURSOS DICTADOS EN EL CONSEJO DE ABOGADOS</strong></h5>
                        <P><strong>Consultas</strong> llamar al Consejo o  concurrir a su sede de calle San Martín 569 
                            ó llamando al <strong>teléfono 3704 430340 </strong>. <br><strong>Formosa, 14 de marzo de 2019.</strong></p> 

                    </article>


                </div>
                <!--                <div class="col-xs-12 col-md-12 efemerides">
                                    <h3 style="text-align: center; ">Efemerides</h3>
                
                                    <h4 style="text-align: center">DIA INTERNACIONAL DE LA MUJER</h4>
                                    <h5><strong>DIA INTERNACIONAL DE LA MUJER</strong></h5>
                                    <p>El viernes 26 de Abril del cte año se dio inicio al dictado de la Diplomatura en Derecho Privado Patrimonial en el marco del Convenio firmado entre el Consejo Profesional de la Abogacía y la Universidad del Chaco Austral, con el auspicio de la Fiscalía de Estado de la Provincia de Formosa, el Colegio de Magistrados y Funcionarios de la Provincia de Formosa y la Comisión de Jóvenes Abogados.	
        Esta actualización que se lleva a cabo en la sede del Consejo está destinada a profesionales del derecho y profesiones afines. Durará ocho meses y se centra en las obligaciones, la responsabilidad civil y los derechos reales, en el marco del nuevo Código Civil y Comercial de la Nación, que entró en vigencia en el año 2015. La clase inaugural se dictó de 14 a 21 horas ante una numerosa concurrencia.
Este primer módulo estuvo a cargo de Marcelo López Mesa, director de la Diplomatura, doctor en Ciencias Jurídicas y Sociales (1998) y Especialista en Derecho Civil (1990), ambos por la Facultad de Ciencias Jurídicas y Sociales de la Universidad Nacional de La Plata (UNLP).
Está previsto que la segunda clase se lleve a cabo el próximo viernes 10 de Mayo de 2019 en la misma sede.</strong></p>    
                                </div>-->

            </aside>
            <section class="col-md-8 col-xs-12 bg-success " >
                <div class="row">
                    <div class="col-md-12" >
                        <div class='btn-group pull-right'> 
                            <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                            <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                            <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                        </div>

                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 col-xs-12 img-thumbnail  " ng-repeat="eve in evento| filter:search | startFromGrid: currentPage * pageSize | limitTo: pageSize">
                        <div >
                            <h5><strong>{{eve.pagina}}</strong></h5>
                            <!--                                                <h5>Fecha del evento: {{eve.fecha| date:'dd/MM/yyyy'}}</h5>-->
                            <a ng-href="eventos.php?id={{eve.ideventos}}"><h5 class="bg-success text-warning text-center"> {{eve.ideventos}} - {{ eve.titulo}}</h5>  </a>
                            <div class="col-xs-12 col-md-12  " style="height: 150px;" ng-bind-html="eve.texto |cortarTexto:400"></div>
                            <p class="pull-right"> <a ng-href="eventos.php?id={{eve.ideventos}}"> Mas ... </a></p>

                            <div class="col-md-12 col-xs-12 img-thumbnail" ng-repeat="folleto in eve.folletos| limitTo:1" >
                                <!--<img target="Click al Ingresar" class="img-responsive" width="350px" ng-src="../imagenes/eventos/{{eve.path_imagen}}/{{folleto}}" title=""/>-->
                                <img style="height: 500px;" class="col-md-12 col-xs-12" ng-src="../imagenes/{{eve.path}}/folletos/{{folleto}}" title=""/>
                            </div>



                        </div>

                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12" >
                    <div class='btn-group pull-right '>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                    </div>
                    </div>
                </div>

            </section> 

            <section class="col-xs-12  col-md-6 col-md-offset-3 Imagenes_pie"  >
                <?php
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
                <div id="carousel-example-generic" class="carousel slide  " style=" text-align: center; height:400px; margin-top: 25px; margin: auto;" data-ride="carousel" >
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

                                    <img style="height: 400px; width:  800px;" src="<?php echo"../imagenes/" . $rows[$index]['path'] . "/imagenes/" . $rows[$index]['imagen']; ?>" alt="..."/>
                                    <div class="carousel-caption"  >
                                        <p style="background-color:  #555;">
                                            <?php
                                            echo $rows[$index]['titulo'];
                                            ?>

                                    </div>
                                </div>
                            <?php }; ?>

                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> 

                    <?php
                }

                ;
                ?>

            </section>

            <section class="col-md-12 col-xs-12 menu_resoluciones" >
                <div class=" col-xs-12 col-md-6 text-center"> 
                    <h4 class="text-center">Resoluciones</h4>
                    <img width="100px" height="100px" src="../imagenes/front-end/resoluciones.png" alt=""/>  
                    <p>Proximamente</p>

                </div> 
                <div class="col-xs-12 col-md-6  text-center">
                    <h4 class="text-center">Inscripciones</h4>
                    <img width="200px" height="100px" src="../imagenes/front-end/inscripcion.jpg" alt=""/> 
                    <p>Proximamente</p>
                </div>

                <!--                <div class="col-xs-12 col-md-4">   
                                    <h4 class="text-center">Varios</h4>
                                    <p>Proximamente</p>
                                    <ul class="list-unstyled" ng-repeat = "eve in resoluciones">
                                        <li ><a  title="{{eve.tag}}" ng-href = "resoluciones.php?res={{eve.idresolucion}}"><p>{{eve.tag}}</p></a></li>
                
                                    </ul>
                                </div>-->

            </section>

        </div>
        <?php include '../pie.php';
        ?> 
    </body>
    <script src="../js/index.js" type="text/javascript"></script>
</html>
