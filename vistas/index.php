
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
        </header> 

        <div  style="margin-top:70px;">

            <div class=" col-xs-12 col-md-offset-3 col-md-6 barrasuperior ">Consejo Profesional de la Abogacia Formosa</div>

            <section  class=" col-xs-12  col-md-6 col-md-offset-3" > 
                <?php
                include '../controles/clases/ClaseCarrucel.php';
                $carr = new Carrucel();
                $carr->VerCarrucel(1);
                ?>

            </section>

            <div class="col-md-12 col-xs-12 Precios_jus" >
                <h4>Valor JUS {{Vhonorarios.importe}}  Desde : {{Vhonorarios.periodo| date:"dd/MM/yyyy" }} Resolución n°  29/19 </h4>
            </div>
             <aside class="col-xs-12 col-md-4 " style="float: right" >
                 <div class="col-xs-12 col-md-12 noticias">
                     <h3 style="text-align: center; ">Noticias</h3>
                     <article>
                          <h4 style="text-align: center">DIPLOMATURA EN DERECHO PENAL</h4>
                          <h5><strong>Proxima clase 5 de abril 2019</strong></h5>
                    <p>El día viernes 22 de Marzo, en la sede del Consejo Profesional de la Abogacía se llevó a 
                        cabo la primera clase de la DIPLOMATURA EN DERECHO PENAL  a cargo del director de la misma,
                        el Dr. Gonzalo Javier Molina, quien abordó el tema “DELITOS CONTRA LAS PERSONAS. ÚLTIMAS 
                        REFORMAS AL CÓDIGO PENAL”.
                        El programa, que continuará el próximo 05 de Abril, tiene el objetivo de promover la 
                        permanente actualización y capacitación de los colegas del foro, quienes en este primer 
                        módulo colmaron las instalaciones del salón de conferencias, contabilizándose la presencia
                        de mas de 200 profesionales.. <br><strong>Formosa, 27 de marzo de 2019.</strong></p>
                         
                     </article>
                    <h4 style="text-align: center">DIPLOMATURA EN DERECHO PENAL</h4>
                    <h5><strong>Preinscripción</strong></h5>
                    <p>El Consejo Profesional de la Abogacía solicita a los interesados preinscriptos para la 
                        “DIPLOMATURA EN DERECHO PENAL” que se inicia el Viernes 22 de Marzo de 2019 a las 14 hs,
                        que confirmen su inscripción ante el Consejo, concurriendo a su sede de calle San Martín 569 
                        ó llamando al teléfono 3704 430340. A tales fines se otorga un plazo hasta el día LUNES 18 de
                        MARZO a las 20 horas. <br><strong>Formosa, 14 de marzo de 2019.</strong></p>    
                </div>
                 <div class="col-xs-12 col-md-12 efemerides">
                 <h3 style="text-align: center; ">Efemerides</h3>
               
                    <h4 style="text-align: center">DIA INTERNACIONAL DE LA MUJER</h4>
                    <h5><strong>DIA INTERNACIONAL DE LA MUJER</strong></h5>
                    <p>El Consejo Profesional de la Abogacía adhiere y saluda a las colegas y en su nombre a todas las mujeres en su día:
A aquellas que nos representan en los campos de la ciencia, la tecnología, la ingeniería, la docencia, los oficios, las comunicaciones y a todas quienes abogan por innovaciones sensibles al género que conformarán las sociedades del futuro.
A aquellas emprendedoras sociales; las que trabajan a favor de la igualdad de género para eliminar barreras y acelerar los avances hacia ese objetivo.
Todos hemos nacido de una mujer y ese solo hecho demuestra el valor social y humano de su condición, preponderante en la sociedad y en la familia. A ellas, nuestra gratitud.
A aquellas que ejercen un rol activo bregando por la creación de sistemas mas inclusivos, servicios eficientes e infraestructuras sostenibles para acelerar el logro de la igualdad de género.
A todas, nuestros cordiales saludos y nuestro reconocimiento.

<br><strong>Formosa, 8 de marzo de 2019.</strong></p>    
                </div>

            </aside>
            <section class="col-md-8 col-xs-12 bg-success ">
                <div class="row">
                    <div >
                        <h4 class="text-center">Cursos</h4>
                        <div class="">
                            <div class='btn-group'> 
                                <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                                <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                                <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 col-xs-12 img-thumbnail  " ng-repeat="eve in evento| filter:search | startFromGrid: currentPage * pageSize | limitTo: pageSize">
                        <div class="">
                            <!--                    <h3>{{eve.titulo}}</h3>
                                                <h5>Fecha del evento: {{eve.fecha| date:'dd/MM/yyyy'}}</h5>-->
                            <a  ng-href="eventos.php?id={{eve.ideventos}}"  >
                                <img target="Click al Ingresar" media="(max-width: 550px)" class="img-responsive" ng-src="../imagenes/eventos/{{eve.imagenevento}}" title=""/></a>
                            <!--<p>//{{eve.texto|cortarTexto:500}} Mas++</p>--> 

                        </div>

                    </div> 
                </div>
                <div class="row">
                    <div class='btn-group '>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>
                    </div>
                </div>

            </section> 
            <section class="col-md-offset-2 col-md-8 col-xs-12 " style="padding:10px;" >
                <?php
//            include 'conexion.php';

    
    //put your code here
    function dede ($idpagina){ 
     $re = new Conexion();
        $sql = "select * from imagenes where idpagina=8";
        $consulta = $re->prepare($sql);
        $consulta->bindParam(":idpagina", $idpagina);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $fila=count($rows);
        }
        
        if (!isset($fila)){
            $fila=2;
            $rows=array(
                    array("idimagenes" => "56", "idpagina" => "1" ,"imagen"=>"IMG_20170616_114203985.jpg"),
                    array("idimagenes" => "56", "idpagina" => "1" ,"imagen"=>"IMG_20170616_114505980.jpg")
                         );
            
        }
    
        ?>
                <div id="carousel-example-generic" class="carousel slide"  data-ride="carousel" >
                    <!--Indicators--> 
                    <ol class="carousel-indicators">
                        <?php for ($index = 0; $index < $fila;$index++) { 
                        
                       $re=($index==0)? $clas='class="active"':"";?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $index ?>" <?php echo $clas ?>></li>
                       
                         <?php  }; ?>
                    </ol>

                    <!--Wrapper for slides--> 
                    <div class="carousel-inner" role="listbox">
                       <?php 
                       for ($index = 0; $index < $fila;$index++) { 
                        
                       $re=($index==$fila-1)? $clas='active':"";?>
                        <div class="item <?php echo $clas  ?>">
                            <img src="../imagenes/eventos/curso_1/<?php  echo $rows[$index]['imagen']; ?>" alt="..."/>
                            <div class="carousel-caption" style="color: black; background-color:  aliceblue;">
                          <?php  echo $rows[$index]['descripcion_evento']; ?>
                            </div>
                        </div>
                       <?php  }; ?>

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
            
    <?php } 
      dede(8);?>
                
            
            </section>
            
            
            
            
            
            <section class="col-md-12 col-xs-12 menu_resoluciones" >
                <div class=" col-xs-12 col-md-4 text-center"> 
                    <h4 class="text-center">Resoluciones</h4>
                    <img width="100px" height="100px" src="../imagenes/front-end/resoluciones.png" alt=""/>  
                    <p>Proximamente</p>

                </div> 
                <div class="col-xs-12 col-md-4  text-center">
                    <h4 class="text-center">Inscripciones</h4>
                    <img width="200px" height="100px" src="../imagenes/front-end/inscripcion.jpg" alt=""/> 
                    <p>Proximamente</p>
                </div>

                <div class="col-xs-12 col-md-4">   
                    <h4 class="text-center">Varios</h4>
                    <p>Proximamente</p>
                    <ul class="list-unstyled" ng-repeat = "eve in resoluciones">
                        <li ><a  title="{{eve.tag}}" ng-href = "resoluciones.php?res={{eve.idresolucion}}"><p>{{eve.tag}}</p></a></li>
                       
                    </ul>
                </div>

            </section>

        </div>
        <?php include '../pie.php';
        ?> 
    </body>
    <script src="../js/index.js" type="text/javascript"></script>
</html>
